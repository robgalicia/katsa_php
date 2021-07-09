drop table if exists cumplimientoentregable;

/*==============================================================*/
/* Table: cumplimientoentregable                                */
/*==============================================================*/
create table cumplimientoentregable
(
   idcumplimientoentregable int not null auto_increment,
   idagendaentregable   int not null,
   fechaentrega         datetime not null,
   cantidadentregada    smallint not null,
   idempleadoentrega    int not null,
   observaciones        varchar(100),
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idcumplimientoentregable)
);

alter table cumplimientoentregable add constraint fk_cumplimientoentregable_agenda foreign key (idagendaentregable)
      references agendaentregable (idagendaentregable) on delete cascade on update restrict;

alter table cumplimientoentregable add constraint fk_cumplimientoentregable_empleado foreign key (idempleadoentrega)
      references empleado (idempleado) on delete restrict on update restrict;
