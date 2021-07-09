DELIMITER $$

DROP PROCEDURE IF EXISTS sp_actaservicio_sel $$

CREATE PROCEDURE sp_actaservicio_sel(IN pidactaservicio int)

begin
	select 	idactaservicio,idordenservicio,numeroacta,fechaacta,
			ifnull(observaciones,'') as observaciones,tipoacta
   	from actaservicio
	where idactaservicio=pidactaservicio;

end$$

DELIMITER ;