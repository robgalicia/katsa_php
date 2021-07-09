DELIMITER $$

DROP PROCEDURE IF EXISTS sp_hojatraslado_ins $$

CREATE PROCEDURE sp_hojatraslado_ins
(IN pidtraslado     int,
IN ptiposervicio    char(1),
IN pquien           varchar(15),
 OUT last_id INT)  

begin

    declare vnumhojatraslado smallint;
    declare vmax smallint;

    SELECT ifnull(count(*),0) INTO vmax
	FROM hojatraslado
	WHERE idtraslado=pidtraslado;

	set vnumhojatraslado = vmax + 1;

    insert into hojatraslado(idtraslado,numhojatraslado,tiposervicio,quien,cuando)
    values(pidtraslado,vnumhojatraslado,ptiposervicio,pquien,fn_fecha_actual());

    SET last_id = LAST_INSERT_ID();				
    	
	commit;
end$$

DELIMITER ;
