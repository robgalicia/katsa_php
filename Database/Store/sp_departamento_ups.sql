DELIMITER $$

DROP PROCEDURE IF EXISTS sp_departamento_ups $$

CREATE PROCEDURE sp_departamento_ups
(IN piddepartamento         int,
IN pdescdepartamento         varchar(50),
IN pquien            varchar(15),
 OUT last_id INT)

begin
	if piddepartamento = 0 then	

		insert into departamento(descdepartamento,quien,cuando)
		values(pdescdepartamento,pquien,fn_fecha_actual());

    	SET last_id = LAST_INSERT_ID();				
	else
		update departamento SET
			descdepartamento=pdescdepartamento,			
			quien=pquien,
			cuando=fn_fecha_actual()
		where iddepartamento = piddepartamento;

		SET last_id = piddepartamento;
	end if;

	commit;
end$$

DELIMITER ;