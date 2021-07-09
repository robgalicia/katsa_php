drop table if exists categoria;

/*==============================================================*/
/* Table: categoria                                             */
/*==============================================================*/
create table categoria
(
   idcategoria          smallint not null auto_increment,
   desccategoria        varchar(50) not null,
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idcategoria)
);
