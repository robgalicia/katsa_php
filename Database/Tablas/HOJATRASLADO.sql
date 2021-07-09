drop table if exists hojatraslado;

/*==============================================================*/
/* Table: hojatraslado                                          */
/*==============================================================*/
create table hojatraslado
(
   idhojatraslado       int not null auto_increment,
   idtraslado           int not null,
   numhojatraslado      smallint not null,
   tiposervicio         char(1) not null comment 'Material, Personal',
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idhojatraslado)
);

alter table hojatraslado add constraint fk_hojatraslado_traslado foreign key (idtraslado)
      references traslado (idtraslado) on delete cascade on update restrict;