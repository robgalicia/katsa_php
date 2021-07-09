/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     30/12/2020 11:29:39 a. m.                    */
/*==============================================================*/


/*==============================================================*/
/* Table: empleadodocumento                                     */
/*==============================================================*/
create table empleadodocumento
(
   idempleadodocumento  int not null auto_increment,
   idempleado           int not null,
   idtipodocumento      smallint not null,
   esoriginal           char(1) not null default 'N',
   folio                varchar(20),
   fechaemision         datetime,
   iniciovigencia       datetime,
   finalvigencia        datetime,
   nombrearchivo        varchar(100),
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idempleadodocumento)
);

