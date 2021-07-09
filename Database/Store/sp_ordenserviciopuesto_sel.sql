DELIMITER $$

DROP PROCEDURE IF EXISTS sp_ordenserviciopuesto_sel $$

CREATE PROCEDURE sp_ordenserviciopuesto_sel(IN pidordenserviciopuesto int)

begin
	select 	idordenserviciopuesto,idordenservicio,idpuesto,cantidad
   	from ordenserviciopuesto
	where idordenserviciopuesto=pidordenserviciopuesto;

end$$

DELIMITER ;