drop table if exists ajusteinventariodetalle;

/*==============================================================*/
/* Table: ajusteinventariodetalle                               */
/*==============================================================*/
create table ajusteinventariodetalle
(
   idajusteinventariodetalle int not null auto_increment,
   idajusteinventario   int not null,
   idarticulo           int not null,
   cantidad             int not null,
   costounitario        decimal(10,2) not null,
   costototal           decimal(10,2) not null,
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idajusteinventariodetalle)
);

alter table ajusteinventariodetalle add constraint fk_ajusteinvdetalle_ajusteinv foreign key (idajusteinventario)
      references ajusteinventario (idajusteinventario) on delete cascade on update restrict;

alter table ajusteinventariodetalle add constraint fk_ajusteinvdetalle_articulo foreign key (idarticulo)
      references articulo (idarticulo) on delete restrict on update restrict;
