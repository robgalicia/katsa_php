DELIMITER $$

DROP PROCEDURE IF EXISTS sp_vehiculotenencia_ins $$

CREATE PROCEDURE sp_vehiculotenencia_ins
(IN pidvehiculo          smallint,
IN pfechapago            datetime,
IN pimportepagado        decimal(10,2),
IN pfechavigencia        datetime,
IN pplacas               varchar(8),
IN pfoliotarjeta		 varchar(10),
IN pquien                varchar(15),
 OUT last_id INT)  

begin

	insert into vehiculotenencia(idvehiculo,fechapago,importepagado,fechavigencia,placas,foliotarjeta,quien,cuando)
	values(pidvehiculo,pfechapago,pimportepagado,pfechavigencia,pplacas,pfoliotarjeta,pquien,fn_fecha_actual());

   	SET last_id = LAST_INSERT_ID();	
	
	commit;
end$$

DELIMITER ;
