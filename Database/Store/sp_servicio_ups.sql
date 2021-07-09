DELIMITER $$

DROP PROCEDURE IF EXISTS sp_servicio_ups $$

CREATE PROCEDURE sp_servicio_ups
(IN pidservicio           int,
IN pdescripcioncorta     varchar(100),
IN pdescservicio         varchar(1000),
IN ppreciounitario       decimal(12,2),
IN pidtipomoneda         smallint,
IN pquien               varchar(15),
 OUT last_id INT)  

begin
	if pidservicio = 0 then	
		insert into servicio(descripcioncorta,descservicio,preciounitario,idtipomoneda,quien,cuando)
		values(pdescripcioncorta,pdescservicio,ppreciounitario,pidtipomoneda,pquien,fn_fecha_actual());

    	SET last_id = LAST_INSERT_ID();				
	else
		update servicio SET
			descripcioncorta=pdescripcioncorta,
			descservicio=pdescservicio,
			preciounitario=ppreciounitario,
			idtipomoneda=pidtipomoneda,
			quien=pquien,
			cuando=fn_fecha_actual()
		where idservicio = pidservicio;

		SET last_id = pidservicio;
	end if;

	commit;
end$$

DELIMITER ;

