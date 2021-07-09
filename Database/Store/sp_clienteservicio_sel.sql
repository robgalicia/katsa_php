DELIMITER $$

DROP PROCEDURE IF EXISTS sp_clienteservicio_sel $$

CREATE PROCEDURE sp_clienteservicio_sel(IN pidclienteservicio int)

begin

	select 	cs.idclienteservicio, cs.idservicio, cs.descripcioncorta, cs.descservicio, cs.preciounitario,
            cs.idtipomoneda, tm.desctipomoneda
	from clienteservicio cs
		inner join tipomoneda tm on tm.idtipomoneda=cs.idtipomoneda
	where cs.idclienteservicio = pidclienteservicio;

end$$

DELIMITER ;