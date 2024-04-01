<?php
$order = '';
$orderBy = '';
$where = '';
if (isset($_GET['filters'])) {
    $filters = $_GET['filters'] ?? '';
    $filters = json_decode($filters, true);
    foreach ($filters as $filter){
        if ($filter['name'] === 'galerija' && $filter['value'] === 'cijeni') {
            $order .= ' ORDER BY namjestaj.cijena ';
        }
        if ($filter['name'] === 'galerija' && $filter['value'] === 'boji') {
            $order .= ' ORDER BY namjestaj.boja_id ';
        }
        if ($filter['name'] === 'popusti' && ! empty($filter['value'])) {
            $where = " WHERE namjestaj.popust_id = '" . (int)$filter['value'] . "'";
        }
        if ($filter['name'] === 'smjer' && ! empty($filter['smjer'])) {
            $orderBy = $filter['smjer']==='up' ? ' ASC' : ' DESC';
        }
    }
}

$sql = "SELECT 
    namjestaj.id, namjestaj.naziv,  namjestaj.cijena, namjestaj.status_dostupnosti, 
    boja.naziv as boja, popusti.naziv as popust, popusti.postotak_snizenja, 
    kategorija_namjestaja.naziv as kategorija, slike.lokacija
    FROM namjestaj 
    LEFT JOIN boja ON namjestaj.boja_id = boja.id
    LEFT JOIN popusti ON namjestaj.popust_id = popusti.id
    LEFT JOIN kategorija_namjestaja ON namjestaj.kategorija_namjestaja_id = kategorija_namjestaja.id
    LEFT JOIN slike ON slike.namjestaj_id =namjestaj.id
 ";

$sql = $sql . $where . $order . $orderBy;
//die($sql );
$data = $db->Select($sql, []);

$html = '<div class="flex flex-wrap -m-4">';
if (! empty($data)) {
    foreach ($data as $row) {
        $html .= '
        <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
            <a class="block relative h-48 rounded overflow-hidden">
                <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="img/' . $row['lokacija'] .'">
            </a>
            <div class="mt-4">
                <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">' . $row['kategorija'] . ' - ' . $row['boja'] .'</h3>
                <h2 class="text-gray-900 title-font text-lg font-medium">' . $row['popust'] . (isset($row['popust']) ? ' - ' . $row['postotak_snizenja'] .' %' : '').'</h2>
                <p class="mt-1">' . $row['cijena'] . ' kn</p>
            </div>
        </div>';
    }
    $html .= '</div>';
    if (isset($_GET['filters'])) {
       // exit($html);
    }
}

    //header("Content-Type: application/json");
    //exit(json_encode($data));

?>

<div id="galerijaForma" class="mx-auto flex items-center justify-center h-12 w-12 px-3 py-2 ">
    <label class="px-3 block text-sm w-auto font-medium text-gray-700">Filter</label>
    <select name="galerija" class=" mt-1 block w-auto px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500">
        <option value="">-</option>
        <option value="cijeni">Po cijeni</option>
        <option value="boji">Po boji</option>
    </select>
    <label class="px-3 block text-sm w-auto font-medium text-gray-700">Popustima</label>
    <select name="popusti" class=" mt-1 block w-auto px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500">
        <option value="">-</option>
        <?php
            $sql = "SELECT id, naziv FROM popusti";
            $data = $db->Select($sql, []);
            foreach($data as $row) {
                echo '<option value="' . $row['id'] . '">' . $row['naziv'] . '</option>' . "\n";
            }
        ?>
    </select>
    <label class="px-3 block text-sm w-auto font-medium text-gray-700">Smjer</label>
    <select name="smjer" class="flex mt-1 block w-auto px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500">
        <option value="">-</option>
        <option value="up">Uzlazno</option>
        <option value="down">Silazno</option>
    </select>
    <div class="items-center px-3 py-3">
        <button id="galerijaButton" onClick="galerijaButton()" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Prikaži</button>
    </div>
</div>


<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
        <div id="prikazGalerije">
            <?php
            //if (! isset($_GET['filters'])) {
                echo $html;
            //}
            ?>
        </div>
    </div>
</section>

