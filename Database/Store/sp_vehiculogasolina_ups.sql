DELIMITER $$

DROP PROCEDURE IF EXISTS sp_vehiculogasolina_ups $$

CREATE PROCEDURE sp_vehiculogasolina_ups
(IN pidvehiculogasolina   int,
IN psemana               smallint,
IN pfecha                datetime,
IN pidtarjetacombustible smallint,
IN pidvehiculo           smallint,
IN pidregion			 smallint,
IN pidadscripcion        smallint,
IN pidcliente            int,
IN pidempleado           int,
IN pkilometrajeanterior  int,
IN pniveltanqueantes     varchar(10),
IN pkilometrajeactual    int,
IN pniveltanquedespues   varchar(10),
IN pidtipocombustible    smallint,
IN pcantidadlitros       decimal(8,2),
IN ppreciolitro          decimal(10,2),
IN ppreciototal          decimal(10,2),
IN pkilometrosrecorridos int,
IN prendimientolitro     decimal(6,2),
IN pobservaciones        varchar(100),
IN pquien                varchar(15),
 OUT last_id INT)

begin

	if pidvehiculogasolina = 0 then	

		insert into vehiculogasolina(semana,fecha,idtarjetacombustible,idvehiculo,idregion,idadscripcion,idcliente,idempleado,kilometrajeanterior,
					niveltanqueantes,kilometrajeactual,niveltanquedespues,idtipocombustible,cantidadlitros,preciolitro,preciototal,
					kilometrosrecorridos,rendimientolitro,observaciones,quien,cuando)
		values(psemana,pfecha,pidtarjetacombustible,pidvehiculo,pidregion,pidadscripcion,pidcliente,pidempleado,pkilometrajeanterior,
					pniveltanqueantes,pkilometrajeactual,pniveltanquedespues,pidtipocombustible,pcantidadlitros,ppreciolitro,ppreciototal,
					pkilometrosrecorridos,prendimientolitro,pobservaciones,pquien,fn_fecha_actual());

    	SET last_id = LAST_INSERT_ID();				
	else
		update vehiculogasolina SET
			semana=psemana,
			fecha=pfecha,
			idtarjetacombustible=pidtarjetacombustible,
			idvehiculo=pidvehiculo,
			idregion=pidregion,
			idadscripcion=pidadscripcion,
			idcliente=pidcliente,
			idempleado=pidempleado,
			kilometrajeanterior=pkilometrajeanterior,
			niveltanqueantes=pniveltanqueantes,
			kilometrajeactual=pkilometrajeactual,
			niveltanquedespues=pniveltanquedespues,
			idtipocombustible=pidtipocombustible,
			cantidadlitros=pcantidadlitros,
			preciolitro=ppreciolitro,
			preciototal=ppreciototal,
			kilometrosrecorridos=pkilometrosrecorridos,
			rendimientolitro=prendimientolitro,
			observaciones=pobservaciones,
			quien=pquien,
			cuando=fn_fecha_actual()
		where idvehiculogasolina = pidvehiculogasolina;

		SET last_id = pidvehiculogasolina;
	end if;

	commit;
end$$

DELIMITER ;
