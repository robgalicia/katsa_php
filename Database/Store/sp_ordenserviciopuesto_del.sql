DELIMITER $$

DROP PROCEDURE IF EXISTS sp_ordenserviciopuesto_del $$

CREATE PROCEDURE sp_ordenserviciopuesto_del(IN pidordenserviciopuesto int)

begin
	delete from ordenserviciopuesto
	where idordenserviciopuesto=pidordenserviciopuesto;

    commit;
end$$

DELIMITER ;