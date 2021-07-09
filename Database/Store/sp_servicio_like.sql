DELIMITER $$

DROP PROCEDURE IF EXISTS sp_servicio_like $$

CREATE PROCEDURE sp_servicio_like(IN pservicio varchar(50))  
begin
    select idservicio, descripcioncorta, preciounitario, s.idtipomoneda, tm.desctipomoneda
    from servicio s
        inner join tipomoneda tm on tm.idtipomoneda=s.idtipomoneda
	where descripcioncorta like concat('%', pservicio,'%')
    order by descripcioncorta;
end$$

DELIMITER ;
