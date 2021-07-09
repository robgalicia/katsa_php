DELIMITER $$

DROP PROCEDURE IF EXISTS sp_rptcumplelaboral $$

CREATE PROCEDURE sp_rptcumplelaboral(IN pmes tinyint)  
-- Reporte de empleados que cumplen años laborales, es decir, años de trabajar en la empresa
begin
	select 	e.idempleado,e.nombrecompleto,e.rfc,e.curp,
			ifnull(d.descdepartamento,'') as descdepartamento,
			ifnull(p.descpuesto,'') as puestoorganigrama,
			r.descregion, a.descadscripcion, 
			ifnull(e.fechareingreso,e.fechaingreso) as fechaingreso,
			e.outsourcing,
			case e.outsourcing when 'S' then (select eo.nombrecorto from empresaoutsourcing eo where eo.idempresaoutsourcing=e.idempresaoutsourcing) else '' end as empresa,
            year(curdate()) - year(ifnull(e.fechareingreso,e.fechaingreso)) as anios
	from empleado e
		inner join departamento d on d.iddepartamento=e.iddepartamento
		inner join puesto p on p.idpuesto=e.idpuestoorganigrama
		inner join region r on r.idregion=e.idregionactual
		inner join adscripcion a on a.idadscripcion=e.idadscripcionactual
	where month( convert( ifnull( e.fechareingreso,e.fechaingreso ),date ) ) = pmes
    and e.fechabaja is null
	and year(curdate()) - year(ifnull(e.fechareingreso,e.fechaingreso)) > 0;
end$$

DELIMITER ;