/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     30/12/2020 11:29:39 a. m.                    */
/*==============================================================*/


/*==============================================================*/
/* Table: tipoincidenciaveh                                     */
/*==============================================================*/
create table tipoincidenciaveh
(
   idtipoincidenciaveh  smallint not null auto_increment,
   desctipoincidenciaveh varchar(30) not null,
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idtipoincidenciaveh)
);

alter table tipoincidenciaveh comment 'Tipos de incidencias del vehiculo';

