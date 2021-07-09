DELIMITER $$

DROP PROCEDURE IF EXISTS sp_rptvehiculogasolina_resconsumo $$

CREATE PROCEDURE sp_rptvehiculogasolina_resconsumo(IN psemana int)
begin

	select 	semana, tarjeta, responsable, round(sum(litros),2) as litros, round(sum(preciototal),2) as importe
	from consumogasolina
    where semana = lpad(convert(psemana,char),2,0)
	group by semana, tarjeta, responsable
	order by 4 desc;

end$$

DELIMITER ;