DELIMITER $$

DROP PROCEDURE IF EXISTS sp_trasladorecorrido_ins $$

CREATE PROCEDURE sp_trasladorecorrido_ins
(IN pidhojatraslado     int,
IN pfecharecorrido      datetime,
IN phorasalida          varchar(5),
IN phorallegada         varchar(5),
IN pvehiculo            varchar(50),
IN pplacas              varchar(8),
IN pempresavehiculo     varchar(50),
IN poperador            varchar(50),
IN precorrido           varchar(150),
IN pobservaciones       varchar(100),
IN pquien               varchar(15),
 OUT last_id INT)  

begin

    insert into trasladorecorrido(idhojatraslado,fecharecorrido,horasalida,horallegada,vehiculo,
            placas,empresavehiculo,operador,recorrido,observaciones,quien,cuando)
    values(pidhojatraslado,pfecharecorrido,phorasalida,phorallegada,pvehiculo,
            pplacas,pempresavehiculo,poperador,precorrido,pobservaciones,pquien,fn_fecha_actual());

    SET last_id = LAST_INSERT_ID();				
    	
	commit;
end$$

DELIMITER ;