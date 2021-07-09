DELIMITER $$

DROP PROCEDURE IF EXISTS sp_clienteservicio_ups $$

CREATE PROCEDURE sp_clienteservicio_ups
(IN pidclienteservicio   int,
IN pidcliente            int,
IN pidservicio           int,
IN pdescripcioncorta     varchar(100),
IN pdescservicio         varchar(1000),
IN ppreciounitario       decimal(12,2),
IN pidtipomoneda         smallint,
IN pquien                varchar(15),
 OUT last_id INT)

begin
	if pidclienteservicio = 0 then	

		insert into clienteservicio(idcliente,idservicio,descripcioncorta,descservicio,
                    preciounitario,idtipomoneda,quien,cuando)
		values(pidcliente,pidservicio,pdescripcioncorta,pdescservicio,
                    ppreciounitario,pidtipomoneda,pquien,fn_fecha_actual());

    	SET last_id = LAST_INSERT_ID();				
	else
		update clienteservicio SET
			idcliente = pidcliente,
            idservicio=pidservicio,
            descripcioncorta=pdescripcioncorta,
            descservicio=pdescservicio,
            preciounitario=ppreciounitario,
            idtipomoneda=pidtipomoneda,
			quien=pquien,
			cuando=fn_fecha_actual()
		where idclienteservicio = pidclienteservicio;

		SET last_id = pidclienteservicio;
	end if;

	commit;
end$$

DELIMITER ;
