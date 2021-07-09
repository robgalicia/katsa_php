/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     30/12/2020 11:29:39 a. m.                    */
/*==============================================================*/


/*==============================================================*/
/* Table: empleadoreferencia                                    */
/*==============================================================*/
create table empleadoreferencia
(
   idempleadoreferencia int not null auto_increment,
   idempleado           int not null,
   idtipoparentesco     smallint not null,
   nombre               varchar(50) not null,
   domicilio            varchar(50),
   colonia              varchar(50),
   ciudad               varchar(50),
   idestado             smallint,
   telefono             varchar(50),
   correoelectronico    varchar(50),
   fechanacimiento      datetime,
   esbeneficiario       char(1) not null default 'N',
   porcentaje           decimal(6,2),
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idempleadoreferencia)
);

alter table empleadoreferencia comment 'Referencias familiares, beneficiarios y otros';

