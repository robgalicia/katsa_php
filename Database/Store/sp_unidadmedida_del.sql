DELIMITER $$

DROP PROCEDURE IF EXISTS sp_unidadmedida_del $$

CREATE PROCEDURE sp_unidadmedida_del(IN pidunidadmedida int)

begin
	delete from unidadmedida
	where idunidadmedida=pidunidadmedida;
	
	commit;
end$$

DELIMITER ;