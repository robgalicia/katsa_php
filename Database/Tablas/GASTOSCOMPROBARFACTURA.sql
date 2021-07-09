drop table if exists gastoscomprobarfactura;

/*==============================================================*/
/* Table: gastoscomprobarfactura                                */
/*==============================================================*/
create table gastoscomprobarfactura
(
   idgastoscomprobarfactura int not null auto_increment,
   idgastoscomprobardetalle int not null,
   tipocomprobante      char(1) not null default 'F' comment 'F - Factura, T - Ticket, D - Depósito Bancario (reposición de gastos)',
   foliocomprobante     varchar(20),
   fecha                datetime not null,
   proveedor            varchar(100) not null,
   rfcproveedor         varchar(13),
   uuid                 varchar(40),
   nombrearchivoxml     varchar(100),
   nombrearchivopdf     varchar(100),
   observaciones        varchar(100),
   importetotal         decimal(12,2) not null,
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idgastoscomprobarfactura)
);

alter table gastoscomprobarfactura add constraint fk_gtscomprobarfac_gtscomprobardet foreign key (idgastoscomprobardetalle)
      references gastoscomprobardetalle (idgastoscomprobardetalle) on delete cascade on update restrict;


