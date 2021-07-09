drop table if exists partida;

/*==============================================================*/
/* Table: partida                                               */
/*==============================================================*/
create table partida
(
   idpartida            smallint not null auto_increment,
   descpartida          varchar(50) not null,
   cuentacontable       varchar(20),
   tipopartida          char(1) not null default 'G' comment 'Costos, Gastos, Inversiones',
   quien                varchar(15) not null,
   cuando               datetime not null,
   viaticos             char(1),
   importeunitario      decimal(10,2),
   primary key (idpartida)
);
