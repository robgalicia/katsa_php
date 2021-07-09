/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     30/12/2020 11:29:39 a. m.                    */
/*==============================================================*/


/*==============================================================*/
/* Table: tipoimagen                                            */
/*==============================================================*/
create table tipoimagen
(
   idtipoimagen         smallint not null auto_increment,
   desctipoimagen       varchar(30) not null,
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idtipoimagen)
);

alter table tipoimagen comment 'Foto de perfil, huella digital';

