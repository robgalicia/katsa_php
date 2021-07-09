DELIMITER $$

DROP PROCEDURE IF EXISTS sp_actaservicio_del $$

CREATE PROCEDURE sp_actaservicio_del(IN pidactaservicio int)

begin
	delete from actaservicio
	where idactaservicio=pidactaservicio;

    commit;
end$$

DELIMITER ;