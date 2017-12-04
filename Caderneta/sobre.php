
        <div id="page-wrapper">

            <div class="container-fluid">
              <div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-table fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">
                          <?php
                          $sql = "select count(*) from ficha";
                          $result = $conn->query($sql);

                          if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                              echo $row["count(*)"];
                                ///// ON DELETE SET NULL

                            }
                          } else {
                            echo "0";
                          }

                          ?>
                        </div>
                        <div>Fichas!</div>
                    </div>
                </div>
            </div>
            <a href="?site=fichas">
                <div class="panel-footer">
                    <span class="pull-left">Visualizar Fichas</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-sitemap fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php
                        $sql = "select count(*) from sala";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                          // output data of each row
                          while($row = $result->fetch_assoc()) {
                            echo $row["count(*)"];
                              ///// ON DELETE SET NULL

                          }
                        } else {
                          echo "0";
                        }

                        ?></div>
                        <div>Salas!</div>
                    </div>
                </div>
            </div>
            <a href="?site=salas">
                <div class="panel-footer">
                    <span class="pull-left">Visualizar Salas</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-child fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php
                        $sql = "select count(*) from jogador";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                          // output data of each row
                          while($row = $result->fetch_assoc()) {
                            echo $row["count(*)"];
                              ///// ON DELETE SET NULL

                          }
                        } else {
                          echo "0";
                        }

                        ?></div>
                        <div>Jogadores!</div>
                    </div>
                </div>
            </div>
            <a href="?site=jogadores">
                <div class="panel-footer">
                    <span class="pull-left">Visualizar Jogadores</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>



</div>


<table class="table table-striped table-inverse">
  <h1> Nome do Personagem com maior HP a partir da classe:</h1>


    <form name="Cadastro" action="" method="GET">
      <td><input style="display: none;" name="site" value='sobre'></td>
      <td><input style="display: none;" name="op" value='1'></td>
      <select class="form-control selectpicker" style="width: 21%;" name="classe">

                        <?php
                        $sql = "SELECT nomeClasse from classe";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                          // output data of each row
                          while($row = $result->fetch_assoc()) {
                            echo "
                            <option value='" . $row["nomeClasse"]."'>" . $row["nomeClasse"]. "</option>";
                              ///// ON DELETE SET NULL

                          }
                        } else {
                          echo "0 results";
                        }

                        ?>




                      </select>

                      <input type="submit"  class="btn btn-success x" value="OK" href=""/>
                    </form>











  <thead class="thead-inverse">
    <tr>
      <th>Nome da Ficha</th>
      <th>HP</th>
      <th>Jogador</th>
    </tr>
  </thead>
  <tbody>

    <?php
    if(isset($_GET["op"]) && $_GET["op"] == 1){

    $sql = "SELECT F.nomeFicha, F.vidatotalFicha, J.nomeJogador
    FROM ficha F, classe C, jogador J
    WHERE F.Classe_idClasse = C.idClasse
    AND J.idJogador = F.Jogador_idJogador
    AND C.nomeClasse = '".$_GET["classe"]."'
    AND F.vidatotalFicha IN (SELECT MAX(F.vidatotalFicha)
    				         FROM ficha F)";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "    <tr>
              <td>".$row["nomeFicha"]."</td>
              <td>".$row["vidatotalFicha"]."</td>
              <td>".$row["nomeJogador"]."</td>
            </tr>";

      }
    } else {
      echo "Nao encontrado";
    }
}
    ?>

  </tbody>

</table>
<br><br><br>
<table class="table table-striped table-inverse">
  <h1> Classes Com os maiores Nível </h1>
  <thead class="thead-inverse">
    <tr>
      <th>Nome da Ficha</th>
      <th>Nivel</th>
      <th>Jogador</th>
    </tr>
  </thead>
  <tbody>

    <?php
    $sql = "SELECT C.nomeClasse, F.nomeFicha, F.level_idLevel, J.nomeJogador
FROM ficha F, classe C, nivel N, jogador J
WHERE F.Classe_idClasse = C.idClasse
AND J.idJogador = F.Jogador_idJogador
AND F.level_idLevel = N.idNivel
AND N.valorNivel IN (SELECT MAX(N.valorNivel)
				    FROM nivel N, ficha F
                    WHERE N.idNivel = F.level_idLevel)";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "    <tr>
              <td>".$row["nomeFicha"]."</td>
              <td>".$row["level_idLevel"]."</td>
              <td>".$row["nomeJogador"]."</td>
            </tr>";

      }
    } else {
      echo "Nao encontrado";
    }

    ?>

  </tbody>
</table>
<br><br><br>
<table class="table table-striped table-inverse">
  <h1> Todos os Cleric </h1>
  <thead class="thead-inverse">
    <tr>
      <th>Id</th>
      <th>Nome</th>
    </tr>
  </thead>
  <tbody>

    <?php
    $sql = "SELECT F.idFicha, F.nomeFicha
FROM ficha F, classe C
WHERE F.Classe_idClasse = C.idClasse
AND C.nomeClasse = 'Cleric'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "    <tr>
              <td>".$row["idFicha"]."</td>
              <td>".$row["nomeFicha"]."</td>
            </tr>";

      }
    } else {
      echo "Nao encontrado";
    }

    ?>

  </tbody>
</table>


<br><br><br>
<table class="table table-striped table-inverse">
  <h1> Classes de todas as Fichas de Raça
    <form name="Cadastro" action="" method="GET">
      <td><input style="display: none;" name="site" value='sobre'></td>
      <td><input style="display: none;" name="op" value='2'></td>
      <td><input style="display: none;" name="" value='#raca'></td>
      <select class="form-control selectpicker" name="raca">

                        <?php
                        $sql = "SELECT idRaca, nomeRaca from raca";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                          // output data of each row
                          while($row = $result->fetch_assoc()) {
                            echo "
                            <option value='" . $row["nomeRaca"]."'>" . $row["nomeRaca"]. "</option>";
                              ///// ON DELETE SET NULL

                          }
                        } else {
                          echo "0 results";
                        }

                        ?>




                      </select>

                      <input type="submit"  class="btn btn-success x" value="OK" href=""/>
                    </form>
                     </h1>
  <thead class="thead-inverse">
    <tr>
      <th>Nome da Classe</th>
      <th>Nome da Ficha</th>
    </tr>
  </thead>
  <tbody>

    <?php
    if(isset($_GET["op"]) && $_GET["op"] == 2){
    $sql = "SELECT C.nomeClasse, F.nomeFicha
FROM classe C, ficha F, raca R
WHERE C.idClasse = F.Classe_idClasse
AND F.Raca_idRaca = R.idRaca
AND R.NomeRaca = '".$_GET["raca"]."' ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "    <tr>
              <td>".$row["nomeClasse"]."</td>
              <td>".$row["nomeFicha"]."</td>
            </tr>";

      }
    } else {
      echo "Nao encontrado";
    }
}
    ?>

  </tbody>
</table>

<br><br><br>
<table class="table table-striped table-inverse">
  <h1>  Itens da primeira ficha cadastrada </h1>
  <thead class="thead-inverse">
    <tr>
      <th>Nome do Item</th>
    </tr>
  </thead>
  <tbody>

    <?php
    $sql = "SELECT I.NomeInventario
FROM ficha F, inventario I
WHERE F.idFicha = I.Ficha_idFicha
AND F.idFicha = '1'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "    <tr>
              <td>".$row["NomeInventario"]."</td>
            </tr>";

      }
    } else {
      echo "Nao encontrado";
    }

    ?>

  </tbody>
</table>




<br><br><br>
<table class="table table-striped table-inverse">
  <h1>  Quantidade de Itens por Ficha </h1>
  <thead class="thead-inverse">
    <tr>
      <th>Nome da Ficha</th>
      <th>Quantidade de Item</th>
    </tr>
  </thead>
  <tbody>

    <?php
    $sql = "SELECT F.nomeFicha, COUNT(F.nomeFicha)from inventario I, ficha F
where I.Ficha_idFicha = F.idFicha GROUP BY F.nomeFicha ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "    <tr>
              <td>".$row["nomeFicha"]."</td>
              <td>".$row["COUNT(F.nomeFicha)"]."</td>
            </tr>";

      }
    } else {
      echo "Nao encontrado";
    }

    ?>

  </tbody>
</table>

<br><br><br>
<table class="table table-striped table-inverse">
  <h1>  Quantidade de Fichas criadas por jogadores </h1>
  <thead class="thead-inverse">
    <tr>
      <th>Nome do Jogador</th>
      <th>Quantidade de Fichas</th>
    </tr>
  </thead>
  <tbody>

    <?php
    $sql = "SELECT COUNT(F.nomeFicha), J.nomeJogador from ficha F, jogador J
where F.Jogador_idJogador = J.idJogador GROUP BY F.nomeFicha ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "    <tr>
              <td>".$row["nomeJogador"]."</td>
              <td>".$row["COUNT(F.nomeFicha)"]."</td>
            </tr>";

      }
    } else {
      echo "Nao encontrado";
    }

    ?>

  </tbody>
</table>

<br><br><br>
<table class="table table-striped table-inverse">
  <h1>  Quantidade de Salas criadas por jogadores </h1>
  <thead class="thead-inverse">
    <tr>
      <th>Nome do Jogador</th>
      <th>Quantidade de Salas</th>
    </tr>
  </thead>
  <tbody>

    <?php
    $sql = "SELECT J.nomeJogador, COUNT(J.nomeJogador) FROM sala S, jogador J
where S.Jogador_idJogador = J.idJogador GROUP BY J.nomeJogador ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "    <tr>
              <td>".$row["nomeJogador"]."</td>
              <td>".$row["COUNT(J.nomeJogador)"]."</td>
            </tr>";

      }
    } else {
      echo "Nao encontrado";
    }

    ?>

  </tbody>
</table>

<!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
