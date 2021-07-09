DELIMITER $$

DROP PROCEDURE IF EXISTS sp_empleado_lst $$

CREATE PROCEDURE sp_empleado_lst()
begin
	select 	idempleado, nombrecompleto, ifnull(fechareingreso, fechaingreso) as fechaingreso,
			ifnull(correoelectronico,'') as correoelectronico
	from empleado
	order by nombrecompleto;
end$$

DELIMITER ;

