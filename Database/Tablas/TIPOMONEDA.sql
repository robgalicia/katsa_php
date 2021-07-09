drop table if exists tipomoneda;

/*==============================================================*/
/* Table: tipomoneda                                            */
/*==============================================================*/
create table tipomoneda
(
   idtipomoneda         smallint not null auto_increment,
   desctipomoneda       varchar(50) not null,
   abreviacion          varchar(5),
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idtipomoneda)
);