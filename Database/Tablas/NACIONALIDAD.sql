/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     30/12/2020 11:29:39 a. m.                    */
/*==============================================================*/


/*==============================================================*/
/* Table: nacionalidad                                          */
/*==============================================================*/
create table nacionalidad
(
   idnacionalidad       smallint not null auto_increment,
   descnacionalidad     varchar(30) not null,
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idnacionalidad)
);

