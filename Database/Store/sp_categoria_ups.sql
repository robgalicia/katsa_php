DELIMITER $$

DROP PROCEDURE IF EXISTS sp_categoria_ups $$

CREATE PROCEDURE sp_categoria_ups
(IN pidcategoria         smallint,
IN pdesccategoria        varchar(50),
IN pquien                varchar(15),
 OUT last_id INT)

begin
	if pidcategoria = 0 then	

		insert into categoria(desccategoria,quien,cuando)
		values(pdesccategoria,pquien,fn_fecha_actual());

    	SET last_id = LAST_INSERT_ID();				
	else
		update categoria SET
			desccategoria = pdesccategoria,
			quien=pquien,
			cuando=fn_fecha_actual()
		where idcategoria = pidcategoria;

		SET last_id = pidcategoria;
	end if;

	commit;
end$$

DELIMITER ;

