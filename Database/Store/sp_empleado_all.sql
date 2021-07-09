DELIMITER $$

DROP PROCEDURE IF EXISTS sp_empleado_all $$

CREATE PROCEDURE sp_empleado_all()  
begin
	select 	idempleado, nombrecompleto, rfc, ifnull(p.descpuesto,'POR DEFINIR') as puesto,
			r.descregion as regionactual, a.descadscripcion as adscripcionactual,
			fechaingreso, st.descestatus as estatus, ifnull(e.fechabaja,'') as fechabaja,
			ifnull(numempleado,0) as numempleado
	from empleado e
		left outer join puesto p on p.idpuesto=e.idpuestoorganigrama
		inner join region r on r.idregion=e.idregionactual
		inner join adscripcion a on a.idadscripcion=e.idadscripcionactual
		inner join estatus st on st.idestatus=e.idestatus
	order by nombrecompleto;
end$$

DELIMITER ;
