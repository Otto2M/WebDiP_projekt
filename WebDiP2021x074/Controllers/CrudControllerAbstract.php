<?php

abstract class CrudControllerAbstract
{
    protected $db = null;
    protected $action = null;
    protected $id = null;
    protected $field = null;
    protected $dir = null;
    protected $page_number = null;
    protected $limit = 5;
    protected $page;

    // bind type from html form
    private $dbTypeConvert = [
        'integer' => 'i',
        'text' => 's',
        'email' => 's',
        'date' => 's',
        'datetime-local' => 's',
        'select' => 's',
        'textarea' => 's',
        'checkbox' => 's',
        'number' => 'i',
        'enum' => 's',
        'range' => 'i',
    ];

    protected $labelStyle = 'block text-sm font-medium text-gray-700';
    protected $inputStyle = 'mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500';
    protected $submitStyle = 'inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500';

    public function __construct($db) {
        $this->db = $db;
        $konf = $this->db->Select('SELECT * FROM konfiguracija WHERE id=1');
        $konf = $konf[0];
        $this->action = $_GET['action'] ?? '';
        $this->page = $_GET['page'] ?? '';
        $this->id = $_GET['id'] ?? '';
        $this->limit = $konf['broj_redaka_po_stranici'] ??  5;
        $this->field = (empty($_GET['field']) || $_GET['field'] === 'null') ? $this->model->defaultFieldSort : $_GET['field'];
        if (empty($_GET['dir']) || $_GET['dir'] === 'null') {
            $this->dir = $this->model->defaultFieldDir;
        } else {
            $this->dir = $_GET['dir'];
            // convert up/down to SQL ASC/DESC order
            $this->dir = strtolower($this->dir) === 'up' ? 'ASC': 'DESC';
        }
    }

    public function parseRequest() {
        if (in_array($_SERVER['REQUEST_METHOD'], ['POST', 'PUT', 'DELETE'])) {
            switch ($this->action) {
                case 'edit':
                    echo $this->update();
                    break;
                case 'add':
                    echo $this->store();
                    break;
                case 'delete':
                    echo $this->delete();
                    break;
                case 'index':
                    $this->index();
                    break;
                default:
                    echo($this->action);
            }
        } else {
            // GET method get form
            switch ($this->action) {
                case 'edit':
                    echo $this->edit(); # show edit form
                    break;
                case 'add':
                    echo $this->add(); # show add form
                    break;
                case 'delete':
                    $this->delete();  # del
                    break;
                case 'index':
                    $this->index(); # show all records
                    break;
                default:
                    # echo($action);
            }
        }
    }

    // list data from table with pagination ordering searching
    public function indexRaw() {

    }

    public function getFieldType($name) {
        foreach($this->model->fields as $key => $field) {
            if ($key === $name) {
                return $field;
            }
        }
    }

    public function index($format = 'json')
    {
        $filters = $_GET['filters'] ?? '';
        $filters = json_decode($filters, true);
        $where = '';
        $values = [];
        $type = [];
        if (! empty($filters)) {
            unset($where);
            $where = [];
            foreach($filters as $filter){
                $where[] = $filter['name']  . " LIKE ?";
                $field = $this->getFieldType($filter['name']);
                $type[] = $this->dbTypeConvert[$field['type']];
                $values[] = $filter['value'] . '%';
            }
            $where = ' AND ' . implode(' AND ', $where);
            $values = array_merge([implode('', $type)], $values);
        }

        #die(print_r($_POST, true));
        $sql = "SELECT count(*) AS `num` FROM `" . $this->model->table_name . "`";
        $total_rows = $this->db->Select($sql);
        $total_rows = $total_rows[0] ?? $total_rows;
        $total_rows = $total_rows['num'] ?? 0;
        if (isset($_GET['pnum']) && $_GET['pnum'] === 'null') {
            unset($_GET['pnum']);
        }
        $this->page_number = isset($_GET['pnum']) ? (int)$_GET['pnum'] : 1;
        $total_pages = ceil($total_rows / $this->limit);
        $initial_page = abs($this->page_number-1) * $this->limit;

        $column = '*';
        if (isset($this->model->gridColumns)) {
            $column = implode(', ', $this->model->gridColumns);
        }

        if($this->model->table_name === "kategorija_namjestaja" &&  $_SESSION['uloga_id'] == 2) {
            $sql = "SELECT " . $column . " FROM `" . $this->model->table_name . "`" .
            " LEFT JOIN korisnik_kategorijaNamjestaja ON kategorija_namjestaja.id = korisnik_kategorijaNamjestaja.kategorijaNamjestaja_id
            AND korisnik_kategorijaNamjestaja.korisnik_id = " . $_SESSION['id'] .
            " WHERE 1=1 " . $where . "AND korisnik_kategorijaNamjestaja.korisnik_id = " . $_SESSION['id'] . " " .
            " ORDER BY " . $this->field . " " . $this->dir . " " .
            "LIMIT " . $initial_page . ',' . $this->limit;  ;
            
        } else { 
        $sql = "SELECT " . $column . " FROM `" . $this->model->table_name . "`" .
            " WHERE 1=1 " . $where .
            " ORDER BY " . $this->field . " " . $this->dir . " " .
            "LIMIT " . $initial_page . ',' . $this->limit;  ;
       # die($sql . ' ' .print_r($values, true));
        }
        $data = $this->db->Select($sql, $values);

        if ($format === 'json') {
			header('Content-Type: application/json; charset=utf-8');
            header("TotalRows: " . $total_rows);
            header("TotalPages: " . $total_pages);
            header("Limit: " . $this->limit);
            #header("Table: " . json_encode($this->model->fields));
#print_r($data);
            exit(json_encode($data));
        }
        return $data;
    }

    // get edit form
    public function edit()
    {
        $sql = "SELECT * FROM `" . $this->model->table_name . "` WHERE `id` = ? ";
        $data = $this->db->Select($sql, ['i', $this->id]);
        $data = isset($data[0]) ? $data[0] : $data;
        $html = '<form name="forma" id="forma" action="restAPI.php?' . $_SERVER['QUERY_STRING']. '" method="POST">';
        foreach($this->model->fields as $key => $field) {

            if(isset($field['hidden']) && $field['hidden'] == true) {
                continue;
            }
            if (! empty($data[$key]) && $field['type'] === 'datetime-local') {
                $data[$key] = str_replace(' ', 'T', $data[$key]);
            }

            // skip id - prim key && type not ['textarea', 'select', 'checkbox', 'enum', 'range']
            if ($this->model->primary_key !== $key && ! in_array($field['type'], ['textarea', 'select', 'checkbox', 'enum', 'range', 'multiselect'])) {
                $html .='<div><label for="' . $key . '" class="' . $this->labelStyle . '">' . $field['label'] . ':</label><input type="'.  $field['type'] . '" id="' . $key . '" value="' . $data[$key] . '" name="' . $key . '" maxlength="' . $field['length'] . '" class="' . $this->inputStyle  . '"></div>';
            } else if ($field['type'] === 'range') {
                $html .='<div><label for="' . $key . '" class="' . $this->labelStyle . '">' . $field['label'] . ':</label><input type="'.  $field['type'] . '" id="' . $key . '" value="' . $data[$key] . '" name="' . $key . '" min="' . $field['min'] . '" max="' . $field['max'] . '" onchange="updateText(\'posto\', this.value);"' . '" class="' . $this->inputStyle  . '"><span  id="posto" >' . $data[$key] . '</span></div>';
            } else if ($field['type'] === 'select') {
                $html .='<div><label for="' . $key . '" class="' . $this->labelStyle . '">' . $field['label'] . ':</label>';
                $file = 'Controllers/' . $field['controller'] . '.php';
                if (is_file($file)) {
                    require_once($file);
                    $controller = new $field['controller']($this->db);
                    $selectData = $controller->index('raw');
                    $selectedModel = $controller->getModel();
                    unset($controller);

                    $html .='<select name="' . $key . '" id="' . $key . '" class="' . $this->inputStyle . '">';
                    foreach ($selectData as $value) {
                        if (! empty($data[$key]) && $data[$key] === $value[$selectedModel->primary_key]) {
                            $html .='<option value="' . $value[$selectedModel->primary_key] .'" selected>' . $value[$selectedModel->defaultDisplayField] .'</option>';
                        } else {
                            $html .='<option value="' . $value[$selectedModel->primary_key] .'">' . $value[$selectedModel->defaultDisplayField] .'</option>';
                        }
                    }
                    $html .='</select></div>';
                }

            } else if ($field['type'] === 'multiselect' && $_SESSION['uloga_id'] == 1) {
                    $html .='<div><label for="' . $key . '" class="' . $this->labelStyle . '">' . $field['label'] . ':</label>';
                    $file = 'Controllers/' . $field['controller'] . '.php';
                    if (is_file($file)) {
                        require_once($file);
                        $controller = new $field['controller']($this->db);
                        $selectData = $controller->index('raw');
                        $selectedModel = $controller->getModel();
                        unset($controller);
    
                        $html .='<select name="' . $key . '[]" id="' . $key . '" class="' . $this->inputStyle . '" multiple>';
                        $sql = "SELECT korisnik_id FROM " . $field['relation'] . " WHERE " . $field['where'] . "=" . $this->id;
                        $relation = $this->db->Select($sql, []);
                        
                        foreach ($selectData as $value) {
                            if (in_array($value['id'], array_column($relation, 'korisnik_id'))) {
                                $html .='<option value="' . $value[$selectedModel->primary_key] .'" selected>' . $value[$selectedModel->defaultDisplayField] .'</option>';
                            } else {
                                $html .='<option value="' . $value[$selectedModel->primary_key] .'">' . $value[$selectedModel->defaultDisplayField] .'</option>';
                            }
                        }
                        $html .='</select></div>';
                    }

            } else if ($field['type'] === 'enum') {
                $html .='<div><label for="' . $key . '" class="' . $this->labelStyle . '">' . $field['label'] . ':</label>';

                $html .='<select name="' . $key . '" id="' . $key . '" class="' . $this->inputStyle . '">';
                foreach ($this->model->status as $k => $value) {
                    if (! empty($data[$key]) && $data[$key] === $k) {
                        $html .='<option value="' . $k .'" selected>' . $value .'</option>';
                    } else {
                        $html .='<option value="' . $k .'">' . $value .'</option>';
                    }
                }
                $html .='</select></div>';
            } else if ($field['type'] === 'checkbox') {
                if ($data[$key]) {
                    $html .='<label for="' . $key . '">' . $field['label'] . ':</label><br><input type="checkbox" name="' . $key . '" checked><br>';
                } else {
                    $html .='<label for="' . $key . '">' . $field['label'] . ':</label><br><input type="checkbox" name="' . $key . '"><br>';
                }
            } else if ($field['type'] === 'textarea') {
                $html .='<div><textarea name="' . $key . '">' . $data[$key] . '</textarea></div>';
            }
        }
        $html .='<div class="px-4 py-3 bg-gray-50 text-right sm:px-6"><input value="Snimi" type="submit" class="' . $this->submitStyle . '"></div>';
        $html .='</form>';
        #header("Table: " . json_encode($this->model->fields));
        return $html;
    }

    public function getModel()
    {
        return $this->model;
    }

    // get empty form
    public function add()
    {
        $html = '<form name="forma" id="forma" action="restAPI.php?' . $_SERVER['QUERY_STRING']. '" method="POST">';
        foreach($this->model->fields as $key => $field) {
            if(isset($field['hidden']) && $field['hidden'] == true) {
                continue;
            }
            if ($this->model->primary_key !== $key) {
                if ($this->model->primary_key !== $key && ! in_array($field['type'], ['textarea', 'select', 'checkbox', 'enum', 'range'])) {
                    $html .='<div><label for="' . $key . '" class="' . $this->labelStyle . '">' . $field['label'] . ':</label><input type="'.  $field['type'] . '" id="' . $key . '" value="" name="' . $key . '" maxlength="' . $field['length'] . '" class="' . $this->inputStyle  . '"></div>';
                }  else if ($field['type'] === 'range') {
                    $html .='<div><label for="' . $key . '" class="' . $this->labelStyle . '">' . $field['label'] . ':</label><input type="'.  $field['type'] . '" id="' . $key . '" value="0" name="' . $key . '" min="' . $field['min'] . '" max="' . $field['max'] . '" onchange="updateText(\'posto\', this.value);"' . '" class="' . $this->inputStyle  . '"><span  id="posto" >0</span></div>';
                } else if ($field['type'] === 'select') {
                    $html .='<div><label for="' . $key . '" class="' . $this->labelStyle . '">' . $field['label'] . ':</label>';
                    $file = 'Controllers/' . $field['controller'] . '.php';
                    if (is_file($file)) {
                        require_once($file);
                        $controller = new $field['controller']($this->db);
                        $selectData = $controller->index('raw');
                        $selectedModel = $controller->getModel();
                        unset($controller);

                        $html .='<select name="' . $key . '" id="' . $key . '" class="' . $this->inputStyle . '">';
                        if (isset($selectData) && is_array($selectData)) {
                            foreach ($selectData as $value) {
                                $html .='<option value="' . $value[$selectedModel->primary_key] .'">' . $value[$selectedModel->defaultDisplayField] .'</option>';
                            }
                        }

                        $html .='</select></div>';
                    }
                } else if ($field['type'] === 'enum') {
                    $html .='<div><label for="' . $key . '" class="' . $this->labelStyle . '">' . $field['label'] . ':</label>';
                    $html .='<select name="' . $key . '" id="' . $key . '" class="' . $this->inputStyle . '">';
                    foreach ($this->model->status as $k => $value) {
                        $html .='<option value="' . $k .'">' . $value .'</option>';
                    }
                    $html .='</select></div>';
                } else if ($field['type'] === 'checkbox') {
                    $html .='<label for="' . $key . '">' . $field['label'] . ':</label><br><input type="checkbox" name="' . $key . '" value=""><br>';
                } else if ($field['type'] === 'textarea') {
                    $html .='<div><textarea name="' . $key . '"></textarea></div>';
                }
            }
        }
        $html .='<div class="px-4 py-3 bg-gray-50 text-right sm:px-6"><input value="Snimi" type="submit" class="' . $this->submitStyle . '"></div>';
        $html .='</form>';
        return $html;
    }

    // get 1 record data
    public function show()
    {
        $sql = "SELECT * FROM `" . $this->model->table_name . "` WHERE `id` = ?";
        $data = $this->db->Select($sql, ['i', $this->id]);
        header("Content-Type: application/json");
        exit(json_encode($data));

    }

    // update record
    public function update()
    {
        if ($this->model->table_name !== 'dnevnik_rada') {
            $this->db->dnevnik("Ažuriranje zapisa iz tablice " . $this->model->table_name, "Id zapisa: " . $this->id, 4);
        }
        $columns = [];
        $type = [];
        foreach($this->model->fields as $key => $field) {
     
            if ($key == 'moderatori') {
                continue;
            }
            if ($_POST[$key] === 'on') $_POST[$key] = 1;
            if ($this->model->primary_key !== $key) {
                if (isset($_POST[$key])) {
                    $columns[] = '`' . $key . '` = ?';
                    $values[] = $_POST[$key];
                    $type[] = $this->dbTypeConvert[$field['type']];
                } else if (isset($field['default'])) {
                    $columns[] = '`' . $key . '` = ?';
                    $values[] = $field['default'];
                    $type[] = $this->dbTypeConvert[$field['type']];
                }
            }
        }

        $values[] = $this->id;
        $values = array_merge([implode('', $type) . 'i'], $values);
        $sql = "UPDATE `" . $this->model->table_name . "` SET " . implode(',', $columns) . " WHERE id = ?";
        $data = $this->db->Update($sql, $values);

        //moderatori
        if(! empty($_POST['moderatori'])) {
            $sql = "DELETE FROM korisnik_kategorijanamjestaja WHERE kategorijaNamjestaja_id = ?" ;
            $data = $this->db->Remove($sql, ['i', $this->id]);

            foreach($_POST['moderatori'] as $value) {
                $sql = "INSERT INTO korisnik_kategorijanamjestaja (kategorijaNamjestaja_id, korisnik_id) VALUES (?,?)";
                $data = $this->db->Insert($sql, ['ii', $this->id, $value]);
            }
        }
        #die($sql . ' ' . print_r($values, true));
        header("Content-Type: application/json");
        header("Location: ./?page=" . $this->page );
        exit(json_encode([
            'id' => $this->id,
            'status' => ! $data,
            'message' => 'Zapis uspješno ažuriran s ID:' . $this->id
        ]));
    }

    // insert new record
    public function store()
    {
        $columns = [];
        $type = [];
        foreach($this->model->fields as $key => $field) {
            if ($this->model->primary_key !== $key) {
                if (isset($_POST[$key])) {
                    $columns[] = '`' . $key . '`';
                    $values[] = $_POST[$key]; # htmlentities
                    $type[] = $this->dbTypeConvert[$field['type']];
                }
            }
        }

        for($i = 0; $i < count($values);$i++) {$params[] = '?';}
        $values = array_merge([implode('', $type)], $values);
        $sql = "INSERT INTO `" . $this->model->table_name . "`  (" . implode(',', $columns) .
               ") VALUES ( " . implode(',', $params) . " ) ";

        #echo ($sql);

        $data = $this->db->Insert($sql, $values);
        if ($this->model->table_name !== 'dnevnik_rada') {
            $this->db->dnevnik("Upisivanje novog zapisa u tablicu " . $this->model->table_name, "Id zapisa: " . $data, 5);
        }

        header("Content-Type: application/json");
        header("Location: ./?page=" . $this->page );
        exit(json_encode([
            'id' => $data,
            'message' => 'Zapis uspješno kreiran s ID:' . $data
        ]));
    }

    public function delete()
    {
        if ($this->model->table_name !== 'dnevnik_rada') {
            $this->db->dnevnik("Brisanje zapisa iz tablice " . $this->model->table_name, "Id zapisa: " . $this->id, 3);
        }
        $data = $this->db->Remove("DELETE FROM `" . $this->model->table_name . "` WHERE `" . $this->model->primary_key. "` = ?",
            ['i' , $this->id]
        );
        header("Content-Type: application/json");
        header("Location: ./?page=" . $this->page );
        exit(json_encode([
            'id' => $this->id,
            'status' => ! $data,
            'message' => 'Zapis uspješno ažuriran s ID:' . $this->id
        ]));
    }

}
