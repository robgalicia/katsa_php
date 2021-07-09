DELIMITER $$

DROP PROCEDURE IF EXISTS sp_hojatraslado_sel $$

CREATE PROCEDURE sp_hojatraslado_sel(IN pidhojatraslado int)
begin
    select  idhojatraslado, idtraslado, numhojatraslado, tiposervicio
    from hojatraslado
    where idhojatraslado = pidhojatraslado;
end$$

DELIMITER ;