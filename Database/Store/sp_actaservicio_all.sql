DELIMITER $$

DROP PROCEDURE IF EXISTS sp_actaservicio_all $$

CREATE PROCEDURE sp_actaservicio_all(IN pidordenservicio int)

begin
	select 	idactaservicio,idordenservicio,numeroacta,fechaacta,ifnull(observaciones,'') as observaciones,
            case tipoacta
                when 'I' then 'Inicial'
                when 'C' then 'Conclusión'
                when 'S' then 'Suspensión'
                when 'R' then 'Reactivación' end as tipoacta
   	from actaservicio
	where idordenservicio=pidordenservicio
    order by fechaacta;

end$$

DELIMITER ;