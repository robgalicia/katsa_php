DELIMITER $$

DROP PROCEDURE IF EXISTS sp_vehiculopoliza_ins $$

CREATE PROCEDURE sp_vehiculopoliza_ins
(IN pidvehiculo          smallint,
IN pidaseguradora        smallint,
IN pnumpoliza            varchar(15),
IN piniciovigencia       datetime,
IN pfinalvigencia        datetime,
IN pfechapago            datetime,
IN pimportetotal         decimal(10,2),
IN pobservaciones        varchar(100),
IN pquien                varchar(15),
 OUT last_id INT)  

begin

	insert into vehiculopoliza(idvehiculo,idaseguradora,numpoliza,iniciovigencia,finalvigencia,fechapago,importetotal,observaciones,quien,cuando)
	values(pidvehiculo,pidaseguradora,pnumpoliza,piniciovigencia,pfinalvigencia,pfechapago,pimportetotal,pobservaciones,pquien,fn_fecha_actual());

   	SET last_id = LAST_INSERT_ID();	
	
	commit;
end$$

DELIMITER ;

