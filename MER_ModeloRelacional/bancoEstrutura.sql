-- --------------------------------------------------------

--
-- Estrutura da tabela `classe`
--

CREATE TABLE `classe` (
  `idClasse` int(10) UNSIGNED NOT NULL,
  `nomeClasse` varchar(45) NOT NULL,
  `dadoVida` int(11) DEFAULT NULL
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ficha`
--

CREATE TABLE `ficha` (
  `idFicha` int(10) UNSIGNED NOT NULL,
  `Raca_idRaca` int(11) NOT NULL,
  `Jogador_idJogador` int(11) NOT NULL,
  `Classe_idClasse` int(10) UNSIGNED NOT NULL,
  `Sala_idSala` int(11),
  `Level_idlevel` int(11) NOT NULL,
  `nomeFicha` varchar(45) DEFAULT NULL,
  `vidatotalFicha` int(11) DEFAULT NULL,
  `vidaatualFicha` int(11) DEFAULT NULL,
  `xpFicha` int(11) DEFAULT NULL,
  `armorclassFicha` int(11) DEFAULT NULL,
  `speedFicha` int(11) DEFAULT NULL
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ficha_has_status`
--

CREATE TABLE `ficha_has_status` (
  `Ficha_idFicha` int(10) UNSIGNED NOT NULL,
  `Status_idStatus` int(11) NOT NULL,
  `valor` int(11) DEFAULT NULL
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `inventario`
--

CREATE TABLE `inventario` (
  `NomeInventario` varchar(45) NOT NULL,
  `Ficha_idFicha` int(10) UNSIGNED NOT NULL,
  `descricaoInventario` varchar(255) DEFAULT NULL,
  `quantidadeInventario` int(11) DEFAULT NULL
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogador`
--

CREATE TABLE `jogador` (
  `idJogador` int(11) NOT NULL,
  `nomeJogador` varchar(45) DEFAULT NULL,
  `senhaJogador` varchar(45) DEFAULT NULL
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `nivel`
--

CREATE TABLE `nivel` (
  `idNivel` int(11) NOT NULL,
  `valorNivel` int(11) DEFAULT NULL,
  `bonusProf` int(11) DEFAULT NULL,
  `xpNec` int(11) DEFAULT NULL
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `raca`
--

CREATE TABLE `raca` (
  `idRaca` int(11) NOT NULL,
  `nomeRaca` varchar(45) DEFAULT NULL
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sala`
--

CREATE TABLE `sala` (
  `idSala` int(11) NOT NULL,
  `nomeSala` varchar(45) DEFAULT NULL,
  `Jogador_idJogador` int(11) NOT NULL
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `skill`
--

CREATE TABLE `skill` (
  `idSkill` int(11) NOT NULL,
  `nomeSkill` varchar(45) DEFAULT NULL,
  `Status_idStatus` int(11) NOT NULL
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `skill_has_ficha`
--

CREATE TABLE `skill_has_ficha` (
  `Skill_idSkill` int(11) NOT NULL,
  `Ficha_idFicha` int(10) UNSIGNED NOT NULL,
  `prof` tinyint(1) DEFAULT NULL
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `status`
--

CREATE TABLE `status` (
  `idStatus` int(11) NOT NULL,
  `nomeStatus` varchar(45) DEFAULT NULL
);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`idClasse`);

--
-- Indexes for table `ficha`
--
ALTER TABLE `ficha`
  ADD PRIMARY KEY (`idFicha`),
  ADD KEY `fk_Ficha_Raca_idx` (`Raca_idRaca`),
  ADD KEY `fk_Ficha_Jogador1_idx` (`Jogador_idJogador`),
  ADD KEY `fk_Ficha_Classe1_idx` (`Classe_idClasse`),
  ADD KEY `fk_Ficha_Sala1_idx` (`Sala_idSala`),
  ADD KEY `fk_Ficha_Level1_idx` (`Level_idlevel`);

--
-- Indexes for table `ficha_has_status`
--
ALTER TABLE `ficha_has_status`
  ADD PRIMARY KEY (`Ficha_idFicha`,`Status_idStatus`),
  ADD KEY `fk_Ficha_has_Status_Status1_idx` (`Status_idStatus`),
  ADD KEY `fk_Ficha_has_Status_Ficha1_idx` (`Ficha_idFicha`);

--
-- Indexes for table `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`NomeInventario`,`Ficha_idFicha`),
  ADD KEY `fk_Inventario_Ficha1_idx` (`Ficha_idFicha`);

--
-- Indexes for table `jogador`
--
ALTER TABLE `jogador`
  ADD PRIMARY KEY (`idJogador`);

--
-- Indexes for table `nivel`
--
ALTER TABLE `nivel`
  ADD PRIMARY KEY (`idNivel`);

--
-- Indexes for table `raca`
--
ALTER TABLE `raca`
  ADD PRIMARY KEY (`idRaca`);

--
-- Indexes for table `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`idSala`),
  ADD KEY `fk_Sala_Jogador1_idx` (`Jogador_idJogador`);

--
-- Indexes for table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`idSkill`),
  ADD KEY `fk_Skill_Status1_idx` (`Status_idStatus`);

--
-- Indexes for table `skill_has_ficha`
--
ALTER TABLE `skill_has_ficha`
  ADD PRIMARY KEY (`Skill_idSkill`,`Ficha_idFicha`),
  ADD KEY `fk_Skill_has_Ficha_Ficha1_idx` (`Ficha_idFicha`),
  ADD KEY `fk_Skill_has_Ficha_Skill1_idx` (`Skill_idSkill`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`idStatus`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classe`
--
ALTER TABLE `classe`
  MODIFY `idClasse` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ficha`
--
ALTER TABLE `ficha`
  MODIFY `idFicha` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jogador`
--
ALTER TABLE `jogador`
  MODIFY `idJogador` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nivel`
--
ALTER TABLE `nivel`
  MODIFY `idNivel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `raca`
--
ALTER TABLE `raca`
  MODIFY `idRaca` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sala`
--
ALTER TABLE `sala`
  MODIFY `idSala` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skill`
--
ALTER TABLE `skill`
  MODIFY `idSkill` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `idStatus` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `ficha`
--
ALTER TABLE `ficha`
  ADD CONSTRAINT `fk_Ficha_Classe1` FOREIGN KEY (`Classe_idClasse`) REFERENCES `classe` (`idClasse`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Ficha_Jogador1` FOREIGN KEY (`Jogador_idJogador`) REFERENCES `jogador` (`idJogador`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Ficha_Level1` FOREIGN KEY (`Level_idlevel`) REFERENCES `nivel` (`idNivel`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Ficha_Raca` FOREIGN KEY (`Raca_idRaca`) REFERENCES `raca` (`idRaca`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Ficha_Sala1` FOREIGN KEY (`Sala_idSala`) REFERENCES `sala` (`idSala`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `ficha_has_status`
--
ALTER TABLE `ficha_has_status`
  ADD CONSTRAINT `fk_Ficha_has_Status_Ficha1` FOREIGN KEY (`Ficha_idFicha`) REFERENCES `ficha` (`idFicha`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Ficha_has_Status_Status1` FOREIGN KEY (`Status_idStatus`) REFERENCES `status` (`idStatus`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `fk_Inventario_Ficha1` FOREIGN KEY (`Ficha_idFicha`) REFERENCES `ficha` (`idFicha`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `sala`
--
ALTER TABLE `sala`
  ADD CONSTRAINT `fk_Sala_Jogador1` FOREIGN KEY (`Jogador_idJogador`) REFERENCES `jogador` (`idJogador`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `skill`
--
ALTER TABLE `skill`
  ADD CONSTRAINT `fk_Skill_Status1` FOREIGN KEY (`Status_idStatus`) REFERENCES `status` (`idStatus`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `skill_has_ficha`
--
ALTER TABLE `skill_has_ficha`
  ADD CONSTRAINT `fk_Skill_has_Ficha_Ficha1` FOREIGN KEY (`Ficha_idFicha`) REFERENCES `ficha` (`idFicha`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Skill_has_Ficha_Skill1` FOREIGN KEY (`Skill_idSkill`) REFERENCES `skill` (`idSkill`) ON DELETE NO ACTION ON UPDATE NO ACTION;
