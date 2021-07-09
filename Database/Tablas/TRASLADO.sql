drop table if exists traslado;

/*==============================================================*/
/* Table: traslado                                              */
/*==============================================================*/
create table traslado
(
   idtraslado           int not null auto_increment,
   folio                varchar(12) not null,
   fechaservicio        datetime not null,
   solicitante          varchar(50),
   empresa              varchar(50),
   tiposervicio         char(1) not null comment 'Material, Personal',
   idrutatraslado       smallint,
   estraslado           char(1) not null comment 'Si, No',
   escordillera         char(1) not null comment 'Si, No',
   esavanzada           char(1) not null comment 'Si, No',
   observaciones        varchar(500),
   fechacierre          datetime,
   fechafactura         datetime,
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idtraslado)
);

alter table traslado comment 'Servicios de Traslados InterRegionales';

alter table traslado add constraint fk_traslado_rutatraslado foreign key (idrutatraslado)
      references rutatraslado (idrutatraslado) on delete restrict on update restrict;
