DELIMITER $$

DROP PROCEDURE IF EXISTS sp_clienteservicio_all $$

CREATE PROCEDURE sp_clienteservicio_all(IN pidcliente int)

begin

	select 	cs.idclienteservicio, cs.idservicio, cs.descripcioncorta, cs.descservicio, cs.preciounitario,
            cs.idtipomoneda, tm.desctipomoneda
	from clienteservicio cs
		inner join tipomoneda tm on tm.idtipomoneda=cs.idtipomoneda
	where cs.idcliente = pidcliente
    order by cs.idclienteservicio;

end$$

DELIMITER ;