DELIMITER $$

DROP PROCEDURE IF EXISTS sp_ajusteinventario_sel $$

CREATE PROCEDURE sp_ajusteinventario_sel(IN pidajusteinventario int) 
begin

	select 	ai.idajusteinventario, ai.fecha, ai.folio, ai.idtipoajusteinventario, ai.idalmacen,
			ai.idempleadoautoriza, ai.observaciones, ai.costototal, ai.idempleadocancela, ai.fechacancelacion,
			ai.motivocancelacion, ajd.idarticulo, ajd.cantidad, ajd.costounitario, ajd.costototal,
			tai.desctipoajusteinventario, tai.tipomovimiento, a.idarticulo, a.codigoarticulo,
			a.descarticulo, a.descarticuloprov, a.idunidadmedida, a.existencia, a.fechaultimacompra,
			a.preciocompra, a.idpartidagto, a.idpartidacto, a.idpartidainv, a.idproveedor
	from ajusteinventario ai
		inner join ajusteinventariodetalle ajd on ajd.idajusteinventario=ai.idajusteinventario
		inner join tipoajusteinventario tai on tai.idtipoajusteinventario=ai.idtipoajusteinventario
		inner join articulo a on ajd.idarticulo=a.idarticulo
	where ai.idajusteinventario=pidajusteinventario;

end$$

DELIMITER ;




