

<div id="page-wrapper">

  <div class="container-fluid">
    <!-- Page Heading -->
    <form name="Cadastro" action="" method="GET">
      <div id="minhaDiv"  style="">
        <table class="table table-hover" style="width: 63%;">
        </tr>
        <tr>

          <?php
          if(isset($_GET["op"]) && $_GET["op"] == 3){

              echo "ADICIONADO";
          }else{
            echo "<td><input style='display: none;' name='site' value='inventarioEditar'></td>
            <td><input style='' name='NomeInventario' value='".$_GET["id"]."'></td>
            <td><input style='display: none;' name='NomeInventarioOLD' value='".$_GET["id"]."'></td>
            <td><input style='display: none;' name='Ficha_idFicha' value='".$_GET["idFicha"]."'></td>
            <td><input style='' name='descricaoInventario' value='".$_GET["desc"]."'></td>
            <td><input style='' name='quantidadeInventario' value='".$_GET["qtd"]."'></td>
            <td><input style='display: none;' name='op' value='3'></td>
            ";

          }

          ?>
          <td>
            <div class="row">

            </div>

            <div class="row">

              <input type="submit"  class="btn btn-success x" value="OK" />
            </div>
            <?php
            if(isset($_GET["op"]) && $_GET["op"] == 3){


              $sql = "UPDATE `inventario` SET `NomeInventario`='" . $_GET["NomeInventario"] ."', `descricaoInventario`='" . $_GET["descricaoInventario"] ."', `quantidadeInventario`='" . $_GET["quantidadeInventario"] ."' WHERE `NomeInventario`='" . $_GET["NomeInventarioOLD"] ."' and`Ficha_idFicha`='" . $_GET["Ficha_idFicha"] ."'";
              if (mysqli_query($conn, $sql)) {
                echo "Adicionado com Sucesso";
              } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }

            } ?>


          </table>
        </div>
      </form>


    </div>
  </div>
  <!-- /.row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->
