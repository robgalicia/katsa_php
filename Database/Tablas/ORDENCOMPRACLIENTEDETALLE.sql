drop table if exists ordencompraclientedetalle;

/*==============================================================*/
/* Table: ordencompraclientedetalle                             */
/*==============================================================*/
create table ordencompraclientedetalle
(
   idordencompraclientedetalle int not null auto_increment,
   idordencompracliente int not null,
   item                 smallint not null,
   fechaentrega         datetime,
   idservicio           int not null,
   descservicio         varchar(1000) not null,
   idregion             smallint not null,
   idadscripcion        smallint not null,
   lugarservicio        varchar(100),
   fechainicial         datetime,
   fechafinal           datetime,
   cantidad             int not null,
   preciounitario       decimal(12,2) not null,
   importetotal         decimal(12,2) not null,
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idordencompraclientedetalle)
);

alter table ordencompraclientedetalle add constraint fk_ordcompracltedetalle_ordcompraclte foreign key (idordencompracliente)
      references ordencompracliente (idordencompracliente) on delete cascade on update restrict;

alter table ordencompraclientedetalle add constraint fk_ordcompracltedetalle_servicio foreign key (idservicio)
      references servicio (idservicio) on delete restrict on update restrict;

alter table ordencompraclientedetalle add constraint fk_ordcompracltedet_adscripcion foreign key (idadscripcion)
      references adscripcion (idadscripcion) on delete restrict on update restrict;

alter table ordencompraclientedetalle add constraint fk_ordcompracltedet_region foreign key (idregion)
      references region (idregion) on delete restrict on update restrict;
