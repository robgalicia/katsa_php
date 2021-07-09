/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     30/12/2020 11:29:39 a. m.                    */
/*==============================================================*/


/*==============================================================*/
/* Table: articulo                                              */
/*==============================================================*/
create table articulo
(
   idarticulo           int not null auto_increment,
   codigoarticulo       varchar(20),
   descarticulo         varchar(100) not null,
   descarticuloprov     varchar(100),
   idunidadmedida       smallint not null,
   existencia           int,
   fechaultimacompra    datetime,
   preciocompra         decimal(10,2),
   idpartidagto         smallint,
   idpartidacto         smallint,
   idpartidainv         smallint,
   idproveedor          int,
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idarticulo)
);

