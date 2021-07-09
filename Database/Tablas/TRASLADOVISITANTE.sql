drop table if exists trasladovisitante;

/*==============================================================*/
/* Table: trasladovisitante                                     */
/*==============================================================*/
create table trasladovisitante
(
   idtrasladovisitante  int not null auto_increment,
   idhojatraslado       int not null,
   nombrevisitante      varchar(100),
   empresa              varchar(50),
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idtrasladovisitante)
);

alter table trasladovisitante add constraint fk_trasladovisitante_hojatraslado foreign key (idhojatraslado)
      references hojatraslado (idhojatraslado) on delete cascade on update restrict;