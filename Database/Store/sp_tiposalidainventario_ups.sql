DELIMITER $$

DROP PROCEDURE IF EXISTS sp_tiposalidainventario_ups $$

CREATE PROCEDURE sp_tiposalidainventario_ups
(IN pidtiposalidainventario         smallint,
IN pdesctiposalidainventario         varchar(50),
IN pquien            varchar(15),
 OUT last_id INT)

begin
	if pidtiposalidainventario = 0 then	

		insert into tiposalidainventario(desctiposalidainventario,quien,cuando)
		values(pdesctiposalidainventario,pquien,fn_fecha_actual());

    	SET last_id = LAST_INSERT_ID();				
	else
		update tiposalidainventario SET
			desctiposalidainventario=pdesctiposalidainventario,			
			quien=pquien,
			cuando=fn_fecha_actual()
		where idtiposalidainventario = pidtiposalidainventario;

		SET last_id = pidtiposalidainventario;
	end if;

	commit;
end$$

DELIMITER ;

