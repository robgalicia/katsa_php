drop table if exists cotizaciondetalle;

/*==============================================================*/
/* Table: cotizaciondetalle                                     */
/*==============================================================*/
create table cotizaciondetalle
(
   idcotizaciondetalle  int not null auto_increment,
   idcotizacion         int not null,
   idservicio           int not null,
   descservicio         varchar(1000) not null,
   cantidad             int not null,
   preciounitario       decimal(12,2) not null,
   importetotal         decimal(12,2) not null,
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idcotizaciondetalle)
);

alter table cotizaciondetalle add constraint fk_cotizaciondet_cotizacion foreign key (idcotizacion)
      references cotizacion (idcotizacion) on delete cascade on update restrict;

alter table cotizaciondetalle add constraint fk_cotizaciondet_servicio foreign key (idservicio)
      references servicio (idservicio) on delete restrict on update restrict;
