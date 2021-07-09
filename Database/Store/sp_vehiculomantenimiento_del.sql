DELIMITER $$

DROP PROCEDURE IF EXISTS sp_vehiculomantenimiento_del $$

CREATE PROCEDURE sp_vehiculomantenimiento_del(IN pidvehiculomantenimiento int)
begin
	delete from vehiculomantenimiento
	where idvehiculomantenimiento=pidvehiculomantenimiento;

	commit;
end$$

DELIMITER ;
