DELIMITER $$

DROP FUNCTION IF EXISTS fn_fechaletra_largo $$

create function fn_fechaletra_largo(pfecha datetime) returns varchar(500)
begin
    declare vfechaletra varchar(500);
	declare vmes varchar(15);
	
	set vmes =
		case month(pfecha)
			when 1 then 'ENERO'
			when 2 then 'FEBRERO'
			when 3 then 'MARZO'
			when 4 then 'ABRIL'
			when 5 then 'MAYO'
			when 6 then 'JUNIO'
			when 7 then 'JULIO'
			when 8 then 'AGOSTO'
			when 9 then 'SEPTIEMBRE'
			when 10 then 'OCTUBRE'
			when 11 then 'NOVIEMBRE'
			when 12 then 'DICIEMBRE'
			else 'ERROR'
		END	;
	
	set vfechaletra = concat( fn_numeroletra(day(pfecha)) , ' DE ', vmes, ' DE ', fn_numeroletra(year(pfecha)));
	
	return vfechaletra;
end$$

DELIMITER ;
