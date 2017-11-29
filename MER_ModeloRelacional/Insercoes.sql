INSERT INTO `classe` (`idClasse`, `nomeClasse`, `dadoVida`) VALUES (NULL, 'Barbarian', '12'), (NULL, 'Bard', '8'), (NULL, 'Cleric', '8');

INSERT INTO `raca` (`idRaca`, `nomeRaca`) VALUES (NULL, 'Dwarf'), (NULL, 'Elf');

INSERT INTO `nivel` (`idNivel`, `valorNivel`, `bonusProf`, `xpNec`) VALUES (NULL, '1', '1', '0'), (NULL, '2', '1', '300'), (NULL, '3', '2', '900');

INSERT INTO `status` (`idStatus`, `nomeStatus`) VALUES (NULL, 'Strenght'), (NULL, 'Constitution'), (NULL, 'Intelligence'), (NULL, 'Wisdom'), (NULL, 'Charisma');

INSERT INTO `skill`(`idSkill`, `nomeSkill`, `Status_idStatus`) VALUES (NULL, 'Athletics', 1), (NULL, 'Acrobatics', 2), (NULL, 'Sleight of Hand', 3);

#INSERT INTO DEP_SKILL(idStat, idSkill) VALUES (1, 1), (2, 2), (2, 3);

INSERT INTO jogador(idJogador, nomeJogador, senhaJogador) VALUES (NULL, 'Ana', 1234), (NULL, 'Danilo', 2345), (NULL, 'Henriko', 3456);

INSERT INTO sala(idSala, nomeSala, Jogador_idJogador) VALUES (NULL, 'Cronicas de Therast', 1), (NULL, 'Cyberpunk', 1), (NULL, 'A Cor de Caio do Ceu', 2);

INSERT INTO `ficha` (`idFicha`, `Raca_idRaca`, `Jogador_idJogador`, `Classe_idClasse`, `Sala_idSala`, `Level_idlevel`, `nomeFicha`, `vidatotalFicha`, `vidaatualFicha`, `xpFicha`, `armorclassFicha`, `speedFicha`) VALUES (NULL, '2', '2', '3', '1', '1', 'Zuran', '30', '30', '0', '12', '60'), (NULL, '1', '1', '1', '1', '2', 'Jujuba', '40', '25', '12000', '12', '60');

INSERT INTO `ficha_has_status` (`Ficha_idFicha`, `Status_idStatus`, `valor`) VALUES ('2', '1', '11'),('2', '2', '10'),('2', '3', '9'),('2', '4', '8'),('2', '5', '7'),('1', '1', '11'),('1', '2', '10'),('1', '3', '9'),('1', '4', '8'),('1', '5', '7');

INSERT INTO `skill_has_ficha` (`Skill_idSkill`, `Ficha_idFicha`, `prof`) VALUES ('2', '2', '0'), ('1', '2', '0'), ('3', '2', '5'), ('2', '1', '1'), ('1', '1', '0'), ('3', '1', '8');

INSERT INTO `inventario` (`NomeInventario`, `Ficha_idFicha`, `descricaoInventario`, `quantidadeInventario`) VALUES ('maca', '1', 'Recupera 1 de Vida', '5'), ('Rapieira', '1', '+1 de Dano', '1'), ('pocao de Cura', '2', 'Cura 10+ de vida', '2'), ('Pocao de Veneno', '1', 'Não Cura +10 de vida', '1');
