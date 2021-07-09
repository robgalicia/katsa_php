/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     30/12/2020 11:29:39 a. m.                    */
/*==============================================================*/


/*==============================================================*/
/* Table: puesto                                                */
/*==============================================================*/
create table puesto
(
   idpuesto             smallint not null auto_increment,
   descpuesto           varchar(50) not null,
   tipopuesto           char(1) not null comment '<T>abulador, <O>rganigrama, <R>egistro',
   descfunciones        varchar(500) comment 'Resumen de las funciones segun el puesto',
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idpuesto)
);

