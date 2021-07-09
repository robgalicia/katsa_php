DELIMITER $$

DROP TRIGGER IF EXISTS tgrb_consumogasolina_ins $$

CREATE TRIGGER tgrb_consumogasolina_ins BEFORE INSERT ON consumogasolina
 FOR EACH ROW 
BEGIN
    declare vidtarjetacombustible smallint;
    declare vidvehiculo           smallint;
    declare vidregion             smallint;
    declare vidadscripcion        smallint;
    declare vidcliente            int;

    if exists(select 1 from tarjetacombustible where numtarjeta = NEW.xlstarjeta) then
        select idtarjetacombustible into vidtarjetacombustible
        from tarjetacombustible 
        where numtarjeta = convert(NEW.xlstarjeta, unsigned)
        limit 1;

        SET NEW.idtarjetacombustible = vidtarjetacombustible;

    end if;

    if exists(select 1 from vehiculo where placas like concat('%', NEW.xlsplaca,'%')) then
        select idvehiculo, idregionactual, idadscripcionactual, idclienteactual
        into vidvehiculo, vidregion, vidadscripcion, vidcliente
        from vehiculo where placas like concat('%', NEW.xlsplaca,'%')
        limit 1;

        SET NEW.idvehiculo = vidvehiculo;
        SET NEW.idregion = vidregion;
        SET NEW.idadscripcion = vidadscripcion;
        SET NEW.idcliente = vidcliente;

    end if;

    SET NEW.fecha = convert(NEW.xlsfecha,datetime);


END$$

DELIMITER ;

