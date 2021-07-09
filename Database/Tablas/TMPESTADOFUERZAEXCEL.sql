/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     30/12/2020 11:29:39 a. m.                    */
/*==============================================================*/


/*==============================================================*/
/* Table: tmpestadofuerzaexcel                                  */
/*==============================================================*/
create table tmpestadofuerzaexcel
(
   numero               int not null,
   estatus              varchar(20),
   empresa              varchar(20),
   entidad              varchar(20),
   municipio            varchar(30),
   cliente              varchar(50),
   adscripcion          varchar(50),
   conclusionservicio   varchar(10),
   nombre               varchar(50),
   sexo                 char(1),
   puestotabulador      varchar(50),
   puestoorganigrama    varchar(50),
   funciones            varchar(200),
   puestoregistro       varchar(50),
   requiereregistro     char(2),
   estatusregistro      varchar(20),
   basic                char(1),
   seginmueb            char(1),
   manejodef            char(1),
   primerosaux          char(1),
   cuip                 varchar(20),
   curp                 varchar(20),
   rfc                  varchar(20),
   nss                  varchar(20),
   gruposanguineo       varchar(20),
   fechaalta            varchar(10),
   fechabaja            varchar(10),
   vehiculoasignado     char(2),
   marcasubmarca        varchar(50),
   placas               varchar(10),
   gasolina             char(1),
   diesel               char(1),
   consumopromediomes   varchar(10),
   modalidadasignacion  varchar(20),
   propietario          varchar(50),
   region               varchar(50),
   primary key (numero)
);

