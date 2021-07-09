/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     30/12/2020 11:29:39 a. m.                    */
/*==============================================================*/


/*==============================================================*/
/* Table: salidainventariodetalle                               */
/*==============================================================*/
create table salidainventariodetalle
(
   idsalidainventariodetalle int not null auto_increment,
   idsalidainventario   int not null,
   idarticulo           int not null,
   cantidad             int not null,
   costounitario        decimal(10,2) not null,
   costototal           decimal(10,2) not null,
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idsalidainventariodetalle)
);

