DELIMITER $$

DROP FUNCTION IF EXISTS fn_periodocontrato $$

create function fn_periodocontrato(pperiodo char(1)) returns varchar(10)
begin	
	declare vperiodo varchar(10);
	
	set vperiodo =
		case pperiodo
			when 'D' then 'DIAS'
			when 'S' then 'SEMANAS'
			when 'M' then 'MESES'
			when 'A' then 'AÑOS'
			when 'I' then 'INDETERMINADO'
			else 'ERROR'
		END	;
	
	return vperiodo;
end$$

DELIMITER ;
