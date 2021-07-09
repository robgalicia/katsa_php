DELIMITER $$

DROP PROCEDURE IF EXISTS sp_usuario_sel $$

CREATE PROCEDURE sp_usuario_sel(in pidusuario smallint)  
begin
	select 	idusuario, login, password, nombre, fechaalta, ifnull(fechabaja,'') as fechabaja, 
			ifnull(idempleado,0) as idempleado
	from usuario
	where idusuario = pidusuario;
end$$

DELIMITER ;