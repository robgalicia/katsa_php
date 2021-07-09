DELIMITER $$

DROP PROCEDURE IF EXISTS sp_servicio_lstcliente $$

CREATE PROCEDURE sp_servicio_lstcliente(IN pidcliente int)  
begin

    select idservicio, descripcioncorta, descservicio, preciounitario, idtipomoneda
    from (
        select idservicio, descripcioncorta, descservicio, preciounitario, idtipomoneda
        from servicio
        where idservicio not in (select idservicio from clienteservicio where idcliente=pidcliente)
        union all
        select idservicio, descripcioncorta, descservicio, preciounitario, idtipomoneda 
        from clienteservicio
        where idcliente=pidcliente) as mov
    order by descripcioncorta;

end$$

DELIMITER ;