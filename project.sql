create database projecten;

create table projecten.richting(
richting_id int primary key auto_increment,
naam varchar(20) 
);

create table projecten.rol(
rol_id int primary key auto_increment,
naam varchar(20)
);

create table projecten.persoon(
persoon_id int auto_increment,
persoon_naam varchar(50),
persoon_voornaam varchar(50),
persoon_tel varchar(10) not null,
persoon_email varchar(20),
persoon_adres varchar(20),
rol_id int, 
richting_id int, 
password varchar(100) not null,

constraint pk primary key(persoon_id,persoon_naam,persoon_voornaam),
constraint FK_rol foreign key (rol_id) references projecten.rol(rol_id),
constraint FK_richting foreign key (richting_id) references projecten.richting(richting_id)
);

create index rol 
on projecten.persoon(rol_id);

create index richting 
on projecten.persoon(richting_id);

create table projecten.log (
log_id int auto_increment,
persoon_id int,
status varchar(15),
datum date,

constraint primary key(log_id, persoon_id),
constraint foreign key (persoon_id) references projecten.persoon(persoon_id) 
);

create table projecten.bedrijf(
bedrijf_id int auto_increment primary key,
bedrijf_naam varchar(50),
bedrijf_tel varchar(15),
bedrijf_email varchar(20),
bedrijf_adres varchar(20)
);

create table projecten.project(
project_id int auto_increment,
project_naam varchar(40),
persoon_id int,
prject_budget double,
project_start date,
project_eind date,
project_beschrijving text,
check(project_eind > project_start),

constraint primary key(project_id,project_naam),
constraint FK_persoon foreign key(persoon_id) references projecten.persoon(persoon_id)
);

create index start_datum
on projecten.project(project_start);

create index eind_datum
on projecten.project(project_eind);

create table projecten.betrokken(
betrokken_id int auto_increment primary key,
project_id int,
persoon_id int,

constraint FK_BTpersoon foreign key(persoon_id) references projecten.persoon(persoon_id),
constraint Fk_BTproject foreign key(project_id) references projecten.project(project_id)
);

create table projecten.taak(
taak_id int auto_increment primary key, 
project_id int,
persoon_id int,
taak_naam varchar(20),
taak_beschrijving text,
taak_einde date,

constraint FK_TKproject foreign key(project_id) references projecten.project(project_id),
constraint FK_TKpersoon foreign key(persoon_id) references projecten.persoon(persoon_id)
);

create table projecten.kwitantie(
kwintantie_id int auto_increment primary key,
taak_id int,
prijs double,

constraint FK_taak foreign key(taak_id) references projecten.taak(taak_id)
);

create table projecten.materialen(
materiaal_id int primary key auto_increment,
materiaal_naam varchar(20),
materiaal_prijs double,
project_id int,

constraint FK_PR foreign key(project_id) references projecten.project(project_id)
);

create table projecten.schatting(
schatting_id int auto_increment primary key,
taak_id int,
prijs double,
bedrijf_id int,

check(prijs >=0.0),
constraint FK_SCtaak foreign key(taak_id) references projecten.taak(taak_id),
constraint FK_Bedrijf foreign key(bedrijf_id) references projecten.bedrijf(bedrijf_id)
);

create table projecten.exacte(
exacte_id int auto_increment primary key,
taak_id int,
prijs double,
bedrijf_id int,
kwitantie blob, 

check(prijs >= 0.0),
constraint FK_EXtaak foreign key(taak_id) references projecten.taak(taak_id),
constraint FK_Bedr foreign key(bedrijf_id) references projecten.bedrijf(bedrijf_id)
);
