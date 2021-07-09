DELIMITER $$

DROP PROCEDURE IF EXISTS sp_ingeniero_sel $$

CREATE PROCEDURE sp_ingeniero_sel(IN pidingeniero int)  
begin
	select i.nombre, i.idcliente, c.nombre as cliente, i.activo,
            ifnull(i.idsubcontrata,0) as idsubcontrata, ifnull(s.nombreempresa,'') as subcontrata
	from ingeniero i
        inner join cliente c on c.idcliente=i.idcliente
        left outer join subcontrata s on s.idsubcontrata=i.idsubcontrata
	where i.idingeniero=pidingeniero;
end$$

DELIMITER ;