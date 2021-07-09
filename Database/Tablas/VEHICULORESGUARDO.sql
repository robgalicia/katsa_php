/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     30/12/2020 11:29:39 a. m.                    */
/*==============================================================*/


/*==============================================================*/
/* Table: vehiculoresguardo                                     */
/*==============================================================*/
create table vehiculoresguardo
(
   idvehiculoresguardo  int not null auto_increment,
   idvehiculo           smallint not null,
   placas               varchar(8),
   fecharesguardo       datetime not null,
   tiporesguardo        char(1) not null comment '<I>nicial, <S>upervision, Cambio <T>emporal',
   idempleadoresguardo  int not null,
   idempleadosupervisor int not null,
   idregion             smallint not null,
   idadscripcion        smallint not null,
   idcliente            int not null,
   kilometrajeultimoservicio int,
   fechaultimoservicio  datetime,
   kilometrajeactual    int not null,
   kilometrajeproximoservicio int,
   observaciones        varchar(1000),
   nombrearchivo        varchar(100),
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idvehiculoresguardo)
);

