DELIMITER $$

DROP PROCEDURE IF EXISTS sp_empleado_like $$

CREATE PROCEDURE sp_empleado_like(IN pnombre varchar(50))  
begin
	select 	idempleado, nombrecompleto, rfc, ifnull(p.descpuesto,'POR DEFINIR') as puesto,
			r.descregion as regionactual, a.descadscripcion as adscripcionactual,
			fechaingreso, st.descestatus as estatus, ifnull(e.fechabaja,'') as fechabaja,
			ifnull(numempleado,0) as numempleado
	from empleado e
		left outer join puesto p on p.idpuesto=e.idpuestoorganigrama
		left outer join region r on r.idregion=e.idregionactual
		left outer join adscripcion a on a.idadscripcion=e.idadscripcionactual
		left outer join estatus st on st.idestatus=e.idestatus
	where nombrecompleto like concat('%', pnombre,'%')
	order by nombrecompleto;
end$$

DELIMITER ;

