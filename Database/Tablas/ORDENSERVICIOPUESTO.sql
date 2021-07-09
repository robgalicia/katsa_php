drop table if exists ordenserviciopuesto;

/*==============================================================*/
/* Table: ordenserviciopuesto                                   */
/*==============================================================*/
create table ordenserviciopuesto
(
   idordenserviciopuesto int not null auto_increment,
   idordenservicio      int not null,
   idpuesto             smallint not null,
   cantidad             smallint not null,
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idordenserviciopuesto)
);

alter table ordenserviciopuesto add constraint fk_ordenserviciopuesto_ordenservicio foreign key (idordenservicio)
      references ordenservicio (idordenservicio) on delete cascade on update restrict;

alter table ordenserviciopuesto add constraint fk_ordenserviciopuesto_puesto foreign key (idpuesto)
      references puesto (idpuesto) on delete restrict on update restrict;
