/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     30/12/2020 11:29:39 a. m.                    */
/*==============================================================*/


/*==============================================================*/
/* Table: proveedor                                             */
/*==============================================================*/
create table proveedor
(
   idproveedor          int not null auto_increment,
   nombre               varchar(50) not null,
   representante        varchar(50),
   direccion            varchar(50),
   colonia              varchar(50),
   ciudad               varchar(30),
   idestado             smallint not null,
   codigopostal         varchar(6),
   rfc                  varchar(13),
   telefono             varchar(30),
   correoelectronico    varchar(50),
   diascredito          tinyint,
   idbancodeposito      smallint,
   cuentadeposito       varchar(20),
   cuentacontable       varchar(15),
   personafiscal        char(1) not null default 'M' comment 'Fisica, Moral',
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idproveedor)
);

