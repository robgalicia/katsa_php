drop table if exists adscripcion;

/*==============================================================*/
/* Table: adscripcion                                           */
/*==============================================================*/
create table adscripcion
(
   idadscripcion        smallint not null auto_increment,
   descadscripcion      varchar(50) not null,
   idregion             smallint not null,
   ubicacion            varchar(100),
   fechainicio          datetime not null,
   fechabaja            datetime,
   calle                varchar(50),
   numexterior          varchar(20),
   numinterior          varchar(20),
   entrecalle           varchar(50),
   ylacalle             varchar(50),
   colonia              varchar(50),
   codigopostal         int,
   ciudad               varchar(30),
   idmunicipio          smallint not null,
   idestado             smallint not null,
   personacontacto      varchar(50),
   telefonocontacto     varchar(30),
   correoelectronico    varchar(50),
   quien                varchar(15) not null,
   cuando               datetime not null,
   distanciakms         int,
   primary key (idadscripcion)
);

alter table adscripcion add constraint fk_adscripcion_municipio foreign key (idestado, idmunicipio)
      references municipio (idestado, idmunicipio) on delete restrict on update restrict;

alter table adscripcion add constraint fk_adscripcion_region foreign key (idregion)
      references region (idregion) on delete restrict on update restrict;
