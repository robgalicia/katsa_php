DELIMITER $$

DROP PROCEDURE IF EXISTS sp_empleadodocumento_del $$

CREATE PROCEDURE sp_empleadodocumento_del(IN pidempleadodocumento int)

begin
	delete from empleadodocumento
	where idempleadodocumento=pidempleadodocumento;

	commit;
end$$

DELIMITER ;

