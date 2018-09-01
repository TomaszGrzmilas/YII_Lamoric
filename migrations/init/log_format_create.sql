
CREATE 
    VIEW `lamoric_db`.`log_format` 
    AS
(
SELECT id, SUBSTR(category,7) category, 
		SUBSTRING_INDEX(SUBSTR(category,7),'\\',1) region,
		SUBSTR(SUBSTRING_INDEX(prefix, ']', 1), 4) prefix,
		SUBSTR(message,INSTR(message,'USER[')+5, (INSTR(message,']') - (INSTR(message,'USER[')+5))) USER,
		SUBSTR(message,INSTR(message,'COMPANY[')+8, (LOCATE(']',message, INSTR(message,'COMPANY[')+8) - (INSTR(message,'COMPANY[')+8))) company,
		SUBSTR(message,INSTR(message,'PRINT REPORT [')+14, (LOCATE(']',message, INSTR(message,'PRINT REPORT [')+14) - (INSTR(message,'PRINT REPORT [')+14))) report,
		log_time
FROM LOG);
