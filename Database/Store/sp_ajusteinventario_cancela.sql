DELIMITER $$

DROP PROCEDURE IF EXISTS sp_ajusteinventario_cancela $$

CREATE PROCEDURE sp_ajusteinventario_cancela
(IN pidajusteinventario int,
IN pidempleadocancela   int,
IN pmotivocancelacion	varchar(100),
IN pquien varchar(15))
begin
	update ajusteinventario set
		fechacancelacion=fn_fecha_actual(),
		idempleadocancela=pidempleadocancela,
		motivocancelacion=pmotivocancelacion,
		quien=pquien,
		cuando=fn_fecha_actual()
	where idajusteinventario=pidajusteinventario;
	
	commit;
end$$

DELIMITER ;