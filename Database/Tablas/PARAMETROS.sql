/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     30/12/2020 11:29:39 a. m.                    */
/*==============================================================*/


/*==============================================================*/
/* Table: parametros                                            */
/*==============================================================*/
create table parametros
(
   idparametro          smallint not null auto_increment,
   claveparametro       char(2) not null,
   descripcion          varchar(100) not null,
   valor                decimal(10,2) not null,
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idparametro)
);

