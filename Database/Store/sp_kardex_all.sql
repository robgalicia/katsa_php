DELIMITER $$

DROP PROCEDURE IF EXISTS sp_kardex_all $$

CREATE PROCEDURE sp_kardex_all(IN pidarticulo int, IN pidalmacen smallint, IN pfechainicial date, IN pfechafinal date)
begin

	select 	fechamovimiento, documentoreferencia, folioreferencia, 
			case tipomovimiento when 'E' then 'ENTRADA' else 'SALIDA' end as tipomovimiento, 
			cantidad, existenciaactual, costounitario, ifnull(observaciones,'') as observaciones
	from kardex
	where idarticulo=pidarticulo and idalmacen=pidalmacen
	and convert(fechamovimiento, date) between pfechainicial and pfechafinal
	order by fechamovimiento;

end$$

DELIMITER ;

