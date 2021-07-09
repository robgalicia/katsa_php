DELIMITER $$

DROP PROCEDURE IF EXISTS sp_clienteservicio_del $$

CREATE PROCEDURE sp_clienteservicio_del(IN pidclienteservicio int)

begin

	delete from clienteservicio
	where idclienteservicio = pidclienteservicio;

    commit;

end$$

DELIMITER ;