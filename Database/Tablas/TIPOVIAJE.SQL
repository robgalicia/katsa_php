drop table if exists tipoviaje;

/*==============================================================*/
/* Table: tipoviaje                                             */
/*==============================================================*/
create table tipoviaje
(
   idtipoviaje          smallint not null auto_increment,
   desctipoviaje        varchar(50) not null,
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idtipoviaje)
);

alter table tipoviaje comment '(Servicio, Supervisión, Soporte, etc.)';