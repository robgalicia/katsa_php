/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     30/12/2020 11:29:39 a. m.                    */
/*==============================================================*/


/*==============================================================*/
/* Table: ordencomprafactura                                    */
/*==============================================================*/
create table ordencomprafactura
(
   idordencomprafactura int not null auto_increment,
   idordencompra        int not null,
   fechafactura         datetime not null,
   idproveedor          int not null,
   tipoventa            char(1) not null comment '<C>ontado, <P>lazo (credito)',
   idformapago          smallint not null,
   referenciapago       varchar(20),
   diascredito          smallint,
   fechavencimiento     datetime,
   importetotal         decimal(12,2) not null,
   uuid                 varchar(40),
   nombrearchivoxml     varchar(100),
   nombrearchivopdf     varchar(100),
   observaciones        varchar(100),
   quien                varchar(15) not null,
   cuando               datetime not null,
   fechapagoprogramado  datetime,
   fechapagado          datetime,
   idformapagado        smallint,
   referenciapagado     varchar(20),
   observacionespagado  varchar(100),
   primary key (idordencomprafactura)
);

