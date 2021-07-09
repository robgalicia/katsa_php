DELIMITER $$

DROP PROCEDURE IF EXISTS sp_usuario_all $$

CREATE PROCEDURE sp_usuario_all()  
begin
	select 	u.idusuario, u.login, u.nombre, date(u.fechaalta) as fechaalta, ifnull(u.fechabaja,'') as fechabaja, 
			ifnull(e.nombrecompleto,'') as nombreempleado
	from usuario u
		left outer join empleado e on e.idempleado=u.idempleado
	order by u.nombre;
end$$

DELIMITER ;
