DELIMITER $$

DROP PROCEDURE IF EXISTS sp_usuario_ups $$

CREATE PROCEDURE sp_usuario_ups
(IN pidusuario  		smallint,
 IN plogin    		varchar(15),
 IN ppassword    	varchar(50),
 IN pnombre      	varchar(30),
 IN pfechaalta      datetime,
 IN pfechabaja      datetime,
 IN pidempleado   	smallint,
 IN pquien          varchar(15),
 OUT last_id INT)  

begin

	if pidusuario = 0 then
		insert into usuario(login, password, nombre, fechaalta, fechabaja, idempleado, quien, cuando)
		values (plogin, ppassword, pnombre, pfechaalta, pfechabaja, pidempleado, pquien, fn_fecha_actual());

    	SET last_id = LAST_INSERT_ID();				
	else
		update usuario SET
		   login = plogin,
		   password = ppassword,
		   nombre = pnombre,
		   fechaalta = pfechaalta,
		   fechabaja = pfechabaja,
		   idempleado = pidempleado,
           quien = pquien,
           cuando = fn_fecha_actual()
		where idusuario = pidusuario;

		SET last_id = pidusuario;
	end if;

end$$

DELIMITER ;
