drop table if exists ingeniero;

/*==============================================================*/
/* Table: ingeniero                                             */
/*==============================================================*/
create table ingeniero
(
   idingeniero          int not null auto_increment,
   nombre               varchar(50) not null,
   idcliente            int not null,
   idsubcontrata        smallint,
   activo               tinyint not null comment 'Activo, Baja',
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idingeniero)
);

alter table ingeniero comment 'Ingenieros del cliente o subcontratados';

alter table ingeniero add constraint fk_ingeniero_cliente foreign key (idcliente)
      references cliente (idcliente) on delete cascade on update restrict;

alter table ingeniero add constraint fk_reference_175 foreign key (idsubcontrata)
      references subcontrata (idsubcontrata) on delete restrict on update restrict;
