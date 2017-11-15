DROP TABLE IF EXISTS CLASSE;
DROP TABLE IF EXISTS RACA;
DROP TABLE IF EXISTS NIVEL;
DROP TABLE IF EXISTS STAT;
DROP TABLE IF EXISTS SKILL;
DROP TABLE IF EXISTS DEP_SKILL;
DROP TABLE IF EXISTS JOGADOR;
DROP TABLE IF EXISTS SALA;
DROP TABLE IF EXISTS FICHA;
DROP TABLE IF EXISTS FICHA_HAS_STAT;
DROP TABLE IF EXISTS FICHA_HAS_SKILL;
DROP TABLE IF EXISTS INVENTARIO;

 
CREATE TABLE CLASSE(     
    idClasse INTEGER PRIMARY KEY,    
    nomeClasse VARCHAR (30),  
    dadoVida INTEGER  
); 
 
CREATE TABLE RACA(     
    idRaca INTEGER PRIMARY KEY,    
    nomeRaca VARCHAR (30)
); 
 
CREATE TABLE NIVEL(     
    idNivel INTEGER PRIMARY KEY,    
    valorNivel INTEGER,
    bonusProf INTEGER,
    xpNec INTEGER
); 
 
CREATE TABLE STAT(     
    idStat INTEGER PRIMARY KEY,    
    nomeStat VARCHAR (30)
);

CREATE TABLE SKILL(     
    idSkill INTEGER PRIMARY KEY,    
    nomeSkill VARCHAR (30)
);

CREATE TABLE DEP_SKILL(     
    idStat INTEGER,
    idSkill INTEGER,
    PRIMARY KEY (idStat, idSkill), 
    FOREIGN KEY(idStat) REFERENCES STAT(idStat),
    FOREIGN KEY(idSkill) REFERENCES SKILL(idSkill)
);  

CREATE TABLE JOGADOR(     
    idJogador INTEGER PRIMARY KEY,    
    nomeJogador VARCHAR (30),
    senha VARCHAR (30)
);

CREATE TABLE SALA(     
    idSala INTEGER PRIMARY KEY,    
    nomeSala VARCHAR (30)
);

CREATE TABLE FICHA(     
    idFicha INTEGER PRIMARY KEY,    
    nomeFicha VARCHAR (30),
    hpTotal INTEGER,
    hpAtual INTEGER,
    xp INTEGER,
    ac INTEGER,
    movimento INTEGER
);

CREATE TABLE FICHA_HAS_STAT(     
    idFicha INTEGER,
    idStat INTEGER,
    isProfSave BOOL,
    valorStat INTEGER,
    BonusMiscStat INTEGER,
    PRIMARY KEY (idFicha, idStat), 
	FOREIGN KEY(idFicha) REFERENCES FICHA(idFicha),
    FOREIGN KEY(idStat) REFERENCES STAT(idStat)
);

CREATE TABLE FICHA_HAS_SKILL(     
    idFicha INTEGER,
    idSkill INTEGER,
    isProfSkill BOOL,
    BonusMiscSkill INTEGER,
    PRIMARY KEY (idFicha, idSkill), 
	FOREIGN KEY(idFicha) REFERENCES FICHA(idFicha),
    FOREIGN KEY(idSkill) REFERENCES DEP_SKILL(idSkill)
);

CREATE TABLE INVENTARIO(  
	idFicha INTEGER,
    nomeItem VARCHAR (30),
    descricao VARCHAR (100),
    quantidade INTEGER,
    PRIMARY KEY (idFicha, nomeItem), 
    FOREIGN KEY(idFicha) REFERENCES FICHA(idFicha) 
);

INSERT INTO CLASSE(idClasse, nomeClasse, dadoVida) VALUES (1, 'Barbarian', 12), (2, 'Bard', 8), (3, 'Cleric', 8);

INSERT INTO RACA(idRaca, nomeRaca) VALUES (1, 'Dwarf'), (2, 'ELf'), (3, 'Halfling');

INSERT INTO NIVEL(idNivel, valorNivel, bonusProf, xpNec) VALUES (1, 1, 2, 0), (2, 2, 2, 300), (3, 3, 2, 900);

INSERT INTO STAT(idStat, nomeStat) VALUES (1, 'Strenght'), (2, 'Dexterity'), (3, 'Constitution'), (4, 'Intelligence'), (5, 'Wisodm'), (6, 'Charisma');

INSERT INTO SKILL(idSkill, nomeSkill) VALUES (1, 'Athletics'), (2, 'Acrobatics'), (3, 'Sleight of Hand');

INSERT INTO DEP_SKILL(idStat, idSkill) VALUES (1, 1), (2, 2), (2, 3);

INSERT INTO JOGADOR(idJogador, nomeJogador, senha) VALUES (1, 'Ana', 1234), (2, 'Danilo', 2345), (3, 'Henriko', 3456);

INSERT INTO SALA(idSala, nomeSala) VALUES (1, 'Cronicas de Therast'), (2, 'Cyberpunk');

INSERT INTO FICHA(idFicha, nomeFicha, hpTotal, hpAtual, xp, ac, movimento) VALUES (1, 'Art', 35, 30, 23000, 15, 30), (2, 'Zuran', 30, 20, 23000, 16, 30);

INSERT INTO FICHA_HAS_STAT(idFicha, idStat, isProfSave, valorStat, BonusMiscStat) VALUES (1, 1, 0, 13, 0), (1, 2, 0, 16, 0);

INSERT INTO FICHA_HAS_SKILL(idFicha, idSkill, isProf, BonusMiscSkill) VALUES (1, 1, 0, 0), (1, 2, 0, 0);

INSERT INTO INVENTARIO(idFicha, nomeItem, descricao, quantidade) VALUES (1, 'Rapieira', 'Arma Marcial', 1), (1, 'Poção de Cura', 'Poção', 2)