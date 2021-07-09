DELIMITER $$

DROP PROCEDURE IF EXISTS sp_vehiculomantenimiento_ups $$

CREATE PROCEDURE sp_vehiculomantenimiento_ups
(IN pidvehiculomantenimiento   int,
IN pidvehiculo           smallint,
IN pfecha                datetime,
IN pkilometrajeactual    int,
IN pdescservicio         varchar(100),
IN pidproveedor       	int,
IN pidempleadocomision	int,
IN psubtotal			 decimal(10,2),
IN piva					 decimal(10,2),
IN pimportetotal         decimal(10,2),
IN pobservaciones        varchar(500),
IN pkmsproxmantenimiento int,
IN pfechapago            datetime,
IN preferenciapago       varchar(30),
IN pquien                varchar(15),
 OUT last_id INT)

begin

	if pidvehiculomantenimiento = 0 then	
		insert into vehiculomantenimiento(idvehiculo,fecha,kilometrajeactual,descservicio,idproveedor,
					idempleadocomision,subtotal,iva,importetotal,observaciones,quien,cuando,
					kmsproxmantenimiento,fechapago,referenciapago)
		values(pidvehiculo,pfecha,pkilometrajeactual,pdescservicio,pidproveedor,pidempleadocomision,
				psubtotal,piva,pimportetotal,pobservaciones,pquien,fn_fecha_actual(),
				pkmsproxmantenimiento,pfechapago,preferenciapago);

    	SET last_id = LAST_INSERT_ID();				
	else
		update vehiculomantenimiento SET
			idvehiculo=pidvehiculo,
			fecha=pfecha,
			kilometrajeactual=pkilometrajeactual,
			descservicio=pdescservicio,
			idproveedor=pidproveedor,
			idempleadocomision=pidempleadocomision,
			subtotal=psubtotal,
			iva=piva,
			importetotal=pimportetotal,
			observaciones=pobservaciones,
			kmsproxmantenimiento=pkmsproxmantenimiento,
			fechapago=pfechapago,
			referenciapago=preferenciapago,
			quien=pquien,
			cuando=fn_fecha_actual()
		where idvehiculomantenimiento = pidvehiculomantenimiento;

		SET last_id = pidvehiculomantenimiento;
	end if;

	commit;
end$$

DELIMITER ;
