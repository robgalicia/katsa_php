DELIMITER $$

DROP PROCEDURE IF EXISTS sp_autorizasolicitud_all $$

CREATE PROCEDURE sp_autorizasolicitud_all()  
begin
	select 	a.idautorizasolicitud, a.idregion, r.descregion, 
			a.iddepartamento, d.descdepartamento, 
			a.tiposolicitud,
			case a.tiposolicitud when 'R' then 'REQUISICION' else 'VIATICOS' end as desctiposolicitud,
			a.idempleadorevisa, er.nombrecompleto as empleadorevisa, 
			a.idempleadoautoriza, ea.nombrecompleto as empleadoautoriza
	from autorizasolicitud a
		inner join region r on r.idregion=a.idregion
		inner join departamento d on d.iddepartamento=a.iddepartamento
		inner join empleado er on er.idempleado=a.idempleadorevisa
        inner join empleado ea on ea.idempleado=a.idempleadoautoriza
	order by a.idregion, a.iddepartamento;

end$$

DELIMITER ;
