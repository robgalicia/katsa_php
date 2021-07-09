DELIMITER $$

DROP PROCEDURE IF EXISTS sp_empleado_nextnum $$

CREATE PROCEDURE sp_empleado_nextnum(OUT last_id INT)

begin
	declare vnumempleado int;

    select ifnull(max(numempleado),0) into vnumempleado
    from empleado;

    set vnumempleado = vnumempleado + 1;
  	SET last_id = vnumempleado;				
end$$

DELIMITER ;
