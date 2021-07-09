DELIMITER $$

DROP PROCEDURE IF EXISTS sp_traslado_selfolio $$

CREATE PROCEDURE sp_traslado_selfolio(IN panio smallint, IN pmes smallint)
begin
    select idtraslado, folio, fechaservicio 
    from traslado
    where year(fechaservicio)=panio and month(fechaservicio)=pmes
    order by folio;
end$$

DELIMITER ;