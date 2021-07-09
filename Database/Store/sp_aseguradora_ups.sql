DELIMITER $$

DROP PROCEDURE IF EXISTS sp_aseguradora_ups $$

CREATE PROCEDURE sp_aseguradora_ups
(IN pidaseguradora     smallint,
IN pdescaseguradora       varchar(50),
IN pquien                varchar(15),
 OUT last_id INT)  

begin
	if pidaseguradora = 0 then	

		insert into aseguradora(idaseguradora,descaseguradora,quien,cuando)
		values(pidaseguradora,pdescaseguradora,pquien,fn_fecha_actual());

    	SET last_id = LAST_INSERT_ID();				
	else
		update aseguradora SET
			idaseguradora=pidaseguradora,
			descaseguradora=pdescaseguradora,
			quien=pquien,
			cuando=fn_fecha_actual()
		where idaseguradora = pidaseguradora;

		SET last_id = pidaseguradora;
	end if;

	commit;
end$$

DELIMITER ;

