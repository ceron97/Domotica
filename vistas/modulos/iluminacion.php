  <div class="content-wrapper" style="background: #343a40; color:#fff;">
    
    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>Iluminación</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>

              <li class="breadcrumb-item active" style="color:white;">Iluminación</li>

            </ol>

          </div>

        </div>

      </div><!-- /.container-fluid -->

    </section>



    <!-- Main content -->
    <section class="content">

      <div class="card" style="background: #343a40; color:#fff;">

        <!--Cabecera de la tarjeta -->

        <div class="card-header" style="background: #343a40; color:#fff;">

          <h3 class="card-title">Iluminación</h3>

          <div class="card-tools">

            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">

              <i class="fas fa-minus"></i></button>

            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">

              <i class="fas fa-times"></i></button>

          </div>

        </div>

        <!-- Opciones de ver y agregar -->

        <div class="container-fluid" style="background: #343a40; color:#fff;">

          <!-- Tarjeta para las opciones -->

          <div class="card" style="background: #343a40; color:#fff;">

              <!-- Cuerpo de la tarjeta -->

              <div class="card-body">
                
                <div class="row">

                  <!-- Tarjeta ver informe -->

                  <div class="col-lg-6 col-6">

                    <div class="small-box bg-info">

                      <div class="inner">

                        <h3>Ver Informe</h3>

                        <p>General</p>

                      </div>

                      <div class="icon">

                        <i class="far fa-eye"></i>

                      </div>

                      <a href="informegeneral" class="small-box-footer">

                        Ver

                        <i class="fas fa-arrow-circle-right"></i>

                      </a>

                    </div>

                  </div>

                  <!-- Tarjeta agregar -->

                  <div class="col-lg-6 col-6">

                    <div class="small-box bg-success">

                      <div class="inner">

                        <h3>Agregar</h3>

                        <p>Bombillos</p>

                      </div>

                      <div class="icon">

                        <i class="far fa-plus-square"></i>

                      </div>

                      <a class="small-box-footer" id="btnAgregar" data-toggle="modal" data-target="#modalAgregarBombillo">

                        Agregar

                        <i class="fas fa-arrow-circle-right"></i>

                      </a>

                    </div>

                  </div>

                </div>

              </div>

          </div>

        </div>

        <!-- Fin tarjeta ver y agregar -->

        <!-- Tarjeta para la tabla -->

        <div class="card" style="background: #343a40; color:#fff;">

          <div class="card-body table-responsive">

            <table class="table table-bordered table-striped tabla">
              
              <thead class="thead-dark">
                
                <tr>

                  <th>#</th>
                  <th>Nombre</th>
                  <th>Acciones</th>

                </tr>

              </thead>

              <tbody>

                    <tr>

                      <td>1</td>

                      <td>Bombillo</td>
      
                      <td>

                        <button class="btn btn-outline-primary" id="btnOnOff" estadoBombillo="1">
                          <i class="fas fa-lightbulb"></i>
                        </button>
                        
                        <button class="btn btn-outline-success btnMonitorear">
                          <i class="fa fa-book"></i>
                        </button>

                        <button class="btn btn-outline-info" data-toggle="modal" data-target="#modalRevisarBombillo">
                          <i class="fas fa-eye"></i>
                        </button>

                        <button class="btn btn-outline-secondary">
                          <i class="fab fa-cuttlefish"></i>
                        </button>

                        <button class="btn btn-default">
                          <input type="range" class="custom-range" id="customRange1" style="width: 300px">
                        </button>

                        <button class="btn btn-outline-warning" data-toggle="modal" data-target="#modalEditarBombillo">
                          <i class="fas fa-pencil-alt"></i>
                        </button>

                        <button class="btn btn-outline-danger btnEliminarBombillo">
                          <i class="fa fa-times"></i>
                        </button>

                      </td>
    
                    </tr>

                    <tr>

                      <td>2</td>

                      <td>Bombillo</td>
      
                      <td>

                        <button class="btn btn-outline-primary">
                          <i class="fas fa-lightbulb"></i>
                        </button>

                        <button class="btn btn-outline-success btnMonitorear">
                          <i class="fa fa-book"></i>
                        </button>

                        <button class="btn btn-outline-info" data-toggle="modal" data-target="#modalRevisarBombillo">
                          <i class="fas fa-eye"></i>
                        </button>

                        <button class="btn btn-outline-secondary">
                          <i class="fab fa-cuttlefish"></i>
                        </button>

                        <button class="btn btn-default">
                          <input type="range" class="custom-range" id="customRange1" style="width: 300px">
                        </button>

                        <button class="btn btn-outline-warning" data-toggle="modal" data-target="#modalEditarBombillo">
                          <i class="fas fa-pencil-alt"></i>
                        </button>

                        <button class="btn btn-outline-danger btnEliminarBombillo">
                          <i class="fa fa-times"></i>
                        </button>

                      </td>
    
                    </tr>

                    <tr>

                      <td>3</td>

                      <td>Bombillo</td>
      
                      <td>

                        <button class="btn btn-outline-primary">
                          <i class="fas fa-lightbulb"></i>
                        </button>

                        <button class="btn btn-outline-success btnMonitorear">
                          <i class="fa fa-book"></i>
                        </button>

                        <button class="btn btn-outline-info" data-toggle="modal" data-target="#modalRevisarBombillo">
                          <i class="fas fa-eye"></i>
                        </button>

                        <button class="btn btn-outline-secondary">
                          <i class="fab fa-cuttlefish"></i>
                        </button>

                        <button class="btn btn-default">
                          <input type="range" class="custom-range" id="customRange1" style="width: 300px">
                        </button>

                        <button class="btn btn-outline-warning" data-toggle="modal" data-target="#modalEditarBombillo">
                          <i class="fas fa-pencil-alt"></i>
                        </button>

                        <button class="btn btn-outline-danger btnEliminarBombillo">
                          <i class="fa fa-times"></i>
                        </button>

                      </td>
    
                    </tr>

              </tbody>

            </table>

          </div>
          <!-- /.card-body -->
    
        </div>
        <!-- Fin tarjeta para la tabla -->

      </div>
      <!-- /.card -->

    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->