DELIMITER $$

DROP PROCEDURE IF EXISTS sp_rptdocumentosvencidos $$

CREATE PROCEDURE sp_rptdocumentosvencidos()  
begin

	select 	e.nombrecompleto, r.descregion, a.descadscripcion,
			td.desctipodocumento, ed.fechaemision, ed.iniciovigencia, ed.finalvigencia
	from empleadodocumento ed
		inner join empleado e on e.idempleado=ed.idempleado
		inner join tipodocumento td on td.idtipodocumento=ed.idtipodocumento
		inner join region r on r.idregion=e.idregionactual
		inner join adscripcion a on a.idadscripcion=e.idadscripcionactual
	where convert(ed.finalvigencia,date) <= convert(fn_fecha_actual(),date)
	and td.solicitarvigencia='S'
	and e.idestatus=1
	order by e.nombrecompleto;

end$$

DELIMITER ;
