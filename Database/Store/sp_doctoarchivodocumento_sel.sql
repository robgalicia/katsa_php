DELIMITER $$

DROP PROCEDURE IF EXISTS sp_doctoarchivodocumento_sel $$

CREATE PROCEDURE sp_doctoarchivodocumento_sel(IN pclavedoctomodulo char(2), IN pidcampollave int)

begin
    select 	d.iddoctomodulo, td.iddoctotipodocumento, td.descdoctotipodocumento,
            ifnull(da.iddoctoarchivodocumento,0) as iddoctoarchivodocumento,
            ifnull(da.nombrearchivodocumento,'') as nombrearchivodocumento,
            ifnull(da.nombrearchivouuid,'') as nombrearchivouuid
    from doctomodulo d
        inner join doctotipodocumento td on td.iddoctomodulo=d.iddoctomodulo
        left outer join doctoarchivodocumento da on da.iddoctotipodocumento=td.iddoctotipodocumento and da.idcampollave=pidcampollave
    where d.clavedoctomodulo=pclavedoctomodulo;
end$$

DELIMITER ;