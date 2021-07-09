/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     30/12/2020 11:29:39 a. m.                    */
/*==============================================================*/


/*==============================================================*/
/* Table: vehiculopoliza                                        */
/*==============================================================*/
create table vehiculopoliza
(
   idvehiculopoliza     int not null auto_increment,
   idvehiculo           smallint not null,
   idaseguradora        smallint not null,
   numpoliza            varchar(15) not null,
   iniciovigencia       datetime not null,
   finalvigencia        datetime not null,
   fechapago            datetime,
   importetotal         decimal(10,2),
   observaciones        varchar(100),
   quien                varchar(15) not null,
   cuando               datetime not null,
   primary key (idvehiculopoliza)
);

