drop table if exists entregablepuesto;

/*==============================================================*/
/* Table: entregablepuesto                                      */
/*==============================================================*/
create table entregablepuesto
(
   identregablepuesto   int not null auto_increment,
   identregable         int not null,
   idpuesto             smallint not null,
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (identregablepuesto)
);

alter table entregablepuesto add constraint fk_entregablepuesto_puesto foreign key (idpuesto)
      references puesto (idpuesto) on delete restrict on update restrict;

alter table entregablepuesto add constraint fk_reference_168 foreign key (identregable)
      references entregable (identregable) on delete cascade on update restrict;
