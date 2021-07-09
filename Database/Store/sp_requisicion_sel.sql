DELIMITER $$

DROP PROCEDURE IF EXISTS sp_requisicion_sel $$

CREATE PROCEDURE sp_requisicion_sel(IN pidrequisicion int)
begin
	select 	req.idrequisicion, folio, fecha,
			req.idregion, r.descregion,
			req.iddepartamento, d.descdepartamento,
			ifnull(req.idcliente,0) as idcliente, ifnull(c.nombre,'') as nombrecliente,
			req.idempleadosolicita, e.nombrecompleto as empleadosolicita,
			ifnull(req.idempleadorevisa,0) as idempleadorevisa, ifnull(er.nombrecompleto,'') as empleadorevisa,
			ifnull(fecharevision,'') as fecharevision,
			ifnull(req.idempleadoautoriza,0) as idempleadoautoriza, ifnull(ea.nombrecompleto,'') as empleadoautoriza,
			ifnull(fechaautorizacion,'') as fechaautorizacion, 
			ifnull(fechacancelacion,'') as fechacancelacion, importetotal, tiporequisicion,
			req.idestatus, st.descestatus, ifnull(req.observaciones,'') as observaciones,
			ifnull(fechacancelacion,'') as fechacancelacion,
			det.idrequisiciondetalle, det.idarticulo, a.descarticulo,
			det.cantidad, det.importe, det.total,
			ifnull(det.idproveedor,0) as idproveedor, ifnull(p.nombre,'') as nombreproveedor,
			req.idadscripcion, ad.descadscripcion, ifnull(req.centrocostos,0) as centrocostos,
			ifnull(req.tipoentrega,'N') as tipoentrega, ifnull(req.plazoentrega,0) as plazoentrega,
			ifnull(det.especificaciones,'') as especificaciones
	from requisicion req
		inner join requisiciondetalle det on det.idrequisicion=req.idrequisicion
		inner join region r on r.idregion=req.idregion
		inner join departamento d on d.iddepartamento=req.iddepartamento
		left outer join cliente c on c.idcliente=req.idcliente
		inner join empleado e on e.idempleado=req.idempleadosolicita
		left outer join empleado er on er.idempleado=req.idempleadorevisa
		left outer join empleado ea on ea.idempleado=req.idempleadoautoriza
		inner join estatus st on st.idestatus=req.idestatus
		inner join articulo a on a.idarticulo=det.idarticulo
		left outer join proveedor p on p.idproveedor=det.idproveedor
		inner join adscripcion ad on ad.idadscripcion=req.idadscripcion
	where req.idrequisicion=pidrequisicion;
end$$

DELIMITER ;
