DELIMITER $$

DROP PROCEDURE IF EXISTS sp_formatolegal_lst $$

CREATE PROCEDURE sp_formatolegal_lst()
begin

	select distinct idformatolegal, claveformato, nombreformatolegal, margensuperior, margeninferior, margenizquierdo, margenderecho, storeprocedure
	from formatolegal
	order by claveformato;

end$$

DELIMITER ;
