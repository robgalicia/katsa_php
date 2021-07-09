/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     30/12/2020 11:29:39 a. m.                    */
/*==============================================================*/


/*==============================================================*/
/* Table: arrendadora                                           */
/*==============================================================*/
create table arrendadora
(
   idarrendadora        smallint not null auto_increment,
   nombre               varchar(100) not null,
   calle                varchar(100),
   numexterior          varchar(20),
   numinterior          varchar(20),
   colonia              varchar(50),
   ciudad               varchar(50),
   idmunicipio          smallint,
   idestado             smallint,
   codigopostal         int,
   rfc                  varchar(13),
   personacontacto      varchar(50),
   telefonocontacto     varchar(50),
   correoelectronico    varchar(50),
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idarrendadora)
);

