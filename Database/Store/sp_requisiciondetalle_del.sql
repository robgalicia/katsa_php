DELIMITER $$

DROP PROCEDURE IF EXISTS sp_requisiciondetalle_del $$

CREATE PROCEDURE sp_requisiciondetalle_del(IN pidrequisiciondetalle	int)

begin
	declare vidrequisicion int;
	
	select idrequisicion into vidrequisicion
	from requisiciondetalle
	where idrequisiciondetalle = pidrequisiciondetalle;

	delete from requisiciondetalle
	where idrequisiciondetalle = pidrequisiciondetalle;
	
	update requisicion set 
		importetotal = (select sum(total) from requisiciondetalle where idrequisicion=vidrequisicion)
	where idrequisicion=vidrequisicion;
	
	commit;
end$$

DELIMITER ;