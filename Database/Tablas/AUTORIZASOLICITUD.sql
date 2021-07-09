drop table if exists autorizasolicitud;

/*==============================================================*/
/* Table: autorizasolicitud                                     */
/*==============================================================*/
create table autorizasolicitud
(
   idautorizasolicitud  smallint not null auto_increment,
   idregion             smallint not null,
   iddepartamento       smallint not null,
   tiposolicitud        char(1) not null comment 'Requisicion, Viaticos',
   idempleadorevisa     int not null,
   idempleadoautoriza   int not null,
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idautorizasolicitud)
);

alter table autorizasolicitud comment 'Personal que revisa y autoriza solicitudes';

alter table autorizasolicitud add constraint fk_autorizasol_departamento foreign key (iddepartamento)
      references departamento (iddepartamento) on delete restrict on update restrict;

alter table autorizasolicitud add constraint fk_autorizasol_empleadoaut foreign key (idempleadoautoriza)
      references empleado (idempleado) on delete restrict on update restrict;

alter table autorizasolicitud add constraint fk_autorizasol_empleadorev foreign key (idempleadorevisa)
      references empleado (idempleado) on delete restrict on update restrict;

alter table autorizasolicitud add constraint fk_autorizasol_region foreign key (idregion)
      references region (idregion) on delete restrict on update restrict;
