/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     30/12/2020 11:29:39 a. m.                    */
/*==============================================================*/


drop table if exists adscripcion;

drop table if exists almacen;

drop table if exists arrendadora;

drop table if exists articulo;

drop table if exists aseguradora;

drop table if exists banco;

drop table if exists cliente;

drop table if exists cuentabancaria;

drop table if exists departamento;

drop table if exists diafestivo;

drop table if exists empleado;

drop table if exists empleadoadscripcion;

drop table if exists empleadocontrato;

drop table if exists empleadodocumento;

drop table if exists empleadofoto;

drop table if exists empleadoincidencia;

drop table if exists empleadoreferencia;

drop table if exists empresaoutsourcing;

drop table if exists estado;

drop table if exists estadocivil;

drop table if exists estatus;

drop table if exists formapago;

drop table if exists formatolegal;

drop table if exists gastoscomprobar;

drop table if exists gastoscomprobardetalle;

drop table if exists gastoscomprobarfactura;

drop table if exists gradoescolaridad;

drop table if exists inventario;

drop table if exists kardex;

drop table if exists marcavehiculo;

drop table if exists menu;

drop table if exists municipio;

drop table if exists nacionalidad;

drop table if exists oficinanegocio;

drop table if exists ordencompra;

drop table if exists ordencompradetalle;

drop table if exists ordencomprafactura;

drop table if exists parametros;

drop table if exists partida;

drop table if exists profesion;

drop table if exists proveedor;

drop table if exists puesto;

drop table if exists puestofuncion;

drop table if exists region;

drop table if exists requisicion;

drop table if exists requisiciondetalle;

drop table if exists salidainventario;

drop table if exists salidainventariodetalle;

drop table if exists tarjetacombustible;

drop table if exists tipocombustible;

drop table if exists tipodocumento;

drop table if exists tipoimagen;

drop table if exists tipoincidenciaemp;

drop table if exists tipoincidenciaveh;

drop table if exists tipoparentesco;

drop table if exists tiposalidainventario;

drop table if exists tiposangre;

drop table if exists tmpestadofuerzaexcel;

drop table if exists unidadmedida;

drop table if exists usuario;

drop table if exists usuariomenu;

drop table if exists vehiculo;

drop table if exists vehiculogasolina;

drop table if exists vehiculoincidencia;

drop table if exists vehiculomantenimiento;

drop table if exists vehiculopoliza;

drop table if exists vehiculoresguardo;

drop table if exists vehiculotenencia;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

mysql> source <file_name>;

alter table adscripcion add constraint fk_adscripcion_municipio foreign key (idestado, idmunicipio)
      references municipio (idestado, idmunicipio) on delete restrict on update restrict;

alter table adscripcion add constraint fk_adscripcion_region foreign key (idregion)
      references region (idregion) on delete restrict on update restrict;

alter table almacen add constraint fk_almacen_region foreign key (idregion)
      references region (idregion) on delete restrict on update restrict;

alter table arrendadora add constraint fk_arrendadora_municipio foreign key (idestado, idmunicipio)
      references municipio (idestado, idmunicipio) on delete restrict on update restrict;

alter table articulo add constraint fk_articulo_partidacto foreign key (idpartidacto)
      references partida (idpartida) on delete restrict on update restrict;

alter table articulo add constraint fk_articulo_partidagto foreign key (idpartidagto)
      references partida (idpartida) on delete restrict on update restrict;

alter table articulo add constraint fk_articulo_partidainv foreign key (idpartidainv)
      references partida (idpartida) on delete restrict on update restrict;

alter table articulo add constraint fk_articulo_proveedor foreign key (idproveedor)
      references proveedor (idproveedor) on delete restrict on update restrict;

alter table articulo add constraint fk_articulo_unidadmedida foreign key (idunidadmedida)
      references unidadmedida (idunidadmedida) on delete restrict on update restrict;

alter table cliente add constraint fk_cliente_municipio foreign key (idestado, idmunicipio)
      references municipio (idestado, idmunicipio) on delete restrict on update restrict;

alter table cuentabancaria add constraint fk_cuentabancaria_banco foreign key (idbanco)
      references banco (idbanco) on delete restrict on update restrict;

alter table empleado add constraint fk_empleado_adscripcion foreign key (idadscripcionactual)
      references adscripcion (idadscripcion) on delete restrict on update restrict;

alter table empleado add constraint fk_empleado_banco foreign key (idbanco)
      references banco (idbanco) on delete restrict on update restrict;

alter table empleado add constraint fk_empleado_cliente foreign key (idclienteactual)
      references cliente (idcliente) on delete restrict on update restrict;

alter table empleado add constraint fk_empleado_departamento foreign key (iddepartamento)
      references departamento (iddepartamento) on delete restrict on update restrict;

alter table empleado add constraint fk_empleado_empresaout foreign key (idempresaoutsourcing)
      references empresaoutsourcing (idempresaoutsourcing) on delete restrict on update restrict;

alter table empleado add constraint fk_empleado_estadocivil foreign key (idestadocivil)
      references estadocivil (idestadocivil) on delete restrict on update restrict;

alter table empleado add constraint fk_empleado_estatus foreign key (idestatus)
      references estatus (idestatus) on delete restrict on update restrict;

alter table empleado add constraint fk_empleado_estatusregsnsp foreign key (idestatusregsnsp)
      references estatus (idestatus) on delete restrict on update restrict;

alter table empleado add constraint fk_empleado_gradoescolaridad foreign key (idgradoescolaridad)
      references gradoescolaridad (idgradoescolaridad) on delete restrict on update restrict;

alter table empleado add constraint fk_empleado_municipio foreign key (idestado, idmunicipio)
      references municipio (idestado, idmunicipio) on delete restrict on update restrict;

alter table empleado add constraint fk_empleado_nacionalidad foreign key (idnacionalidad)
      references nacionalidad (idnacionalidad) on delete restrict on update restrict;

alter table empleado add constraint fk_empleado_profesion foreign key (idprofesion)
      references profesion (idprofesion) on delete restrict on update restrict;

alter table empleado add constraint fk_empleado_puestoorg foreign key (idpuestoorganigrama)
      references puesto (idpuesto) on delete restrict on update restrict;

alter table empleado add constraint fk_empleado_puestoreg foreign key (idpuestoregistro)
      references puesto (idpuesto) on delete restrict on update restrict;

alter table empleado add constraint fk_empleado_puestotab foreign key (idpuestotabulador)
      references puesto (idpuesto);

alter table empleado add constraint fk_empleado_region foreign key (idregionactual)
      references region (idregion) on delete restrict on update restrict;

alter table empleado add constraint fk_empleado_tiposangre foreign key (idtiposangre)
      references tiposangre (idtiposangre) on delete restrict on update restrict;

alter table empleadoadscripcion add constraint fk_empadscripcionaut_empleado foreign key (idempleadoautoriza)
      references empleado (idempleado) on delete cascade on update restrict;

alter table empleadoadscripcion add constraint fk_empleadoadscripcion_adscripcion foreign key (idadscripcion)
      references adscripcion (idadscripcion) on delete restrict on update restrict;

alter table empleadoadscripcion add constraint fk_empleadoadscripcion_cliente foreign key (idcliente)
      references cliente (idcliente) on delete restrict on update restrict;

alter table empleadoadscripcion add constraint fk_empleadoadscripcion_empleado foreign key (idempleado)
      references empleado (idempleado) on delete cascade on update restrict;

alter table empleadoadscripcion add constraint fk_empleadoadscripcion_puesto foreign key (idpuesto)
      references puesto (idpuesto) on delete restrict on update restrict;

alter table empleadoadscripcion add constraint fk_empleadoadscripcion_region foreign key (idregion)
      references region (idregion) on delete restrict on update restrict;

alter table empleadocontrato add constraint fk_empleadocontrato_empleado foreign key (idempleado)
      references empleado (idempleado) on delete cascade on update restrict;

alter table empleadodocumento add constraint fk_empleadodocto_empleado foreign key (idempleado)
      references empleado (idempleado) on delete cascade on update restrict;

alter table empleadodocumento add constraint fk_empleadodocto_tipodocto foreign key (idtipodocumento)
      references tipodocumento (idtipodocumento) on delete restrict on update restrict;

alter table empleadofoto add constraint fk_empleadofoto_empleado foreign key (idempleado)
      references empleado (idempleado) on delete cascade on update restrict;

alter table empleadofoto add constraint fk_empleadofoto_tipoimagen foreign key (idtipoimagen)
      references tipoimagen (idtipoimagen) on delete restrict on update restrict;

alter table empleadoincidencia add constraint fk_empleadoincidencia_empleado foreign key (idempleado)
      references empleado (idempleado) on delete cascade on update restrict;

alter table empleadoincidencia add constraint fk_empleadoincidencia_empleadoreg foreign key (idempleadoregistra)
      references empleado (idempleado) on delete restrict on update restrict;

alter table empleadoincidencia add constraint fk_empleadoincidencia_tipoincidencia foreign key (idtipoincidenciaemp)
      references tipoincidenciaemp (idtipoincidenciaemp) on delete restrict on update restrict;

alter table empleadoreferencia add constraint fk_empleadoreferencia_estado foreign key (idestado)
      references estado (idestado) on delete restrict on update restrict;

alter table empleadoreferencia add constraint fk_empleadoref_empleado foreign key (idempleado)
      references empleado (idempleado) on delete cascade on update restrict;

alter table empleadoreferencia add constraint fk_empleadoref_tipoparentesco foreign key (idtipoparentesco)
      references tipoparentesco (idtipoparentesco) on delete restrict on update restrict;

alter table empresaoutsourcing add constraint fk_empresaout_municipio foreign key (idestado, idmunicipio)
      references municipio (idestado, idmunicipio) on delete restrict on update restrict;

alter table gastoscomprobar add constraint fk_gtscomprobar_cliente foreign key (idcliente)
      references cliente (idcliente) on delete restrict on update restrict;

alter table gastoscomprobar add constraint fk_gtscomprobar_ctabancaria foreign key (idcuentabancaria)
      references cuentabancaria (idcuentabancaria) on delete restrict on update restrict;

alter table gastoscomprobar add constraint fk_gtscomprobar_departamento foreign key (iddepartamento)
      references departamento (iddepartamento) on delete restrict on update restrict;

alter table gastoscomprobar add constraint fk_gtscomprobar_empautoriza foreign key (idempleadoautoriza)
      references empleado (idempleado) on delete restrict on update restrict;

alter table gastoscomprobar add constraint fk_gtscomprobar_empbeneficiario foreign key (idempleadobeneficiario)
      references empleado (idempleado) on delete restrict on update restrict;

alter table gastoscomprobar add constraint fk_gtscomprobar_emprevisa foreign key (idempleadorevisa)
      references empleado (idempleado) on delete restrict on update restrict;

alter table gastoscomprobar add constraint fk_gtscomprobar_empsolicita foreign key (idempleadosolicita)
      references empleado (idempleado) on delete restrict on update restrict;

alter table gastoscomprobar add constraint fk_fk_gtscomprobar_estatus foreign key (idestatus)
      references estatus (idestatus) on delete restrict on update restrict;

alter table gastoscomprobar add constraint fk_gtscomprobar_region foreign key (idregion)
      references region (idregion) on delete restrict on update restrict;

alter table gastoscomprobardetalle add constraint fk_gastoscompdet_gastoscomp foreign key (idgastoscomprobar)
      references gastoscomprobar (idgastoscomprobar) on delete cascade;

alter table gastoscomprobardetalle add constraint fk_gastoscompdet_partida foreign key (idpartida)
      references partida (idpartida) on delete restrict on update restrict;

alter table gastoscomprobarfactura add constraint fk_gtscomprobarfac_gtscomprobardet foreign key (idgastoscomprobardetalle)
      references gastoscomprobardetalle (idgastoscomprobardetalle) on delete cascade on update restrict;

alter table inventario add constraint fk_inventario_articulo foreign key (idarticulo)
      references articulo (idarticulo) on delete restrict on update restrict;

alter table inventario add constraint fk_inventario_proveedor foreign key (idproveedor)
      references proveedor (idproveedor) on delete restrict on update restrict;

alter table inventario add constraint fk_reference_118 foreign key (idalmacen)
      references almacen (idalmacen) on delete restrict on update restrict;

alter table kardex add constraint fk_kardex_almacen foreign key (idalmacen)
      references almacen (idalmacen) on delete restrict on update restrict;

alter table kardex add constraint fk_kardex_articulo foreign key (idarticulo)
      references articulo (idarticulo) on delete restrict on update restrict;

alter table municipio add constraint fk_municipio_estado foreign key (idestado)
      references estado (idestado);

alter table oficinanegocio add constraint fk_oficinanegocio_municipio foreign key (idestado, idmunicipio)
      references municipio (idestado, idmunicipio);

alter table ordencompra add constraint fk_ordencompra_departamento foreign key (iddepartamento)
      references departamento (iddepartamento) on delete restrict on update restrict;

alter table ordencompra add constraint fk_ordencompra_empleadoordena foreign key (idempleadoordena)
      references empleado (idempleado) on delete restrict on update restrict;

alter table ordencompra add constraint fk_ordencompra_empleadorecibe foreign key (idempleadorecibe)
      references empleado (idempleado) on delete restrict on update restrict;

alter table ordencompra add constraint fk_ordencompra_estatus foreign key (idestatus)
      references estatus (idestatus) on delete restrict on update restrict;

alter table ordencompra add constraint fk_ordencompra_proveedor foreign key (idproveedor)
      references proveedor (idproveedor) on delete restrict on update restrict;

alter table ordencompra add constraint fk_ordencompra_region foreign key (idregion)
      references region (idregion) on delete restrict on update restrict;

alter table ordencompra add constraint fk_ordencompra_requisicion foreign key (idrequisicion)
      references requisicion (idrequisicion) on delete restrict on update restrict;

alter table ordencompradetalle add constraint fk_ordencompradet_articulo foreign key (idarticulo)
      references articulo (idarticulo) on delete restrict on update restrict;

alter table ordencompradetalle add constraint fk_ordencompradet_ordencompra foreign key (idordencompra)
      references ordencompra (idordencompra) on delete cascade on update restrict;

alter table ordencomprafactura add constraint fk_ordencomprafac_formapagado foreign key (idformapagado)
      references formapago (idformapago) on delete restrict on update restrict;

alter table ordencomprafactura add constraint fk_ordencomprafac_formapago foreign key (idformapago)
      references formapago (idformapago) on delete restrict on update restrict;

alter table ordencomprafactura add constraint fk_ordencomprafac_ordencompra foreign key (idordencompra)
      references ordencompra (idordencompra) on delete restrict on update restrict;

alter table ordencomprafactura add constraint fk_ordencomprafac_proveedor foreign key (idproveedor)
      references proveedor (idproveedor) on delete restrict on update restrict;

alter table proveedor add constraint fk_proveedor_banco foreign key (idbancodeposito)
      references banco (idbanco) on delete restrict on update restrict;

alter table proveedor add constraint fk_proveedor_estado foreign key (idestado)
      references estado (idestado) on delete restrict on update restrict;

alter table puestofuncion add constraint fk_puestofuncio_puesto foreign key (idpuesto)
      references puesto (idpuesto) on delete cascade on update restrict;

alter table requisicion add constraint fk_requisicion_cliente foreign key (idcliente)
      references cliente (idcliente) on delete restrict on update restrict;

alter table requisicion add constraint fk_requisicion_departamento foreign key (iddepartamento)
      references departamento (iddepartamento) on delete restrict on update restrict;

alter table requisicion add constraint fk_requisicion_empleadoaut foreign key (idempleadoautoriza)
      references empleado (idempleado) on delete restrict on update restrict;

alter table requisicion add constraint fk_requisicion_empleadorev foreign key (idempleadorevisa)
      references empleado (idempleado) on delete restrict on update restrict;

alter table requisicion add constraint fk_requisicion_empleadosol foreign key (idempleadosolicita)
      references empleado (idempleado) on delete restrict on update restrict;

alter table requisicion add constraint fk_requisicion_estatus foreign key (idestatus)
      references estatus (idestatus) on delete restrict on update restrict;

alter table requisicion add constraint fk_requisicion_region foreign key (idregion)
      references region (idregion) on delete restrict on update restrict;

alter table requisiciondetalle add constraint fk_requisiciondet_articulo foreign key (idarticulo)
      references articulo (idarticulo) on delete restrict on update restrict;

alter table requisiciondetalle add constraint fk_requisiciondet_proveedor foreign key (idproveedor)
      references proveedor (idproveedor) on delete restrict on update restrict;

alter table requisiciondetalle add constraint fk_requisiciondet_requisicion foreign key (idrequisicion)
      references requisicion (idrequisicion) on delete cascade on update restrict;

alter table salidainventario add constraint fk_salidainv_almacen foreign key (idalmacen)
      references almacen (idalmacen) on delete restrict on update restrict;

alter table salidainventario add constraint fk_salidainv_empleadoaut foreign key (idempleadoautoriza)
      references empleado (idempleado) on delete restrict on update restrict;

alter table salidainventario add constraint fk_salidainv_empleadocan foreign key (idempleadocancela)
      references empleado (idempleado) on delete restrict on update restrict;

alter table salidainventario add constraint fk_salidainv_tiposalidainv foreign key (idtiposalidainventario)
      references tiposalidainventario (idtiposalidainventario) on delete restrict on update restrict;

alter table salidainventariodetalle add constraint fk_salidainvdet_articulo foreign key (idarticulo)
      references articulo (idarticulo) on delete restrict on update restrict;

alter table salidainventariodetalle add constraint fk_salidainvdet_salidainv foreign key (idsalidainventario)
      references salidainventario (idsalidainventario) on delete cascade on update restrict;

alter table tarjetacombustible add constraint fk_tarjetacombustible_empleado foreign key (idempleadoresguardo)
      references empleado (idempleado);

alter table usuario add constraint fk_usuario_empleado foreign key (idempleado)
      references empleado (idempleado);

alter table usuariomenu add constraint fk_usuariomenu_menu foreign key (menuid)
      references menu (menuid) on delete cascade;

alter table usuariomenu add constraint fk_usuariomenu_usuario foreign key (idusuario)
      references usuario (idusuario) on delete cascade;

alter table vehiculo add constraint fk_vehiculo_adscripcion foreign key (idadscripcionactual)
      references adscripcion (idadscripcion) on delete restrict on update restrict;

alter table vehiculo add constraint fk_vehiculo_arrendadora foreign key (idarrendadora)
      references arrendadora (idarrendadora) on delete restrict on update restrict;

alter table vehiculo add constraint fk_vehiculo_cliente foreign key (idclienteactual)
      references cliente (idcliente) on delete restrict on update restrict;

alter table vehiculo add constraint fk_vehiculo_empleado foreign key (idempleadoresguardo)
      references empleado (idempleado) on delete restrict on update restrict;

alter table vehiculo add constraint fk_vehiculo_estatus foreign key (idestatus)
      references estatus (idestatus) on delete restrict on update restrict;

alter table vehiculo add constraint fk_vehiculo_marcavehiculo foreign key (idmarcavehiculo)
      references marcavehiculo (idmarcavehiculo);

alter table vehiculo add constraint fk_vehiculo_region foreign key (idregionactual)
      references region (idregion) on delete restrict on update restrict;

alter table vehiculo add constraint fk_vehiculo_tipocombustible foreign key (idtipocombustible)
      references tipocombustible (idtipocombustible) on delete restrict on update restrict;

alter table vehiculogasolina add constraint fk_gasolinaveh_tipocombustible foreign key (idtipocombustible)
      references tipocombustible (idtipocombustible) on delete restrict on update restrict;

alter table vehiculogasolina add constraint fk_vehgasolina_adscripcion foreign key (idadscripcion)
      references adscripcion (idadscripcion) on delete restrict on update restrict;

alter table vehiculogasolina add constraint fk_vehgasolina_cliente foreign key (idcliente)
      references cliente (idcliente) on delete restrict on update restrict;

alter table vehiculogasolina add constraint fk_vehgasolina_empleado foreign key (idempleado)
      references empleado (idempleado) on delete restrict on update restrict;

alter table vehiculogasolina add constraint fk_vehgasolina_region foreign key (idregion)
      references region (idregion) on delete restrict on update restrict;

alter table vehiculogasolina add constraint fk_vehgasolina_tarjetacomb foreign key (idtarjetacombustible)
      references tarjetacombustible (idtarjetacombustible) on delete restrict on update restrict;

alter table vehiculogasolina add constraint fk_vehgasolina_vehiculo foreign key (idvehiculo)
      references vehiculo (idvehiculo) on delete cascade on update restrict;

alter table vehiculoincidencia add constraint fk_vehincidencia_empleado foreign key (idempleadoregistra)
      references empleado (idempleado) on delete restrict on update restrict;

alter table vehiculoincidencia add constraint fk_vehincidencia_tipoincidencia foreign key (idtipoincidenciaveh)
      references tipoincidenciaveh (idtipoincidenciaveh) on delete restrict on update restrict;

alter table vehiculoincidencia add constraint fk_vehincidencia_vehiculo foreign key (idvehiculo)
      references vehiculo (idvehiculo) on delete restrict on update restrict;

alter table vehiculomantenimiento add constraint fk_vehmantenimiento_vehiculo foreign key (idvehiculo)
      references vehiculo (idvehiculo) on delete cascade;

alter table vehiculopoliza add constraint fk_vehpoliza_aseguradora foreign key (idaseguradora)
      references aseguradora (idaseguradora) on delete restrict on update restrict;

alter table vehiculopoliza add constraint fk_vehpoliza_vehiculo foreign key (idvehiculo)
      references vehiculo (idvehiculo) on delete cascade on update restrict;

alter table vehiculoresguardo add constraint fk_vehresguardo_adscripcion foreign key (idadscripcion)
      references adscripcion (idadscripcion) on delete restrict on update restrict;

alter table vehiculoresguardo add constraint fk_vehresguardo_cliente foreign key (idcliente)
      references cliente (idcliente) on delete restrict on update restrict;

alter table vehiculoresguardo add constraint fk_vehresguardo_empresguardo foreign key (idempleadoresguardo)
      references empleado (idempleado) on delete restrict on update restrict;

alter table vehiculoresguardo add constraint fk_vehresguardo_empsupervisor foreign key (idempleadosupervisor)
      references empleado (idempleado) on delete restrict on update restrict;

alter table vehiculoresguardo add constraint fk_vehresguardo_region foreign key (idregion)
      references region (idregion) on delete restrict on update restrict;

alter table vehiculoresguardo add constraint fk_vehresguardo_vehiculo foreign key (idvehiculo)
      references vehiculo (idvehiculo) on delete cascade on update restrict;

alter table vehiculotenencia add constraint fk_vehtenencia_vehiculo foreign key (idvehiculo)
      references vehiculo (idvehiculo) on delete cascade on update restrict;

