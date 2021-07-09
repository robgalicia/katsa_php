drop table if exists salidainventario;

/*==============================================================*/
/* Table: salidainventario                                      */
/*==============================================================*/
create table salidainventario
(
   idsalidainventario   int not null auto_increment,
   fechasalida          datetime not null,
   idtiposalidainventario smallint not null,
   folio                varchar(12) not null,
   idalmacen            smallint not null,
   idregion             smallint not null,
   idadscripcion        smallint not null,
   idcliente            int not null,
   iddepartamento       smallint not null,
   idempleadoautoriza   int not null,
   idempleadorecibe     int not null,
   observaciones        varchar(100),
   costototal           decimal(10,2) not null,
   fechacancelacion     datetime,
   idempleadocancela    int,
   motivocancelacion    varchar(100),
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idsalidainventario)
);

alter table salidainventario add constraint fk_salidainv_adscripcion foreign key (idadscripcion)
      references adscripcion (idadscripcion) on delete restrict on update restrict;

alter table salidainventario add constraint fk_salidainv_almacen foreign key (idalmacen)
      references almacen (idalmacen) on delete restrict on update restrict;

alter table salidainventario add constraint fk_salidainv_cliente foreign key (idcliente)
      references cliente (idcliente) on delete restrict on update restrict;

alter table salidainventario add constraint fk_salidainv_departamento foreign key (iddepartamento)
      references departamento (iddepartamento) on delete restrict on update restrict;

alter table salidainventario add constraint fk_salidainv_empleadoaut foreign key (idempleadoautoriza)
      references empleado (idempleado) on delete restrict on update restrict;

alter table salidainventario add constraint fk_salidainv_empleadocan foreign key (idempleadocancela)
      references empleado (idempleado) on delete restrict on update restrict;

alter table salidainventario add constraint fk_salidainv_empleadorecibe foreign key (idempleadorecibe)
      references empleado (idempleado) on delete restrict on update restrict;

alter table salidainventario add constraint fk_salidainv_region foreign key (idregion)
      references region (idregion) on delete restrict on update restrict;

alter table salidainventario add constraint fk_salidainv_tiposalidainv foreign key (idtiposalidainventario)
      references tiposalidainventario (idtiposalidainventario) on delete restrict on update restrict;
