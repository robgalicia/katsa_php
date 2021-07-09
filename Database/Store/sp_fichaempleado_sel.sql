DELIMITER $$

DROP PROCEDURE IF EXISTS sp_fichaempleado_sel $$

CREATE PROCEDURE sp_fichaempleado_sel(IN pidempleado int)  
begin
	select 	e.idempleado,e.nombrecompleto as nombre,
			case e.sexo when 'F' then 'FEMENINO' else 'MASCULINO' end as sexo,
			e.rfc,e.curp,e.cuip,e.numcartilla,e.calle,e.numexterior,
			e.numinterior,e.entrecalles,e.colonia,e.ciudad,ifnull(e.idmunicipio,0) as idmunicipio,m.descmunicipio ,ifnull(e.idestado,0) as idestado,
			e.codigopostal,e.telefonocasa,e.telefonocelular,e.correoelectronico,
			ifnull(e.idestadocivil,0) as idestadocivil, ec.descestadocivil, nombreconyuge, ifnull(e.idtiposangre,0) as idtiposangre, ts.desctiposangre,
			ifnull(e.idnacionalidad,0) as idnacionalidad, e.lugarnacimiento, e.fechanacimiento,
			ifnull(e.idgradoescolaridad,0) as idgradoescolaridad, e.documentoescolaridad,e.aniodocumentoescolaridad,
			ifnull(e.idprofesion,0) as idprofesion,
			ifnull(e.iddepartamento,0) as iddepartamento,
			ifnull(e.idpuestotabulador,0) as idpuestotabulador, p.descpuesto,
			ifnull(e.idpuestoorganigrama,0) as idpuestoorganigrama,
			ifnull(e.idpuestoregistro,0) as idpuestoregistro,
			ifnull(e.idregionactual,0) as idregionactual,
			ifnull(e.idadscripcionactual,0) as idadscripcionactual, a.descadscripcion,
			ifnull(e.idclienteactual,0) as idclienteactual,
			e.fechaingreso, ifnull(e.fechareingreso,'') as fechareingreso, ifnull(e.fechabaja,'') as fechabaja,
			e.motivobaja,e.nombreemergencia,e.telefonoemergencia,e.correoemergencia,e.numimss,e.sueldonetomensual,e.sueldodiarioimss,
			ifnull(e.idbanco,0) as idbanco, b.descbanco, numcuenta,clabe,tarjetadebito,numcreditoinfonavit,fechacreditoinfonavit,tipocreditoinfonavit,
			descuentoinfonavit,tallacamisa,tallapantalon,tallazapatos,tallachamarra,idestatus,capbasica,capseginmuebles,
			capmanejodefensivo,capprimerosauxilios,requiereregsnsp, ifnull(idestatusregsnsp,0) as idestatusregsnsp,
			outsourcing, ifnull(idempresaoutsourcing,0) as idempresaoutsourcing,
			ifnull(numempleado,0) as numempleado,
			if(e.fechanacimiento is null,'SIN DATO',fn_edad_anios(e.fechanacimiento)) as edad,
			e.numimss
	from empleado e
    left outer join estadocivil ec on ec.idestadocivil = e.idestadocivil
    left outer join tiposangre ts on ts.idtiposangre = e.idtiposangre
    left outer join municipio m on m.idmunicipio = e.idmunicipio
    left outer join banco b on b.idbanco = e.idbanco
    left outer join puesto p on p.idpuesto = e.idpuestotabulador
    left outer join adscripcion a on a.idadscripcion = e.idadscripcionactual
	where e.idempleado=pidempleado;
end$$

DELIMITER ;