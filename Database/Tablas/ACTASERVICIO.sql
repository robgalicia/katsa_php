drop table if exists actaservicio;

/*==============================================================*/
/* Table: actaservicio                                          */
/*==============================================================*/
create table actaservicio
(
   idactaservicio       int not null auto_increment,
   idordenservicio      int not null,
   numeroacta           int not null,
   fechaacta            datetime not null,
   tipoacta             char(1) not null comment 'Inicio, Conclusion, Suspension, Reactivacion',
   observaciones        varchar(200),
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idactaservicio)
);

alter table actaservicio add constraint fk_actaservicio_ordenservicio foreign key (idordenservicio)
      references ordenservicio (idordenservicio) on delete cascade on update restrict;
