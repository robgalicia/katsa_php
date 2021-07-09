DELIMITER $$

DROP PROCEDURE IF EXISTS sp_rptcumpleaniversario $$

CREATE PROCEDURE sp_rptcumpleaniversario(IN pfechainicio date, IN pfechafinal date)  
-- Reporte de empleados que cumplen años de edad
begin
	select 	e.idempleado,e.nombrecompleto,e.rfc,e.curp,
			ifnull(d.descdepartamento,'') as descdepartamento,
			ifnull(p.descpuesto,'') as puestoorganigrama,
			r.descregion, a.descadscripcion, 
			fechanacimiento,
            year(curdate()) - year(fechanacimiento) as edad
	from empleado e
		inner join departamento d on d.iddepartamento=e.iddepartamento
		inner join puesto p on p.idpuesto=e.idpuestoorganigrama
		inner join region r on r.idregion=e.idregionactual
		inner join adscripcion a on a.idadscripcion=e.idadscripcionactual
	where (concat(lpad(month(e.fechanacimiento),2,0),lpad(day(e.fechanacimiento),2,0)) 
			between concat(lpad(month(pfechainicio),2,0),lpad(day(pfechainicio),2,0))
			and concat(lpad(month(pfechafinal),2,0),lpad(day(pfechafinal),2,0))
			) 
    and e.fechabaja is null
    and e.fechanacimiento is not null
	order by day(e.fechanacimiento);
end$$

DELIMITER ;