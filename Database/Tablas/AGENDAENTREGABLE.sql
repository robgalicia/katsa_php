drop table if exists agendaentregable;

/*==============================================================*/
/* Table: agendaentregable                                      */
/*==============================================================*/
create table agendaentregable
(
   idagendaentregable   int not null auto_increment,
   identregable         int not null,
   idpuesto             smallint not null,
   fechacompromiso      datetime not null,
   cantidadentregable   smallint not null,
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idagendaentregable)
);

alter table agendaentregable add constraint fk_agendaentregable_entregable foreign key (identregable)
      references entregable (identregable) on delete restrict on update restrict;

alter table agendaentregable add constraint fk_agendaentregable_puesto foreign key (idpuesto)
      references puesto (idpuesto) on delete restrict on update restrict;
