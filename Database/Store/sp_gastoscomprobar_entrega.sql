DELIMITER $$

DROP PROCEDURE IF EXISTS sp_gastoscomprobar_entrega $$

CREATE PROCEDURE sp_gastoscomprobar_entrega
(IN pidgastoscomprobar int,
IN pfechalimitecomprobacion datetime,
IN pidcuentabancaria smallint,
IN preferenciaentrega varchar(50),
IN pcentrocostos int,
IN pquien varchar(15))
begin
	update gastoscomprobar set
		idestatus=20,	-- Entregado
		fechalimitecomprobacion=pfechalimitecomprobacion,
		fechaentrega=fn_fecha_actual(),
		idcuentabancaria=pidcuentabancaria,
		referenciaentrega=preferenciaentrega,
		centrocostos =pcentrocostos,
		quien=pquien,
		cuando=fn_fecha_actual()
	where idgastoscomprobar=pidgastoscomprobar;
	
	commit;
end$$

DELIMITER ;
