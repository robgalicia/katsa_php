/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     30/12/2020 11:29:39 a. m.                    */
/*==============================================================*/


/*==============================================================*/
/* Table: estatus                                               */
/*==============================================================*/
create table estatus
(
   idestatus            smallint not null auto_increment,
   descestatus          varchar(30) not null,
   modulo               varchar(4) not null,
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idestatus)
);

