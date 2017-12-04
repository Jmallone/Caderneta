


<div id="page-wrapper">

  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">
          <?php

          echo $_GET["nomeSala"];
          echo " / ".$_GET["mestre"];
          ?>
        </h1>

        <ol class="breadcrumb">
          <li>
            <i class="fa fa-dashboard"></i>  <a href="index.html">Inicio</a>
          </li>
          <li class="active">
            <i class="fa fa-file"></i> Sala
          </li>

          <form name="Cadastro" action="" method="GET">
            <div id="minhaDiv"  style="display: none;">
              <table class="table table-hover" style="width: 63%;">
              </tr>
              <tr>
                <td><input style="display: none;" name="site" value='salasView'></td>
                <td><input style="display: none;" name="id" value='<?php echo $_GET["id"] ?>'></td>
                <td><input style="display: none;" name="mestre" value='<?php echo $_GET["mestre"] ?>'></td>
                <td><input style="display: none;" name="nomeSala" value='<?php echo $_GET["nomeSala"] ?>'></td>
                <td><input style="display: none;" name="op" value='3'></td>
                <td>
                  <div class="row">

                  </div>

                  <div class="row">
                    <select class="form-control selectpicker" name="novoJogador">
                      <?php
                      $sql = "SELECT  F.idFicha,J.nomeJogador, F.nomeFicha from ficha F, jogador J
                      where F.Jogador_idJogador = J.idJogador and .F.idFicha not in(
                        select F.idFicha from ficha F, jogador J, sala S
                        where J.idJogador = F.Jogador_idJogador
                        and S.idSala = F.Sala_idSala
                        and S.idSala = F.Sala_idSala
                      )";
                      $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                          echo "
                          <option value='" . $row["idFicha"]."'>" . $row["nomeJogador"]. " / " . $row["nomeFicha"]. "</option>";
                          ///// ON DELETE SET NULL

                        }
                      } else {
                        echo "0 results";
                      }

                      ?>




                    </select>
                      <input type="submit"  class="btn btn-success x" value="OK" />
                  </div>



                </table>
              </div>
            </form>
          </div>
        </ol>
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Nome Da Ficha</th>
              <th>Nome do Jogador</th>
              <th>


                <div id="BoxNovoBotao" onclick="Mudarestado('minhaDiv')">

                  <a href="#" class="btn btn-primary h2">Adicionar Jogador</a>
                </div>


              </th>

            </tr>
          </thead>
          <tbody>


            <?php

            if(isset($_GET["op"]) && $_GET["op"] == 2){

              $sql = "UPDATE `ficha` SET `Sala_idSala`= NULL WHERE `idFicha`='".$_GET["id"]."'";

              if ($conn->query($sql) === TRUE) {
                echo "Record Update successfully";
              } else {
                echo "Error deleting record: " . $conn->error;
              }

            }else if(isset($_GET["op"]) && $_GET["op"] == 3){


              $sql = "UPDATE `ficha` SET `Sala_idSala`='".$_GET["id"]."' WHERE `idFicha`='".$_GET["novoJogador"]."'";

              if ($conn->query($sql) === TRUE) {
                echo "Record Update successfully";
              } else {
                echo "Error deleting record: " . $conn->error;
              }

            }

            $sql = "SELECT F.nomeFicha, J.nomeJogador, F.idFicha FROM ficha F, jogador J, sala S WHERE J.idJogador = F.Jogador_idJogador AND S.idSala = F.Sala_idSala AND S.idSala = ".$_GET["id"]."";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                echo "<tr>
                <td><span id='editSpan'>" . $row["nomeFicha"]."</span></td>
                <td><p class='intro' >" . $row["nomeJogador"]. "</p></td>
                <td class='actions'>
                <a class='btn btn-danger btn-xs'  href='?site=salasView&op=2&id=" . $row["idFicha"]."&nomeSala=" . $_GET["nomeSala"]."&mestre=" . $_GET["mestre"]."' data-toggle='modal' >Excluir</a>
                </td>
                </tr>";


              }
            } else {
              echo "0 results";
            }
            $conn->close();
            ?>

          </tbody>
        </table>






      </div>
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->
