DELIMITER $$

DROP PROCEDURE IF EXISTS sp_bitactividad_detalle $$

CREATE PROCEDURE sp_bitactividad_detalle(IN pidsesion int)
begin
	SELECT idbitactividad, idsesion, fecha, opcionsistema, opcionpantalla, query, detalleaccion
    FROM bitactividad
    WHERE idsesion = pidsesion;

end$$

DELIMITER ;