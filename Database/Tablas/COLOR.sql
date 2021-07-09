drop table if exists color;

/*==============================================================*/
/* Table: color                                                 */
/*==============================================================*/
create table color
(
   idcolor              smallint not null auto_increment,
   desccolor            varchar(50) not null,
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idcolor)
);
