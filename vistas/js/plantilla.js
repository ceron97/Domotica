$(".tablas").DataTable({

	"language": {
        	"sProcessing":     "Procesando...",
        	"sLengthMenu":     "Mostrar _MENU_ registros",
        	"sZeroRecords":    "No se encontraron resultados",
        	"sEmptyTable":     "Ningún dato disponible en esta tabla",
        	"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        	"sInfoEmpty":      "Mostrando registros del 0 al 0 a un total de 0 ",
        	"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        	"sInfoPostFix":    "",
        	"sSearch":         "Buscar:",
        	"sUrl":            "",
        	"sInfoThousands":  ",",
        	"sLoadingRecords": "Cargando...",
        	"oPaginate": {
        		"sFirst":    "Primero",
        		"sLast":     "Último",
        		"sNext":     "Siguiente",
        		"sPrevious": "Anterior"
        	},
        	"oAria": {
        		"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        		"sSortDescending": ": Activar para ordenar la columna de manera descendente"
        	}
        } 
        
});

$(".paginate_page").text("Página");
$(".paginate_of").text($(".paginate_of").text().replace("of","de"));


//Permite que muestre la seleccion de la pagina actual
var url = window.location;
const allLinks = document.querySelectorAll('.nav-item a');
const currentLink = [...allLinks].filter(e => {
    return e.href == url;
});

currentLink[0].classList.add("active");

if (currentLink[0].closest(".nav-treeview")) {
  currentLink[0].closest(".has-treeview").classList.add("menu-open");
  currentLink[0].closest(".nav-treeview").style.display = "block ";
}
$('.menu-open').find('a').each(function() {
  if (!$(this).parents().hasClass('active')) {
    $(this).parents().addClass("active");
    $(this).addClass("active");
  }
});

//oculta la barra de navegación de dispositivos moviles
window.addEventListener("load",function() {
  setTimeout(function(){
    window.scrollTo(0, 1);
  }, 0);
});