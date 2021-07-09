DELIMITER $$

DROP PROCEDURE IF EXISTS sp_partida_ups $$

CREATE PROCEDURE sp_partida_ups
(IN pidpartida           smallint,
IN pdescpartida          varchar(50),
IN pcuentacontable       varchar(20),
IN ptipopartida          char(1),
IN pviaticos			 char(1),
IN pimporteunitario		 decimal(10,2),
IN pquien                varchar(15),
 OUT last_id INT)  

begin
	if pidpartida = 0 then	

		insert into partida(descpartida,cuentacontable,tipopartida,quien,cuando,viaticos,importeunitario)
		values(pdescpartida,pcuentacontable,ptipopartida,pquien,fn_fecha_actual(),pviaticos, pimporteunitario);

    	SET last_id = LAST_INSERT_ID();				
	else
		update partida SET
			descpartida=pdescpartida,
			cuentacontable=pcuentacontable,
			tipopartida=ptipopartida,
			quien=pquien,
			cuando=fn_fecha_actual(),
			viaticos=pviaticos,
			importeunitario=pimporteunitario
		where idpartida = pidpartida;

		SET last_id = pidpartida;
	end if;

	commit;
end$$

DELIMITER ;

