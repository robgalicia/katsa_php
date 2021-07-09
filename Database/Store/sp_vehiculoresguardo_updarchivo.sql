DELIMITER $$

DROP PROCEDURE IF EXISTS sp_vehiculoresguardo_updarchivo $$

CREATE PROCEDURE sp_vehiculoresguardo_updarchivo
(IN pidvehiculoresguardo int,
IN pnombrearchivo varchar(100),
IN pquien         varchar(15))

begin
	update vehiculoresguardo SET
		nombrearchivo=pnombrearchivo,
		quien=pquien,
		cuando=fn_fecha_actual()
	where idvehiculoresguardo = pidvehiculoresguardo;

	commit;
end$$

DELIMITER ;
