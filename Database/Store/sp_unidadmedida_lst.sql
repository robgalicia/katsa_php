DELIMITER $$

DROP PROCEDURE IF EXISTS sp_unidadmedida_lst $$

CREATE PROCEDURE sp_unidadmedida_lst()  
begin
	select idunidadmedida, descunidadmedida
	from unidadmedida
	order by descunidadmedida;
end$$

DELIMITER ;
