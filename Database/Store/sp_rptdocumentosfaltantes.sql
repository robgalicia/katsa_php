DELIMITER $$

DROP PROCEDURE IF EXISTS sp_rptdocumentosfaltantes $$

CREATE PROCEDURE sp_rptdocumentosfaltantes()  
begin

	select 	e.nombrecompleto, r.descregion, a.descadscripcion, mov.desctipodocumento
	from (	select e.idempleado, td.idtipodocumento, td.desctipodocumento
			from empleado e
				inner join tipodocumento td
			where e.idestatus=1) as mov 
		left outer join empleadodocumento ed on ed.idempleado=mov.idempleado and ed.idtipodocumento=mov.idtipodocumento
		inner join empleado e on e.idempleado=mov.idempleado
		inner join region r on r.idregion=e.idregionactual
		inner join adscripcion a on a.idadscripcion=e.idadscripcionactual
	where ed.idempleadodocumento is null
	and e.idestatus=1
	order by e.nombrecompleto, mov.idtipodocumento;

end$$

DELIMITER ;
