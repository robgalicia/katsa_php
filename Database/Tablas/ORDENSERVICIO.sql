drop table if exists ordenservicio;

/*==============================================================*/
/* Table: ordenservicio                                         */
/*==============================================================*/
create table ordenservicio
(
   idordenservicio      int not null auto_increment,
   folio                varchar(12) not null,
   numeroacta           int not null,
   fechainicio          datetime not null,
   idregion             smallint not null,
   idcotizacion         int not null,
   idcliente            int not null,
   folioordencompra     varchar(10),
   fechaordencompra     datetime,
   idservicio           int not null,
   lugarservicio        varchar(100) not null,
   numelementos         smallint not null,
   tipoturno            varchar(5) not null,
   rechabvehiculo       char(1) not null comment 'No, Katsa (prestador), Cliente (prestatario)',
   rechabvehiculotipo   char(2) comment 'P4 - Pickup 4x4, P2 - Pickup 4x2, SE - Sedan, OT - Otros',
   rechabequipocom      char(1) not null comment 'No, Katsa (prestador), Cliente (prestatario)',
   rechabequipocomtipo  char(1) comment 'Telefono celular, Radio de frecuencia',
   rechabgps            char(1) not null comment 'No, Katsa (prestador), Cliente (prestatario)',
   rechabgpstipo        char(1) comment 'Vehicular, App, Personal',
   rechabcasetavig      char(1) not null comment 'No, Katsa (prestador), Cliente (prestatario)',
   rechabcasetavigtipo  char(1) comment 'A - 2.42x.42, B - 2.44x3.66, C - 2.44x4.88',
   rechabgenelectrico   char(1) not null comment 'No, Katsa (prestador), Cliente (prestatario)',
   rechabgenelectricotipo char(1) comment 'Mecánico, Fotovoltaico',
   rechabmediorest      char(1) not null comment 'No, Katsa (prestador), Cliente (prestatario)',
   rechabmedioresttipo  char(1) comment 'Pluma, Conos, Portón',
   fechaterminacion     datetime,
   idestatus            smallint not null,
   observaciones        varchar(200),
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idordenservicio)
);

alter table ordenservicio add constraint fk_ordenservicio_cliente foreign key (idcliente)
      references cliente (idcliente) on delete restrict on update restrict;

alter table ordenservicio add constraint fk_ordenservicio_cotizacion foreign key (idcotizacion)
      references cotizacion (idcotizacion) on delete restrict on update restrict;

alter table ordenservicio add constraint fk_ordenservicio_estatus foreign key (idestatus)
      references estatus (idestatus) on delete restrict on update restrict;

alter table ordenservicio add constraint fk_ordenservicio_region foreign key (idregion)
      references region (idregion) on delete restrict on update restrict;

alter table ordenservicio add constraint fk_ordenservicio_servicio foreign key (idservicio)
      references servicio (idservicio) on delete restrict on update restrict;
