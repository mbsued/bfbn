CREATE TABLE tx_bfbn_domain_model_institution (

	bezeichnung varchar(255) DEFAULT '' NOT NULL,
	kurzbezeichnung varchar(255) DEFAULT '' NOT NULL,
	nummer varchar(4) DEFAULT '' NOT NULL,
	strasse varchar(255) DEFAULT '' NOT NULL,
	plz varchar(255) DEFAULT '' NOT NULL,
	ort varchar(255) DEFAULT '' NOT NULL,
	bezeichnungfos varchar(255) DEFAULT '' NOT NULL,
	kurzbezeichnungfos varchar(255) DEFAULT '' NOT NULL,
	nummerfos varchar(4) DEFAULT '' NOT NULL,
	bezeichnungbos varchar(255) DEFAULT '' NOT NULL,
	kurzbezeichnungbos varchar(255) DEFAULT '' NOT NULL,
	nummerbos varchar(4) DEFAULT '' NOT NULL,
	telefon varchar(255) DEFAULT '' NOT NULL,
	fax varchar(255) DEFAULT '' NOT NULL,
	email varchar(255) DEFAULT '' NOT NULL,
	homepage varchar(255) DEFAULT '' NOT NULL,
	laengengrad decimal(11,8) NOT NULL DEFAULT '0.000000000000',
	breitengrad decimal(10,8) NOT NULL DEFAULT '0.000000000000',
	vorklassefos smallint(5) unsigned DEFAULT '0' NOT NULL,
	vorklassebos smallint(5) unsigned DEFAULT '0' NOT NULL,
	vorkursfos smallint(5) unsigned DEFAULT '0' NOT NULL,
	vorkursbos smallint(5) unsigned DEFAULT '0' NOT NULL,
	vorkursartbos int(11) unsigned DEFAULT '0' NOT NULL,
	vorkurstagbos int(11) unsigned DEFAULT '0' NOT NULL,
	vorkursartfos int(11) unsigned DEFAULT '0' NOT NULL,
	vorkurstagfos int(11) unsigned DEFAULT '0' NOT NULL,	
	bosteilzeit smallint(5) unsigned DEFAULT '0' NOT NULL,	
    dbfh int(11) unsigned DEFAULT '0' NOT NULL,
	profilinklusion int(11) unsigned DEFAULT '0' NOT NULL,
	ivk int(11) unsigned DEFAULT '0' NOT NULL,
	hinweis varchar(255) DEFAULT '' NOT NULL,	
	regierungsbezirk int(11) unsigned DEFAULT '0' NOT NULL,
	mbbezirk int(11) unsigned DEFAULT '0' NOT NULL,
	mbbezirk2 int(11) unsigned DEFAULT '0' NOT NULL,
	status int(11) unsigned DEFAULT '0' NOT NULL,
	art int(11) unsigned DEFAULT '0' NOT NULL,
	ausbildungsrichtungen int(11) unsigned DEFAULT '0' NOT NULL,
	sprachen int(11) unsigned DEFAULT '0' NOT NULL,
	sprachenintw int(11) unsigned DEFAULT '0' NOT NULL,
	personen int(11) unsigned DEFAULT '0' NOT NULL,
	bearbeiter int(11) unsigned DEFAULT '0' NOT NULL,   	
	categories int(11) unsigned DEFAULT '0' NOT NULL,	
);

CREATE TABLE tx_bfbn_domain_model_person (

	nachname varchar(255) DEFAULT '' NOT NULL,
	vorname varchar(255) DEFAULT '' NOT NULL,
	titel varchar(255) DEFAULT '' NOT NULL,
	amtsbezeichnung varchar(255) DEFAULT '' NOT NULL,
	emailfach varchar(255) DEFAULT '' NOT NULL,
	arbeitetfuer int(11) unsigned DEFAULT '0' NOT NULL,
	arbeitetfuer2 int(11) unsigned DEFAULT '0' NOT NULL,	
	geschlecht int(11) unsigned DEFAULT '0' NOT NULL,
	bestelltab int(11) unsigned DEFAULT '0' NOT NULL,	
	funktionen int(11) unsigned DEFAULT '0' NOT NULL,
	institutionen int(11) unsigned DEFAULT '0' NOT NULL,
	faecher int(11) unsigned DEFAULT '0' NOT NULL,	

);

CREATE TABLE tx_bfbn_domain_model_funktion (

	bezeichnung varchar(255) DEFAULT '' NOT NULL,
	art int(11) unsigned DEFAULT '0' NOT NULL
 
);

CREATE TABLE tx_bfbn_domain_model_funktionart (

	bezeichnung varchar(255) DEFAULT '' NOT NULL

);

CREATE TABLE tx_bfbn_domain_model_fach (

	bezeichnung varchar(255) DEFAULT '' NOT NULL,
	anzeigefachberatung int(11) DEFAULT '0' NOT NULL,
	bild int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	pageuidfach int(11) unsigned DEFAULT '0' NOT NULL,
	personen int(11) unsigned DEFAULT '0' NOT NULL	
);

CREATE TABLE tx_bfbn_domain_model_fachkurz (

	bezeichnung varchar(255) DEFAULT '' NOT NULL,
	
);


CREATE TABLE tx_bfbn_domain_model_geschlecht (

	bezeichnung varchar(255) DEFAULT '' NOT NULL,
	kurzbezeichnung varchar(255) DEFAULT '' NOT NULL

);

CREATE TABLE tx_bfbn_domain_model_regierungsbezirk (

	bezeichnung varchar(255) DEFAULT '' NOT NULL,
	kurzbezeichnung varchar(255) DEFAULT '' NOT NULL

);

CREATE TABLE tx_bfbn_domain_model_mbbezirk (

	bezeichnung varchar(255) DEFAULT '' NOT NULL,
	kurzbezeichnung varchar(255) DEFAULT '' NOT NULL,
	email varchar(255) DEFAULT '' NOT NULL

);

CREATE TABLE tx_bfbn_domain_model_institutionstatus (

	bezeichnung varchar(255) DEFAULT '' NOT NULL,
	langbezeichnung varchar(255) DEFAULT '' NOT NULL

);

CREATE TABLE tx_bfbn_domain_model_institutionart (

	bezeichnung varchar(255) DEFAULT '' NOT NULL

);
CREATE TABLE tx_bfbn_domain_model_sprache (

	bezeichnung varchar(255) DEFAULT '' NOT NULL

);

CREATE TABLE tx_bfbn_domain_model_spracheintw (

	bezeichnung varchar(255) DEFAULT '' NOT NULL

);

CREATE TABLE tx_bfbn_domain_model_jahrgangsstufe (

	bezeichnung varchar(255) DEFAULT '' NOT NULL,
	kurzbezeichnung varchar(255) DEFAULT '' NOT NULL

);

CREATE TABLE tx_bfbn_domain_model_ausbildungsrichtung (

	bezeichnung varchar(255) DEFAULT '' NOT NULL,
	kurzbezeichnung varchar(255) DEFAULT '' NOT NULL

);

CREATE TABLE tx_bfbn_domain_model_schulart (

	bezeichnung varchar(255) DEFAULT '' NOT NULL,
	kurzbezeichnung varchar(255) DEFAULT '' NOT NULL

);

CREATE TABLE tx_bfbn_domain_model_institutionsprache (

	bezeichnung varchar(255) DEFAULT '' NOT NULL,
	sprache int(11) unsigned DEFAULT '0' NOT NULL,
	jahrgangsstufe int(11) unsigned DEFAULT '0' NOT NULL

);

CREATE TABLE tx_bfbn_domain_model_institutionausbildungsrichtung (

	bezeichnung varchar(255) DEFAULT '' NOT NULL,
	ausbildungsrichtung int(11) unsigned DEFAULT '0',
	schulart int(11) unsigned DEFAULT '0',
	jahrgangsstufe int(11) unsigned DEFAULT '0'

);

CREATE TABLE tx_bfbn_domain_model_vorkursart (

	bezeichnung varchar(255) DEFAULT '' NOT NULL

);

CREATE TABLE tx_bfbn_domain_model_vorkurstag (

	bezeichnung varchar(255) DEFAULT '' NOT NULL

);

CREATE TABLE tx_bfbn_domain_model_abschluss (

	bezeichnung varchar(255) DEFAULT '' NOT NULL

);
CREATE TABLE tx_bfbn_domain_model_auswahljanein (

	bezeichnung varchar(255) DEFAULT '' NOT NULL

);

CREATE TABLE tx_bfbn_domain_model_meldungart (

	bezeichnung varchar(255) DEFAULT '' NOT NULL

);

CREATE TABLE tx_bfbn_domain_model_neubestellungart (

	bezeichnung varchar(255) DEFAULT '' NOT NULL

);

CREATE TABLE tx_bfbn_domain_model_ergaenzungspruefung (

	nachname varchar(255) DEFAULT '' NOT NULL,
	vorname varchar(255) DEFAULT '' NOT NULL,
	geschlecht int(11) unsigned DEFAULT '0' NOT NULL,	
	sprache int(11) unsigned DEFAULT '0' NOT NULL,
	institution int(11) unsigned DEFAULT '0' NOT NULL,	

);

CREATE TABLE tx_bfbn_domain_model_schulfremdepruefer (

	nachname varchar(255) DEFAULT '' NOT NULL,
	vorname varchar(255) DEFAULT '' NOT NULL,
	titel varchar(255) DEFAULT '' NOT NULL,	
	geschlecht int(11) unsigned DEFAULT '0' NOT NULL,
	schule varchar(255) DEFAULT '' NOT NULL,
	lehrbefaehigung varchar(255) DEFAULT '' NOT NULL,
	abschluss int(11) unsigned DEFAULT '0' NOT NULL,	
	fach1 int(11) unsigned DEFAULT '0' NOT NULL,
	fach2 int(11) unsigned DEFAULT '0' NOT NULL,
	fach3 int(11) unsigned DEFAULT '0' NOT NULL,	
	institution int(11) unsigned DEFAULT '0' NOT NULL,	

);

CREATE TABLE tx_bfbn_domain_model_aufgabenauswahl (

	deutsch1a int(11) unsigned DEFAULT '0',
	deutsch1l int(11) unsigned DEFAULT '0',
	deutsch1e int(11) unsigned DEFAULT '0',
	deutsch1d int(11) unsigned DEFAULT '0',
	deutsch2a int(11) unsigned DEFAULT '0',
	deutsch2l int(11) unsigned DEFAULT '0',
	deutsch2e int(11) unsigned DEFAULT '0',
	deutsch2d int(11) unsigned DEFAULT '0',
	deutsch3a int(11) unsigned DEFAULT '0',
	deutsch3l int(11) unsigned DEFAULT '0',
	deutsch3e int(11) unsigned DEFAULT '0',
	deutsch3d int(11) unsigned DEFAULT '0',
	deutsch4a int(11) unsigned DEFAULT '0',
	deutsch4l int(11) unsigned DEFAULT '0',
	deutsch4e int(11) unsigned DEFAULT '0',
	deutsch4d int(11) unsigned DEFAULT '0',
	deutsch5a int(11) unsigned DEFAULT '0',
	deutsch5l int(11) unsigned DEFAULT '0',
	deutsch5e int(11) unsigned DEFAULT '0',
	deutsch5d int(11) unsigned DEFAULT '0',
	deutsch6a int(11) unsigned DEFAULT '0',
	deutsch6l int(11) unsigned DEFAULT '0',
	deutsch6e int(11) unsigned DEFAULT '0',
	deutsch6d int(11) unsigned DEFAULT '0',
	deutsch7a int(11) unsigned DEFAULT '0',
	deutsch7l int(11) unsigned DEFAULT '0',
	deutsch7e int(11) unsigned DEFAULT '0',
	deutsch7d int(11) unsigned DEFAULT '0',
	mathe1a1 int(11) unsigned DEFAULT '0',
	mathe1a2 int(11) unsigned DEFAULT '0',
	mathe1b1 int(11) unsigned DEFAULT '0',
	mathe1b2 int(11) unsigned DEFAULT '0',
	mathe2a1 int(11) unsigned DEFAULT '0',
	mathe2a2 int(11) unsigned DEFAULT '0',
	mathe2b1 int(11) unsigned DEFAULT '0',
	mathe2b2 int(11) unsigned DEFAULT '0',
	mathe3a1 int(11) unsigned DEFAULT '0',
	mathe3a2 int(11) unsigned DEFAULT '0',
	mathe3b1 int(11) unsigned DEFAULT '0',
	mathe3b2 int(11) unsigned DEFAULT '0',
	mathe4a1 int(11) unsigned DEFAULT '0',
	mathe4a2 int(11) unsigned DEFAULT '0',
	mathe4b1 int(11) unsigned DEFAULT '0',
	mathe4b2 int(11) unsigned DEFAULT '0',
	mathe5a1 int(11) unsigned DEFAULT '0',
	mathe5a2 int(11) unsigned DEFAULT '0',
	mathe5b1 int(11) unsigned DEFAULT '0',
	mathe5b2 int(11) unsigned DEFAULT '0',
	mathe6a1 int(11) unsigned DEFAULT '0',
	mathe6a2 int(11) unsigned DEFAULT '0',
	mathe6b1 int(11) unsigned DEFAULT '0',
	mathe6b2 int(11) unsigned DEFAULT '0',
	mathe7a1 int(11) unsigned DEFAULT '0',
	mathe7a2 int(11) unsigned DEFAULT '0',
	mathe7b1 int(11) unsigned DEFAULT '0',
	mathe7b2 int(11) unsigned DEFAULT '0',
	physik1 int(11) unsigned DEFAULT '0',
	physik2 int(11) unsigned DEFAULT '0',
	physik3 int(11) unsigned DEFAULT '0',
	paepsy1 int(11) unsigned DEFAULT '0',
	paepsy2 int(11) unsigned DEFAULT '0',
	gesuwi1 int(11) unsigned DEFAULT '0',
	gesuwi2 int(11) unsigned DEFAULT '0',
	gest1 int(11) unsigned DEFAULT '0',
	gest2 int(11) unsigned DEFAULT '0',
	gest3 int(11) unsigned DEFAULT '0',	
	schulart int(11) unsigned DEFAULT '0',
	jahrgangsstufe int(11) unsigned DEFAULT '0',
	institution int(11) unsigned DEFAULT '0' NOT NULL,	

);

CREATE TABLE tx_bfbn_domain_model_meldung (

	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	datei int(11) unsigned DEFAULT '0' NOT NULL,
	art int(11) unsigned DEFAULT '0' NOT NULL,
	institution int(11) unsigned DEFAULT '0' NOT NULL,	

);

CREATE TABLE tx_bfbn_domain_model_neubestellung (

	nachname varchar(255) DEFAULT '' NOT NULL,
	vorname varchar(255) DEFAULT '' NOT NULL,
	titel varchar(255) DEFAULT '' NOT NULL,	
	geschlecht int(11) unsigned DEFAULT '0' NOT NULL,
	erwerb int(11) DEFAULT '0' NOT NULL,
	aktualisierung int(11) DEFAULT '0' NOT NULL,	
    art int(11) unsigned DEFAULT '0' NOT NULL,	
	institution int(11) unsigned DEFAULT '0' NOT NULL,	

);

CREATE TABLE tx_bfbn_domain_model_unfallstatistik (

	schueler int(11) DEFAULT '0' NOT NULL,
	unterricht int(11) unsigned DEFAULT '0' NOT NULL,
	sport int(11) DEFAULT '0' NOT NULL,
	pause int(11) DEFAULT '0' NOT NULL,	
    schulweg int(11) unsigned DEFAULT '0' NOT NULL,
    schulwegpolizei int(11) unsigned DEFAULT '0' NOT NULL,
    sonstige int(11) unsigned DEFAULT '0' NOT NULL,		
	institution int(11) unsigned DEFAULT '0' NOT NULL,	

);

CREATE TABLE tx_bfbn_institution_institutionausbildungsrichtung_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid_local,uid_foreign),
	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);

CREATE TABLE tx_bfbn_institution_institutionsprache_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid_local,uid_foreign),
	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);

CREATE TABLE tx_bfbn_institution_spracheintw_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid_local,uid_foreign),
	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);

CREATE TABLE tx_bfbn_institution_bearbeiter_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid_local,uid_foreign),
	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);

CREATE TABLE tx_bfbn_person_funktion_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid_local,uid_foreign),
	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);

CREATE TABLE tx_bfbn_person_fach_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid_local,uid_foreign),
	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);

CREATE TABLE tx_bfbn_institution_person_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	
	PRIMARY KEY (uid_local,uid_foreign),
	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);

CREATE TABLE tx_bfbn_domain_model_elite (
	institution int(11) unsigned DEFAULT '0' NOT NULL,
	instname varchar(255) DEFAULT '' NOT NULL,
	schulnummer varchar(4) DEFAULT '' NOT NULL,
	inststrasse varchar(255) DEFAULT '' NOT NULL,
	instplz int(11) unsigned DEFAULT '0' NOT NULL,
	instort varchar(255) DEFAULT '' NOT NULL,
	instperson varchar(255) DEFAULT '' NOT NULL,
	insttelefon varchar(255) DEFAULT '' NOT NULL,
	instemail varchar(255) DEFAULT '' NOT NULL,
	nachname varchar(255) DEFAULT '' NOT NULL,
	vorname varchar(255) DEFAULT '' NOT NULL,
	geschlecht varchar(10) DEFAULT '' NOT NULL,
	gebdat varchar(10) DEFAULT '' NOT NULL,
	gebort varchar(255) DEFAULT '' NOT NULL,
	strasse varchar(255) DEFAULT '' NOT NULL,
	plz int(11) unsigned DEFAULT '0' NOT NULL,
	ort varchar(255) DEFAULT '' NOT NULL,
	telefon varchar(255) DEFAULT '' NOT NULL,
	email varchar(255) DEFAULT '' NOT NULL,
	ndhoch varchar(4) DEFAULT '' NOT NULL,
	ndabprf varchar(4) DEFAULT '' NOT NULL,
	jgst smallint(5) unsigned DEFAULT '0' NOT NULL,
	ar varchar(255) DEFAULT '' NOT NULL,
	fach3 varchar(255) DEFAULT '' NOT NULL,
	fach4 varchar(255) DEFAULT '' NOT NULL	
);

CREATE TABLE tx_bfbn_domain_model_pdftemplate (
    uid int(11) NOT NULL auto_increment,
    pid int(11) DEFAULT '0' NOT NULL,
	  file int(11) unsigned NOT NULL default '0',
    PRIMARY KEY (uid),
    KEY parent (pid)
);

CREATE TABLE tx_bfbn_domain_model_htmltemplate (
    uid int(11) NOT NULL auto_increment,
    pid int(11) DEFAULT '0' NOT NULL,
	  file int(11) unsigned NOT NULL default '0',
	  name varchar(255) DEFAULT '' NOT NULL,
    PRIMARY KEY (uid),
    KEY parent (pid)
);