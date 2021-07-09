DELIMITER $$

DROP PROCEDURE IF EXISTS sp_servicio_sel $$

CREATE PROCEDURE sp_servicio_sel(IN pidservicio int)  
begin
    select idservicio, descripcioncorta, descservicio, preciounitario, s.idtipomoneda, tm.desctipomoneda
    from servicio s
        inner join tipomoneda tm on tm.idtipomoneda=s.idtipomoneda
	where idservicio=pidservicio;
end$$

DELIMITER ;
