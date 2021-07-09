/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     30/12/2020 11:29:39 a. m.                    */
/*==============================================================*/


/*==============================================================*/
/* Table: tipoincidenciaemp                                     */
/*==============================================================*/
create table tipoincidenciaemp
(
   idtipoincidenciaemp  smallint not null auto_increment,
   desctipoincidenciaemp varchar(30) not null,
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idtipoincidenciaemp)
);

alter table tipoincidenciaemp comment 'Tipos de incidencias del empleado';

