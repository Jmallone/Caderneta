

<div id="page-wrapper">

  <div class="container-fluid">
    <!-- Page Heading -->
    <form name="Cadastro" action="" method="GET">
      <div id="minhaDiv">

        <input style="display: none;" name="site" value='salaseditar'>
          <input style="display: none;" name="idSala" value='<?php echo $_GET["id"]; ?>'>
          <input style="display: none;" name="nome" value='<?php echo $_GET["nome"]; ?>'>
          <input style="display: none;" name="op" value='1'>

            <div class="row">
              <input class="form-control" placeholder="Enter Nome"  name="nomeSala" value="<?php echo $_GET["nomeSala"]; ?>">
            </div>

            <div class="row">

              <select class="form-control selectpicker" name="mestre">
                <option value="<?php echo $_GET["idMestre"]; ?>"><?php echo $_GET["nome"]; ?></option>
                <option value="a">------</option>
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
                }else {
                  echo "0 results";
                }

                ?>




              </select>
            </div>

          <td class="actions">
            <input type="submit"  class="btn btn-success x" value="OK" />

            <?php
            if(isset($_GET["op"]) && $_GET["op"] == 1){


              $sql = "UPDATE `sala` SET `nomeSala`='".$_GET["nomeSala"]."', `Jogador_idJogador`='".$_GET["mestre"]."' WHERE `idSala`='".$_GET["idSala"]."'";

              if ($conn->query($sql) === TRUE) {
                echo "Record updated successfully";
              } else {
                echo "Error updating record: " . $conn->error;
              }

              $conn->close();
            }
            ?>



  </div>


</form>


</div>
</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->
