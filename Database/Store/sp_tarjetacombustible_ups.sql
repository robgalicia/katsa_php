DELIMITER $$

DROP PROCEDURE IF EXISTS sp_tarjetacombustible_ups $$

CREATE PROCEDURE sp_tarjetacombustible_ups
(IN pidtarjetacombustible smallint,
IN pnumtarjeta           int,
IN pidempleadoresguardo  int,
IN pfecharesguardo       datetime,
IN pfechabaja            datetime,
IN pquien                varchar(15),
 OUT last_id INT)  

begin
	if pidtarjetacombustible = 0 then	
		insert into tarjetacombustible(numtarjeta,idempleadoresguardo,fecharesguardo,fechabaja,quien,cuando)
		values(pnumtarjeta,pidempleadoresguardo,pfecharesguardo,pfechabaja,pquien,fn_fecha_actual());

    	SET last_id = LAST_INSERT_ID();				
	else
		update tarjetacombustible SET
				numtarjeta=pnumtarjeta,
				idempleadoresguardo=pidempleadoresguardo,
				fecharesguardo=pfecharesguardo,
				fechabaja=pfechabaja,
				quien=pquien,
				cuando=fn_fecha_actual()
		where idtarjetacombustible = pidtarjetacombustible;

		SET last_id = pidtarjetacombustible;
	end if;

	commit;
end$$

DELIMITER ;

