DELIMITER $$

DROP PROCEDURE IF EXISTS sp_trasladovisitante_ins $$

CREATE PROCEDURE sp_trasladovisitante_ins
(IN pidhojatraslado     int,
IN pnombrevisitante     varchar(100),
IN pempresa             varchar(50),
IN pquien               varchar(15),
 OUT last_id INT)  

begin

    insert into trasladovisitante(idhojatraslado,nombrevisitante,empresa,quien,cuando)
    values(pidhojatraslado,pnombrevisitante,pempresa,pquien,fn_fecha_actual());

    SET last_id = LAST_INSERT_ID();				
    	
	commit;
end$$

DELIMITER ;