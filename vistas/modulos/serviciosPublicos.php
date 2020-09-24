  <div class="content-wrapper" style="background: #6c757d; color:white;">
    
    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>Servicios Publicos</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>

              <li class="breadcrumb-item active" style="color:white;">Servicios publicos</li>

            </ol>

          </div>

        </div>

      </div><!-- /.container-fluid -->

    </section>



    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">

        <div class="card-header" style="background: #343a40; color:#fff;">

          <h3 class="card-title">Servicios Publicos</h3>

          <div class="card-tools">

            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">

            <i class="fas fa-minus"></i></button>           

          </div>

        </div>

        <div class="card-body" style="background: #6c757d; color:#fff;">
          <div class="row">

            <!-- =============================================
              =            GAS           =
              ============================================= -->
                <div class="col-lg-4">

                   <div class="card card-danger card-outline">

                      <div class="card-header">

                        <h3 class="card-title">

                          <i class="fas fa-fire"></i>

                          Información de Gas

                        </h3>

                      </div><!-- fin de encabezado de la cabeza -->

                    </div><!-- fin de la tarjeta -->

                    <div class="card-body">

                      <div id="interactive-g" style="height: 300px;"></div>

                    </div>

                </div>
                <!-- fin grafica de gas -->

              <!-- =============================================
              =           AGUA          =
              ============================================= -->
                <div class="col-lg-4">

                   <div class="card card-primary card-outline">

                      <div class="card-header">

                        <h3 class="card-title">

                          <i class="fas fa-tint"></i>

                          Información de Agua

                        </h3>

                      </div><!-- fin de encabezado de la cabeza -->

                    </div><!-- fin de la tarjeta -->

                    <div class="card-body">

                      <div id="interactive" style="height: 300px;"></div>

                    </div>

                </div>
                <!-- fin grafica de agua -->

              <!-- =============================================
              =            ENERGIA           =
              ============================================= -->
                <div class="col-lg-4">

                   <div class="card card-warning card-outline">

                      <div class="card-header">

                        <h3 class="card-title">

                          <i class="fas fa-bolt"></i>

                          Información de Energia

                        </h3>

                      </div><!-- fin de encabezado de la cabeza -->

                    </div><!-- fin de la tarjeta -->

                    <div class="card-body">

                      <div id="interactive-e" style="height: 300px;"></div>

                    </div>

                </div>
                <!-- fin grafica de energia -->

          </div>

        </div>

      

        <div class="card-footer" style="background: #343a40; color:#fff;">
          Footer
        </div>

        <!-- /.card-footer-->
      </div>

      <!-- /.card -->

    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
  <script>
    /*=============================================
 =            GRAFICA DEL AGUA           =
 =============================================*/
$(function () {
    /*
     * Flot Interactive Chart
     grafica q de agua 
     * -----------------------
     */
    // We use an inline data source in the example, usually data would
    // be fetched from a server
    var data        = [],
        totalPoints = 100

    function getRandomData() {

      if (data.length > 0) {
        data = data.slice(1)
      }

      // Do a random walk
      while (data.length < totalPoints) {

        var prev = data.length > 0 ? data[data.length - 1] : 50,
            y    = prev + Math.random() * 10 - 5

        if (y < 0) {
          y = 0
        } else if (y > 100) {
          y = 100
        }

        data.push(y)
      }

      // Zip the generated y values with the x values
      var res = []
      for (var i = 0; i < data.length; ++i) {
        res.push([i, data[i]])
      }

      return res
    }

    var interactive_plot = $.plot('#interactive', [
        {
          data: getRandomData(),
        }
      ],
      {
        grid: {
          borderColor: '#f3f3f3',
          borderWidth: 1,
          tickColor: '#f3f3f3'
        },
        series: {
          color: '#3c8dbc',
          lines: {
            lineWidth: 2,
            show: true,
            fill: true,
          },
        },
        yaxis: {
          min: 0,
          max: 100,
          show: true
        },
        xaxis: {
          show: true
        }
      }
    )

    var updateInterval = 500 //Fetch data ever x milliseconds
    var realtime       = 'on' //If == to on then fetch data every x seconds. else stop fetching
    function update() {

      interactive_plot.setData([getRandomData()])

      // Since the axes don't change, we don't need to call plot.setupGrid()
      interactive_plot.draw()
      if (realtime === 'on') {
        setTimeout(update, updateInterval)
      }
    }

    //INITIALIZE REALTIME DATA FETCHING
    if (realtime === 'on') {
      update()
    }
    //REALTIME TOGGLE
    $('#realtime .btn').click(function () {
      if ($(this).data('toggle') === 'on') {
        realtime = 'on'
      }
      else {
        realtime = 'off'
      }
      update()
    })
    /*
     * END INTERACTIVE CHART
     */
});


/*=============================================
 =            GRAFICA DE LA ENERGIA            =
 =============================================*/
$(function () {
    /*
     * Flot Interactive Chart
     * -----------------------
     */
    // We use an inline data source in the example, usually data would
    // be fetched from a server
    var data        = [],
        totalPoints = 100

    function getRandomData() {

      if (data.length > 0) {
        data = data.slice(1)
      }

      // Do a random walk
      while (data.length < totalPoints) {

        var prev = data.length > 0 ? data[data.length - 1] : 50,
            y    = prev + Math.random() * 10 - 5

        if (y < 0) {
          y = 0
        } else if (y > 100) {
          y = 100
        }

        data.push(y)
      }

      // Zip the generated y values with the x values
      var res = []
      for (var i = 0; i < data.length; ++i) {
        res.push([i, data[i]])
      }

      return res
    }

    var interactive_plot = $.plot('#interactive-e', [
        {
          data: getRandomData(),
        }
      ],
      {
        grid: {
          borderColor: '#f3f3f3',
          borderWidth: 1,
          tickColor: '#f3f3f3'
        },
        series: {
          color: '#FDD612',
          lines: {
            lineWidth: 2,
            show: true,
            fill: true,
          },
        },
        yaxis: {
          min: 0,
          max: 100,
          show: true
        },
        xaxis: {
          show: true
        }
      }
    )

    var updateInterval = 500 //Fetch data ever x milliseconds
    var realtime       = 'on' //If == to on then fetch data every x seconds. else stop fetching
    function update() {

      interactive_plot.setData([getRandomData()])

      // Since the axes don't change, we don't need to call plot.setupGrid()
      interactive_plot.draw()
      if (realtime === 'on') {
        setTimeout(update, updateInterval)
      }
    }

    //INITIALIZE REALTIME DATA FETCHING
    if (realtime === 'on') {
      update()
    }
    //REALTIME TOGGLE
    $('#realtime .btn').click(function () {
      if ($(this).data('toggle') === 'on') {
        realtime = 'on'
      }
      else {
        realtime = 'off'
      }
      update()
    })
    /*
     * END INTERACTIVE CHART
     */
});



/*=============================================
 =            GRAFICA DE LA GAS           =
 =============================================*/
$(function () {
    /*
     * Flot Interactive Chart
     * -----------------------
     */
    // We use an inline data source in the example, usually data would
    // be fetched from a server
    var data        = [],
        totalPoints = 100

    function getRandomData() {

      if (data.length > 0) {
        data = data.slice(1)
      }

      // Do a random walk
      while (data.length < totalPoints) {

        var prev = data.length > 0 ? data[data.length - 1] : 50,
            y    = prev + Math.random() * 10 - 5

        if (y < 0) {
          y = 0
        } else if (y > 100) {
          y = 100
        }

        data.push(y)
      }

      // Zip the generated y values with the x values
      var res = []
      for (var i = 0; i < data.length; ++i) {
        res.push([i, data[i]])
      }

      return res
    }

    var interactive_plot = $.plot('#interactive-g', [
        {
          data: getRandomData(),
        }
      ],
      {
        grid: {
          borderColor: '#f3f3f3',
          borderWidth: 1,
          tickColor: '#f3f3f3'
        },
        series: {
          color: '#E60D09',
          lines: {
            lineWidth: 2,
            show: true,
            fill: true,
          },
        },
        yaxis: {
          min: 0,
          max: 100,
          show: true
        },
        xaxis: {
          show: true
        }
      }
    )

    var updateInterval = 500 //Fetch data ever x milliseconds
    var realtime       = 'on' //If == to on then fetch data every x seconds. else stop fetching
    function update() {

      interactive_plot.setData([getRandomData()])

      // Since the axes don't change, we don't need to call plot.setupGrid()
      interactive_plot.draw()
      if (realtime === 'on') {
        setTimeout(update, updateInterval)
      }
    }

    //INITIALIZE REALTIME DATA FETCHING
    if (realtime === 'on') {
      update()
    }
    //REALTIME TOGGLE
    $('#realtime .btn').click(function () {
      if ($(this).data('toggle') === 'on') {
        realtime = 'on'
      }
      else {
        realtime = 'off'
      }
      update()
    })
    /*
     * END INTERACTIVE CHART
     */
});

  </script>
