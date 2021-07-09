/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     30/12/2020 11:29:39 a. m.                    */
/*==============================================================*/


/*==============================================================*/
/* Table: tarjetacombustible                                    */
/*==============================================================*/
create table tarjetacombustible
(
   idtarjetacombustible smallint not null auto_increment,
   numtarjeta           int not null,
   idempleadoresguardo  int,
   fecharesguardo       datetime,
   fechabaja            datetime,
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idtarjetacombustible)
);

