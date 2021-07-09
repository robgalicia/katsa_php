/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     30/12/2020 11:29:39 a. m.                    */
/*==============================================================*/


/*==============================================================*/
/* Table: empleadofoto                                          */
/*==============================================================*/
create table empleadofoto
(
   idempleadofoto       int not null auto_increment,
   idempleado           int not null,
   idtipoimagen         smallint not null,
   nombrearchivo        varchar(100) not null,
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idempleadofoto)
);

