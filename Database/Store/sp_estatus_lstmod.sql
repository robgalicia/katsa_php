DELIMITER $$

DROP PROCEDURE IF EXISTS sp_estatus_lstmod $$

CREATE PROCEDURE sp_estatus_lstmod(IN pmodulo varchar(4))
begin
	select idestatus, descestatus
	from estatus
	where modulo=pmodulo
	order by idestatus;
end$$

DELIMITER ;
