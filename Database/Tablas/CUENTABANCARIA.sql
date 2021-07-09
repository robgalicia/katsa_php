/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     30/12/2020 11:29:39 a. m.                    */
/*==============================================================*/


/*==============================================================*/
/* Table: cuentabancaria                                        */
/*==============================================================*/
create table cuentabancaria
(
   idcuentabancaria     smallint not null auto_increment,
   idbanco              smallint not null,
   numerocuenta         varchar(20) not null,
   clabeinterbancaria   varchar(20),
   cuentacontable       varchar(20),
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idcuentabancaria)
);

