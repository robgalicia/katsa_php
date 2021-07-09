/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     30/12/2020 11:29:39 a. m.                    */
/*==============================================================*/


/*==============================================================*/
/* Table: kardex                                                */
/*==============================================================*/
create table kardex
(
   idkardex             int not null auto_increment,
   idarticulo           int not null,
   idalmacen            smallint not null,
   fechamovimiento      datetime not null,
   documentoreferencia  varchar(15) not null comment 'Factura Compra, Salida Almacen, etc',
   folioreferencia      varchar(15) not null,
   tipomovimiento       char(1) not null,
   cantidad             int not null,
   existenciaactual     int not null,
   costounitario        decimal(10,2) not null,
   costopromedio        decimal(10,2) not null,
   observaciones        varchar(100),
   valorllave           varchar(10),
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idkardex)
);

