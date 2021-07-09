/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     30/12/2020 11:29:39 a. m.                    */
/*==============================================================*/


/*==============================================================*/
/* Table: empleado                                              */
/*==============================================================*/
create table empleado
(
   idempleado           int not null auto_increment,
   apellidopaterno      varchar(50),
   apellidomaterno      varchar(50),
   nombre               varchar(50) not null,
   nombrecompleto       varchar(150) not null,
   sexo                 char(1) not null default 'M' comment 'Masculino, Femenino',
   rfc                  varchar(13) not null,
   curp                 varchar(18) not null,
   cuip                 varchar(20),
   numcartilla          varchar(15),
   calle                varchar(50),
   numexterior          varchar(20),
   numinterior          varchar(20),
   entrecalles          varchar(100),
   colonia              varchar(50),
   ciudad               varchar(50),
   idmunicipio          smallint not null,
   idestado             smallint not null,
   codigopostal         int,
   telefonocasa         varchar(30),
   telefonocelular      varchar(30),
   correoelectronico    varchar(50),
   idestadocivil        smallint,
   nombreconyuge        varchar(50),
   idtiposangre         smallint not null,
   idnacionalidad       smallint not null default 1,
   lugarnacimiento      varchar(100),
   fechanacimiento      datetime,
   idgradoescolaridad   smallint not null,
   documentoescolaridad varchar(30),
   aniodocumentoescolaridad smallint,
   idprofesion          smallint not null,
   iddepartamento       smallint not null,
   idpuestotabulador    smallint not null,
   idpuestoorganigrama  smallint not null,
   idpuestoregistro     smallint not null,
   idregionactual       smallint not null,
   idadscripcionactual  smallint not null,
   idclienteactual      int not null default 1,
   fechaingreso         datetime not null,
   fechareingreso       datetime,
   fechabaja            datetime,
   motivobaja           varchar(100),
   nombreemergencia     varchar(50),
   telefonoemergencia   varchar(30),
   correoemergencia     varchar(50),
   numimss              varchar(11),
   sueldonetomensual    decimal(10,2) not null,
   sueldodiarioimss     decimal(10,2) not null,
   idbanco              smallint,
   numcuenta            varchar(10),
   clabe                varchar(18),
   tarjetadebito        varchar(16),
   numcreditoinfonavit  varchar(10),
   fechacreditoinfonavit datetime,
   tipocreditoinfonavit char(1) comment 'Porcentaje, Salarios Minimos, Costo Fijo',
   descuentoinfonavit   decimal(10,2),
   tallacamisa          varchar(5),
   tallapantalon        varchar(5),
   tallazapatos         varchar(5),
   tallachamarra        varchar(5),
   idestatus            smallint not null,
   capbasica            char(1) not null default 'N',
   capseginmuebles      char(1) not null default 'N',
   capmanejodefensivo   char(1) not null default 'N',
   capprimerosauxilios  char(1) not null default 'N',
   requiereregsnsp      char(1) not null default 'N',
   idestatusregsnsp     smallint not null,
   outsourcing          char(1) not null default 'N',
   idempresaoutsourcing int,
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idempleado)
);

