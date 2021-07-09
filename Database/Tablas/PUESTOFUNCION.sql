/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     30/12/2020 11:29:39 a. m.                    */
/*==============================================================*/


/*==============================================================*/
/* Table: puestofuncion                                         */
/*==============================================================*/
create table puestofuncion
(
   idpuestofuncion      smallint not null auto_increment,
   idpuesto             smallint,
   descpuestofuncion    varchar(200) not null,
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idpuestofuncion)
);

alter table puestofuncion comment 'Funciones del puesto';

