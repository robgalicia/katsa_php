/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     30/12/2020 11:29:39 a. m.                    */
/*==============================================================*/


/*==============================================================*/
/* Table: oficinanegocio                                        */
/*==============================================================*/
create table oficinanegocio
(
   idoficinanegocio     smallint not null auto_increment,
   nombrecomercial      varchar(100),
   gironegocio          varchar(100),
   calle                varchar(100),
   numeroext            varchar(10),
   numeroint            varchar(10),
   entrecalles          varchar(100),
   colonia              varchar(50),
   ciudad               varchar(50),
   codigopostal         int,
   idestado             smallint,
   idmunicipio          smallint,
   telefono             varchar(50),
   nombreoficina        varchar(50),
   correoelectronico    varchar(50),
   representantelegal   varchar(50),
   sexorepresentantelegal char(1),
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idoficinanegocio)
);

