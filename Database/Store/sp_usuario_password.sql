DELIMITER $$

DROP PROCEDURE IF EXISTS sp_usuario_password $$

CREATE PROCEDURE sp_usuario_password
(IN pidusuario  		smallint,
 IN ppassword    	varchar(50),  
 IN pquien          varchar(15))

begin

	update usuario SET
	   password = ppassword,
       quien = pquien,
       cuando = fn_fecha_actual()
	where idusuario = pidusuario;

end$$

DELIMITER ;