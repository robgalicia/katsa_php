DELIMITER $$

DROP PROCEDURE IF EXISTS sp_unidadmedida_ups $$

CREATE PROCEDURE sp_unidadmedida_ups
(IN pidunidadmedida  		smallint,
IN pdescunidadmedida    		varchar(30),
IN pnombrecorto    		varchar(5),
 IN pquien          varchar(15),
 OUT last_id INT)  

begin

	if pidunidadmedida = 0 then
		insert into unidadmedida(idunidadmedida, descunidadmedida, nombrecorto, quien, cuando)
		values (pidunidadmedida, pdescunidadmedida,pnombrecorto, pquien, fn_fecha_actual());

    	SET last_id = LAST_INSERT_ID();				
	else
		update unidadmedida SET
		   idunidadmedida = pidunidadmedida,
		   descunidadmedida = pdescunidadmedida,
           nombrecorto = pnombrecorto,
           quien = pquien,
           cuando = fn_fecha_actual()
		where idunidadmedida = pidunidadmedida;

		SET last_id = pidunidadmedida;
	end if;

end$$

DELIMITER ;
