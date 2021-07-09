DELIMITER $$

DROP PROCEDURE IF EXISTS sp_articulo_inventario $$

CREATE PROCEDURE sp_articulo_inventario(IN pidalmacen smallint, IN ptipobusqueda char(1), IN pdescripcion varchar(100))
begin
	select 	a.idarticulo, ifnull(a.codigoarticulo,'') as codigoarticulo, ifnull(a.descarticulo,'') as nombrearticulo,
			ifnull(p.nombre,'') as nombreproveedor, ifnull(i.costounitario,0) as preciocompra,
			um.descunidadmedida, ifnull(a.fechaultimacompra,'') as fechaultimacompra,
			ifnull(i.existencia,0) as existencia
	from articulo a
		inner join unidadmedida um on um.idunidadmedida=a.idunidadmedida
		left outer join inventario i on i.idarticulo=a.idarticulo
		left outer join proveedor p on i.idproveedor=p.idproveedor
	where i.idalmacen = pidalmacen
	and ((ptipobusqueda='N' and a.descarticulo like concat('%', pdescripcion,'%'))
		or (ptipobusqueda='D' and a.descarticuloprov like concat('%', pdescripcion,'%'))
		or (ptipobusqueda='A' and (a.descarticulo like concat('%', pdescripcion,'%') or a.descarticuloprov like concat('%', pdescripcion,'%'))))
	order by a.descarticulo;
end$$

DELIMITER ;
