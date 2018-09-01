
CREATE
   OR REPLACE 
    VIEW `lamoric_db`.`log_pub` 
    AS
(
SELECT id, FROM_UNIXTIME(log_time, '%Y-%m-%d %H:%i:%s') log_time,
	CASE SUBSTRING_INDEX(category, '\\', -1)
		WHEN  'login' THEN 'Logowanie'
		WHEN  'logout' THEN 'Wylogowanie'
		WHEN  'report' THEN CONCAT('Wydruk raportu: \'', report, '\'')
		WHEN  'insert' THEN CASE region 
					WHEN 'member' THEN 'Dodanie nowego członka'
					WHEN 'company' THEN 'Dodanie nowej firmy'
					WHEN 'document' THEN 'Dodanie nowego dokumentu'
					WHEN 'profile' THEN 'Dodanie nowego użytkownika'
					WHEN 'category' THEN 'Dodanie kategorii'
					END 
		WHEN  'update' THEN CASE region 
					WHEN 'member' THEN 'Edycja danych członka'
					WHEN 'company' THEN 'Edycja danych firmy'
					WHEN 'document' THEN 'Edycja dokumentu'
					WHEN 'profile' THEN 'Edycja danych użytkownika'
					WHEN 'category' THEN 'Edycja kategorii'
					END 
		WHEN  'delete' THEN CASE region 
					WHEN 'member' THEN 'Usunięcie członka'
					WHEN 'company' THEN 'Usunięcie firmy'
					WHEN 'document' THEN 'Usunięcie dokumentu'
					WHEN 'profile' THEN 'Usunięcie użytkownika'
					WHEN 'category' THEN 'Usunięcie kategorii'
					END 
		ELSE SUBSTRING_INDEX(category, '\\', -1)
		END message,
		USER prefix
FROM log_format);
