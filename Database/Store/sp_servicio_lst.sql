DELIMITER $$

DROP PROCEDURE IF EXISTS sp_servicio_lst $$

CREATE PROCEDURE sp_servicio_lst()  
begin
    select idservicio, descripcioncorta, descservicio, preciounitario, idtipomoneda
    from servicio
	order by descripcioncorta;
end$$

DELIMITER ;
