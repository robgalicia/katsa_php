DELIMITER $$

DROP PROCEDURE IF EXISTS sp_tipoajusteinventario_lst $$

CREATE PROCEDURE sp_tipoajusteinventario_lst()  
begin
    select 	idtipoajusteinventario, desctipoajusteinventario, tipomovimiento, 
            concat(desctipoajusteinventario,' (', case tipomovimiento when 'E' then 'ENTRADA' else 'SALIDA' end,')') as desctipomovimiento
    from tipoajusteinventario
	order by idtipoajusteinventario;
end$$

DELIMITER ;