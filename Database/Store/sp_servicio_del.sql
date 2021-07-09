DELIMITER $$

DROP PROCEDURE IF EXISTS sp_servicio_del $$

CREATE PROCEDURE sp_servicio_del(IN pidservicio int)  
begin
    delete from servicio
	where idservicio=pidservicio;

    commit;
end$$

DELIMITER ;
