/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     30/12/2020 11:29:39 a. m.                    */
/*==============================================================*/


/*==============================================================*/
/* Table: usuario                                               */
/*==============================================================*/
create table usuario
(
   idusuario            smallint not null auto_increment,
   login                varchar(15) not null,
   password             varchar(50),
   nombre               varchar(30) not null,
   fechaalta            datetime not null,
   fechabaja            datetime,
   idempleado           int not null,
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idusuario)
);

