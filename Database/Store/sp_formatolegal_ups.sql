
DELIMITER $$

DROP PROCEDURE IF EXISTS sp_formatolegal_ups $$

CREATE PROCEDURE sp_formatolegal_ups
(IN pidformatolegal  	smallint,
 IN pclaveformato    	char(3),
 IN pnombreformatolegal	varchar(50),
 IN pcontenido      	longtext,
 IN pquien              varchar(15),
 IN pmargensuperior     smallint, 
 IN pmargeninferior     smallint,
 IN pmargenizquierdo    smallint,
 IN pmargenderecho      smallint,
 IN pstoreprocedure     varchar(50),
 OUT last_id INT)  

begin

	if pidformatolegal = 0 then
		insert into formatolegal(claveformato, nombreformatolegal, contenido, quien, cuando, 
								margensuperior, margeninferior, margenizquierdo, margenderecho, storeprocedure)
		values (pclaveformato, pnombreformatolegal, pcontenido, pquien, fn_fecha_actual(),
				pmargensuperior, pmargeninferior, pmargenizquierdo, pmargenderecho, pstoreprocedure);

    	SET last_id = LAST_INSERT_ID();				
	else
		update formatolegal SET
		   claveformato = pclaveformato,
		   nombreformatolegal = pnombreformatolegal,
		   contenido = pcontenido,
		   margensuperior = pmargensuperior,
		   margeninferior = pmargeninferior,
		   margenizquierdo = pmargenizquierdo,
		   margenderecho = pmargenderecho,
		   storeprocedure = pstoreprocedure,
           quien = pquien,
           cuando = fn_fecha_actual()
		where idformatolegal = pidformatolegal;

		SET last_id = pidformatolegal;
	end if;

end$$

DELIMITER ;
