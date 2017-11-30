
<div id="page-wrapper">

  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">
          Raças
        </h1>

        <ol class="breadcrumb">
          <li>
            <i class="fa fa-dashboard"></i>  <a href="index.html">Inicio</a>
          </li>
          <li class="active">
            <i class="fa fa-file"></i> Raças
          </li>
          <form name="Cadastro" action="" method="GET">
            <div id="minhaDiv"  style="display: none;">
              <table class="table table-hover" style="width: 63%;">
              </tr>
              <tr>
                <td><input style="display: none;" name="site" value='racas'></td>
                <td><input style="display: none;" name="op" value='1'></td>
                <td><input class="form-control" placeholder="Enter Nome"  name="nome"></td>
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
            <th>NOME</th>
            <th>


              <div id="BoxNovoBotao" onclick="Mudarestado('minhaDiv')">

                <a href="#" class="btn btn-primary h2">Nova Raça</a>
              </div>


            </th>

          </tr>
        </thead>
        <tbody>


          <?php

          if(isset($_GET["op"]) && $_GET["op"] == 1){


            $sql = "INSERT INTO `raca` (`idRaca`, `nomeRaca`) VALUES (NULL, '" . $_GET["nome"] ."');";

            if (mysqli_query($conn, $sql)) {
              echo "Adicionado com Sucesso";
            } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }


          }else if(isset($_GET["op"]) && $_GET["op"] == 2){

            $sql = "DELETE FROM `raca` WHERE `raca`.`idRaca` = ".$_GET["id"]."";

            if ($conn->query($sql) === TRUE) {
              echo "Record deleted successfully";
            } else {
              echo "Error deleting record: " . $conn->error;
            }

          }
          $sql = "SELECT * FROM raca";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              echo "<tr>
              <td><span id='editSpan'>" . $row["idRaca"]."</span></td>
              <td><p onclick='editTitle(".$row["idRaca"]."-1)' class='intro' ><span>" . $row["nomeRaca"]. "</span></p></td>
              <td class='actions'>
              <a class='btn btn-warning btn-xs' href='?site=racaseditar&id=" . $row["idRaca"]."&nome=" . $row["nomeRaca"]. "'>Editar</a>
              <a class='btn btn-danger btn-xs'  href='?site=racas&op=2&id=" . $row["idRaca"]."' data-toggle='modal' >Excluir</a>
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
