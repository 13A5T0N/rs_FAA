create database projecten;

create table projecten.gebruiker(
gebruiker_id int auto_increment,
gebruiker_naam varchar(50),
gebruiker_voornaam varchar(50),
gebruiker_adres varchar(20) not null,
gebruiker_tel varchar(10) not null,
gebruiker_email varchar(20),
gebruiker_afdeling varchar(15) not null,
gebruiker_password varchar(100) not null,

constraint PK_user primary key (gebruiker_id,gebruiker_naam,gebruiker_voornaam)
);

create index gebruiker_naam_idx
on projecten.gebruiker(gebruiker_naam, gebruiker_voornaam);


create table projecten.student(
student_id int auto_increment,
student_naam varchar(50),
student_voornaam varchar(50),
student_tel varchar(10) not null,
student_email varchar(20),
student_richting varchar(20),

constraint pk_student primary key (student_id, student_naam,student_voornaam)
);

create index student_idx 
on projecten.student(student_naam, student_voornaam);

create table projecten.bedrijf(
bedrijf_id int auto_increment,
bedrijf_naam varchar(50),
bedrijf_tel varchar(10),
bedrijf_mail varchar(20),

constraint bedrijf primary key(bedrijf_id)

);

create index bedrijf_idx
on projecten.bedrijf(bedrijf_naam);

create table projecten.project(
project_id int auto_increment,
project_naam varchar(40),
project_start date default CURRENT_TIMESTAMP,
project_eind date,
project_beschrijving text,

check (project_eind >= project_start),
constraint pk_project primary key (project_id) 
);

create index project_idx
on projecten.project(project_naam,project_start,project_eind);
create table projecten.taak(
taak_id int auto_increment,
project_id int,
taak_naam varchar(40),
gebruiker_id int, 
taak_start date default CURRENT_TIMESTAMP, 
taak_eind date,

check(taak_eind >= taak_start),
constraint taak primary key(taak_id,gebruiker_id,project_id),
constraint taak_fk foreign key  (gebruiker_id) references gebruiker(gebruiker_id),
constraint project_fk foreign key (project_id) references project(project_id)
);

create index taak_idx
on projecten.taak(taak_naam);

create table projecten.log(
log_id int auto_increment,
gebruiker_id int, 
log_status varchar(7),

constraint PK_log primary key(log_id),
constraint FK_log foreign key (gebruiker_id) references gebruiker(gebruiker_id)
);

create table projecten.kwitantie(
kwitantie_id int auto_increment,
taak_id int, 
kwitantie blob,
kwitantie_description text,

constraint pk_kwitantie primary key(kwitantie_id),
constraint fk_kwitantie foreign key (taak_id) references taak(taak_id)
);


