drop table if exists vehiculotenencia;

/*==============================================================*/
/* Table: vehiculotenencia                                      */
/*==============================================================*/
create table vehiculotenencia
(
   idvehiculotenencia   int not null auto_increment,
   idvehiculo           smallint not null,
   fechapago            datetime not null,
   importepagado        decimal(10,2) not null,
   fechavigencia        datetime not null,
   placas               varchar(8) not null,
   foliotarjeta         varchar(10) not null,
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idvehiculotenencia)
);

alter table vehiculotenencia add constraint fk_vehtenencia_vehiculo foreign key (idvehiculo)
      references vehiculo (idvehiculo) on delete cascade on update restrict;

