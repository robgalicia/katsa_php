DELIMITER $$

DROP PROCEDURE IF EXISTS sp_empresaout_lst $$

CREATE PROCEDURE sp_empresaout_lst()  
begin
	select idempresaoutsourcing, nombrecorto
	from empresaoutsourcing
	order by nombrecorto;
end$$

DELIMITER ;
