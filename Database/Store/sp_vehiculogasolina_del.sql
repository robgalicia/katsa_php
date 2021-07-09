DELIMITER $$

DROP PROCEDURE IF EXISTS sp_vehiculogasolina_del $$

CREATE PROCEDURE sp_vehiculogasolina_del(IN pidvehiculogasolina int)
begin
	delete from vehiculogasolina
	where idvehiculogasolina=pidvehiculogasolina;

	commit;
end$$

DELIMITER ;
