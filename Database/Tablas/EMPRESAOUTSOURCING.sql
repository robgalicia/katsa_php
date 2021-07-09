/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     30/12/2020 11:29:39 a. m.                    */
/*==============================================================*/


/*==============================================================*/
/* Table: empresaoutsourcing                                    */
/*==============================================================*/
create table empresaoutsourcing
(
   idempresaoutsourcing int not null auto_increment,
   nombreempresa        varchar(100) not null,
   nombrecorto          varchar(20) not null,
   domicilio            varchar(100),
   colonia              varchar(50),
   ciudad               varchar(50),
   idmunicipio          smallint,
   idestado             smallint,
   personacontacto      varchar(50),
   telefonocontacto     varchar(50),
   correoelectronico    varchar(50),
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idempresaoutsourcing)
);

alter table empresaoutsourcing comment 'Empresa de personal Outsourcing (mismo trato que los emplead';

