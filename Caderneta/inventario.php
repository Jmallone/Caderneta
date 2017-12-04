
</nav>
<div id="page-wrapper">

  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">
          Inventario
        </h1>

        <ol class="breadcrumb">
          <li>
            <i class="fa fa-dashboard"></i>  <a href="index.html">Inicio</a>
          </li>
          <li class="active">
            <i class="fa fa-file"></i> Inventario
          </li>
        </ol>
        <table class="table table-hover">
          <thead>
            <tr>
              <th>FICHA</th>
              <th>PERSONAGEM</th>

            </tr>
          </thead>
          <tbody>

            <?php
            $sql = "select distinct J.nomeJogador,F.idFicha,F.nomeFicha, J.idJogador
from inventario I, ficha F, jogador J
            where I.Ficha_idFicha = F.idFicha
            and F.Jogador_idJogador = J.idJogador";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                echo"
                    <tr>
                      <td>1</td>
                      <td>


                        <div class='panel-group'>
                          <div class='panel panel-default'>
                            <div class='panel-heading'>
                              <h4 class='panel-title'>
                                <a data-toggle='collapse' href='#collapse" . $row["idJogador"]."'>" . $row["nomeFicha"]."</a>
                              </h4>
                            </div>
                            <div id='collapse" . $row["idJogador"]."' class='panel-collapse collapse'>
                            ";

                                $sql2 = "select I.NomeInventario, J.nomeJogador from inventario I, ficha F, jogador J
                                    where I.Ficha_idFicha = F.idFicha
                                    and F.Jogador_idJogador = J.idJogador
                                    and J.idJogador = '" . $row["idJogador"]."' LIMIT 2 ";
                                $result2 = $conn->query($sql2);

                                if ($result2->num_rows > 0 ) {
                                  // output data of each row
                                  while($row2 = $result2->fetch_assoc()) {
                                      echo "<div class='panel-body'>" . $row2["NomeInventario"]."</div>";
                                    }
                                  }


                        echo "
                            </div>
                          </div>
                        </div>



                      </td>
                      <td class='actions'>
                        <a class='btn btn-info btn-xs'  href='?site=inventarioView&id=" . $row["idJogador"]."&nomeJogador=" . $row["nomeJogador"]."&idFicha=" . $row["idFicha"]."' data-toggle='modal'>Visualizar</a>
                        <a class='btn btn-danger btn-xs'  href='#' data-toggle='modal' data-target='#delete-modal'>Excluir</a>
                      </td>
                    </tr>
";




              }
            } else {
              echo "0 results";
            }

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
