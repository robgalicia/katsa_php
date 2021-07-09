drop table if exists ordencompracliente;

/*==============================================================*/
/* Table: ordencompracliente                                    */
/*==============================================================*/
create table ordencompracliente
(
   idordencompracliente int not null auto_increment,
   folioordencompra     varchar(10) not null,
   fecha                datetime not null,
   idcliente            int not null,
   idclientedomiciliofiscal int not null,
   idcotizacion         int not null,
   idtipomoneda         smallint not null,
   subtotal             decimal(12,2) not null,
   porcentajeiva        decimal(6,2) not null,
   importeiva           decimal(12,2) not null,
   importetotal         decimal(12,2) not null,
   observaciones        varchar(100),
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idordencompracliente)
);

alter table ordencompracliente add constraint fk_ordencompracliente_cliente foreign key (idcliente)
      references cliente (idcliente) on delete restrict on update restrict;

alter table ordencompracliente add constraint fk_ordencompracliente_clientedomfis foreign key (idclientedomiciliofiscal)
      references clientedomiciliofiscal (idclientedomiciliofiscal) on delete restrict on update restrict;

alter table ordencompracliente add constraint fk_ordencompracliente_cotizacion foreign key (idcotizacion)
      references cotizacion (idcotizacion) on delete restrict on update restrict;

alter table ordencompracliente add constraint fk_ordencompracliente_tipomoneda foreign key (idtipomoneda)
      references tipomoneda (idtipomoneda) on delete restrict on update restrict;
