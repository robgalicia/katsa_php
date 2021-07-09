drop table if exists tipoajusteinventario;

/*==============================================================*/
/* Table: tipoajusteinventario                                  */
/*==============================================================*/
create table tipoajusteinventario
(
   idtipoajusteinventario smallint not null auto_increment,
   desctipoajusteinventario varchar(50) not null,
   tipomovimiento       char(1) not null comment 'Entrada, Salida',
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idtipoajusteinventario)
);
