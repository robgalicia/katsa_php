drop table if exists subcontrata;

/*==============================================================*/
/* Table: subcontrata                                           */
/*==============================================================*/
create table subcontrata
(
   idsubcontrata        smallint not null auto_increment,
   nombreempresa        varchar(50) not null,
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idsubcontrata)
);

alter table subcontrata comment 'Empresa subcontratada por el cliente';
