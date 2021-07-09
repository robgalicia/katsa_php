/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     30/12/2020 11:29:39 a. m.                    */
/*==============================================================*/


/*==============================================================*/
/* Table: tipodocumento                                         */
/*==============================================================*/
create table tipodocumento
(
   idtipodocumento      smallint not null auto_increment,
   desctipodocumento    varchar(50) not null,
   solicitarvigencia    char(1) not null default 'N',
   solicitararchivo     char(1) not null default 'S',
   obligatorioempleado  char(1) not null default 'N',
   obligatoriosnsp      char(1) not null default 'N',
   obligatoriocliente   char(1) not null default 'N',
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idtipodocumento)
);

