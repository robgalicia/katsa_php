drop table if exists requisicion;

/*==============================================================*/
/* Table: requisicion                                           */
/*==============================================================*/
create table requisicion
(
   idrequisicion        int not null auto_increment,
   idregion             smallint not null,
   folio                varchar(12) not null,
   fecha                datetime not null,
   iddepartamento       smallint not null,
   idcliente            int,
   idempleadosolicita   int not null,
   idempleadorevisa     int,
   fecharevision        datetime,
   idempleadoautoriza   int,
   fechaautorizacion    datetime,
   idestatus            smallint not null,
   importetotal         decimal(12,2) not null,
   fechacancelacion     datetime,
   tiporequisicion      char(1) not null comment 'A - Administrativa, O - Operaciones, C - Cliente',
   observaciones        varchar(500),
   quien                varchar(15) not null,
   cuando               datetime not null,
   idadscripcion        smallint not null,
   centrocostos         int,
   tipoentrega          char(1) comment 'Normal - Urgente',
   plazoentrega         smallint,
   primary key (idrequisicion)
);

alter table requisicion add constraint fk_requisicion_adscripcion foreign key (idadscripcion)
      references adscripcion (idadscripcion) on delete restrict on update restrict;

alter table requisicion add constraint fk_requisicion_cliente foreign key (idcliente)
      references cliente (idcliente) on delete restrict on update restrict;

alter table requisicion add constraint fk_requisicion_departamento foreign key (iddepartamento)
      references departamento (iddepartamento) on delete restrict on update restrict;

alter table requisicion add constraint fk_requisicion_empleadoaut foreign key (idempleadoautoriza)
      references empleado (idempleado) on delete restrict on update restrict;

alter table requisicion add constraint fk_requisicion_empleadorev foreign key (idempleadorevisa)
      references empleado (idempleado) on delete restrict on update restrict;

alter table requisicion add constraint fk_requisicion_empleadosol foreign key (idempleadosolicita)
      references empleado (idempleado) on delete restrict on update restrict;

alter table requisicion add constraint fk_requisicion_estatus foreign key (idestatus)
      references estatus (idestatus) on delete restrict on update restrict;

alter table requisicion add constraint fk_requisicion_region foreign key (idregion)
      references region (idregion) on delete restrict on update restrict;
