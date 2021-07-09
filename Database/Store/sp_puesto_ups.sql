DELIMITER $$

DROP PROCEDURE IF EXISTS sp_puesto_ups $$

CREATE PROCEDURE sp_puesto_ups
(IN pidpuesto 		smallint,
IN pdescpuesto		varchar(50),
IN ptipopuesto		char(1),
IN pdescfunciones	varchar(500),
IN piddepartamento  smallint,
IN pquien           varchar(15),
 OUT last_id INT)  

begin
	if pidpuesto = 0 then	

		insert into puesto(descpuesto,tipopuesto,descfunciones,iddepartamento,quien,cuando)
		values(pdescpuesto,ptipopuesto,pdescfunciones,piddepartamento,pquien,fn_fecha_actual());

    	SET last_id = LAST_INSERT_ID();				
	else
		update puesto SET
			descpuesto=pdescpuesto,
			tipopuesto=ptipopuesto,
			descfunciones=pdescfunciones,
			iddepartamento=piddepartamento,
			quien=pquien,
			cuando=fn_fecha_actual()
		where idpuesto = pidpuesto;

		SET last_id = pidpuesto;
	end if;

	commit;
end$$

DELIMITER ;

