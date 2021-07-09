	
DELIMITER $$

DROP PROCEDURE IF EXISTS sp_usuariomenu $$

CREATE PROCEDURE sp_usuariomenu(IN pidusuario smallint)
/***
call sp_usuariomenu(1);
***/
begin

	select m.menuid, m.nombremenu, m.padreid, m.posicion, m.icono, ifnull(m.url,'') as url, m.ordenmenu, 
			ifnull(m.es_reporte,0) as es_reporte, ifnull(m.appmovil,0) as appmovil
	from usuariomenu um
		inner join menu m on m.menuid=um.menuid
	where um.idusuario=pidusuario and ifnull(m.es_reporte,0) = 0
	and ifnull(m.es_catalogo,0) = 0
	order by m.ordenmenu;
	
end$$

DELIMITER ;