drop table if exists gastoscomprobardetalle;

/*==============================================================*/
/* Table: gastoscomprobardetalle                                */
/*==============================================================*/
create table gastoscomprobardetalle
(
   idgastoscomprobardetalle int not null auto_increment,
   idgastoscomprobar    int not null,
   idpartida            smallint not null,
   cantidad             int not null,
   importe              decimal(10,2) not null,
   total                decimal(10,2) not null,
   justificacion        varchar(100),
   quien                varchar(15) not null,
   cuando               datetime not null,
   cantidadautoriza     int,
   importeautoriza      decimal(10,2),
   totalautoriza        decimal(10,2),
   primary key (idgastoscomprobardetalle)
);

alter table gastoscomprobardetalle add constraint fk_gastoscompdet_gastoscomp foreign key (idgastoscomprobar)
      references gastoscomprobar (idgastoscomprobar) on delete cascade;

alter table gastoscomprobardetalle add constraint fk_gastoscompdet_partida foreign key (idpartida)
      references partida (idpartida) on delete restrict on update restrict;
