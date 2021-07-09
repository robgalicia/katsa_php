DELIMITER $$

DROP PROCEDURE IF EXISTS sp_datoscorreocompras $$

CREATE PROCEDURE sp_datoscorreocompras()  
begin
    declare vhost       varchar(100);
    declare vcuenta     varchar(100);
    declare vnombre     varchar(100);
    declare vusername   varchar(100);
    declare vpassword   varchar(100);
    declare vpuerto		int;

    select ifnull(valorstring,'') into vhost 
    from parametros
    where claveparametro='01'
    limit 1;

    select ifnull(valorstring,'') into vcuenta 
    from parametros
    where claveparametro='02'
    limit 1;

    select ifnull(valorstring,'') into vnombre 
    from parametros
    where claveparametro='03'
    limit 1;

    select ifnull(valorstring,'') into vusername 
    from parametros
    where claveparametro='04'
    limit 1;

    select ifnull(valorstring,'') into vpassword 
    from parametros
    where claveparametro='05'
    limit 1;

    select valornumerico into vpuerto 
    from parametros
    where claveparametro='06'
    limit 1;

    select 	vhost as host, vcuenta as cuenta, vnombre as nombre, vusername as username, vpassword as password, vpuerto as puerto;

end$$

DELIMITER ;