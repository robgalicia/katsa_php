DELIMITER $$

DROP PROCEDURE IF EXISTS sp_traslado_ups $$

CREATE PROCEDURE sp_traslado_ups
(IN pidtraslado         int,
IN pfechaservicio        datetime,
IN psolicitante          varchar(50),
IN pempresa              varchar(50),
IN ptiposervicio         char(1),
IN pidrutatraslado       smallint,
IN pestraslado           char(1),
IN pescordillera         char(1),
IN pesavanzada           char(1),
IN pobservaciones        varchar(500),
IN pquien            varchar(15),
 OUT last_id INT)

begin
    declare vfolio varchar(12);

	if pidtraslado = 0 then	
        CALL sp_foliotraslado(@folio);
        set vfolio=@folio;

        insert into traslado(folio, fechaservicio, solicitante, empresa, tiposervicio, idrutatraslado,
                    estraslado, escordillera, esavanzada, observaciones, quien, cuando)
        values (vfolio, pfechaservicio, psolicitante, pempresa, ptiposervicio, pidrutatraslado,
                    pestraslado, pescordillera, pesavanzada, pobservaciones, pquien, fn_fecha_actual());

    	SET last_id = LAST_INSERT_ID();				
	else
		update traslado SET
            fechaservicio=pfechaservicio,
            solicitante=psolicitante,
            empresa=pempresa,
            tiposervicio=ptiposervicio,
            idrutatraslado=pidrutatraslado,
            estraslado=pestraslado,
            escordillera=pescordillera,
            esavanzada=pesavanzada,
            observaciones=pobservaciones,
			quien=pquien,
			cuando=fn_fecha_actual()
		where idtraslado = pidtraslado;

		SET last_id = pidtraslado;
	end if;

	commit;
end$$

DELIMITER ;