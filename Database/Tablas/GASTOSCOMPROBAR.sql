 drop table if exists gastoscomprobar;

/*==============================================================*/
/* Table: gastoscomprobar                                       */
/*==============================================================*/
create table gastoscomprobar
(
   idgastoscomprobar    int not null auto_increment,
   folio                varchar(12) not null,
   fecha                datetime not null,
   tipogasto            char(1) not null comment 'I - Interna (viaje a lugares de adscripción de la empresa), E - Especial (viaje a otros destinos)',
   lugarviaje           varchar(200) not null,
   idtipoviaje          smallint not null,
   motivoviaje          varchar(200) not null,
   diasviaje            smallint not null,
   fechainicial         datetime not null,
   fechafinal           datetime not null,
   distanciakms         int not null,
   idregion             smallint,
   idadscripcion        smallint,
   iddepartamento       smallint not null,
   idcliente            int,
   idempleadosolicita   int not null,
   idempleadobeneficiario int not null,
   idempleadorevisa     int,
   fecharevision        datetime,
   idempleadoautoriza   int,
   fechaautorizacion    datetime,
   fechacancelacion     datetime,
   observaciones        varchar(1500),
   importetotal         decimal(12,2) not null,
   idestatus            smallint not null,
   fechaentrega         datetime,
   referenciaentrega    varchar(50),
   fechalimitecomprobacion datetime,
   fechacomprobacion    datetime,
   importecomprobado    decimal(12,2),
   idcuentabancaria     smallint,
   comentariosconciliacion varchar(100),
   observacionesrevision varchar(1500),
   quien                varchar(15) not null,
   cuando               datetime not null,
   idempleadovalidacion int,
   fechavalidacion      datetime,
   primary key (idgastoscomprobar)
);

alter table gastoscomprobar add constraint fk_gastoscomprobar_adscripcion foreign key (idadscripcion)
      references adscripcion (idadscripcion) on delete restrict on update restrict;

alter table gastoscomprobar add constraint fk_gastoscomprobar_tipoviaje foreign key (idtipoviaje)
      references tipoviaje (idtipoviaje) on delete restrict on update restrict;

alter table gastoscomprobar add constraint fk_gtscomprobar_cliente foreign key (idcliente)
      references cliente (idcliente) on delete restrict on update restrict;

alter table gastoscomprobar add constraint fk_gtscomprobar_ctabancaria foreign key (idcuentabancaria)
      references cuentabancaria (idcuentabancaria) on delete restrict on update restrict;

alter table gastoscomprobar add constraint fk_gtscomprobar_departamento foreign key (iddepartamento)
      references departamento (iddepartamento) on delete restrict on update restrict;

alter table gastoscomprobar add constraint fk_gtscomprobar_empautoriza foreign key (idempleadoautoriza)
      references empleado (idempleado) on delete restrict on update restrict;

alter table gastoscomprobar add constraint fk_gtscomprobar_empbeneficiario foreign key (idempleadobeneficiario)
      references empleado (idempleado) on delete restrict on update restrict;

alter table gastoscomprobar add constraint fk_gtscomprobar_empleadoval foreign key (idempleadovalidacion)
      references empleado (idempleado) on delete restrict on update restrict;

alter table gastoscomprobar add constraint fk_gtscomprobar_emprevisa foreign key (idempleadorevisa)
      references empleado (idempleado) on delete restrict on update restrict;

alter table gastoscomprobar add constraint fk_gtscomprobar_empsolicita foreign key (idempleadosolicita)
      references empleado (idempleado) on delete restrict on update restrict;

alter table gastoscomprobar add constraint fk_fk_gtscomprobar_estatus foreign key (idestatus)
      references estatus (idestatus) on delete restrict on update restrict;

alter table gastoscomprobar add constraint fk_gtscomprobar_region foreign key (idregion)
      references region (idregion) on delete restrict on update restrict;
