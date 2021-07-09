/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     30/12/2020 11:29:39 a. m.                    */
/*==============================================================*/


/*==============================================================*/
/* Table: vehiculogasolina                                      */
/*==============================================================*/
create table vehiculogasolina
(
   idvehiculogasolina   int not null auto_increment,
   semana               smallint not null,
   fecha                datetime not null,
   idtarjetacombustible smallint,
   idvehiculo           smallint not null,
   idregion             smallint,
   idadscripcion        smallint,
   idcliente            int,
   idempleado           int,
   kilometrajeanterior  int,
   niveltanqueantes     varchar(10),
   kilometrajeactual    int,
   niveltanquedespues   varchar(10),
   idtipocombustible    smallint not null,
   cantidadlitros       decimal(8,2) not null,
   preciolitro          decimal(10,2) not null,
   preciototal          decimal(10,2) not null,
   kilometrosrecorridos int,
   rendimientolitro     decimal(6,2),
   observaciones        varchar(100),
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idvehiculogasolina)
);

