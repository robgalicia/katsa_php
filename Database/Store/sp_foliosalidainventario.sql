	
DELIMITER $$

DROP PROCEDURE IF EXISTS sp_foliosalidainventario $$

CREATE PROCEDURE sp_foliosalidainventario
(OUT folio varchar(12))  

/***
CALL sp_foliosalidainventario(@folio);
select @folio;
***/

begin

	declare vanio			int;
	declare vmes			smallint;
    declare vsmes			char(2);
	declare vmax			int;
	declare vconsecutivo	char(5);

	/****
	4 digitos año actual
	2 digitos mes actual
	1 digito guión separación
	5 dígitos número consecutivo
	202011-00549
	****/

   	set vanio = year(now());
   	set vmes = month(now());

	set vsmes = convert(vmes,char(2));
	if vmes < 10 then
		set vsmes = concat('0', convert(vmes,char(1)));
	end if;

	SELECT ifnull(count(*),0) INTO vmax
	FROM salidainventario
	WHERE year(fechasalida) = year(now()) and month(fechasalida) = month(now());

	set vmax = vmax + 1;
	set vconsecutivo = '00001';
	set vconsecutivo = convert(vmax,char(5));
	set vconsecutivo = lpad(vconsecutivo,5,'0');

	set folio = concat(convert(vanio,char(4)), vsmes, '-', vconsecutivo);

end$$

DELIMITER ;
