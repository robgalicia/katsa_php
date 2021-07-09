drop table if exists facturacliente;

/*==============================================================*/
/* Table: facturacliente                                        */
/*==============================================================*/
create table facturacliente
(
   idfacturacliente     int not null auto_increment,
   idordencompraclientedetalle int not null,
   centrocostos         int,
   proyecto             varchar(50),
   ubicacion            varchar(50),
   servicio             varchar(50),
   mesfactura           smallint,
   fechainicioservicio  datetime,
   fechafinalservicio   datetime,
   foliofactura         int,
   fechafactura         datetime not null,
   terminos             varchar(30),
   fechavencimiento     datetime not null,
   subtotal             decimal(12,2),
   porcentajeiva        decimal(6,2),
   importeiva           decimal(12,2),
   importetotal         decimal(12,2) not null,
   idtipomoneda         smallint,
   fechaingreso         datetime,
   fechaprogramado      datetime,
   fechapago            datetime,
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idfacturacliente)
);

alter table facturacliente add constraint fk_facturacliente_ordencomcltedetalle foreign key (idordencompraclientedetalle)
      references ordencompraclientedetalle (idordencompraclientedetalle) on delete cascade on update restrict;

alter table facturacliente add constraint fk_reference_198 foreign key (idtipomoneda)
      references tipomoneda (idtipomoneda) on delete restrict on update restrict;
