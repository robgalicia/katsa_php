DELIMITER $$

DROP PROCEDURE IF EXISTS sp_articulo_all $$

CREATE PROCEDURE sp_articulo_all(IN ptipobusqueda char(1), IN pdescripcion varchar(100))
begin
	select 	a.idarticulo, ifnull(a.codigoarticulo,'') as codigoarticulo, ifnull(a.descarticulo,'') as nombrearticulo,
			ifnull(a.descarticuloprov,'') as descripcionproveedor, ifnull(a.preciocompra,0) as preciocompra,
			ifnull(a.idproveedor,0) as idproveedor, ifnull(p.nombre,'') as nombreproveedor
	from articulo a
		left outer join proveedor p on a.idproveedor=p.idproveedor
	where (ptipobusqueda='N' and a.descarticulo like concat('%', pdescripcion,'%'))
	or (ptipobusqueda='D' and a.descarticuloprov like concat('%', pdescripcion,'%'))
	or (ptipobusqueda='A' and (a.descarticulo like concat('%', pdescripcion,'%') or a.descarticuloprov like concat('%', pdescripcion,'%')))
	order by a.descarticulo;
end$$

DELIMITER ;
