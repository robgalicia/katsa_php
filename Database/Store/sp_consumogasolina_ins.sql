DELIMITER $$

DROP PROCEDURE IF EXISTS sp_consumogasolina_ins $$

CREATE PROCEDURE sp_consumogasolina_ins
(IN psemana               char(2),
IN ptarjeta              varchar(10),
IN pfecha                varchar(10),
IN pservicio             varchar(100),
IN presponsable          varchar(50),
IN pvehiculo             varchar(50),
IN pkilometrajeanterior  varchar(10),
IN pniveltanqueantes     varchar(10),
IN pkilometrajecargar    varchar(10),
IN pniveltanquedespues   varchar(10),
IN plitros               varchar(10),
IN ptipocombustible      varchar(10),
IN ppreciolitro          varchar(10),
IN ppreciototal          varchar(10),
IN prendimientolitro     varchar(10),
IN pobservaciones        varchar(500),
IN pkilometrosrecorridos varchar(10),
IN pquien                varchar(15),
    OUT last_id INT)

begin

    insert into consumogasolina(semana,tarjeta,fecha,servicio,responsable,vehiculo,kilometrajeanterior,
                niveltanqueantes,kilometrajecargar,niveltanquedespues,litros,tipocombustible,
                preciolitro,preciototal,rendimientolitro,kilometrosrecorridos,observaciones,quien,cuando)
    values(psemana,ptarjeta,pfecha,pservicio,presponsable,pvehiculo,pkilometrajeanterior,
            pniveltanqueantes,pkilometrajecargar,pniveltanquedespues,plitros,ptipocombustible,
            ppreciolitro,ppreciototal,prendimientolitro,pkilometrosrecorridos,pobservaciones,pquien,fn_fecha_actual());

    SET last_id = LAST_INSERT_ID();


	commit;
end$$

DELIMITER ;