drop table if exists vehiculo;

/*==============================================================*/
/* Table: vehiculo                                              */
/*==============================================================*/
create table vehiculo
(
   idvehiculo           smallint not null auto_increment,
   idmarcavehiculo      smallint not null,
   submarca             varchar(50) not null,
   aniomodelo           smallint not null,
   placas               varchar(8),
   cilindros            smallint,
   numserie             varchar(20),
   nummotor             varchar(10),
   tipotransmision      char(3) comment 'AUT (automatica), STD (standard)',
   idtipocombustible    smallint not null,
   capacidadtanque      smallint,
   numeconomico         smallint,
   tarjetacombustible   int,
   idregionactual       smallint,
   idadscripcionactual  smallint,
   idclienteactual      int,
   idempleadoresguardo  int,
   esarrendado          char(1) not null,
   idarrendadora        smallint,
   kilometrajeactual    int,
   fechakilometraje     datetime,
   kilometrajemtto      int,
   fechaultimomtto      datetime,
   idestatus            smallint not null,
   observaciones        varchar(100),
   quien                varchar(15) not null,
   cuando               datetime not null,
   idcolor              smallint,
   tienegps             char(1),
   proveedorgps         varchar(50),
   primary key (idvehiculo)
);

alter table vehiculo add constraint fk_vehiculo_adscripcion foreign key (idadscripcionactual)
      references adscripcion (idadscripcion) on delete restrict on update restrict;

alter table vehiculo add constraint fk_vehiculo_arrendadora foreign key (idarrendadora)
      references arrendadora (idarrendadora) on delete restrict on update restrict;

alter table vehiculo add constraint fk_vehiculo_cliente foreign key (idclienteactual)
      references cliente (idcliente) on delete restrict on update restrict;

alter table vehiculo add constraint fk_vehiculo_color foreign key (idcolor)
      references color (idcolor) on delete restrict on update restrict;

alter table vehiculo add constraint fk_vehiculo_empleado foreign key (idempleadoresguardo)
      references empleado (idempleado) on delete restrict on update restrict;

alter table vehiculo add constraint fk_vehiculo_estatus foreign key (idestatus)
      references estatus (idestatus) on delete restrict on update restrict;

alter table vehiculo add constraint fk_vehiculo_marcavehiculo foreign key (idmarcavehiculo)
      references marcavehiculo (idmarcavehiculo);

alter table vehiculo add constraint fk_vehiculo_region foreign key (idregionactual)
      references region (idregion) on delete restrict on update restrict;

alter table vehiculo add constraint fk_vehiculo_tipocombustible foreign key (idtipocombustible)
      references tipocombustible (idtipocombustible) on delete restrict on update restrict;

