DELIMITER $$

DROP PROCEDURE IF EXISTS sp_ordencompra_sel $$

CREATE PROCEDURE sp_ordencompra_sel(IN pidordencompra int)
begin
	select 	oc.idordencompra, oc.folio, oc.fechaorden, oc.idproveedor, p.nombre as nombreproveedor,
			oc.idregion, oc.iddepartamento, oc.idempleadoordena, ifnull(oc.observaciones,'') as observaciones,
			oc.importetotal,
			ocd.idordencompradetalle, ocd.idarticulo, a.descarticulo, ocd.cantidad, ocd.importe, ocd.total
	from ordencompra oc
		inner join ordencompradetalle ocd on ocd.idordencompra=oc.idordencompra
		inner join proveedor p on p.idproveedor=oc.idproveedor
		inner join articulo a on a.idarticulo=ocd.idarticulo
	where oc.idordencompra=pidordencompra
	order by ocd.idarticulo;
end$$

DELIMITER ;
