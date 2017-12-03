1. Nome do Bard com maior HP

SELECT F.nomeFicha
FROM FICHA F, CLASSE C
WHERE F.Classe_idClasse = C.idClasse
AND C.nomeClasse - 'Bard'
AND F.vidatotalFicha IN (SELECT MAX(F.vidatotalFicah)
				         FROM FICHA F)
                         
2. Média dos ACs dos Dwarfs

SELECT AVG(F.armorclassFicha)
FROM FICHA F, RACA R
WHERE F.Raca_idRaca = R.idRaca
AND R.nomeRaca - 'Dwarf'

3. Classe da Ficha com maior Nível

SELECT C.nomeClasse
FROM FICHA F, CLASSE C, NIVEL N
WHERE F.Classe_idClasse = C.idClasse
AND F.level_idLevel = N.idNivel
AND N.valorNivel IN (SELECT MAX(L.valorNivel)
				    FROM NIVEL N, FICHA F
                    WHERE N.idNivel = F.level_idLevel)

4. ID das Fichas com classe "Cleric"

SELECT F.idFicha
FROM FICHA F, CLASSE C
WHERE F.Classe_idClasse = C.idClasse
AND C.nomeClasse = 'Cleric' 

5. Classes de todas as Fichas de Raça "ELf"

SELECT C.nomeClasse
FROM CLASSE C, FICHA F, RACA R
WHERE C.idClasse = F.Classe_idClasse
AND F.Raca_idRaca = R.idRaca
AND R.NomeRaca = 'ELf' 

6. Itens da primeira Ficha cadastrada

SELECT I.NomeInventario
FROM FICHA F, INVENTARIO I
WHERE F.idFicha = I.Ficha_idFicha
AND F.idFicha = '1'

7. Nome do Jogador da primeira Ficha cadastrada

SELECT J.nomeJogador
FROM FICHA F, JOGADOR J
WHERE F.Jogador_idJogador = J.idJogador
AND F.idFicha = '1'

8. Menor stat da primeira Ficha cadastrada

SELECT MIN(Z.valor)
FROM FICHA F, FICHA_HAS_STATUS Z
WHERE F.idFicha = Z.ficha_idFicha
AND F.idFicha = '1'

9. Proficiências da primeira Ficha cadastrada

SELECT S.nomeSkill, Z.prof
FROM FICHA F, SKILL_HAS_FICHA Z, SKILL S
WHERE F.idFicha = Z.Ficha_idFicha
AND Z.Skill_idSkill = S.idSkill
AND F.idFicha = '1'

10. ID dos Jogadores na primeira Sala cadastradas

SELECT J.idJogador
FROM  JOGADOR J, FICHA F, SALA S
WHERE J.idJogador = F.Jogador_idJogador
AND F.Sala_idSala = S.idSala
AND S.idSala = '1'
