drop table if exists consumogasolina;

/*==============================================================*/
/* Table: consumogasolina                                       */
/*==============================================================*/
create table consumogasolina
(
   idconsumogasolina    int not null auto_increment,
   semana               char(2),
   tarjeta              varchar(10),
   fecha                varchar(10),
   servicio             varchar(100),
   responsable          varchar(50),
   vehiculo             varchar(50),
   kilometrajeanterior  varchar(10),
   niveltanqueantes     varchar(10),
   kilometrajecargar    varchar(10),
   niveltanquedespues   varchar(10),
   litros               varchar(10),
   tipocombustible      varchar(10),
   preciolitro          varchar(10),
   preciototal          varchar(10),
   rendimientolitro     varchar(10),
   observaciones        varchar(500),
   kilometrosrecorridos varchar(10),
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idconsumogasolina)
);
