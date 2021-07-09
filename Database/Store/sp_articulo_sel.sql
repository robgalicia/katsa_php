DELIMITER $$

DROP PROCEDURE IF EXISTS sp_articulo_sel $$

CREATE PROCEDURE sp_articulo_sel(IN pidarticulo int)
begin
	select 	idarticulo, ifnull(codigoarticulo,'') as codigoarticulo, ifnull(descarticulo,'') as descarticulo,
			ifnull(descarticuloprov,'') as descarticuloprov, ifnull(idunidadmedida,0) as idunidadmedida,
			ifnull(existencia,0) as existencia, ifnull(fechaultimacompra,'') as fechaultimacompra,
			ifnull(preciocompra,0) as preciocompra, ifnull(idpartidagto,0) as idpartidagto,
			ifnull(idpartidacto,0) as idpartidacto, ifnull(idpartidainv,0) as idpartidainv,
			ifnull(idproveedor,0) as idproveedor
	from articulo		
	where idarticulo = pidarticulo;
end$$

DELIMITER ;

