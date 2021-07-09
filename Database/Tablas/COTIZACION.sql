drop table if exists cotizacion;

/*==============================================================*/
/* Table: cotizacion                                            */
/*==============================================================*/
create table cotizacion
(
   idcotizacion         int not null auto_increment,
   fecha                datetime not null,
   folio                varchar(12) not null,
   lugarexpedicion      varchar(50),
   asunto               varchar(100),
   idcliente            int not null,
   personacontacto      varchar(100),
   personacopia         varchar(100),
   tiposervicio         varchar(100),
   lugarservicio        varchar(100),
   ubicacionlugar       varchar(100),
   idempleadoelabora    int not null,
   idempleadofirma      int not null,
   idtipomoneda         smallint not null,
   tipocambio           decimal(6,2) not null,
   fechainicio          datetime not null,
   fechafinal           datetime not null,
   importetotal         decimal(12,2),
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idcotizacion)
);

alter table cotizacion add constraint fk_cotizacion_cliente foreign key (idcliente)
      references cliente (idcliente) on delete restrict on update restrict;

alter table cotizacion add constraint fk_cotizacion_empelabora foreign key (idempleadoelabora)
      references empleado (idempleado) on delete restrict on update restrict;

alter table cotizacion add constraint fk_cotizacion_empfirma foreign key (idempleadofirma)
      references empleado (idempleado) on delete restrict on update restrict;

alter table cotizacion add constraint fk_cotizacion_tipomoneda foreign key (idtipomoneda)
      references tipomoneda (idtipomoneda) on delete restrict on update restrict;