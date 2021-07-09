DELIMITER $$

DROP PROCEDURE IF EXISTS sp_bitsesion_all $$

CREATE PROCEDURE sp_bitsesion_all(IN pfechaini datetime)
begin
	SELECT idsesion, login, nombre, ifnull(fechalogin,'') as fechalogin, ifnull(fechalogout,'') as fechalogout
    FROM bitsesion
    WHERE convert(fechalogin,date) = pfechaini;

end$$

DELIMITER ;