/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     30/12/2020 11:29:39 a. m.                    */
/*==============================================================*/


/*==============================================================*/
/* Table: formatolegal                                          */
/*==============================================================*/
create table formatolegal
(
   idformatolegal       smallint not null auto_increment,
   claveformato         char(2) not null,
   nombreformatolegal   varchar(50) not null,
   contenido            text not null,
   margensuperior       smallint,
   margeninferior       smallint,
   margenizquierdo      smallint,
   margenderecho        smallint,
   storeprocedure       varchar(50),
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idformatolegal)
);

