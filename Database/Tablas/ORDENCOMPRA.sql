/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     30/12/2020 11:29:39 a. m.                    */
/*==============================================================*/


/*==============================================================*/
/* Table: ordencompra                                           */
/*==============================================================*/
create table ordencompra
(
   idordencompra        int not null auto_increment,
   folio                varchar(12) not null,
   idrequisicion        int not null,
   idproveedor          int not null,
   idregion             smallint not null,
   iddepartamento       smallint not null,
   fechaorden           datetime not null,
   idempleadoordena     int not null,
   fecharecepcion       datetime,
   idempleadorecibe     int,
   observaciones        varchar(100),
   importetotal         decimal(12,2) not null,
   idestatus            smallint not null,
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idordencompra)
);

