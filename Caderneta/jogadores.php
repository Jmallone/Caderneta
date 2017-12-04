
</nav>
<div id="page-wrapper">

  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">
          Jogadores
        </h1>

        <ol class="breadcrumb">
          <li>
            <i class="fa fa-dashboard"></i>  <a href="index.html">Inicio</a>
          </li>
          <li class="active">
            <i class="fa fa-file"></i> Jogadores
          </li>
        </ol>
        <table class="table table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>NOME</th>
              <th>


                <div id="BoxNovoBotao" onclick="Mudarestado('minhaDiv')">

                  <a href="#" class="btn btn-primary h2">Adicionar Jogador</a>
                </div>


              </th>

            </tr>
          </thead>
          <tbody>


            <?php

            $sql = "SELECT J.idJogador, J.nomeJogador
FROM JOGADOR J";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                echo "<tr>
                <td><span id='editSpan'>" . $row["idJogador"]."</span></td>
                <td><p class='intro' >" . $row["nomeJogador"]. "</p></td>
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
