# Globalna podesavanja
1. NPM instalirati globalno
2. Gulp instalirati globalno

# Podesavanje teme
1. Obrisati .git folder i ako je potrebno inicijalizovati novi git repozitorijum namenjen za temu.
2. Instalirati lokalno NPM packages ( U slucaju da se ne instaliraju svi paketi pokrenuti instalaciju kao administrator)
3. Podesiti Gulp kako je navedeno u uputstvu ispod

# Podesavanje Gulp
Otvoriti Gulpfile.js u samoj temi i promeniti project_name u ime projekta tacnije u ime foldera projekta.
Nakon toga pokrenuti Gulp, ako gulp ne radi obrisati node_modules folder i ponoviti podesavanje teme.

# Podesavanje WP teme 
U slucaju kada je WP ne inicijalicujemo git repozitorijum u temu vec samo obrisemo .git folder. 
Nakon brisanja .git foldera iz teme podesavamo style.css i u celoj temi menjamo text domein tako sto na celom foledru od teme radimo finde-replace. Finde replace se radi tako sto u pretrazi kucamo "Pleme Theme" i menjamo sa "novi_text_domain". Nakon toga menjamo screenshot.png sa realnim prikazom nase teme.

# WP funkcionalnosti
Tema je podeljena po foledrima:
1. assets - nalaze se css, js, fontovi, slike koje ne prolaze kroz WP
2. inc - ovde se nalaze sve funkcionalnosti teme folderi sa prefiksom theme su vezane za temu i nije ih preporucljivo menjati. Folder koji je predvidjen da se ubacuju nove funkcionalnosti sajta jeste dev-functions, ovde se nalaze samo primeri fajlova za sam development podeljene po segmentima WP-a. Svaki fajl koji se ovde napravi treba includovati u functions.php ili u inc/theme-options-functions.php.
3. templates - folder u kom registrujemo nove template
4. template-parts - folder za delove naseg sajta

# Napomene
1. Svaki put kada se klonira tema sa git-a odma obrisati .git folder iz nje kako ne bi dolos do konflikata i problema sa gitom.
2. Postoji mnostvo funkcionalnosti koje su predefinisane pre pocetka projekta trbalo bi proci kroz sve fajlove i pogledati sta je sve napravljeno da se posao ne radi vise puta.
3. Tema je jos uvek u razvoju tako da postoje sanse da neke funkcije nisu dodate ili nisu usavrsene, kao da postoje i bug-ovi