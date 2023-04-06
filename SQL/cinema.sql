show tables;
drop database if exists cinema;
    create database cinema;
        use cinema;

create table utilisateur(
                            idutilisateur int (5) not null auto_increment,
                            nom varchar(100) not null,
                            prenom varchar(100) not null,
                            email varchar(100) unique not null,
                            password varchar(100) not null,
                            created_at datetime,
                            updated_at datetime,
                            remember_token varchar(200),
                            primary key (idutilisateur)
)engine=innodb;

INSERT INTO cinema.utilisateur (idutilisateur, nom, prenom, email, password, created_at, updated_at, remember_token) VALUES (1, 'NDAO', 'Coumba', 'coumba@gmail.com', '$2y$10$QR0IvZ52SBp3Ob6WTCsteeUenyWgb2WtvD.M428e54G0a/Rt1PMiC', '2023-03-17 00:56:11', '2023-03-27 13:49:13', 'yOIF4zRdbbLNVrQzY7CzYAg0Gqwu12yRxFZfxbYVMTcIHXmyecJu2dKCbGlA');
INSERT INTO cinema.utilisateur (idutilisateur, nom, prenom, email, password, created_at, updated_at, remember_token) VALUES (2, 'NGO', 'Chi', 'chi@gmail.com', '$2y$10$.OnEicI8E.eg.jbeUPU2meD2aCMzTMQxZEir4EONE0MMldEMbqst6', '2023-03-24 11:45:34', '2023-03-24 12:40:36', 'JS8PFxL5HJKWRqQPhpmjFcubRhZ9yzdJPt047MgIHqEOyeW2KZe8DQqxAakH');
INSERT INTO cinema.utilisateur (idutilisateur, nom, prenom, email, password, created_at, updated_at, remember_token) VALUES (3, 'DIENE', 'Abass', 'abass@gmail.com', '$2y$10$BQB2pd0W6HcZmBYQsDdLaeipN5PVkCV8BO2bkgAtk9H4A.N7lPqqO', '2023-03-24 11:46:47', '2023-03-27 13:51:15', 'GgPthHqwvkD2T6NMiwuLgqMHujiRnT4O3pGqCM1d3HrrrQCzQQNUHBQrUIcF');

create table presse (
                        idpresse int(5) not null,
                        nommaisonpresse varchar(200) unique,
                        created_at datetime,
                        updated_at datetime,
                        primary key(idpresse)
)engine=innodb;

create table journaliste(
                            idjournaliste int(5) not null,
                            created_at datetime,
                            updated_at datetime,
                            idpresse int(5),
                            foreign key (idjournaliste) references utilisateur(idutilisateur) on delete cascade on update cascade,
                            foreign key (idpresse) references presse(idpresse) on delete cascade on update cascade
)engine=innodb;

INSERT INTO cinema.journaliste (idjournaliste, created_at, updated_at, idpresse) VALUES (1, null, null, null);
INSERT INTO cinema.journaliste (idjournaliste, created_at, updated_at, idpresse) VALUES (2, null, null, null);

create table admin(
                      idadmin int(5) not null,
                      foreign key (idadmin) references utilisateur(idutilisateur) on delete cascade on update cascade
)engine=innodb;

INSERT INTO cinema.admin (idadmin) VALUES (1);


CREATE TABLE internaute (
                            idinternaute int(5) NOT NULL,
                            pseudo varchar(255) unique,
                            FOREIGN KEY (idinternaute) REFERENCES utilisateur(idutilisateur) ON DELETE CASCADE
) ENGINE=InnoDB;

INSERT INTO cinema.internaute (idinternaute, pseudo) VALUES (3, null);


create table acteur(
                        idacteur int (5) not null auto_increment,
                        nomacteur varchar(100) not null,
                        prenomacteur varchar(100) not null,
                        datenaissanceacteur date,
                        datedecesacteur date,
                        nationaliteacteur varchar(100),
                        created_at datetime,
                        updated_at datetime,
                        primary key (idacteur)
)engine=innodb;
INSERT INTO cinema.acteur (idacteur, nomacteur, prenomacteur, datenaissanceacteur, datedecesacteur, nationaliteacteur, created_at, updated_at) VALUES (3, 'Dujardin', 'Jean', '1972-06-19', null, 'Français', '2023-03-24 14:28:02', '2023-03-24 14:28:17');
INSERT INTO cinema.acteur (idacteur, nomacteur, prenomacteur, datenaissanceacteur, datedecesacteur, nationaliteacteur, created_at, updated_at) VALUES (4, 'Reddick', 'Lance', '1962-03-17', null, 'Américain', '2023-03-24 14:29:59', '2023-03-24 14:30:15');
INSERT INTO cinema.acteur (idacteur, nomacteur, prenomacteur, datenaissanceacteur, datedecesacteur, nationaliteacteur, created_at, updated_at) VALUES (5, 'Mackie', 'Anthony', '1978-09-23', null, 'Américain', '2023-03-24 14:32:06', '2023-03-24 14:32:18');
INSERT INTO cinema.acteur (idacteur, nomacteur, prenomacteur, datenaissanceacteur, datedecesacteur, nationaliteacteur, created_at, updated_at) VALUES (6, 'Fiennes', 'Ralph', '1962-12-22', null, 'Britannique', '2023-03-24 14:36:20', '2023-03-24 14:36:30');
INSERT INTO cinema.acteur (idacteur, nomacteur, prenomacteur, datenaissanceacteur, datedecesacteur, nationaliteacteur, created_at, updated_at) VALUES (7, 'Skarsgård', 'Bill', '1990-08-09', null, 'Suédois', '2023-03-24 14:38:30', '2023-03-24 14:38:54');
INSERT INTO cinema.acteur (idacteur, nomacteur, prenomacteur, datenaissanceacteur, datedecesacteur, nationaliteacteur, created_at, updated_at) VALUES (8, 'Pascal', 'Pedro', '1975-04-02', null, 'Chilo-américain', '2023-03-24 14:41:42', '2023-03-24 14:41:54');
INSERT INTO cinema.acteur (idacteur, nomacteur, prenomacteur, datenaissanceacteur, datedecesacteur, nationaliteacteur, created_at, updated_at) VALUES (9, 'De Niro', 'Robert', '1943-08-17', null, 'Américain, Italien', '2023-03-24 14:44:14', '2023-03-24 14:44:29');
INSERT INTO cinema.acteur (idacteur, nomacteur, prenomacteur, datenaissanceacteur, datedecesacteur, nationaliteacteur, created_at, updated_at) VALUES (10, 'Di Caprio', 'Leonardo', '1974-11-11', null, 'Américain', '2023-03-24 14:46:34', '2023-03-24 14:46:47');
INSERT INTO cinema.acteur (idacteur, nomacteur, prenomacteur, datenaissanceacteur, datedecesacteur, nationaliteacteur, created_at, updated_at) VALUES (11, 'Nicholson', 'Jack', '1937-04-22', null, 'Américain', null, null);


create table realisateur(
                       idrealisateur int (5) not null auto_increment,
                       nomrealisateur varchar(100) not null,
                       prenomrealisateur varchar(100) not null,
                       datenaissancerealisateur date,
                       datedecesrealisateur date,
                       nationaliterealisateur varchar(100),
                       created_at datetime,
                       updated_at datetime,
                       primary key (idrealisateur)
)engine=innodb;

INSERT INTO cinema.realisateur (idrealisateur, nomrealisateur, prenomrealisateur, datenaissancerealisateur, datedecesrealisateur, nationaliterealisateur, created_at, updated_at) VALUES (6, 'Abbott', 'Philip', '2015-06-10', null, 'Américain', '2023-03-24 16:37:37', '2023-03-24 16:37:37');
INSERT INTO cinema.realisateur (idrealisateur, nomrealisateur, prenomrealisateur, datenaissancerealisateur, datedecesrealisateur, nationaliterealisateur, created_at, updated_at) VALUES (7, 'Belson', 'Jerry', '2023-03-01', null, 'Américain', '2023-03-24 16:39:13', '2023-03-24 16:39:13');
INSERT INTO cinema.realisateur (idrealisateur, nomrealisateur, prenomrealisateur, datenaissancerealisateur, datedecesrealisateur, nationaliterealisateur, created_at, updated_at) VALUES (8, 'Adam', 'Peter', '2023-03-01', null, 'Britannique', '2023-03-24 16:40:04', '2023-03-24 16:40:04');
INSERT INTO cinema.realisateur (idrealisateur, nomrealisateur, prenomrealisateur, datenaissancerealisateur, datedecesrealisateur, nationaliterealisateur, created_at, updated_at) VALUES (9, 'Ali', 'Christophe', '2023-03-07', null, 'Français', '2023-03-24 16:41:37', '2023-03-24 16:41:37');


create table producteur(
                            idproducteur int (5) not null auto_increment,
                            nomproducteur varchar(100) not null,
                            prenomproducteur varchar(100) not null,
                            datenaissanceproducteur date,
                            datedecesproducteur date,
                            nationaliteproducteur varchar(100),
                            created_at datetime,
                            updated_at datetime,
                            primary key (idproducteur)
)engine=innodb;

INSERT INTO cinema.producteur (idproducteur, nomproducteur, prenomproducteur, datenaissanceproducteur, datedecesproducteur, nationaliteproducteur, created_at, updated_at) VALUES (4, 'De Laurentiis', 'Dino', '2023-03-01', null, 'Italien', '2023-03-24 16:43:45', '2023-03-24 16:43:45');
INSERT INTO cinema.producteur (idproducteur, nomproducteur, prenomproducteur, datenaissanceproducteur, datedecesproducteur, nationaliteproducteur, created_at, updated_at) VALUES (5, 'Silver', 'Joel', '2023-03-02', null, 'Américain', '2023-03-24 16:44:18', '2023-03-24 16:44:18');
INSERT INTO cinema.producteur (idproducteur, nomproducteur, prenomproducteur, datenaissanceproducteur, datedecesproducteur, nationaliteproducteur, created_at, updated_at) VALUES (6, 'Weinstein', 'Harvey', '2020-10-08', null, 'Américain', '2023-03-24 16:45:25', '2023-03-24 16:45:25');
INSERT INTO cinema.producteur (idproducteur, nomproducteur, prenomproducteur, datenaissanceproducteur, datedecesproducteur, nationaliteproducteur, created_at, updated_at) VALUES (7, 'Bird', 'Brad', '2021-01-14', null, 'Américain', '2023-03-24 16:46:03', '2023-03-24 16:46:03');
INSERT INTO cinema.producteur (idproducteur, nomproducteur, prenomproducteur, datenaissanceproducteur, datedecesproducteur, nationaliteproducteur, created_at, updated_at) VALUES (8, 'Pathé', 'Charles', '2022-09-13', null, 'Français', '2023-03-24 16:48:35', '2023-03-24 16:48:35');
INSERT INTO cinema.producteur (idproducteur, nomproducteur, prenomproducteur, datenaissanceproducteur, datedecesproducteur, nationaliteproducteur, created_at, updated_at) VALUES (9, 'Ponti', 'Carlo', '2020-09-24', null, 'Franco-italien', '2023-03-24 16:49:26', '2023-03-24 16:49:26');


create table version(
                        idversion int (5) not null auto_increment,
                        created_at datetime,
                        updated_at datetime,
                        nomversion varchar(100) unique not null,
                        primary key (idversion)
)engine=innodb;

INSERT INTO cinema.version (idversion, created_at, updated_at, nomversion) VALUES (2, '2023-03-19 08:38:04', '2023-03-26 21:35:02', 'VO');
INSERT INTO cinema.version (idversion, created_at, updated_at, nomversion) VALUES (3, '2023-03-19 08:38:10', '2023-03-19 08:38:10', 'VF');
INSERT INTO cinema.version (idversion, created_at, updated_at, nomversion) VALUES (4, '2023-03-19 08:39:03', '2023-03-19 08:39:03', 'VOST');

create table theme(
                      idtheme int (5) not null auto_increment,
                      created_at datetime,
                      updated_at datetime,
                      nomtheme varchar(100) unique not null,
                      primary key (idtheme)
)engine=innodb;

INSERT INTO cinema.theme (idtheme, created_at, updated_at, nomtheme) VALUES (3, '2023-03-24 13:23:40', '2023-03-24 13:23:40', 'Art');
INSERT INTO cinema.theme (idtheme, created_at, updated_at, nomtheme) VALUES (4, '2023-03-24 13:23:47', '2023-03-24 13:23:47', 'Armée');
INSERT INTO cinema.theme (idtheme, created_at, updated_at, nomtheme) VALUES (5, '2023-03-24 13:23:56', '2023-03-24 13:23:56', 'Banlieue');
INSERT INTO cinema.theme (idtheme, created_at, updated_at, nomtheme) VALUES (6, '2023-03-24 13:24:05', '2023-03-24 13:24:05', 'Colonisation');
INSERT INTO cinema.theme (idtheme, created_at, updated_at, nomtheme) VALUES (7, '2023-03-24 13:24:18', '2023-03-24 13:24:18', 'Catastrophe');
INSERT INTO cinema.theme (idtheme, created_at, updated_at, nomtheme) VALUES (8, '2023-03-24 13:24:40', '2023-03-24 13:24:40', 'Nature');
INSERT INTO cinema.theme (idtheme, created_at, updated_at, nomtheme) VALUES (9, '2023-03-24 13:24:51', '2023-03-24 13:24:51', 'Développement humain');
INSERT INTO cinema.theme (idtheme, created_at, updated_at, nomtheme) VALUES (10, '2023-03-24 13:25:43', '2023-03-24 13:25:43', 'Politique');
INSERT INTO cinema.theme (idtheme, created_at, updated_at, nomtheme) VALUES (11, '2023-03-24 13:25:59', '2023-03-24 13:25:59', 'Philosophie');


create table genre(
                      idgenre int (5) not null auto_increment,
                      created_at datetime,
                      updated_at datetime,
                      nomgenre varchar(100) unique not null,
                      primary key (idgenre)
)engine=innodb;

INSERT INTO cinema.genre (idgenre, created_at, updated_at, nomgenre) VALUES (1, '2023-03-18 08:37:28', '2023-03-26 21:35:17', 'Thriller');
INSERT INTO cinema.genre (idgenre, created_at, updated_at, nomgenre) VALUES (3, '2023-03-24 13:19:37', '2023-03-24 13:19:37', 'Comédie');
INSERT INTO cinema.genre (idgenre, created_at, updated_at, nomgenre) VALUES (4, '2023-03-24 13:19:43', '2023-03-24 13:19:43', 'Drame');
INSERT INTO cinema.genre (idgenre, created_at, updated_at, nomgenre) VALUES (5, '2023-03-24 13:19:54', '2023-03-24 13:19:54', 'Animation');
INSERT INTO cinema.genre (idgenre, created_at, updated_at, nomgenre) VALUES (6, '2023-03-24 13:20:12', '2023-03-24 13:20:12', 'Science-Fiction');
INSERT INTO cinema.genre (idgenre, created_at, updated_at, nomgenre) VALUES (7, '2023-03-24 13:20:23', '2023-03-24 13:20:23', 'Romance amoureuse');
INSERT INTO cinema.genre (idgenre, created_at, updated_at, nomgenre) VALUES (8, '2023-03-24 13:20:37', '2023-03-24 13:20:37', 'Action');
INSERT INTO cinema.genre (idgenre, created_at, updated_at, nomgenre) VALUES (9, '2023-03-24 13:20:44', '2023-03-24 13:20:44', 'Historique');
INSERT INTO cinema.genre (idgenre, created_at, updated_at, nomgenre) VALUES (10, '2023-03-24 13:20:53', '2023-03-24 13:20:53', 'Fantastique');
INSERT INTO cinema.genre (idgenre, created_at, updated_at, nomgenre) VALUES (11, '2023-03-24 13:21:16', '2023-03-24 13:21:16', 'Biopic');


create table cinema (
                        idcinema int(5) not null auto_increment,
                        nomcinema varchar(200) unique not null,
                        created_at datetime,
                        updated_at datetime,
                        primary key(idcinema)
)engine=innodb;


create table film(
                     idfilm int (5) not null auto_increment,
                     titre varchar(100) unique not null,
                     duree varchar(30) not null,
                     datesortie datetime,
                     synopsis varchar(255),
                     photo varchar(100),
                     lien_bo varchar(100),
                     created_at datetime,
                     updated_at datetime,
                     idgenre int (5),
                     idtheme int(5),
                     idrealisateur int(5),
                     idproducteur int (5),
                     primary key (idfilm),
                     foreign key (idgenre) references genre(idgenre) on delete cascade on update cascade,
                     foreign key (idtheme) references theme(idtheme) on delete cascade on update cascade,
                     foreign key (idrealisateur) references realisateur(idrealisateur) on delete cascade on update cascade,
                     foreign key (idproducteur) references producteur(idproducteur) on delete cascade on update cascade
)engine=innodb;

INSERT INTO cinema.film (idfilm, titre, duree, datesortie, synopsis, photo, lien_bo, created_at, updated_at, idgenre, idtheme, idrealisateur, idproducteur) VALUES (9, 'Top gun', '2h', '2023-04-28 00:00:00', 'Synopsis de Top Gun', 'img\\photo\\topgun.jpg', null, '2023-03-24 17:02:20', '2023-03-24 17:02:20', 8, null, 6, 5);
INSERT INTO cinema.film (idfilm, titre, duree, datesortie, synopsis, photo, lien_bo, created_at, updated_at, idgenre, idtheme, idrealisateur, idproducteur) VALUES (10, 'Les animaux fantastiques', '3h', '2023-03-31 00:00:00', 'Synopsis animaux fantastiques', 'img\\photo\\animauxfantastiques.jpg', null, '2023-03-24 17:04:34', '2023-03-24 17:04:34', 10, null, 7, 4);
INSERT INTO cinema.film (idfilm, titre, duree, datesortie, synopsis, photo, lien_bo, created_at, updated_at, idgenre, idtheme, idrealisateur, idproducteur) VALUES (11, 'Avatar', '3h30', '2023-04-27 00:00:00', 'Synopsis Avatar', 'img\\photo\\avatar.jpg', null, '2023-03-24 17:05:34', '2023-03-24 17:05:34', 1, null, 8, 6);
INSERT INTO cinema.film (idfilm, titre, duree, datesortie, synopsis, photo, lien_bo, created_at, updated_at, idgenre, idtheme, idrealisateur, idproducteur) VALUES (12, 'Us', '2h', '2021-09-29 00:00:00', 'Synopsis de US', 'img\\photo\\uss.jpg', null, '2023-03-24 17:06:55', '2023-03-24 17:06:55', 15, null, 9, 7);
INSERT INTO cinema.film (idfilm, titre, duree, datesortie, synopsis, photo, lien_bo, created_at, updated_at, idgenre, idtheme, idrealisateur, idproducteur) VALUES (13, 'Babylon', '2h', '2023-04-07 00:00:00', 'Synopsis de Babylon', 'img\\photo\\babylon.jpg', null, '2023-03-24 17:08:47', '2023-03-24 17:08:47', 8, null, 6, 4);
INSERT INTO cinema.film (idfilm, titre, duree, datesortie, synopsis, photo, lien_bo, created_at, updated_at, idgenre, idtheme, idrealisateur, idproducteur) VALUES (14, 'Wakanda For Ever', '2h30', '2023-03-04 00:00:00', 'Synopsis wakanda', 'img\\photo\\wakanda4ever.jpg', null, '2023-03-24 17:10:06', '2023-03-24 17:10:06', 12, null, 7, 8);
INSERT INTO cinema.film (idfilm, titre, duree, datesortie, synopsis, photo, lien_bo, created_at, updated_at, idgenre, idtheme, idrealisateur, idproducteur) VALUES (15, 'Doctor Strange', '2h', '2022-08-25 00:00:00', 'Synopsis Dotor Strange', 'img\\photo\\doctorstrange.jpg', null, '2023-03-24 17:11:59', '2023-03-24 17:11:59', 6, null, 6, 4);
INSERT INTO cinema.film (idfilm, titre, duree, datesortie, synopsis, photo, lien_bo, created_at, updated_at, idgenre, idtheme, idrealisateur, idproducteur) VALUES (16, 'The Woman King', '2h', '2023-04-08 00:00:00', 'Synopsis woman king', 'img\\photo\\womanking.jpg', null, '2023-03-24 17:13:05', '2023-03-24 17:13:05', 10, null, 8, 7);

create table seance (
                              idfilm int(5) not null,
                              idcinema int(5) not null,
                              created_at datetime,
                              updated_at datetime,
                              primary key(idfilm,idcinema),
                              foreign key (idfilm) references film(idfilm) on delete cascade on update cascade,
                              foreign key (idcinema) references cinema(idcinema) on delete cascade on update cascade
)engine=innodb;

create table sortir(
                       idfilm int (5) not null,
                       idversion int (5) not null,
                       created_at datetime,
                       updated_at datetime,
                       primary key (idfilm,idversion),
                       foreign key (idversion) references version(idversion) on delete cascade on update cascade,
                       foreign key (idfilm) references film(idfilm) on delete cascade on update cascade
)engine=innodb;
drop table critique;
create table critique(
                         idcritique int(5) not null auto_increment,
                         contenu varchar(255) not null,
                         dateenregistrement datetime,
                         note varchar(255) not null,
                         titre varchar(255) ,
                         created_at datetime,
                         updated_at datetime,
                         idfilm int(5) not null,
                         idutilisateur int(5) not null,
                         primary key (idcritique),
                         foreign key (idfilm) references film(idfilm) on delete cascade on update cascade,
                         foreign key (idutilisateur) references utilisateur(idutilisateur) on delete cascade on update cascade
)engine=innodb;

create table lieu (
                      idlieu int (5) auto_increment not null,
                      nomlieu varchar (100) unique not null,
                      created_at datetime,
                      updated_at datetime,
                      primary key (idlieu)
)engine=InnoDB;

INSERT INTO cinema.lieu (idlieu, nomlieu, created_at, updated_at) VALUES (3, 'Berlin', '2023-03-24 13:34:45', '2023-03-24 13:34:45');
INSERT INTO cinema.lieu (idlieu, nomlieu, created_at, updated_at) VALUES (4, 'Le Caire', '2023-03-24 13:34:52', '2023-03-24 13:34:52');
INSERT INTO cinema.lieu (idlieu, nomlieu, created_at, updated_at) VALUES (5, 'Cannes', '2023-03-24 13:35:08', '2023-03-24 13:35:08');
INSERT INTO cinema.lieu (idlieu, nomlieu, created_at, updated_at) VALUES (6, 'Karlovy Vary', '2023-03-24 13:35:30', '2023-03-24 13:35:30');
INSERT INTO cinema.lieu (idlieu, nomlieu, created_at, updated_at) VALUES (7, 'Locarno', '2023-03-24 13:36:05', '2023-03-24 13:36:05');
INSERT INTO cinema.lieu (idlieu, nomlieu, created_at, updated_at) VALUES (8, 'Mar del Plata', '2023-03-24 13:36:32', '2023-03-24 13:36:32');
INSERT INTO cinema.lieu (idlieu, nomlieu, created_at, updated_at) VALUES (9, 'Montréal', '2023-03-24 13:36:52', '2023-03-24 13:36:52');
INSERT INTO cinema.lieu (idlieu, nomlieu, created_at, updated_at) VALUES (10, 'Moscou', '2023-03-24 13:37:10', '2023-03-24 13:37:10');
INSERT INTO cinema.lieu (idlieu, nomlieu, created_at, updated_at) VALUES (14, 'Saint-Sébastien', '2023-03-24 13:37:42', '2023-03-24 13:37:42');
INSERT INTO cinema.lieu (idlieu, nomlieu, created_at, updated_at) VALUES (15, 'Tokyo', '2023-03-24 13:37:57', '2023-03-24 13:37:57');


create table evenement(
                          idevenement int(5) not null auto_increment,
                          nomevenement varchar(255) unique not null,
                          dateevenement datetime,
                          idlieu int(5),
                          created_at datetime,
                          updated_at datetime,
                          primary key (idevenement),
                          foreign key (idlieu) references lieu(idlieu) on delete cascade on update cascade
)engine=innodb;
alter table evenement
    add afficheevenement varchar(200);
INSERT INTO cinema.evenement (idevenement, nomevenement, dateevenement, idlieu, created_at, updated_at, afficheevenement) VALUES (1, 'Festival international du film de Berlin', null, 3, '2023-03-24 13:51:16', '2023-03-27 01:33:02', 'img\\afficheevenement\\festberlin.jpg');
INSERT INTO cinema.evenement (idevenement, nomevenement, dateevenement, idlieu, created_at, updated_at, afficheevenement) VALUES (2, 'Festival international du film du Caire', null, 4, '2023-03-24 13:56:59', '2023-03-27 01:33:15', 'img\\afficheevenement\\festcaire.jpg');
INSERT INTO cinema.evenement (idevenement, nomevenement, dateevenement, idlieu, created_at, updated_at, afficheevenement) VALUES (3, 'Festival international du film', null, 5, '2023-03-24 13:57:24', '2023-03-27 01:35:59', 'img\\afficheevenement\\MicrosoftTeams-image (36).png');
INSERT INTO cinema.evenement (idevenement, nomevenement, dateevenement, idlieu, created_at, updated_at, afficheevenement) VALUES (4, 'Festival international du film de Karlovy Vary', '2023-04-09 00:00:00', 6, '2023-03-24 13:57:56', '2023-03-24 13:57:56', null);
INSERT INTO cinema.evenement (idevenement, nomevenement, dateevenement, idlieu, created_at, updated_at, afficheevenement) VALUES (5, 'Festival international du film de Locarno', '2023-04-07 00:00:00', 7, '2023-03-24 13:58:22', '2023-03-24 13:58:22', null);
INSERT INTO cinema.evenement (idevenement, nomevenement, dateevenement, idlieu, created_at, updated_at, afficheevenement) VALUES (6, 'Festival international du film de Mar del Plata', '2023-04-27 00:00:00', 8, '2023-03-24 13:58:54', '2023-03-24 13:58:54', null);
INSERT INTO cinema.evenement (idevenement, nomevenement, dateevenement, idlieu, created_at, updated_at, afficheevenement) VALUES (7, 'Festival des films du monde de Montréal', '2023-04-05 00:00:00', 9, '2023-03-24 14:00:22', '2023-03-24 14:00:22', null);
INSERT INTO cinema.evenement (idevenement, nomevenement, dateevenement, idlieu, created_at, updated_at, afficheevenement) VALUES (8, 'Festival international du film de Moscou', '2023-04-04 00:00:00', 10, '2023-03-24 14:00:51', '2023-03-24 14:00:51', null);
INSERT INTO cinema.evenement (idevenement, nomevenement, dateevenement, idlieu, created_at, updated_at, afficheevenement) VALUES (9, 'Festival international du film de Saint-Sébastien', '2023-05-25 00:00:00', 14, '2023-03-24 14:01:17', '2023-03-24 14:01:17', null);
INSERT INTO cinema.evenement (idevenement, nomevenement, dateevenement, idlieu, created_at, updated_at, afficheevenement) VALUES (10, 'Festival international du film de Tokyo', '2023-05-26 00:00:00', 15, '2023-03-24 14:01:45', '2023-03-24 14:01:45', null);

create table participer(
                           idevenement int(5) not null,
                           idfilm int(5) not null,
                           created_at datetime,
                           updated_at datetime,
                           primary key (idevenement,idfilm),
                           foreign key (idevenement) references evenement(idevenement) on delete cascade on update cascade,
                           foreign key (idfilm) references film(idfilm) on delete cascade on update cascade
)engine=innodb;

create table recompense(
                           idrecompense int(5) not null auto_increment,
                           nomrecompense varchar(255) not null,
                           created_at datetime,
                           updated_at datetime,
                           primary key (idrecompense)
)engine=innodb;
alter table recompense
    add idevenement int(5);

alter table recompense
    add constraint idevenement
        foreign key (idevenement) references evenement (idevenement)
            on update cascade on delete cascade;

alter table recompense
    add photorecompense varchar(200);

INSERT INTO cinema.recompense (idrecompense, nomrecompense, created_at, updated_at, idevenement, photorecompense) VALUES (2, 'Oscars', '2023-03-24 13:28:23', '2023-03-27 01:34:59', 3, 'img\\photorecompense\\MicrosoftTeams-image (36).png');
INSERT INTO cinema.recompense (idrecompense, nomrecompense, created_at, updated_at, idevenement, photorecompense) VALUES (3, 'César', '2023-03-24 13:28:42', '2023-03-27 00:24:36', 3, 'img\\photorecompense\\cesar.jpg');
INSERT INTO cinema.recompense (idrecompense, nomrecompense, created_at, updated_at, idevenement, photorecompense) VALUES (7, 'Ours d\'Or', '2023-03-24 13:30:41', '2023-03-27 00:24:51', 1, 'img\\photorecompense\\oursor.jpg');
INSERT INTO cinema.recompense (idrecompense, nomrecompense, created_at, updated_at, idevenement, photorecompense) VALUES (8, 'Pyramide d\'Or', '2023-03-24 13:31:00', '2023-03-27 00:25:02', 2, 'img\\photorecompense\\pyramide.jpg');
INSERT INTO cinema.recompense (idrecompense, nomrecompense, created_at, updated_at, idevenement, photorecompense) VALUES (9, 'Palme d\'Or', '2023-03-24 13:31:15', '2023-03-27 00:25:16', 3, 'img\\photorecompense\\palmor.jpg');
INSERT INTO cinema.recompense (idrecompense, nomrecompense, created_at, updated_at, idevenement, photorecompense) VALUES (10, 'Globe de cristal', '2023-03-24 13:40:24', '2023-03-27 00:25:38', 4, 'img\\photorecompense\\globecris.jpg');
INSERT INTO cinema.recompense (idrecompense, nomrecompense, created_at, updated_at, idevenement, photorecompense) VALUES (11, 'Léopard d\'Or', '2023-03-24 13:40:36', '2023-03-27 00:25:53', 5, 'img\\photorecompense\\leopard.jpg');
INSERT INTO cinema.recompense (idrecompense, nomrecompense, created_at, updated_at, idevenement, photorecompense) VALUES (12, 'Astor d\'Or', '2023-03-24 13:40:48', '2023-03-24 13:43:29', 6, null);
INSERT INTO cinema.recompense (idrecompense, nomrecompense, created_at, updated_at, idevenement, photorecompense) VALUES (13, 'Grand prix des Amériques', '2023-03-24 13:41:04', '2023-03-24 13:41:04', 7, null);
INSERT INTO cinema.recompense (idrecompense, nomrecompense, created_at, updated_at, idevenement, photorecompense) VALUES (14, 'George d\'Or', '2023-03-24 13:41:18', '2023-03-24 13:41:18', 8, null);


create table jouer(
                      idfilm int(5) not null,
                      idacteur int(5) not null,
                      datedebut datetime,
                      datefin datetime,
                      created_at datetime,
                      updated_at datetime,
                      primary key(idfilm,idacteur),
                      foreign key (idfilm) references film(idfilm) on delete cascade on update cascade,
                      foreign key (idacteur) references acteur(idacteur) on delete cascade on update cascade
)engine=innodb;

INSERT INTO cinema.jouer (idfilm, idacteur, datedebut, datefin, created_at, updated_at) VALUES (11, 5, '2022-11-07 00:00:00', '2023-04-07 00:00:00', '2023-03-26 15:34:37', '2023-03-26 15:34:37');


create table avoir_recompense (
    idrecompense int(5) not null,
    idacteur int(5) not null,
    created_at datetime,
    updated_at datetime,
    primary key(idrecompense,idacteur),
    foreign key (idrecompense) references recompense(idrecompense) on delete cascade on update cascade,
    foreign key (idacteur) references acteur(idacteur) on delete cascade on update cascade
)engine=innodb;

create table userlog (
                         id  int(14),
                         loginuser varchar(50),
                         nomuser varchar (100),
                         datelog datetime,

                         primary key (id)
);



create or replace view listfilmrecent
    as select f.idfilm id, f.titre titre, f.photo affiche, f.datesortie datesortie, r.nomrealisateur nomrealisateur, r.prenomrealisateur prenomrealisateur, g.nomgenre genre, t.nomtheme theme
    from film f, theme t, genre g, realisateur r
    where f.idrealisateur = r.idrealisateur
    and f.idgenre=g.idgenre
    and f.idtheme=t.idtheme
    order by datesortie asc
    limit 10;

create or replace view recompenseActeurEvent (id, nomRecompense, evenement, list_acteurs)
as select r.idrecompense, r.nomrecompense, e.nomevenement, group_concat(' ',a.nomacteur)
from recompense r, acteur a, evenement e, avoir_recompense ar
where ar.idrecompense=r.idrecompense
and ar.idacteur = a.idacteur
and r.idevenement=e.idevenement
group by r.idrecompense;


create or replace view recompenseEvent (id, nomrecompense, photorecompense, evenement)
as select r.idrecompense, r.nomrecompense, r.photorecompense, e.nomevenement
   from recompense r, evenement e
   where r.idevenement=e.idevenement
   and r.photorecompense is not null;

create table filmvus
(
    idfilm int(5),
    idutilisateur int(5),
    primary key (idfilm, idutilisateur),
    foreign key (idfilm) references film (idfilm) ON DELETE no action ON UPDATE CASCADE,
    foreign key (idutilisateur) references utilisateur (idutilisateur) ON DELETE no action ON UPDATE CASCADE
) engine = innodb;

alter table `filmvus`
    add column `updated_at` Datetime;
alter table `filmvus`
    add column `created_at` Datetime;

create table filmavoir
(
    idfilm int(5),
    idutilisateur int(5),
    created_at datetime,
    updated_at datetime,
    primary key (idfilm, idutilisateur),
    foreign key (idfilm) references film (idfilm) ON DELETE no action ON UPDATE CASCADE,
    foreign key (idutilisateur) references utilisateur (idutilisateur) ON DELETE no action ON UPDATE CASCADE
) engine = innodb;

rename table avoir_seance to seance;

    select * from seance;

alter table seance
add  debutseance date;
alter table seance
add finseance date;


select * from seance;

