DELIMITER $$

DROP PROCEDURE IF EXISTS sp_empleadocontrato_ins $$

CREATE PROCEDURE sp_empleadocontrato_ins
(IN pidempleado    		int,
IN pfechacontrato    	datetime,
IN pdiascontrato        smallint,
IN pperidocontrato		char(1),
IN pfechainicial        datetime,
IN pfechafinal          datetime,
IN pesquemapago			char(1),
IN psalariodiariointegrado decimal(10,2),
IN psueldonetomensual   decimal(10,2),
IN pquien               varchar(15),
 OUT last_id INT)  
   
begin
	declare vconsecutivo	smallint;
	declare vfechaingreso	datetime;
	
	select ifnull(fechareingreso,fechaingreso) into vfechaingreso
	from empleado
	where idempleado=pidempleado;
	
	select ifnull(max(consecutivo),0) into vconsecutivo
	from empleadocontrato
	where idempleado=pidempleado;
	
	set vconsecutivo = vconsecutivo + 1;

	insert into empleadocontrato(idempleado,consecutivo,fechaingreso,fechacontrato,diascontrato,periodocontrato,
				fechainicial,fechafinal,esquemapago,salariodiariointegrado,sueldonetomensual,quien,cuando)
	values(pidempleado,vconsecutivo,vfechaingreso,pfechacontrato,pdiascontrato,pperidocontrato,
				pfechainicial,pfechafinal,pesquemapago,psalariodiariointegrado,psueldonetomensual,pquien,fn_fecha_actual());

   	SET last_id = LAST_INSERT_ID();	

	update empleado set 
		sueldonetomensual=psueldonetomensual,
		sueldodiarioimss=psalariodiariointegrado,
		idestatus=1	-- Activo
	where idempleado=pidempleado;	
	
	commit;
end$$

DELIMITER ;
