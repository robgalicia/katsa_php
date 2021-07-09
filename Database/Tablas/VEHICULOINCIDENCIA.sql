/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     30/12/2020 11:29:39 a. m.                    */
/*==============================================================*/


/*==============================================================*/
/* Table: vehiculoincidencia                                    */
/*==============================================================*/
create table vehiculoincidencia
(
   idvehiculoincidencia int not null auto_increment,
   idvehiculo           smallint not null,
   fechaincidencia      datetime not null,
   idtipoincidenciaveh  smallint not null,
   idempleadoregistra   int not null,
   fecharegistro        datetime not null,
   observaciones        varchar(100),
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idvehiculoincidencia)
);

