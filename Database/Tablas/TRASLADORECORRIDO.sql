drop table if exists trasladorecorrido;

/*==============================================================*/
/* Table: trasladorecorrido                                     */
/*==============================================================*/
create table trasladorecorrido
(
   idtrasladorecorrido  int not null auto_increment,
   idhojatraslado       int not null,
   fechasalida          datetime,
   fechallegada         datetime,
   vehiculo             varchar(50),
   placas               varchar(8),
   empresavehiculo      varchar(50),
   operador             varchar(50),
   recorrido            varchar(150),
   observaciones        varchar(100),
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idtrasladorecorrido)
);

alter table trasladorecorrido add constraint fk_trasladorecorrido_hojatraslado foreign key (idhojatraslado)
      references hojatraslado (idhojatraslado) on delete cascade on update restrict;