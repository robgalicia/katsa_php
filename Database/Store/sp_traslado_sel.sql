DELIMITER $$

DROP PROCEDURE IF EXISTS sp_traslado_sel $$

CREATE PROCEDURE sp_traslado_sel(IN pidtraslado int)
begin
    select folio, fechaservicio, solicitante, empresa, tiposervicio, idrutatraslado,
           estraslado, escordillera, esavanzada, observaciones
    from traslado
	where idtraslado=pidtraslado;
end$$

DELIMITER ;