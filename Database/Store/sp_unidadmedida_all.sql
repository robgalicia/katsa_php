DELIMITER $$

DROP PROCEDURE IF EXISTS sp_unidadmedida_all $$

CREATE PROCEDURE sp_unidadmedida_all()
begin
	select 	idunidadmedida, descunidadmedida,nombrecorto
	from unidadmedida
	order by idunidadmedida;

end$$

DELIMITER ;