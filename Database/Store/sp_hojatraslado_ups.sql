DELIMITER $$

DROP PROCEDURE IF EXISTS sp_hojatraslado_ups $$

CREATE PROCEDURE sp_hojatraslado_ups
(IN pidhojatraslado int,
IN pidtraslado     int,
IN pnumhojatraslado smallint,
IN ptiposervicio    char(1),
IN pquien           varchar(15),
 OUT last_id INT)  

begin
    declare vnumhojatraslado smallint;
    declare vmax smallint;

	if pidhojatraslado = 0 then	

        SELECT ifnull(count(*),0) INTO vmax
        FROM hojatraslado
        WHERE idtraslado=pidtraslado;

        set vnumhojatraslado = vmax + 1;

        insert into hojatraslado(idtraslado,numhojatraslado,tiposervicio,quien,cuando)
        values(pidtraslado,vnumhojatraslado,ptiposervicio,pquien,fn_fecha_actual());

        SET last_id = LAST_INSERT_ID();		

	else
		update hojatraslado SET
            idtraslado=pidtraslado,
            numhojatraslado=pnumhojatraslado,
            tiposervicio=ptiposervicio,
			quien=pquien,
			cuando=fn_fecha_actual()
		where idhojatraslado = pidhojatraslado;

		SET last_id = pidhojatraslado;
	end if;

	commit;
end$$

DELIMITER ;