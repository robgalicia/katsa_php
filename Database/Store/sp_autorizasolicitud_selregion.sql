DELIMITER $$

DROP PROCEDURE IF EXISTS sp_autorizasolicitud_selregion $$

CREATE PROCEDURE sp_autorizasolicitud_selregion
(IN pidregion        smallint,
IN piddepartamento   smallint,
IN ptiposolicitud	 char(1))

begin
	select 	a.idempleadorevisa, er.nombrecompleto as empleadorevisa, ifnull(er.correoelectronico,'') as correorevisa, 
            a.idempleadoautoriza, ea.nombrecompleto as empleadoautoriza, ifnull(ea.correoelectronico,'') as correoautoriza
	from autorizasolicitud a
		inner join empleado er on er.idempleado=a.idempleadorevisa
        inner join empleado ea on ea.idempleado=a.idempleadoautoriza
	where a.idregion=pidregion and a.iddepartamento=p.iddepartamento
	and a.tiposolicitud=ptiposolicitud;

end$$

DELIMITER ;