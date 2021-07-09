drop table if exists asistenciaingeniero;

/*==============================================================*/
/* Table: asistenciaingeniero                                   */
/*==============================================================*/
create table asistenciaingeniero
(
   idasistenciaingeniero int not null auto_increment,
   idregion             smallint not null,
   idadscripcion        smallint not null,
   idcliente            int not null,
   fecha                datetime not null,
   grupo                tinyint not null,
   tipolista            char(1) not null comment 'Subida, Bajada',
   idingeniero          int not null,
   tipovehiculo         char(1) not null comment 'Urban, Vehiculo propio, Acompañante',
   numeconomico         varchar(5),
   idempleadoregistra   int not null,
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idasistenciaingeniero)
);

alter table asistenciaingeniero comment 'Asistencia de ingenieros de los clientes en los parques';

alter table asistenciaingeniero add constraint fk_asistenciaing_adscripcion foreign key (idadscripcion)
      references adscripcion (idadscripcion) on delete restrict on update restrict;

alter table asistenciaingeniero add constraint fk_asistenciaing_cliente foreign key (idcliente)
      references cliente (idcliente) on delete restrict on update restrict;

alter table asistenciaingeniero add constraint fk_asistenciaing_empleado foreign key (idempleadoregistra)
      references empleado (idempleado) on delete restrict on update restrict;

alter table asistenciaingeniero add constraint fk_asistenciaing_ingeniero foreign key (idingeniero)
      references ingeniero (idingeniero) on delete restrict on update restrict;

alter table asistenciaingeniero add constraint fk_asistenciaing_region foreign key (idregion)
      references region (idregion) on delete restrict on update restrict;
