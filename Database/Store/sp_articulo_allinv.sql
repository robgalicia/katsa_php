DELIMITER $$

DROP PROCEDURE IF EXISTS sp_articulo_allinv $$

CREATE PROCEDURE sp_articulo_allinv(IN pidalmacen smallint, IN ptipobusqueda char(1), IN pdescripcion varchar(100))
begin
	select 	a.idarticulo, ifnull(a.codigoarticulo,'') as codigoarticulo, ifnull(a.descarticulo,'') as nombrearticulo,
			ifnull(a.descarticuloprov,'') as descripcionproveedor, ifnull(i.costounitario,0) as costounitario,
			ifnull(p.nombre,'') as nombreproveedor, i.existencia
	from inventario i
		inner join articulo a on a.idarticulo=i.idarticulo
		inner join proveedor p on p.idproveedor=i.idproveedor
	where i.idalmacen=pidalmacen
	and ifnull(i.existencia,0) > 0
	and ((ptipobusqueda='N' and a.descarticulo like concat('%', pdescripcion,'%'))
		or (ptipobusqueda='D' and a.descarticuloprov like concat('%', pdescripcion,'%'))
		or (ptipobusqueda='A' and (a.descarticulo like concat('%', pdescripcion,'%') or a.descarticuloprov like concat('%', pdescripcion,'%'))))
	order by a.descarticulo;
end$$

DELIMITER ;
