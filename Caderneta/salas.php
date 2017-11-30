
<div id="page-wrapper">

  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">
          Salas
        </h1>

        <ol class="breadcrumb">
          <li>
            <i class="fa fa-dashboard"></i>  <a href="index.html">Inicio</a>
          </li>
          <li class="active">
            <i class="fa fa-file"></i> Salas
          </li>
          <form name="Cadastro" action="" method="GET">
            <div id="minhaDiv"  style="display: none;">
              <table class="table table-hover" style="width: 63%;">
              </tr>
              <tr>
                <td><input style="display: none;" name="site" value='salas'></td>
                <td><input style="display: none;" name="op" value='1'></td>
                <td>
                  <div class="row">
                    <input class="form-control" placeholder="Enter Nome"  name="nome">
                  </div>

                  <div class="row">
                    <select class="form-control selectpicker" name="mestre">
                      <?php
                      $sql = "SELECT idJogador, nomeJogador from jogador";
                      $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                          echo "
                          <option value='" . $row["idJogador"]."'>" . $row["nomeJogador"]. "</option>";
                            ///// ON DELETE SET NULL

                        }
                      } else {
                        echo "0 results";
                      }

                      ?>




                    </select>
                  </div>
                </td>

                <td class="actions">
                  <input type="submit"  class="btn btn-success x" value="OK" />

                </td>
              </tr>

            </tbody>
          </table>

        </div>
      </ol>
      <table class="table table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>NOME DA SALA</th>
            <th>MESTRE</th>
            <th>


              <div id="BoxNovoBotao" onclick="Mudarestado('minhaDiv')">

                <a href="#" class="btn btn-primary h2">Adicionar Salas</a>
              </div>


            </th>

          </tr>
        </thead>
        <tbody>


          <?php

          if(isset($_GET["op"]) && $_GET["op"] == 1){



            $sql = "INSERT INTO `sala` (`nomeSala`, `Jogador_idJogador`) VALUES ('" . $_GET["nome"] ."', '" . $_GET["mestre"] ."')";

            if (mysqli_query($conn, $sql)) {
              echo "Adicionado com Sucesso";
            } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }


          }else if(isset($_GET["op"]) && $_GET["op"] == 2){

            $sql = "DELETE FROM `sala` WHERE `sala`.`idSala` = ".$_GET["id"]."";

            if ($conn->query($sql) === TRUE) {
              echo "Record deleted successfully";
            } else {
              echo "Error deleting record: " . $conn->error;
            }

          }
          $sql = "SELECT S.idSala, S.nomeSala, J.nomeJogador, S.Jogador_idJogador FROM sala S, jogador J WHERE J.idJogador = S.Jogador_idJogador";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              echo "<tr>
              <td><span id='editSpan'>" . $row["idSala"]."</span></td>
              <td><p class='intro' >" . $row["nomeSala"]. "</p></td>
              <td><p class='intro' ><span>" . $row["nomeJogador"]. "</p></td>
              <td class='actions'>
                <a class='btn btn-info btn-xs'  href='?site=salasView&id=" . $row["idSala"]."&nomeSala=" . $row["nomeSala"]. "&mestre=" . $row["nomeJogador"]. "' data-toggle='modal'>Visualizar</a>
              <a class='btn btn-warning btn-xs' href='?site=salaseditar&id=" . $row["idSala"]."&idMestre=" . $row["Jogador_idJogador"]. "&nomeSala=" . $row["nomeSala"]. "&nome=" . $row["nomeJogador"]. "'>Editar</a>
              <a class='btn btn-danger btn-xs'  href='?site=salas&op=2&id=" . $row["idSala"]."' data-toggle='modal' >Excluir</a>
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


    </form>
  </div>
</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->
