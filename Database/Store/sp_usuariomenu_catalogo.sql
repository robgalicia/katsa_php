DELIMITER $$

DROP PROCEDURE IF EXISTS sp_usuariomenu_catalogo $$

CREATE PROCEDURE sp_usuariomenu_catalogo(IN pidusuario smallint)
/***
call sp_usuariomenu_catalogo(1);
***/
begin

	select m.menuid, m.nombremenu, m.padreid, m.posicion, m.icono, ifnull(m.url,'') as url, m.ordenmenu, es_reporte
	from usuariomenu um
		inner join menu m on m.menuid=um.menuid
	where um.idusuario=pidusuario and es_catalogo = 1
	order by m.ordenmenu;
	
end$$

DELIMITER ;