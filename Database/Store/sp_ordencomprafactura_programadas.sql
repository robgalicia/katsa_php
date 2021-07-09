DELIMITER $$

DROP PROCEDURE IF EXISTS sp_ordencomprafactura_programadas $$

CREATE PROCEDURE sp_ordencomprafactura_programadas(IN pidregion smallint, IN pfechainicial date, IN pfechafinal date)

begin

	select 	ocf.idordencomprafactura, oc.folio as folioordencompra, oc.fechaorden, p.nombre as nombreproveedor,
			ocf.importetotal, ocf.fechafactura, ocf.fechavencimiento, ifnull(ocf.fechapagoprogramado,'') as fechapagoprogramado,
			ifnull(ocf.fechapagado,'') as fechapagado
	from ordencomprafactura ocf
		inner join ordencompra oc on oc.idordencompra=ocf.idordencompra
		inner join proveedor p on p.idproveedor=ocf.idproveedor
	where oc.idregion=pidregion
	and convert(ocf.fechapagoprogramado,date) between pfechainicial and pfechafinal
	order by ocf.fechapagoprogramado desc;

end$$

DELIMITER ;

