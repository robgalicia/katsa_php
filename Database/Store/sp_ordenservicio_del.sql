DELIMITER $$

DROP PROCEDURE IF EXISTS sp_ordenservicio_del $$

CREATE PROCEDURE sp_ordenservicio_del(IN pidordenservicio int)

begin
	delete from ordenservicio
	where idordenservicio=pidordenservicio;

    commit;
end$$

DELIMITER ;