DELIMITER $$

DROP PROCEDURE IF EXISTS sp_empleadocontrato_all $$

CREATE PROCEDURE sp_empleadocontrato_all(IN pidempleado int)

begin
	select 	ec.idempleadocontrato, ec.consecutivo, e.nombrecompleto, ec.fechaingreso, ec.fechacontrato, 
			ec.diascontrato, ec.fechainicial, ec.sueldonetomensual,
			case ec.periodocontrato when 'I' then 6 else 2 end as idformatolegal,
			ifnull(ec.fechafinal,'') as fechafinal, 
			fn_periodocontrato(ec.periodocontrato) as periodocontrato
   	from empleadocontrato ec
		inner join empleado e on e.idempleado=ec.idempleado 
	where ec.idempleado=pidempleado
	order by ec.consecutivo;

end$$

DELIMITER ;
