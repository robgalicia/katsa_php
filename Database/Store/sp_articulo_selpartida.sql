DELIMITER $$

DROP PROCEDURE IF EXISTS sp_articulo_selpartida $$

CREATE PROCEDURE sp_articulo_selpartida(IN pidpartida smallint)
begin
	select 	a.idarticulo, ifnull(a.codigoarticulo,'') as codigoarticulo, ifnull(a.descarticulo,'') as nombrearticulo,
			ifnull(a.descarticuloprov,'') as descripcionproveedor, ifnull(a.preciocompra,0) as preciocompra,
			ifnull(a.idproveedor,0) as idproveedor, ifnull(p.nombre,'') as nombreproveedor
	from articulo a
		left outer join proveedor p on a.idproveedor=p.idproveedor
	where a.idpartidagto=pidpartida
	or a.idpartidacto=pidpartida
	or a.idpartidainv=pidpartida
	order by a.descarticulo;
end$$

DELIMITER ;
