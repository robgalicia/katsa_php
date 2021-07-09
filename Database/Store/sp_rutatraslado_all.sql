DELIMITER $$

DROP PROCEDURE IF EXISTS sp_rutatraslado_all $$

CREATE PROCEDURE sp_rutatraslado_all()
begin
	select 	idrutatraslado, descrutatraslado, importetarifa, rt.idtipomoneda, tm.abreviacion as tipomoneda
	from rutatraslado rt
        inner join tipomoneda tm on tm.idtipomoneda=rt.idtipomoneda
	order by descrutatraslado;

end$$

DELIMITER ;
