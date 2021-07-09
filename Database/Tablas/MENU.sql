/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     30/12/2020 11:29:39 a. m.                    */
/*==============================================================*/


/*==============================================================*/
/* Table: menu                                                  */
/*==============================================================*/
create table menu
(
   menuid               smallint not null auto_increment,
   nombremenu           varchar(50) not null,
   padreid              smallint not null,
   posicion             smallint not null,
   icono                varchar(50),
   habilitado           bit,
   url                  varchar(50),
   ordenmenu            varchar(6) not null default '999999',
   primary key (menuid)
);

