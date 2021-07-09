DELIMITER $$

DROP PROCEDURE IF EXISTS sp_formatolegal_all $$

CREATE PROCEDURE sp_formatolegal_all()
begin

	select idformatolegal, claveformato, nombreformatolegal, contenido
	from formatolegal
	order by claveformato;

end$$

DELIMITER ;
