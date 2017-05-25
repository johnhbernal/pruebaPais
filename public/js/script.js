/**
 *
 * @author <a href="mailto:johnhawer8@gmail.com">John Hawer Bernal Gonzalez;
 * @since 25/05/2017
 * En esta función llamamos a un ajax para que nos realize una consulta a la funcion getRecurso 
 * que se encuentra dentro del controlador SearchController a partir del 3 caracter ingresado.
 * Nos devuelve el nombre y el apellido contatenados del empleado y su codigo de empleado.
 */
var searchRequest = null;

	$(function functionFindByName() {
	    var minlength = 1;
	    $('input[name=findByAge]').keyup(function () {
	        var that = this,
	        value = $(this).val();
//	    	console.log(value);
	        if (value.length >= minlength ) {
	            if (searchRequest != null) 
	                searchRequest.abort();
	            searchRequest = $.ajax({
	                type: "GET",
//	                url: "core/patient.php",
	                url: "models/my_patient.php",
	                dataType: "json",
//	                data: {
//	                    func: 'findByName',name: value,
//	                },
	                data: {
	                	func: 'findByNameMypatient',name: value,
	                },
	                success: function(msg){
	                    //we need to check if the value is the same
	                    if (value==$(that).val()) {
	                    console.log(value);
	                    }
	                }
	            });
	        }
	    });
	});

//__________________________________________________________________________________
/*
 * Funcion utilizada para consultar por un rango de edad.
 */
$.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
	var min = parseInt($('#min').val(), 10);
	var max = parseInt($('#max').val(), 10);

	var age = parseFloat(data[1]) || 0; // use data for the age column

	if ((isNaN(min) && isNaN(max)) || (isNaN(min) && age <= max)
			|| (min <= age && isNaN(max)) || (min <= age && age <= max)) {
		return true;
	}

	return false;
});


$(document).ready(function() {

	var table = $('#userTable').DataTable({
//		"language" : {
//			"url" : "./public/json/Spanish.json"
//		}
	}

	);
	var table1 = $('#userTableAge').DataTable({
//		"language" : {
//			"url" : "./public/json/Spanish.json"
//		}
	});
	var table2 = $('#userTableAgeRange').DataTable({
//		"language" : {
//			"url" : "./public/json/Spanish.json"
//		}
	});

  // Punto 1.
  // Crear código para filtrar pacientes por nombre.
	$('input[name=patient_filter]').keyup(function() {
		
		table.column(0).search(this.value).draw();
		
	});
	
	
	//punto 2
	// llamado a el codigo que busca por un rang0 de fecha cada vez que se ingresa un nuevo valor.
	// Event listener to the two range filtering inputs to redraw on input
	$('#min, #max').keyup(function() {
		table.draw();
	});

//	alert($('#example_info').attr('value'));

});

