DELIMITER $$

DROP PROCEDURE IF EXISTS sp_trasladorecorrido_all $$

CREATE PROCEDURE sp_trasladorecorrido_all(IN pidhojatraslado int)

begin

    select  idtrasladorecorrido,fecharecorrido,horasalida,horallegada,vehiculo,placas,
            empresavehiculo,operador,recorrido,observaciones
    from trasladorecorrido
    where idhojatraslado=pidhojatraslado
    order by idtrasladorecorrido;
    	
	commit;
end$$

DELIMITER ;