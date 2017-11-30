
        <div id="page-wrapper">

            <div class="container-fluid">
              <div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-table fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">
                          <?php
                          $sql = "select count(*) from ficha";
                          $result = $conn->query($sql);

                          if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                              echo $row["count(*)"];
                                ///// ON DELETE SET NULL

                            }
                          } else {
                            echo "0";
                          }

                          ?>
                        </div>
                        <div>Fichas!</div>
                    </div>
                </div>
            </div>
            <a href="?site=fichas">
                <div class="panel-footer">
                    <span class="pull-left">Visualizar Fichas</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-sitemap fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php
                        $sql = "select count(*) from sala";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                          // output data of each row
                          while($row = $result->fetch_assoc()) {
                            echo $row["count(*)"];
                              ///// ON DELETE SET NULL

                          }
                        } else {
                          echo "0";
                        }

                        ?></div>
                        <div>Salas!</div>
                    </div>
                </div>
            </div>
            <a href="?site=salas">
                <div class="panel-footer">
                    <span class="pull-left">Visualizar Salas</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-child fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php
                        $sql = "select count(*) from jogador";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                          // output data of each row
                          while($row = $result->fetch_assoc()) {
                            echo $row["count(*)"];
                              ///// ON DELETE SET NULL

                          }
                        } else {
                          echo "0";
                        }

                        ?></div>
                        <div>Novos Jogadores!</div>
                    </div>
                </div>
            </div>
            <a href="?site=jogadores">
                <div class="panel-footer">
                    <span class="pull-left">Visualizar Jogadores</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

</div>
<!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
