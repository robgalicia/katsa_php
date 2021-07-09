drop table if exists ajusteinventario;

/*==============================================================*/
/* Table: ajusteinventario                                      */
/*==============================================================*/
create table ajusteinventario
(
   idajusteinventario   int not null auto_increment,
   fecha                datetime not null,
   folio                varchar(12) not null,
   idtipoajusteinventario smallint not null,
   idalmacen            smallint not null,
   idempleadoautoriza   int not null,
   observaciones        varchar(100),
   costototal           decimal(10,2) not null,
   idempleadocancela    int,
   fechacancelacion     datetime,
   motivocancelacion    varchar(100),
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idajusteinventario)
);

alter table ajusteinventario add constraint fk_ajusteinventario_almacen foreign key (idalmacen)
      references almacen (idalmacen) on delete restrict on update restrict;

alter table ajusteinventario add constraint fk_ajusteinventario_empleadoaut foreign key (idempleadoautoriza)
      references empleado (idempleado) on delete restrict on update restrict;

alter table ajusteinventario add constraint fk_ajusteinventario_empleadocan foreign key (idempleadocancela)
      references empleado (idempleado) on delete restrict on update restrict;

alter table ajusteinventario add constraint fk_ajusteinventario_tipoajusteinv foreign key (idtipoajusteinventario)
      references tipoajusteinventario (idtipoajusteinventario) on delete restrict on update restrict;
