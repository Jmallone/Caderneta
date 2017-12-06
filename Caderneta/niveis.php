
<div id="page-wrapper">

  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">
          Niveis
        </h1>

        <ol class="breadcrumb">
          <li>
            <i class="fa fa-dashboard"></i>  <a href="index.html">Inicio</a>
          </li>
          <li class="active">
            <i class="fa fa-file"></i> Niveis
          </li>
          <form name="Cadastro" action="" method="GET">
            <div id="minhaDiv"  style="display: none;">
              <table class="table table-hover" style="width: 63%;">
              </tr>
              <tr>

                <td><input style="display: none;" name="site" value='niveis'></td>
                <td><input style="display: none;" name="op" value='1'></td>
                <td><input class="form-control" placeholder="Enter LVL"  name="lvl"></td>
                <td><input class="form-control" placeholder="Enter XP"  name="xp"></td>
                <td><input class="form-control" placeholder="Enter PROF"  name="prof"></td>
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
            <th>LVL</th>
            <th>XP</th>
            <th>PROF</th>
            <th>


              <div id="BoxNovoBotao" onclick="Mudarestado('minhaDiv')">

                <a href="#" class="btn btn-primary h2">Novo Nivel</a>
              </div>


            </th>

          </tr>
        </thead>
        <tbody>


          <?php

          if(isset($_GET["op"]) && $_GET["op"] == 1){


            $sql = "INSERT INTO `nivel` (`idNivel`, `valorNivel`, `bonusProf`, `xpNec`) VALUES ('', '" . $_GET["lvl"] ."', '" . $_GET["prof"] ."', '" . $_GET["xp"] ."')";

            if (mysqli_query($conn, $sql)) {
              echo "Adicionado com Sucesso";
            } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }


          }else if(isset($_GET["op"]) && $_GET["op"] == 2){

            $sql = "DELETE FROM `nivel` WHERE `nivel`.`idNivel` = ".$_GET["id"]."";

            if ($conn->query($sql) === TRUE) {
              echo "Record deleted successfully";
            } else {
              echo "Error deleting record: " . $conn->error;
            }

          }
          $sql = "SELECT * FROM nivel";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              echo "<tr>
              <td><span id='editSpan'>" . $row["idNivel"]."</span></td>
              <td><span id='editSpan'>" . $row["xpNec"]."</span></td>
              <td><p onclick='editTitle(".$row["idNivel"]."-1)' class='intro' ><span>" . $row["bonusProf"]. "</span></p></td>
              <td class='actions'>
              <a class='btn btn-warning btn-xs' href='?site=niveiseditar&id=" . $row["idNivel"]."&lvl=" . $row["valorNivel"]. "&xp=" . $row["xpNec"]. "&prof=" . $row["bonusProf"]. "'>Editar</a>
              <a class='btn btn-danger btn-xs'  href='?site=niveis&op=2&id=" . $row["idNivel"]."' data-toggle='modal' >Excluir</a>
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
