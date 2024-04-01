function createLink(url, display, icon, target, callback) {
    return "<a href=\"{url}\" title=\"{display}\" class=\"inline-flex items-center\" target=\"{target}\" {callback}>{icon}</a>".formatUnicorn({url: url, display: display, icon: icon, target: target, callback: callback});
}

function createInputField(type, name, value, placeHolder, callback) {
    return "<input type=\"{type}\" name=\"{name}\" placeholder=\"{placeHolder}\" value=\"{value}\" class=\"mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500\" {callback}>".formatUnicorn({type: type, name: name, value: value, placeHolder: placeHolder, callback: callback});
}

function createSelectField(name, value, callback) {
    return "<input name=\"{name}\" value=\"{value}\" aria-label=\"{name}\" {callback}>".formatUnicorn({name: name, value: value, callback: callback});
}

function createButton(type, display, id, callback) {
    return "<button type=\"{type}\" aria-label=\"{id}\" id=\"{id}\" {callback}>{display}</button>".formatUnicorn({type: type, display: display, id: id, callback: callback});
}
// extract param form query string
const params = new Proxy(new URLSearchParams(window.location.search), {
    get: (searchParams, prop) => searchParams.get(prop),
});

function tableFromJson(data, TotalRows, TotalPages, Limit) {
    // Extract value from table header.
    let addIcon = '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>';
    let editIcon = '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg>';
    let deleteIcon = '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>';
    let sortUpIcon ='<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12" /></svg>';
    let sortDownIcon = '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 4h13M3 8h9m-9 4h9m5-4v12m0 0l-4-4m4 4l4-4" /></svg>';
    let searchIcon = '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>';
    let col = [];
    let header = [];
    let search = [];
    let sortLink, searchInput;
    let isMobile = false
    let url = '';
    let mobile = '';
    for (let i = 0; i < data.length; i++) {
        for (let key in data[i]) {
            url = "./?page=" + params.page + "&action=index&dir=" + params.dir + "&field=" + params.field + "&pnum=" + params.pnum;
            sortLink = createLink("./?page=" + params.page + "&dir=up&field=" + key,"Sort ASC", sortUpIcon, "", "") + " " +
                createLink("./?page=" + params.page + "&dir=down&field=" + key, "Sort DESC", sortDownIcon, "", "");
            searchInput = createInputField('text', key, "", ""); // "Search by " + key
            if (col.indexOf(key) === -1) {
                col.push(key);
                header.push(key + " " + sortLink);
                search.push(searchInput);
            }
        }
    }
    col.push("Akcije");
    header.push("Akcije");
    search.push(createButton("button", searchIcon, "search", "onClick=searchForm(this)"));

    // Create a table.
    var table = document.createElement("table");
    table.setAttribute('class', 'min-w-full');
    // Create table header row using the extracted headers above.
    var tr = table.insertRow(-1);                   // prvi red u tablici
    for (let i = 0; i < col.length; i++) {
        var th = document.createElement("th");      // zaglavlje tablice.
        th.innerHTML = header[i];
        //console.log(i,col.length);
        if (i>=2 && i<col.length-1) {
            mobile = 'hidden lg:table-cell ';
            isMobile = true;
        } else {
            mobile = '';
        }
        th.setAttribute('scope', 'col');
        th.setAttribute('class', mobile + 'text-sm font-medium text-gray-900 px-6 py-4 text-left');
        tr.appendChild(th);
    }

    // Create search input
    var tr = table.insertRow(-1);                   // table row.
    for (var i = 0; i < col.length; i++) {
        var th = document.createElement("th");      // table search.
        th.innerHTML = search[i];
        if (i>=2 && i<col.length-1) {
            th.setAttribute('class', 'hidden lg:table-cell');
        }
        tr.appendChild(th);
    }
    th.setAttribute('class', 'bg-white px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900');
;
    // json data to the table as rows.
    for (var i = 0; i < data.length; i++) {
        tr = table.insertRow(-1);
        let odd = i % 2 == 0 ? 'bg-gray-100' : 'bg-white';
        tr.setAttribute('class',  odd + ' border-b transition duration-300 ease-in-out hover:bg-gray-200');
        for (var j = 0; j < col.length; j++) {
            var tabCell = tr.insertCell(-1);
            // transition duration-300 ease-in-out hover:bg-gray-100
            if (j>=2 && j<col.length-1) {
                mobile = 'hidden lg:table-cell ';
            } else {
                mobile ='';
            }
            tabCell.setAttribute('class',  mobile + 'px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900');
            if (data[i][col[j]] === undefined) {
                tabCell.innerHTML = createLink("restAPI.php?page=" + params.page + "&action=edit&id=" + data[i][col[0]],"Edit",editIcon, "", "onClick=editLink(event," + data[i][col[0]] + ");") + " " +
                    createLink("restAPI.php?page=" + params.page + "&action=delete&id=" + data[i][col[0]],"Delete", deleteIcon,"", "onClick=deleteLink(event," + data[i][col[0]] + ");")
            } else {
                tabCell.innerHTML = data[i][col[j]];
            }
        }
    }

    var tr = table.insertRow(-1);
    var pagination = "";

    for (var page_number = 1; page_number <= TotalPages; page_number++) {
        //if (TotalPages>3) {
            // pagination += createLink("restAPI.php?page=" + params.page + "&pnum=" + page_number, page_number, "", "") + " "
        //} else {
            pagination += createLink("./?page=" + params.page + "&pnum=" + page_number, "Page " + page_number, page_number, "", "") + " "
        //}
    }
    // pagination
    var th = document.createElement("th");      // table header.
    console.log(col.length);
    th.innerHTML = pagination;
   // if (isMobile === true) {
   //     th.setAttribute("colspan", 2);
   // } else {
        th.setAttribute("colspan", col.length - 1);
   // }
    th.setAttribute('class', 'bg-white px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900');
    tr.appendChild(th);

    // add
    var th = document.createElement("th");
    th.innerHTML = createLink("restAPI.php?page=" + params.page + "&action=add", "Add", addIcon,"", "onClick=addLink(event);");
    th.setAttribute("colspan", 1);
    tr.appendChild(th);

    // Now, add the newly created table with json data, to a container.
    var divShowData = document.getElementById("showData");
    divShowData.innerHTML = "";

    var form = document.createElement("form");
    url = "restAPI.php?page=" + params.page + "&action=index&dir=" + params.dir + "&field=" + params.field + "&pnum=";
    form.setAttribute("method", "post");
    form.setAttribute("action",  url);
    form.setAttribute("id", "admin_form");
    form.appendChild(table);
    divShowData.appendChild(form);
}

String.prototype.formatUnicorn = String.prototype.formatUnicorn || function () {
    var str = this.toString();
    if (arguments.length) {
        var t = typeof arguments[0];
        var key;
        var args = ("string" === t || "number" === t) ?
            Array.prototype.slice.call(arguments)
            : arguments[0];
        for (key in args) {
            str = str.replace(new RegExp("\\{" + key + "\\}", "gi"), args[key]);
        }
    }
    return str;
};

function deleteLink(e, id) {
    e.preventDefault();
    var url ="restAPI.php?page=" + params.page + "&action=delete&id=" + id;
    let response = fetch(url, {
        method: 'GET'
    });

    url = "./?page=" + params.page + "&dir=" + params.dir + "&field=" + params.field + "&pnum=" + params.pnum;
    location.replace(url);
    return false;
}
function addLink(e) {
    e.preventDefault();
    let modal = document.getElementById("modalDialog");
    modal.style.display = "block";
    let form = document.getElementById("formContent");

    btn.onclick = function() {
        modal.style.display = "block";
    }
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    var url ="restAPI.php?page=" + params.page + "&action=add";
    let response = fetch(url, {
        method: 'GET'
    })
    .then(function (response) {
        return response.text();
    })
    .then(function (data) {
        form.innerHTML = data;
    })
    .catch(function (err) {
        // There was an error
        console.warn('Something went wrong.', err);
    });

    return false;
}
function editLink(e, id) {
    e.preventDefault();
    let modal = document.getElementById("modalDialog");
    modal.style.display = "block";
    let form = document.getElementById("formContent");
    // We want the modal to open when the Open button is clicked
    btn.onclick = function() {
        modal.style.display = "block";
    }
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    var url ="restAPI.php?page=" + params.page + "&action=edit&id=" + id;
    let response = fetch(url, {
        method: 'GET'
    })
        .then(function (response) {
            return response.text();
        })
        .then(function (data) {
            form.innerHTML = data;
        })
        .catch(function (err) {
            // There was an error
            console.warn('Something went wrong.', err);
        });

    return false;
}
async function getData(url) {
    try {
        let res = await fetch(url);
        const data = await res.json();
        const TotalRows = res.headers.get('TotalRows')
        const TotalPages = res.headers.get('TotalPages');
        tableFromJson(data, TotalRows, TotalPages);
    } catch (error) {
        console.error(error);
    }
}

async function getContent(url) {
    try {
        let res = await fetch(url);
        const data = await res.text();
        showData.innerHTML = data;
    } catch (error) {
        console.error(error);
    }
}


const form = document.getElementById( "forma" );
if (form) {
    form.onsubmit = async (e) => {
        e.preventDefault();

        let response = await fetch('', {
            method: 'POST',
            body: new FormData(form)
        });

        let result = await response.json();

        alert(result.message);
        url = "restAPI.php?page=" + params.page + "&dir=" + params.dir + "&field=" + params.field + "&pnum=" + params.pnum;
        location.replace(url);
    };
}

function updateText(id, val) {
    document.getElementById(id).innerHTML = val; 
}


const showData = document.querySelector("#showData");

var nav = ['loginPage', 'odjava', 'home', 'signupPage', 'konfiguracija', 'zaboravljenaLozinka', 'oAutoru', 'dokumentacija'];
console.log('params.page', params.page);
if (nav.indexOf(params.page) !== -1) {
    if (params.page === 'konfiguracija') {
        url = "restAPI.php?page=" + params.page + "&action=edit&id=1";
    } else {
        url = "restAPI.php?page=" + params.page;
    }

    if (params.update !== 'true') {
        getContent(url);
    }
} else if (! params.action && params.page !== '' ) {
    url = "restAPI.php?page=" + params.page + "&action=index&dir=" + params.dir + "&field=" + params.field+ "&pnum=" + params.pnum;
    getData(url);
}


// menu
let open = false;
const sidebar = document.querySelector("#sidebar");
const menuToggleIcon = document.querySelector("#menu-toggle");
const logoIcon = document.querySelector("#logoIcon");
const logoTitle = document.querySelector("#logoTitle");
const pages = document.querySelectorAll(".naziv");
function setOpen() {
    open = !open;
    console.log('open',open);
    if (! open) {
        sidebar.classList.add('w-20');
        sidebar.classList.remove('w-72');
        menuToggleIcon.classList.add('rotate-180');
        logoIcon.classList.remove('rotate-[360deg]');
        logoTitle.classList.add('scale-0');
        pages.forEach(function(page) {
            page.classList.add('scale-0');
            page.classList.add('hidden');
        });
    } else {
        sidebar.classList.add('w-72');
        sidebar.classList.remove('w-20');
        menuToggleIcon.classList.remove('rotate-180');
        logoIcon.classList.add('rotate-[360deg]');
        logoTitle.classList.remove('scale-0');
        pages.forEach(function(page) {
            page.classList.remove('scale-0');
            page.classList.remove('hidden');
        });
    }
}


function checkPassword(val) {
    var password =  val.value;
    var regex = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;  
    if(!regex.test(password)) {       
        document.getElementById('password').style.color = "red";
        alert('Lozinka mora sadržavati minimalno 8 znakova, jedno malo slovo, jedno veliko slovo, brojčane vrijednosti i specijalni znak!');
        document.getElementById('password_confirmed').disabled = true;
    } else {
        document.getElementById('password_confirmed').disabled = false;
    }
}

function checkConfirmedPassword(val) {
    var password =  document.getElementById('password').value;
    var passwordConf = val.value;
    if(password !== passwordConf) {
        document.getElementById('password_confirmed').style.color = "red";
        alert('Lozinka se ne podudaraju!');
    }
}

function checkEmail(val) {
    var email =  val.value;
    if(!email.includes('@')) {
        document.getElementById('email').style.color = "red";
        alert('Upisana email adresa ne sadrži znak "@" !');
    } else if (!email.includes('.')) {
        document.getElementById('email').style.color = "red";
        alert('Upisana email adresa ne sadrži znak točku(.) !');
    }
}


function checkAge(val) {
    var bdate =  val.value;
    var date = new Date(bdate);
    if(bdate == null) {
        document.getElementById('bdate').style.color = "red";
        document.getElementById('bdate').innerHTML = "*Molimo odaberite datum rođenja."
    }
    var month = Date.now() - date.getTime();
    var ageDateFormat = new Date(month);
    var year = ageDateFormat.getUTCFullYear();
    var age = Math.abs(year-1970);

    if(age < 5) {
        alert('Osobe mlađe od 18 godina ne mogu se registrirati!');
        document.getElementById('bdate').disabled=true;
        document.getElementById('button').disabled=true;
    }
}

function checkCookies(val) {
    console.log(val);
    if(val.checked) {
        document.getElementById('button').disabled = false;
    }else {
        document.getElementById('button').disabled = true;
    }
}

function checkName(val) {
    console.log(val);
    var name = val.value;
    var url ="restAPI.php?page=control&username=" + name;
    let response = fetch(url, {
        method: 'GET'
    })
        .then(function (response) {
            return response.json();
        })
        .then(function (data) {
            // This is the JSON from our response
            console.log(data);
            if(data.num === 1) {
                alert('To ime već postoji!');
                document.getElementById('button').disabled = true;
            }else {
                document.getElementById('button').disabled = false;
            }
            //form.innerHTML = data;
        })
        .catch(function (err) {
            // There was an error
            console.warn('Something went wrong.', err);
        });
}

function onSubmit(token) {
  document.getElementById("registracija").submit();
}

const cookiesAgree = document.getElementById('cookiesAgree');
const cookiesAgreeDialog = document.getElementById('cookiesAgreeDialog');

cookiesAgree.onclick = function()
{
    var url ="restAPI.php?page=cookies";
    let response = fetch(url, {
        method: 'GET'
    })
    .then(function (response) {
        return response.json();
    })
    .then(function (data) {
        console.log(data);
        cookiesAgreeDialog.style.display = "none";
    })
    .catch(function (err) {
        // There was an error
        console.warn('Something went wrong.', err);
    });

}

function galerijaButton() {
    const galerijaForma = document.getElementById('showData');
    const inputElements = showData.querySelectorAll("input, select, checkbox, textarea")
    let filters = [];
    inputElements.forEach(item => {
        //console.log("name", item.name);
        //console.log("value", item.value);
        if (item.value) {
            filters.push({'name': item.name,  'value': item.value});
        }
    });
    //console.log("filters", filters);
    const url = "restAPI.php?page=home&upgraade=true&filters=" + JSON.stringify(filters);
    let response = fetch(url, {
        method: 'GET'
    })
        .then(function (response) {
            return response.text();
        })
        .then(function (data) {
            //console.log(data);
            galerijaForma.innerHTML = data;
        })
        .catch(function (err) {
            // There was an error
            console.warn('Something went wrong.', err);
        });
}

function searchForm(ele) {
    const showData = document.getElementById('showData');
    const inputElements = showData.querySelectorAll("input, select, checkbox, textarea")
    let filters = [];
    inputElements.forEach(item => {
        console.log("name", item.name);
        console.log("value", item.value);
        if (item.value) {
            filters.push({'name': item.name,  'value': item.value});
        }
    });
    console.log("filters", filters);
    const url = "restAPI.php?page=" + params.page + "&action=index&dir=" + params.dir + "&field=" + params.field + "&pnum=1"+ "&filters=" + JSON.stringify(filters);
    getData(url);
}
