document.addEventListener("DOMContentLoaded",function(event){

  var serviciosEnergia = "datos_energia";
  var serviciosGas = "datos_gas";
  var serviciosAgua = "datos_agua";

  var datos = new FormData();

  datos.append("serviciosEnergia",serviciosEnergia);
  datos.append('serviciosGas',serviciosGas);
  datos.append('serviciosAgua',serviciosAgua);

  $.ajax({

    url: 'ajax/serviciosPublicos.ajax.php',
    method: 'POST',
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: 'json',
    success:function(respuesta){

      if (respuesta[0].totalAgua == 0 && respuesta[0].totalEnergia == 0 && respuesta[0].totalGas == 0) 
      {
        Swal.fire({

              type: 'info',
              title:'<h4 class="tituloWhite">¡No se encontraron datos registrados!</h4>',
              html: '<p class="tituloWhite">Por favor ingrese los datos de agua, gas o energia<p>',
              background: '#343a40',
              showConfirmButton: true,
              confirmButtonColor: '#dc3545',
              confirmButtonText: 'Ok',
                               
          });
      }

      if(respuesta[0].totalAgua == 0)
      {
        $('.hiddenAguaCont').attr('hidden', true);
        $('.hiddenAguaButton').attr('hidden', false);
      }else{
        $('.hiddenAguaButton').attr('hidden', true);
        $('.hiddenAguaCont').attr('hidden', false);
        document.getElementById('clickAgua').click();
      }
      if(respuesta[0].totalEnergia == 0)
      {
        $('.hiddenEnergiaCont').attr('hidden', true);
        $('.hiddenEnergiaButton').attr('hidden', false);
      }else{
        $('.hiddenEnergiaButton').attr('hidden', true);
        $('.hiddenEnergiaCont').attr('hidden', false);
        document.getElementById('clickEnergia').click();
      }
      if(respuesta[0].totalGas == 0)
      {
        $('.hiddenGasCont').attr('hidden', true);
        $('.hiddenGasButton').attr('hidden', false);
      }else{
        $('.hiddenGasButton').attr('hidden', true);
        $('.hiddenGasCont').attr('hidden', false);
        document.getElementById('clickGas').click();
      }
    }
  });

});


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
                tickColor: '#fff'
              },
              series: {
                color: '#42B9FF',
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
                color: '#FF0C08',
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
       =            MOSTRAR INFO DEL GAS           =
       =============================================*/
function gas() {

  document.getElementById('infoGas').style.display="block";
  document.getElementById('infoAgua').style.display="none";
  document.getElementById('infoEnergia').style.display="none"; 

}

/*=============================================
       =       MOSTRAR INFO DE LA ENERGIA    =
=============================================*/
function energia() {

  document.getElementById('infoGas').style.display="none";
  document.getElementById('infoAgua').style.display="none";
  document.getElementById('infoEnergia').style.display="block"; 
     
}
/*=============================================
  =            MOSTRAR INFO DEL AGUA           =
=============================================*/
function agua() {

  document.getElementById('infoGas').style.display="none";
  document.getElementById('infoAgua').style.display="block";
  document.getElementById('infoEnergia').style.display="none"; 
     
}

/*=============================================
  =            IMPIRMIR CONSUMO  de ENERGIA  =
=============================================*/
$(".card-energia").on("click", ".btnImprimirFactura" ,function(){

  var codigoEnergia = $(this).attr("codigoReporte");

  window.open("extensiones/TCPDF/examples/factura.php?codigo="+codigoEnergia, "_blank");

})

// filtro de fecha del gas
$(function () {
    //Date range picker
  $('#reservation-1').daterangepicker()
    //Date range picker with time picker  
})

  // filtro de fecha del agua
$(function () {
    //Date range picker
  $('#reservation-2').daterangepicker()
    //Date range picker with time picker  
 })


  // filtro de fecha de la energia
$(function () {
    //Date range picker
  $('#reservation-e').daterangepicker()
    //Date range picker with time picker  
})
/*=============================================
=            EDITAR GAS           =
=============================================*/

$(document).on("click", ".btnEditarGas" ,function(){
  
  var idServicioGas = $(this).attr("idServicioGas");

  var datos = new FormData();

  datos.append("idServicioGas",idServicioGas);

  $.ajax({

    url: 'ajax/serviciosPublicos.ajax.php',
    method: 'POST',
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: 'json',
    success:function(respuesta){

      $("#modificarNumeroMedidorGas").val(respuesta["numeroMedidorGas"]);
      $("#modificarFactorCorreccion").val(respuesta["factorCorreccion"]);

    }

  });
})

/*=============================================
=            EDITAR AGUA           =
=============================================*/

$(document).on("click", ".btnEditarAgua" ,function(){
  
  var idServicioAgua = $(this).attr("idServicioAgua");

  var datos = new FormData();

  datos.append("idServicioAgua",idServicioAgua);

  $.ajax({

    url: 'ajax/serviciosPublicos.ajax.php',
    method: 'POST',
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: 'json',
    success:function(respuesta){
    console.log(respuesta);

      $("#modificarNumeroMedidorAgua").val(respuesta["numeroMedidorAgua"]);
      $("#modificarTarifaAlcantarilladoSuntuario").val(respuesta["tarifaAlcantarilladoSuntuario"]);
      $("#modificarTarifaAlcantarilladoBasico").val(respuesta["tarifaAlcantarilladoBasico"]);
      $("#modificarTarifaAlcantarilladoComplementario").val(respuesta["tarifaAlcantarilladoComplementario"]);
      $("#modificarTarifaAcueductoSuntuario").val(respuesta["tarifaAcueductoSuntuario"]);
      $("#modificarTarifaAcueductoBasico").val(respuesta["tarifaAcueductoBasico"]);
      $("#modificarTarifaAcueductoComplementario").val(respuesta["tarifaAcueductoComplementario"]);
      $("#modificarCargoFijoLiquidacionAcueducto").val(respuesta["cargoFijoLiquidacionAcueducto"]);
      $("#modificarCargoFijoLiquidacionAlcantarillado").val(respuesta["cargoFijoLiquidacionAlcantarillado"]);
    }
  });
})

/*=============================================
=            EDITAR ENERGIA          =
=============================================*/

$(document).on("click", ".btnEditarEnergia" ,function(){
  
  var idServicioEnergia = $(this).attr("idServicioEnergia");

  var datos = new FormData();

  datos.append("idServicioEnergia",idServicioEnergia);

  $.ajax({

    url: 'ajax/serviciosPublicos.ajax.php',
    method: 'POST',
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: 'json',
    success:function(respuesta){

      $("#modificarNumeroMedidorEnergia").val(respuesta["numeroMedidorEnergia"]);
      $("#modificarTarifaEnergia").val(respuesta["tarifaEnergia"]);

    }
  });
})