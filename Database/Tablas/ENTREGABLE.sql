drop table if exists entregable;

/*==============================================================*/
/* Table: entregable                                            */
/*==============================================================*/
create table entregable
(
   identregable         int not null auto_increment,
   iddepartamento       smallint not null,
   idcategoria          smallint not null,
   descentregable       varchar(100) not null,
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (identregable)
);

alter table entregable add constraint fk_entregable_categoria foreign key (idcategoria)
      references categoria (idcategoria) on delete restrict on update restrict;

alter table entregable add constraint fk_entregable_departamento foreign key (iddepartamento)
      references departamento (iddepartamento) on delete restrict on update restrict;
