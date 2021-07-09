/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     30/12/2020 11:29:39 a. m.                    */
/*==============================================================*/


/*==============================================================*/
/* Table: unidadmedida                                          */
/*==============================================================*/
create table unidadmedida
(
   idunidadmedida       smallint not null auto_increment,
   descunidadmedida     varchar(30) not null,
   nombrecorto          varchar(5) not null,
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idunidadmedida)
);

