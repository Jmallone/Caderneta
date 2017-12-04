
<div id="page-wrapper">

  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">
          Fichas
        </h1>

        <ol class="breadcrumb">
          <li>
            <i class="fa fa-dashboard"></i>  <a href="index.html">Inicio</a>
          </li>
          <li class="active">
            <i class="fa fa-file"></i> Fichas
          </li>
        </ol>

        <table class="table table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>NOME</th>
              <th>USUARIO</th>
              <th>CLASSE/LVL</th>
              <th>


                <div id="BoxNovoBotao" onclick="Mudarestado('minhaDiv')">

                  <a href="#" class="btn btn-primary h2">Adicionar Ficha</a>
                </div>


              </th>

            </tr>
          </thead>
          <tbody>


            <?php

            $sql = "SELECT F.idFicha, F.nomeFicha,J.nomeJogador, C.nomeClasse, F.Level_idlevel
FROM ficha F, classe C,jogador J
WHERE F.Classe_idClasse = C.idClasse
AND J.idJogador = F.Jogador_idJogador ";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                echo "<tr>
                <td><span id='editSpan'>" . $row["idFicha"]."</span></td>
                <td><p class='intro' >" . $row["nomeFicha"]. "</p></td>
                <td><p class='intro' ><span>" . $row["nomeJogador"]. "</p></td>
                <td><p class='intro' ><span>" . $row["nomeClasse"]. " / " . $row["Level_idlevel"]. "</p></td>
                <td class='actions'>
                  <a class='btn btn-info btn-xs'  href='' data-toggle='modal'>Visualizar</a>
                <a class='btn btn-warning btn-xs' href=''>Editar</a>
                <a class='btn btn-danger btn-xs'  href='' data-toggle='modal' >Excluir</a>
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
