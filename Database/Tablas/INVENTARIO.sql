/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     30/12/2020 11:29:39 a. m.                    */
/*==============================================================*/


/*==============================================================*/
/* Table: inventario                                            */
/*==============================================================*/
create table inventario
(
   idinventario         int not null auto_increment,
   idarticulo           int not null,
   idalmacen            smallint not null,
   idproveedor          int not null,
   existencia           int not null,
   costounitario        decimal(10,2) not null,
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idinventario)
);

