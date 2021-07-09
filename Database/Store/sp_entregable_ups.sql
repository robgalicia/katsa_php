DELIMITER $$

DROP PROCEDURE IF EXISTS sp_entregable_ups $$

CREATE PROCEDURE sp_entregable_ups
(IN pidentregable int,
IN piddepartamento      smallint,
IN pidcategoria         smallint,
IN pdescentregable      varchar(100),
IN pquien                varchar(15),
 OUT last_id INT)  

begin
	if pidentregable = 0 then	

		insert into entregable(iddepartamento,idcategoria,descentregable,quien,cuando)
		values(piddepartamento,pidcategoria,pdescentregable,pquien,fn_fecha_actual());

    	SET last_id = LAST_INSERT_ID();				
	else
		update entregable SET
            iddepartamento=piddepartamento,
            idcategoria=pidcategoria,
            descentregable=pdescentregable,
            quien=pquien,
            cuando=fn_fecha_actual()
		where identregable = pidentregable;

		SET last_id = pidentregable;
	end if;

	commit;
end$$

DELIMITER ;
