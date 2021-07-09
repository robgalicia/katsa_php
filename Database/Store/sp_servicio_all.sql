DELIMITER $$

DROP PROCEDURE IF EXISTS sp_servicio_all $$

CREATE PROCEDURE sp_servicio_all()  
begin
    select idservicio, descripcioncorta, preciounitario, s.idtipomoneda, tm.desctipomoneda
    from servicio s
        inner join tipomoneda tm on tm.idtipomoneda=s.idtipomoneda
    order by descripcioncorta;
end$$

DELIMITER ;