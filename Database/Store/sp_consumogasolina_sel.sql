DELIMITER $$

DROP PROCEDURE IF EXISTS sp_consumogasolina_sel $$

CREATE PROCEDURE sp_consumogasolina_sel(IN psemana int)

begin

    select idconsumogasolina,semana,tarjeta,fecha,servicio,responsable,vehiculo,kilometrajeanterior,
                niveltanqueantes,kilometrajecargar,niveltanquedespues,litros,tipocombustible,
                preciolitro,preciototal,rendimientolitro,kilometrosrecorridos,observaciones
    from consumogasolina
    where semana = lpad(convert(psemana,char),2,0);

end$$

DELIMITER ;