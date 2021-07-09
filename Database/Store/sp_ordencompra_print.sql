DELIMITER $$

DROP PROCEDURE IF EXISTS sp_ordencompra_print $$

CREATE PROCEDURE sp_ordencompra_print(IN pidordencompra int)
begin
	select 	p.nombre as nombreproveedor, ifnull(p.direccion,'') as direccion, ifnull(p.colonia,'') as colonia,
			concat(ifnull(p.ciudad,''),', ',ifnull(edo.descestado,'')) as ciudad,
			ifnull(p.codigopostal,'') as codigopostal, ifnull(p.telefono,'') as telefono,
			ifnull(p.correoelectronico,'') as correoelectronico,
			oc.folio as folioordencompra, st.descestatus, req.folio as foliorequisicion, oc.fechaorden,
			eo.nombrecompleto as empleadoordena, es.nombrecompleto as empleadosolicita,
			d.descdepartamento, ifnull(oc.observaciones,'') as observaciones,
			a.descarticulo, ocd.cantidad, ocd.importe, ocd.total
	from ordencompra oc
		inner join ordencompradetalle ocd on ocd.idordencompra=oc.idordencompra
		inner join requisicion req on req.idrequisicion=oc.idrequisicion
		inner join proveedor p on p.idproveedor=oc.idproveedor
		left outer join estado edo on edo.idestado=p.idestado
		inner join articulo a on a.idarticulo=ocd.idarticulo
		inner join estatus st on st.idestatus=oc.idestatus
		inner join empleado eo on eo.idempleado=oc.idempleadoordena
		inner join empleado es on es.idempleado=req.idempleadosolicita
		inner join departamento d on d.iddepartamento=oc.iddepartamento
	where oc.idordencompra=pidordencompra
	order by ocd.idarticulo;
end$$

DELIMITER ;
