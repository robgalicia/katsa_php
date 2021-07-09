DELIMITER $$

DROP PROCEDURE IF EXISTS sp_rptincidenciasempleados $$

CREATE PROCEDURE sp_rptincidenciasempleados(IN pfechainicio date, IN pfechafinal date)  
begin
	select 	e.nombrecompleto, ifnull(po.descpuesto,'') as puestoorganigrama,
			r.descregion, a.descadscripcion, ei.fechaincidencia, tie.desctipoincidenciaemp as tipoincidencia,
			case ei.justificado when 'S' then 'SI' else 'NO' end as justificado
	from empleadoincidencia ei 
		inner join tipoincidenciaemp tie on tie.idtipoincidenciaemp=ei.idtipoincidenciaemp
		inner join empleado e on e.idempleado=ei.idempleado
		inner join puesto po on po.idpuesto=e.idpuestoorganigrama
		inner join region r on r.idregion=e.idregionactual
		inner join adscripcion a on a.idadscripcion=e.idadscripcionactual
	where convert(fechaincidencia,date) between pfechainicio and pfechafinal
	order by ei.fechaincidencia,e.nombrecompleto ;
end$$

DELIMITER ;
