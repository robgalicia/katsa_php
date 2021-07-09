DELIMITER $$

DROP PROCEDURE IF EXISTS sp_ingeniero_all $$

CREATE PROCEDURE sp_ingeniero_all(IN pidcliente int)  
begin
	select i.idingeniero, i.nombre, i.idcliente, c.nombre as cliente, i.activo,
            ifnull(i.idsubcontrata,0) as idsubcontrata, ifnull(s.nombreempresa,'') as subcontrata
	from ingeniero i
        inner join cliente c on c.idcliente=i.idcliente
        left outer join subcontrata s on s.idsubcontrata=i.idsubcontrata
	where i.idcliente=pidcliente
    order by i.nombre;
end$$

DELIMITER ;