DELIMITER $$

DROP PROCEDURE IF EXISTS sp_gastoscomprobardetalle_del $$

CREATE PROCEDURE sp_gastoscomprobardetalle_del(IN pidgastoscomprobardetalle  int)

begin
    declare vidgastoscomprobar int;

    select idgastoscomprobar into vidgastoscomprobar
    from gastoscomprobardetalle
    where idgastoscomprobardetalle=pidgastoscomprobardetalle;

    delete from gastoscomprobardetalle
    where idgastoscomprobardetalle=pidgastoscomprobardetalle;

	update gastoscomprobar set
		importetotal = (select sum(total) from gastoscomprobardetalle where idgastoscomprobar=vidgastoscomprobar)
	where idgastoscomprobar=vidgastoscomprobar;

    commit;
end$$

DELIMITER ;