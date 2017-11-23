

<div id="page-wrapper">

  <div class="container-fluid">
    <!-- Page Heading -->
    <form name="Cadastro" action="" method="GET">
      <div id="minhaDiv>
        <table class="table table-hover" style="width: 63%;">
        </tr>
        <tr>
          <td><input style="display: none;" name="site" value="niveiseditar"></td>
          <td><input style="display: none;" name="op" value='1'></td>
          <td><input style="display: none;" name="id" value=<?php echo $_GET["id"]; ?>></td>
          <td><input class="form-control" placeholder="Nome" name="lvl" value="<?php echo $_GET["lvl"]; ?>"</td>
          <td><input class="form-control" placeholder="Nome" name="xp" value="<?php echo $_GET["xp"]; ?>"</td>
          <td><input class="form-control" placeholder="Nome" name="prof" value="<?php echo $_GET["prof"]; ?>"</td>
          <td class="actions">

            <input type="submit"  class="btn btn-success x" value="OK" />
            <?php
            if(isset($_GET["op"]) && $_GET["op"] == 1){


              $sql = "UPDATE `nivel` SET `idNivel` = '".$_GET["id"]."', `valorNivel` = '".$_GET["lvl"]."', `bonusProf` = '".$_GET["prof"]."', `xpNec` = '".$_GET["xp"]."' WHERE `nivel`.`idNivel` = ".$_GET["id"]."";

              if ($conn->query($sql) === TRUE) {
                echo "Record updated successfully";
              } else {
                echo "Error updating record: " . $conn->error;
              }

              $conn->close();
            }
            ?>
          </td>
        </tr>

      </tbody>
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
