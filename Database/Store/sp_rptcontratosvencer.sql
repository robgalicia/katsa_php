DELIMITER $$

DROP PROCEDURE IF EXISTS sp_rptcontratosvencer $$

CREATE PROCEDURE sp_rptcontratosvencer(IN pdias smallint)  

-- Reporte de contratos: en vez de pedir rango de fechas, pedir cantidad de días (hacia adelante), 
-- para ver que contratos se vencen en los próximos días y también que salgan los que están vencidos 
-- y no se tiene un nuevo contrato y el empleado está activo.

begin

	select 	e.nombrecompleto, r.descregion, a.descadscripcion, ec.fechacontrato, ec.fechainicial, ec.fechafinal, ec.diascontrato,
				case ec.periodocontrato when 'D' then 'DIAS' when 'S' then 'SEMANAS' when 'M' then 'MESES' else 'AÑOS' end periodocontrato
	from empleadocontrato ec
		inner join empleado e on e.idempleado=ec.idempleado
		inner join region r on r.idregion=e.idregionactual
		inner join adscripcion a on a.idadscripcion=e.idadscripcionactual
	where convert(ec.fechafinal,date) <= convert(date_add(fn_fecha_actual(),interval pdias day),date)
	and e.idestatus=1
	and ec.idempleado not in (select tmp.idempleado from empleadocontrato tmp where tmp.idempleado=ec.idempleado and tmp.consecutivo > ec.consecutivo)
	order by e.nombrecompleto;

end$$

DELIMITER ;



