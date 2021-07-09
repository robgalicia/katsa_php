DELIMITER $$

DROP PROCEDURE IF EXISTS sp_formatolegal_sel $$

CREATE PROCEDURE sp_formatolegal_sel(IN pidformatolegal  	smallint)
begin

	select idformatolegal, claveformato, nombreformatolegal, contenido,
			margensuperior, margeninferior, margenizquierdo, margenderecho, storeprocedure
	from formatolegal
	where idformatolegal = pidformatolegal;

end$$

DELIMITER ;
