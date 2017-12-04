


<div id="page-wrapper">

  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">
          <?php

          echo $_GET["nomeJogador"];
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
                <td><input style="display: none;" name="site" value='inventarioView'></td>
                <td><input style="display: none;" name="idFicha" value='<?php echo $_GET["idFicha"] ?>'></td>
                <td><input style="display: none;" name="id" value='<?php echo $_GET["id"] ?>'></td>
                <td><input style="display: none;" name="nomeJogador" value='<?php echo $_GET["nomeJogador"] ?>'></td>
                <td><input style="display: none;" name="op" value='3'></td>
                  <td><input class="form-control" placeholder="Item" name="nome"></td>
                    <td><input class="form-control" placeholder="Qtd" name="qtd"></td>
                      <td><input class="form-control" placeholder="Decricao" name="desc"></td>
                <td>
                  <div class="row">

                  </div>

                  <div class="row">

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
              <th>ITEM</th>
              <th>QTD</th>
              <th>


                <div id="BoxNovoBotao" onclick="Mudarestado('minhaDiv')">

                  <a href="#" class="btn btn-primary h2">Adicionar Item</a>
                </div>


              </th>

            </tr>
          </thead>
          <tbody>


            <?php

            if(isset($_GET["op"]) && $_GET["op"] == 2){


              $sql = "DELETE FROM `inventario` WHERE `NomeInventario`='".$_GET["nomeItem"]."' and`Ficha_idFicha`='".$_GET["id"]."'";

              if ($conn->query($sql) === TRUE) {

                echo "Record delete successfully";
              } else {
                echo "Error deleting record: " . $conn->error;
              }

            }else if(isset($_GET["op"]) && $_GET["op"] == 3){

              ;

              $sql = "INSERT INTO `mydb`.`inventario` (`NomeInventario`, `Ficha_idFicha`, `descricaoInventario`, `quantidadeInventario`) VALUES ('" . $_GET["nome"] ."', '" . $_GET["idFicha"] ."', '" . $_GET["desc"] ."', '" . $_GET["qtd"] ."')";
              if (mysqli_query($conn, $sql)) {
                echo "Adicionado com Sucesso";
              } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }

            }

            $sql = "select F.idFicha,I.NomeInventario, J.nomeJogador,I.Ficha_idFicha, I.quantidadeInventario, I.descricaoInventario from inventario I, Ficha F, jogador J
                      where I.Ficha_idFicha = F.idFicha
                      and F.Jogador_idJogador = J.idJogador
                      and J.idJogador = '".$_GET["id"]."'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                echo "<tr>
                <td><span id='editSpan'>" . $row["NomeInventario"]."</span></td>
                <td><p class='intro' >" . $row["quantidadeInventario"]. "</p></td>
                <td class='actions'>
                <a class='btn btn-warning btn-xs' href='?site=inventarioEditar&id=" . $row["NomeInventario"]."&qtd=" . $row["quantidadeInventario"]. "&desc=" . $row["descricaoInventario"]. "&idFicha=" . $row["Ficha_idFicha"]. "'>Editar</a>
                <a class='btn btn-danger btn-xs'  href='?site=inventarioView&op=2&nomeItem=" . $row["NomeInventario"]."&id=".$row["idFicha"]."&nomeJogador=".$_GET["nomeJogador"]."' data-toggle='modal' >Excluir</a>
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
