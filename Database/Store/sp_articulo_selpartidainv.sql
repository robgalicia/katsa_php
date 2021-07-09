DELIMITER $$

DROP PROCEDURE IF EXISTS sp_articulo_selpartidainv $$

CREATE PROCEDURE sp_articulo_selpartidainv(IN pidalmacen smallint, IN pidpartida smallint)
begin

	select 	a.idarticulo, ifnull(a.codigoarticulo,'') as codigoarticulo, ifnull(a.descarticulo,'') as nombrearticulo,
			ifnull(a.descarticuloprov,'') as descripcionproveedor, ifnull(i.costounitario,0) as costounitario,
			ifnull(p.nombre,'') as nombreproveedor, i.existencia
	from inventario i
		inner join articulo a on a.idarticulo=i.idarticulo
		inner join proveedor p on p.idproveedor=i.idproveedor
	where i.idalmacen=pidalmacen
	and ifnull(i.existencia,0) > 0
	and (a.idpartidagto=pidpartida
		or a.idpartidacto=pidpartida
		or a.idpartidainv=pidpartida)
	order by a.descarticulo;

end$$

DELIMITER ;

