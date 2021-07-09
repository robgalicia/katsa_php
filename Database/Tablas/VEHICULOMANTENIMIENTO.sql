drop table if exists vehiculomantenimiento;

/*==============================================================*/
/* Table: vehiculomantenimiento                                 */
/*==============================================================*/
create table vehiculomantenimiento
(
   idvehiculomantenimiento int not null auto_increment,
   idvehiculo           smallint not null,
   idproveedor          int not null,
   idempleadocomision   int not null,
   fecha                datetime not null,
   kilometrajeactual    int not null,
   descservicio         varchar(100) not null,
   subtotal             decimal(10,2) not null,
   iva                  decimal(10,2) not null,
   importetotal         decimal(10,2) not null,
   observaciones        varchar(500),
   quien                varchar(15) not null,
   cuando               datetime not null,
   kmsproxmantenimiento int,
   fechapago            datetime,
   referenciapago       varchar(30),
   primary key (idvehiculomantenimiento)
);

alter table vehiculomantenimiento add constraint fk_vehiculomtto_empleadocom foreign key (idempleadocomision)
      references empleado (idempleado) on delete restrict on update restrict;

alter table vehiculomantenimiento add constraint fk_vehiculomtto_proveedor foreign key (idproveedor)
      references proveedor (idproveedor) on delete restrict on update restrict;

alter table vehiculomantenimiento add constraint fk_vehmantenimiento_vehiculo foreign key (idvehiculo)
      references vehiculo (idvehiculo) on delete cascade;
