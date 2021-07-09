	
DELIMITER $$

DROP PROCEDURE IF EXISTS sp_foliorequisicion $$

CREATE PROCEDURE sp_foliorequisicion
(IN pidregion smallint,
OUT folio varchar(12))  

/***
CALL sp_foliorequisicion(1,@folio);
select @folio;
***/
	/****
	3 digitos - KAT (katsa)
	1 digito - prefijo de la región (Victoria, Reynosa, México)
	2 digitos - año actual
	2 digitos - número de semana actual
	4 dígitos - número consecutivo
	KATV21180549
	****/

begin
	declare vprefijofolio	char(1);
	declare vanio			int;
	declare vmax			int;
	declare vsemana			smallint;
	declare vssemana		char(2);
	declare vconsecutivo	char(5);

	select ifnull(prefijofolio,'X') into vprefijofolio
	from region
	where idregion = pidregion;

   	set vanio = year(now());
   	set vsemana = week(now());

	set vssemana = convert(vsemana,char(2));
	if vsemana < 10 then
		set vssemana = concat('0', convert(vsemana,char(1)));
	end if;

	SELECT ifnull(count(*),0) INTO vmax
	FROM requisicion
	WHERE idregion = pidregion and year(fecha) = year(now()) and week(fecha) = week(now());

	set vmax = vmax + 1;
	set vconsecutivo = '0001';
	set vconsecutivo = convert(vmax,char(4));
	set vconsecutivo = lpad(vconsecutivo,4,'0');

	set folio = concat('KAT', vprefijofolio, substring(convert(vanio,char(4)),3,2) , vssemana, vconsecutivo);

end$$

DELIMITER ;
