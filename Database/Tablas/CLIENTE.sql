drop table if exists cliente;

/*==============================================================*/
/* Table: cliente                                               */
/*==============================================================*/
create table cliente
(
   idcliente            int not null auto_increment,
   nombre               varchar(100) not null,
   calle                varchar(100) not null,
   numexterior          varchar(20) not null,
   numinterior          varchar(20),
   colonia              varchar(50),
   ciudad               varchar(50),
   idmunicipio          smallint not null,
   idestado             smallint not null,
   codigopostal         int not null,
   rfc                  varchar(13) not null,
   personacontacto      varchar(50),
   telefonocontacto     varchar(50),
   correoelectronico    varchar(50),
   cveusocfdi           varchar(3) default 'G03',
   quien                varchar(15) not null,
   cuando               datetime not null,
   nombrecomercial      varchar(100) not null,
   porcentajeiva        decimal(6,2),
   primary key (idcliente)
);

alter table cliente add constraint fk_cliente_municipio foreign key (idestado, idmunicipio)
      references municipio (idestado, idmunicipio) on delete restrict on update restrict;

