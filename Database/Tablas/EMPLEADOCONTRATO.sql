/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     30/12/2020 11:29:39 a. m.                    */
/*==============================================================*/


/*==============================================================*/
/* Table: empleadocontrato                                      */
/*==============================================================*/
create table empleadocontrato
(
   idempleadocontrato   int not null auto_increment,
   idempleado           int not null,
   consecutivo          smallint not null,
   fechaingreso         datetime not null,
   fechacontrato        datetime not null,
   fechafirma           datetime,
   diascontrato         smallint not null,
   periodocontrato      char(1) not null comment 'Dias, Semanas, Meses, Años',
   fechainicial         datetime not null,
   fechafinal           datetime not null,
   esquemapago          char(1) not null comment 'Quincenal, Mensual',
   salariodiariointegrado decimal(10,2) not null,
   sueldonetomensual    decimal(10,2) not null,
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idempleadocontrato)
);

