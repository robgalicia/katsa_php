DELIMITER $$

DROP PROCEDURE IF EXISTS sp_empleado_sel $$

CREATE PROCEDURE sp_empleado_sel(IN pidempleado int)  
begin
	select 	idempleado,apellidopaterno,apellidomaterno,nombre,sexo,rfc,curp,cuip,numcartilla,calle,numexterior,
			numinterior,entrecalles,colonia,ciudad,ifnull(idmunicipio,0) as idmunicipio,ifnull(idestado,0) as idestado,
			codigopostal,telefonocasa,telefonocelular,correoelectronico,
			ifnull(idestadocivil,0) as idestadocivil, nombreconyuge, ifnull(idtiposangre,0) as idtiposangre,
			ifnull(idnacionalidad,0) as idnacionalidad, lugarnacimiento, fechanacimiento,
			ifnull(idgradoescolaridad,0) as idgradoescolaridad, documentoescolaridad,aniodocumentoescolaridad,
			ifnull(idprofesion,0) as idprofesion,
			ifnull(iddepartamento,0) as iddepartamento,
			ifnull(idpuestotabulador,0) as idpuestotabulador,
			ifnull(idpuestoorganigrama,0) as idpuestoorganigrama,
			ifnull(idpuestoregistro,0) as idpuestoregistro,
			ifnull(idregionactual,0) as idregionactual,
			ifnull(idadscripcionactual,0) as idadscripcionactual,
			ifnull(idclienteactual,0) as idclienteactual,
			fechaingreso, ifnull(fechareingreso,'') as fechareingreso, ifnull(fechabaja,'') as fechabaja,
			motivobaja,nombreemergencia,telefonoemergencia,correoemergencia,numimss,sueldonetomensual,sueldodiarioimss,
			ifnull(idbanco,0) as idbanco, numcuenta,clabe,tarjetadebito,numcreditoinfonavit,fechacreditoinfonavit,tipocreditoinfonavit,
			descuentoinfonavit,tallacamisa,tallapantalon,tallazapatos,tallachamarra,idestatus,capbasica,capseginmuebles,
			capmanejodefensivo,capprimerosauxilios,requiereregsnsp, ifnull(idestatusregsnsp,0) as idestatusregsnsp,
			outsourcing, ifnull(idempresaoutsourcing,0) as idempresaoutsourcing,
			ifnull(numempleado,0) as numempleado
	from empleado
	where idempleado=pidempleado;
end$$

DELIMITER ;
