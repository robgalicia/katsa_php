DELIMITER $$

DROP PROCEDURE IF EXISTS sp_doctoarchivodocumento_del $$

CREATE PROCEDURE sp_doctoarchivodocumento_del(IN piddoctoarchivodocumento int)

begin
    delete from doctoarchivodocumento
    where iddoctoarchivodocumento=piddoctoarchivodocumento;

    commit;
end$$

DELIMITER ;