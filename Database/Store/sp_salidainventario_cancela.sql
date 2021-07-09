DELIMITER $$

DROP PROCEDURE IF EXISTS sp_salidainventario_cancela $$

CREATE PROCEDURE sp_salidainventario_cancela
(IN pidsalidainventario int,
IN pidempleadocancela   int,
IN pmotivocancelacion	varchar(100),
IN pquien varchar(15))
begin
	update salidainventario set
		fechacancelacion=fn_fecha_actual(),
		idempleadocancela=pidempleadocancela,
		motivocancelacion=pmotivocancelacion,
		quien=pquien,
		cuando=fn_fecha_actual()
	where idsalidainventario=pidsalidainventario;
	
	commit;
end$$

DELIMITER ;




