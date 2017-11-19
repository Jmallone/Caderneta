CREATE DATABASE  <nome-banco>;

DROP DATABASE <nome-banco>;

CREATE TABLE <nome-tabela>(
<nome-coluna> <tipo-de-dado> (NULL / NOT NULL / UNIQUE)
PRIMARY KEY (<nome-coluna>));

ALTER TABLE <nome-tabela>
ADD <nome-coluna> <tipo-de-dado> (NULL / NOT NULL / UNIQUE)
DROP COLUMN <nome-coluna>;

DROP TABLE <nome-tabela>;

INSERT INTO <nome-tabela>(<nomes-colunas>) VALUES (<dados a serem inseridos>);

UPDATE <nome-tabela>
SET <nome-coluna> = <novo conteudo para o campo>
WHERE <condicao>;

DELETE FROM <nome-tabela>
WHERE <condicao>;

SELECT (DISTINCT) / (*) / (<nome-coluna>)
FROM <nome-tabela>
WHERE <condicao>
(ORDER BY <nome-campo> (ASC/DESC)) / (GROUP BY <nome-coluna>) / (HAVING <condicao>);
