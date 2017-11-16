<div id="page-wrapper">

  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">
          Classes
        </h1>

        <ol class="breadcrumb">
          <li>
            <i class="fa fa-dashboard"></i>  <a href="index.html">Inicio</a>
          </li>
          <li class="active">
            <i class="fa fa-file"></i> Classes
          </li>
        </ol>
        <table class="table table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>NOME</th>
              <th>HITDICE</th>
              <th>


                <div id="BoxNovoBotao" onclick="Mudarestado('minhaDiv')">

                  <a href="#" class="btn btn-primary  h2">Nova Classe</a>
                </div>


              </th>

            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Bardo</td>
              <td>d8</td>
              <td class="actions">
                <a class="btn btn-warning btn-xs" href="edit.html">Editar</a>
                <a class="btn btn-danger btn-xs"  href="#" data-toggle="modal" data-target="#delete-modal">Excluir</a>
              </td>
            </tr>
            <tr>
              <td>2</td>
              <td>Clerigo</td>
              <td>d10</td>
              <td class="actions">
                <a class="btn btn-warning btn-xs" href="edit.html">Editar</a>
                <a class="btn btn-danger btn-xs"  href="#" data-toggle="modal" data-target="#delete-modal">Excluir</a>
              </td>
            </tr>
            <tr>
              <td>3</td>
              <td>Druid</td>
              <td>d8</td>
              <td class="actions">
                <a class="btn btn-warning btn-xs" href="edit.html">Editar</a>
                <a class="btn btn-danger btn-xs"  href="#" data-toggle="modal" data-target="#delete-modal">Excluir</a>
              </td>
            </tr>

          </tbody>
        </table>

        <div id="minhaDiv">


          <table class="table table-hover" style="width: 63%;">
          </tr>
          <tr>

            <td><input class="form-control" placeholder="Nome"></td>
            <td><input class="form-control" placeholder="HitDIce"></td>
            <td class="actions">
              <a class="btn btn-success x" href="edit.html">OK</a>

            </td>
          </tr>

        </tbody>
      </table>






    </div>




  </div>
</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->
