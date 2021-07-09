drop table if exists rutatraslado;

/*==============================================================*/
/* Table: rutatraslado                                          */
/*==============================================================*/
create table rutatraslado
(
   idrutatraslado       smallint not null auto_increment,
   descrutatraslado     varchar(100) not null,
   importetarifa        decimal(10,2),
   idtipomoneda         smallint not null,
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idrutatraslado)
);

alter table rutatraslado add constraint fk_rutatraslado_tipomoneda foreign key (idtipomoneda)
      references tipomoneda (idtipomoneda) on delete restrict on update restrict;
