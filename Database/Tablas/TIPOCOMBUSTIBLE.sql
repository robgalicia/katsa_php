/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     30/12/2020 11:29:39 a. m.                    */
/*==============================================================*/


/*==============================================================*/
/* Table: tipocombustible                                       */
/*==============================================================*/
create table tipocombustible
(
   idtipocombustible    smallint not null auto_increment,
   desctipocombustible  varchar(30) not null,
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idtipocombustible)
);

