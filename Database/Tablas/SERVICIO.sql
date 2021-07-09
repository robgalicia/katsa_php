drop table if exists servicio;

/*==============================================================*/
/* Table: servicio                                              */
/*==============================================================*/
create table servicio
(
   idservicio           int not null auto_increment,
   descripcioncorta     varchar(100) not null,
   descservicio         varchar(1000),
   preciounitario       decimal(12,2) not null,
   idtipomoneda         smallint not null,
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idservicio)
);

alter table servicio comment 'Catalogo de servicios de la empresa';

alter table servicio add constraint fk_servicio_tipomoneda foreign key (idtipomoneda)
      references tipomoneda (idtipomoneda) on delete restrict on update restrict;