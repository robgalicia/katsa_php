/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     30/12/2020 11:29:39 a. m.                    */
/*==============================================================*/


/*==============================================================*/
/* Table: requisiciondetalle                                    */
/*==============================================================*/
create table requisiciondetalle
(
   idrequisiciondetalle int not null auto_increment,
   idrequisicion        int not null,
   idarticulo           int not null,
   cantidad             int not null,
   importe              decimal(12,2) not null,
   total                decimal(12,2) not null,
   idproveedor          int,
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idrequisiciondetalle)
);

