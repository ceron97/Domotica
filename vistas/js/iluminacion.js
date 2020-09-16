//////////////////////////////////
/*       */




$(".btnEliminarBombillo").click(function() {

    var idBombillo = $(this).attr("idBombillo");

    Swal.fire({

		icon: "warning",
		title: "¿Esta seguro de borrar el bombillo?",
		text: "¡Si no lo esta puede cancelar la acción!",
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, ¡Borrar bombillo!'

	}).then(function(result){
		
		if (result.value) {
			
			window.location = "index.php?vista=iluminacion&idBombillo="+idBombillo;
			
		}
		
	})
    
})
