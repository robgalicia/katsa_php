/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     30/12/2020 11:29:39 a. m.                    */
/*==============================================================*/


/*==============================================================*/
/* Table: diafestivo                                            */
/*==============================================================*/
create table diafestivo
(
   iddiafestivo         smallint not null auto_increment,
   fecha                date not null,
   motivo               varchar(30),
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (iddiafestivo)
);

