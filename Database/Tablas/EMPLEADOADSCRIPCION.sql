/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     30/12/2020 11:29:39 a. m.                    */
/*==============================================================*/


/*==============================================================*/
/* Table: empleadoadscripcion                                   */
/*==============================================================*/
create table empleadoadscripcion
(
   idempleadoadscripcion int not null auto_increment,
   idempleado           int not null,
   fechaadscripcion     datetime not null,
   idregion             smallint not null,
   idadscripcion        smallint not null,
   idcliente            int not null,
   idpuesto             smallint not null,
   idempleadoautoriza   int,
   fecharegistro        datetime not null,
   observaciones        varchar(100),
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idempleadoadscripcion)
);

alter table empleadoadscripcion comment 'Cambios de Adscripcion';

