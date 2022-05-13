--MYSQL
create database minifb;
use minifb;

create table membre (
idmembre int primary key NOT NULL AUTO_INCREMENT,
email varchar(20),
motdepasse varchar(20),
nom varchar(20),
datenaissance date
);

create table amis(
idmembre1 integer,
idmembre2 integer,
dhdemande datetime default current_timestamp(),
dhaccept datetime default null,
primary key (idmembre1,idmembre2),
FOREIGN key (idmembre1) REFERENCES membre(idmembre),
FOREIGN key (idmembre2) REFERENCES membre(idmembre)
);

create table publication(
idpubli int primary key NOT NULL AUTO_INCREMENT,
dhpubli datetime default current_timestamp(),
textepub longtext,
affichage varchar(10)
);

create table commentaire(
idcommentaire int primary key NOT NULL AUTO_INCREMENT,
dhcommentaire datetime default current_timestamp(),
texteco varchar(50) NOT NULL,
idpubli integer,
FOREIGN key (idpubli) REFERENCES publication(idpubli)
);

create table typereaction(
idreaction int,
nomreact varchar(10),
primary key(idreaction)
);

create table reaction(
idpublication int,
idmembre int,
idreaction int,
FOREIGN key (idreaction) REFERENCES typereaction(idreaction)
);

create table message(
idenvoie int,
idrecu int,
msg longtext,
dhmsg datetime default current_timestamp(),
FOREIGN key(idenvoie) REFERENCES membre(idmembre),
FOREIGN key(idrecu) REFERENCES membre(idmembre)
);

alter table reaction
add primary key(idpublication,idmembre);

alter table reaction
ADD FOREIGN key (idpublication)
REFERENCES publication(idpubli);

alter table reaction
ADD FOREIGN key (idmembre)
REFERENCES membre(idmembre);

alter table membre
ADD profil int default 0;

insert into membre(email, motdepasse, nom, datenaissance) values('test@tp.com','tpBleTP','Atest','2000-01-04');
insert into membre(email, motdepasse, nom, datenaissance) values('test1@tp.com','1tpBleTP','Btest','2001-01-04');
insert into membre(email, motdepasse, nom, datenaissance) values('test2@tp.com','2tpBleTP','Ctest','2002-01-04');

insert into amis values ('1','2','2018-02-17','2018-02-19');
insert into amis values ('2','3','2018-02-11','2018-02-17');

insert into publication(textepub,affichage) values('joyeux anniversaire','public');
insert into publication(textepub,affichage) values('HBD','public');
insert into publication(textepub,affichage) values('tratry ny tsingerintaona','public');

insert into commentaire(texteco,idpubli) values('misaotra eh','1');
insert into commentaire(texteco,idpubli) values('misaotra eh','2');
insert into commentaire(texteco,idpubli) values('saotra eh','2');
insert into commentaire(texteco,idpubli) values('sur eh','2');
insert into commentaire(texteco,idpubli) values('misaotra eh','3');

	insert into typereaction values ('1','aime');
	insert into typereaction values ('2','adore');
	insert into typereaction values ('3','hahaha');
	insert into typereaction values ('4','triste');
	insert into typereaction values ('5','wouah');
	insert into typereaction values ('6','solidaire');
	insert into typereaction values ('7','Grrr');

insert into reaction values('1','1','1');

select idmembre from membre where email='test@tay.com' and motdepasse='tayBleTP';
select nom,datenaissance from membre;
select * from publication;


SELECT publication.textepub,commentaire.texteco
FROM commentaire
JOIN publication
ON commentaire.idpubli = publication.idpubli;

SELECT publication.textepub,publication.dhpubli,commentaire.texteco,commentaire.dhcommentaire
FROM publication
JOIN commentaire
ON  publication.idpubli=commentaire.idpubli
where publication.idpubli='2';

SELECT membre.nom,amis.idmembre1
FROM membre
JOIN amis
ON  membre.idmembre=amis.idmembre1
where amis.idmembre2!='1' and amis.idmembre1!='1';

SELECT membre.nom,amis.idmembre1,amis.idmembre2
FROM membre
JOIN amis
ON  membre.idmembre=amis.idmembre1
where amis.idmembre2='1' and amis.dhaccept is NULL;

UPDATE amis set dhaccept=current_timestamp() where idmembre1='' and idmembre2='';

select count(idreaction) from reaction where idpublication ='1';
select idreaction from reaction where idpublication ='1' and idmembre='1' and idreaction='1';
select idreaction,membre.nom from reaction JOIN membre on reaction.idmembre=membre.idmembre where idreaction='1' and idpublication='1';
delete from reaction where idpublication ='' and idmembre='';

UPDATE membre set profil='' where idmembre='';

insert into message(idenvoie,idrecu,msg) values ('1','2','bonjour ndry');

insert into message(idenvoie,idrecu,msg) values ('2','1','bonjour');

insert into message(idenvoie,idrecu,msg) values ('1','2','de aon?');

insert into message(idenvoie,idrecu,msg) values ('1','3','slt ndry');

insert into message(idenvoie,idrecu,msg) values ('3','1','bonjour');

insert into message(idenvoie,idrecu,msg) values ('1','3','cv?');

select * from message where idenvoie='1' and idrecu='2' or idenvoie='2' and idrecu='1' order by dhmsg asc;
select message.idenvoie,message.idrecu,message.msg,message.dhmsg,membre.nom,membre.nom from message  JOIN membre on message.idenvoie=membre.idmembre where idenvoie='1' and idrecu='2' or idenvoie='2' and idrecu='1' order by dhmsg desc limit 1;

select * from message JOIN membre on message.idenvoie=membre.idmembre where idenvoie='1' and idrecu='2' or idenvoie='2' and idrecu='1' order by dhmsg desc limit 1;



delete from message where idenvoie='1' and msg='bonjour ndry';




























