<!DOCTYPE html>
<html>
	<head>
		<title>Namještaj</title>
		<meta charset="utf-8">
		<meta name="author" content="Otto Miler Matulin">
		<meta name="description" content="Stranica - O autoru">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

	</head>
	
	<body>
			<h4>Opis projektnog zadatka</h4><br>
			<hr>
            <p>Sustav je zamišljen da omogućuje korisnicima pregled proizvoda (namještaja), njihovo naručivanje, 
                pregled statistike prodanih proizvoda, pristup galeriji proizvoda, dodavanje novih proizvoda i slične 
                funkcionalnosti ovisno o ulozi korisnika.</p><br>
		<div>
            <p><b>4 vrste korisnika:</b></p><br>
			<ul>
				<li>Neregistrirani korisnik/Gost</li>
                <li>Registrirani korisnik</li>
                <li>Moderator</li>
                <li>Administrator</li>
			</ul>
		</div>
        <div>
            <p>Neregistrirani korisnici imaju mogućnost pogledati rang listu namještaja prema kategoriji namještaja u 
                nekom vremenskom razdoblju, te također mogu vidjeti galeriju slika namještaja u kategoriji namještaja 
                uz mogućnost sortiranja po cijeni ili boji, mogu filtrirati prema popustu. Kako bi korisnik mogao naručiti 
                željeni proizvod ili imati nešto više funkcionalnosti dužan je prijaviti se u sustav. Ukoliko korisnik nema 
                izrađen račun tj. svoj profil u sustavu, može ga izraditi u svakom trenutku odabirom opcije „Registracija“. 
                Da bi korisnički račun bio valjan korisnik nakon registracije na svoju navedenu e-mail adresu dobiva ativacijski 
                kod kojim potvrđuje svoju registraciju u sustav i time njegov profil postaje valjan, te se može prijaviti u sustav. 
                Prijavom u sustav korisnik se nude sljedeće mogućnosti: može kreirati, pregledavati i ažurirati svoju narudžbu 
                namještaja, može vidjeti popis dostupnog namještaja sa informacijom o cijeni i popustu, pregledava sve svoje 
                narudžbe sa statusom (u obradi, naručen, dostava u tijeku, isporučen) sortirane po datumu, te može vidjeti 
                statistiku broja kupljenog namještaja grupirano po mjesecu i godini. </p><br>
        </div>

        <div>
            <p>
                Ulogu moderatora može dodijeliti isključivo administrator. Korisnik s ulogom moderator ima mogućnost 
                pregledavanja, kreiranja i ažuriranja namještaja i pridruživanja namještaja određenoj kategoriji za koju 
                je zadužen, zatim može vidjeti popis svih narudžbi, a za one sa statusom „dostava u tijeku“ određuje datum 
                i vrijeme isporuke, osim toga odabire popust i određuje trajanje popusta za namještaj, te vidi statistiku 
                zarade kupljenog namještaja grupirano po boji i vrsti materijala. Blokirane korisničke račune može odblokirati 
                isključivo administrator. Uz to ima i mogućnost uvida u dnevnik rada sustava, može raditi ažuriranja/brisanje, 
                unose novih elemenata u svim tablicama sustava. 
            </p><br>
        </div>

        <h4>Glavne odrednice projektnog rješenja</h4><br>
        <div>
            <img src="img/omilermat_ERA_model.png">
        </div>
        <div>
            <p>
                ERA model (engl. Entity–relationship model) je akronim za model entiteti-veze-atributi. Kao što i sam naziv govori sastoji 
                se od entiteta, atributa i veza. Pomoću njega prikazujemo odnos tj. veze između entiteta te pripadajuće atribute za pojedini 
                entitet. Ovaj ERA model čini ukupno 14 tablica. Svaka tablica sadrži svoj jedinstveni id. Glavne tablice su: „namjestaj, 
                kategorije_namjestaja, vrste_materijala, slike, boja, popusti, narudzba, korisnik, uloga, tip_radnje i konfiguracija“, 
                dok su tablice slabog entiteta (sadrže dvokomponentni ključ): „uloga_kategorijaNamjestaja“, „narudzba_namjestaj“ i „dnevnik_rada“.
            </p>
        </div>
        <div>
            <p>
            Tablice „vrsta_materijala“, „boja“, „kategorija_namjestaja“ i „korisnik“ povezane su s tablicom „namjestaj“ vezom 1:N. Entitet „popusti“ 
            sadrži vezu 0..1:N na tablicu „namjestaj“. Tablica „slike“ povezana je s vezom 1:N na tablicu „namjestaj“, i sadrži vanjski ključ tablice 
            namjestaj.  Entitet „tip_radnje“ ima vezu (1:N) na tablicu „dnevnik_rada“, a tablica „dnevnik_rada“ sadrži vanjski ključ korisnik_id što znači 
            da je povezana s tablicom „korisnik“. Tablica „uloga“ također je povezana s tablicom „korisnik“ vezom 1:N. Jednu ulogu može imati nula, 
            jedan ili više korisnika, dok jedan korisnik može imati jednu i samo jednu ulogu. Uz to tablica „korisnik“ ima vezu 1:N sa tablicom 
            „narudzba“. Nadalje, entiteti „uloga“ i „kategorija_namjestaja“ povezani su preko tablice slabog entiteta: „uloga_kategorijaNamjestaja“ 
            zbog javljanja veze N:N što znači da jedna uloga može biti zadužena za više kategorija namještaja, a isto tako za jednu kategoriju 
            namještaja može biti više uloga. Stoga navedena tablica sadrži vanjske ključeve tih dviju tablica.  Na isti način povezane su tablice 
            „narudzba“ i „namjestaj“ i tablicom „narudzba_namjestaj“. 
            </p>
        </div>

        <h4>Popis i opis skripata, mapa mjesta, navigacijski dijagram</h4><br>
        <div>
            <p>
                Struktura projekta definirana je na sljedeći način:
                U korijenskom dirketoriju nalaze se sljedeće datoteke: config.php – sadrži osnovne podatke za spajanje na bazu podataka, 
                database.php – sadrži vlastite implementacije za izvršavanje upita (Select, Insert, Remove, Update...), index.php – za 
                uključivanje osnovnih datoteka potrebne za rad, te restAPI.php – služi za dohvat, ažuriranje, dodavanje i brisanje zapisa preko JSON formata.
                Projekt sadrži sljedeće mape i svaka od mapa ima svoje dokumente: pages, Models, Controllers, js, img i css. 
            </p>
        </div>
        <p>Navigacijski dijagram:</p>
        <div>
            <img src="img/Navgacijski.drawio.png">
        </div>
        <div>
            <p>
                Na temelju ovog navigacijskog dijagrama možemo vidjeti za svaku pojedinu ulogu koje ovlasti ima i stranice kojima može pristupiti. 
                Neregistrirani korisnik/gost pristupa početnoj stranici. Na početnoj stranici nude mu se mogućnost registracije, kako bi imao pristup 
                većem broju mogućnosti, a ukoliko to ne želi može pristupiti stranici „O autoru“, „Dokumentacija“, pregledati namještaj prema kategoriji 
                u nekom vremenskom razdoblju i vidjeti galeriju slika namještaja uz mogućnost sortiranja po cijeni ili boji. 
                Registrirani korisnik ima sve mogućnosti kao i neregistrirani korisnik, uz naravno neke proširene opcije. Prijavom u sustav omogućeno mu je
                 kreiranje/ažuriranje/pregledavanje narudžbe, pregled svih obavljenih narudžbi, pregled statistike broja kupljenog namještaja i druge 
                 funkcionalnosti koje su vidljive na dijagramu. 
                Moderator posjeduje sve mogućnosti registriranog korisnika uz dodatne mogućnosti poput pregleda svih narudžbi namještaja, unos/ažuriranje 
                predviđenog datuma i vremena dostave proizvoda, izmjenjivanje statusa narudžbe ovisno o trenutnom stanju, unosi/ažurira/pregledava namještaj
                 za kategorije namještaja kojoj je dodijeljen i ostale mogućnosti vidljive sa slike.
                Administrator ima pristup svemu i vidi sve. Upravlja statusom korisnika (blokiran/odblokiran), dodijeljuje moderatora kategoriji namještaja, 
                upravlja dnevnikom rada, ima mogućnost konfiguriranja aplikacije, vidi sve korisnike sustava i sl. Dakle administrator ima najviši stupanj 
                ovlasti i upravlja cijelim sustavom. 

            </p>
        </div>

        <h4>Popis i opis korištenih tehnologija i alata</h4><br>
        <div>   
            <p>
                Za izradu projekta koristio sam sljedeće tehnologije i alate: Visual Studio Code, phpMyAdmin, MySQL Workbench, WinNMP i WinSCP alat. 
                Visual Studio Code je online dostupan alat namijenjen uređivanju postojećeg koda, izvođenje operacija i zadataka uz inteligentno 
                prepoznavanje koda i predlaganje riješenja, te raznih drugih mogućnosti. 
                MySQL Workbench je vizualni alat za oblikovanje i generiranje baze podataka, razvoj SQL-a, administraciju i sl. Osim toga sadrži i 
                vizualne alate za stvaranje, izvršavanje i optimizaciju SQL upita, sadrži i jednostavno rješenje za migraciju Microsoft SQL Server, 
                Microsoft Access, Sybase ASE, PostreSQL i drugih RDBMS tablica, objekata i podataka na MySQL. Ovaj alat koristio sam isključivo u 
                svrhu oblikovanja i dizajna ER modela za ovaj projekt. (Preuzeto s: <a href="https://www.mysql.com/products/workbench/">Poveznica na stranicu</a>, 08.06.2022.)
                phpMyAdmin je besplatan alata napisan u PHP-u, namijenjen za upravljanje administracijom MySQL-a i MariaDB preko web-a. „Često 
                korištene operacije (upravljanje bazama podataka, tablicama, stupcima, odnosima, indeksima, korisnicima, dozvolama, itd.) mogu 
                se izvesti putem korisničkog sučelja, uz mogućnost izravnog izvršavanja bilo kojeg SQL upita.“. S obizrom da alat podržava uvoz 
                podataka iz CSV i SQL datoteka, prethodno izrađen ERA model uvezao sam u navedeni alat, te na sam na jednostavniji način mogao 
                popuniti tablice početnim testnim podacima. (Preuzeto s: <a href="https://www.phpmyadmin.net/">Poveznica na stranicu</a>, 08.06.2022.)
                „WinNMP je prijenosni, unaprijed konfigurirani, brzi i stabilni poslužiteljski stog za razvoj php mysql aplikacija na Windowsima, 
                baziran na izvrsnom web poslužitelju Nginx.“ (Preuzeto s: <a href="https://winnmp.wtriple.com/">Poveznica na stranicu</a>, 08.06.2022.)
            </p>
        </div>

        <h4>Popis i opis vanjskih (tuđih) modula/biblioteka i njihovo korištenje u skriptama</h4><br>
        <div>   
            <p>
            U izradi projekta nisam koristio gotove biblioteke, ali sam koristio gotov dizajn i ikone za web aplikaciju. 
            Poveznica s kojem sam koristio gotove funkcije za dizajn aplikacije: <a href="https://tailwindcss.com/">Poveznica na stranicu</a>. 
            </p>
        </div>
	</body>
	
	<footer>
		<p>
			&copy; 2022
			<a href="mailto: omilermat@foi.hr">Otto Miler Matulin</a><br>
		</p>
	</footer>
</html>