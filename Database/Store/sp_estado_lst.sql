DELIMITER $$

DROP PROCEDURE IF EXISTS sp_estado_lst $$

CREATE PROCEDURE sp_estado_lst()  
begin
	select idestado, descestado
	from estado
	order by idestado;
end$$

DELIMITER ;
