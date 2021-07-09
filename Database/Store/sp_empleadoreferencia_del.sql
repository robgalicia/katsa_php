DELIMITER $$

DROP PROCEDURE IF EXISTS sp_empleadoreferencia_del $$

CREATE PROCEDURE sp_empleadoreferencia_del(IN pidempleadoreferencia int)

begin
	delete from empleadoreferencia
	where idempleadoreferencia = pidempleadoreferencia;

	commit;
end$$

DELIMITER ;

