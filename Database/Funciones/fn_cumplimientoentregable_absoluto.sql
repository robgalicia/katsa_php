DELIMITER $$

DROP FUNCTION IF EXISTS fn_cumplimientoentregable_absoluto $$

create function fn_cumplimientoentregable_absoluto(pidagendaentregable int) returns INT
begin
	DECLARE vCantidad INT;
	
    select ifnull(sum(ce.cantidadentregada),0)
    into vCantidad
    from cumplimientoentregable ce 
    where ce.idagendaentregable=pidagendaentregable;

	return vCantidad;
end$$

DELIMITER ;
