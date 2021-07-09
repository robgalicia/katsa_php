DELIMITER $$

DROP FUNCTION IF EXISTS fn_edad_anios $$

create function fn_edad_anios(pfechanacimiento datetime) returns varchar(10)
begin	
	return concat(year(curdate())-year(pfechanacimiento) + if(date_format(curdate(),'%m-%d') > date_format(pfechanacimiento,'%m-%d'), 0 , -1 ),' AÑOS');
end$$

DELIMITER ;
