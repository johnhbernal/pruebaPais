<?php
include 'models/my_patient.php';

$patient_model = new my_patient ();

$patients = $patient_model->list_all ();

?>



<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>El País Test</title>
<meta name="description" content="El País programming test">
<meta name="author" content="assistrx-dw">
<link rel="stylesheet" href="public/css/bootstrap.min.css">
<link rel="stylesheet" href="public/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="public/css/jquery-ui.min.css">
<link rel="stylesheet" href="public/css/form.css">
</head>
<body>


	<div class="col-lg-12">
		<fieldset>
			<legend>
				<label><a class="requerido"></a><font color='red'> Estos campos son
						requeridos </font></label>
			</legend>
		</fieldset>
	</div>
	<div class="container">
	
	
	<div class="container " id="contenedorTableImagenes"
			style="width: 95%; , height: 250%;">
			<div class="container " id="contenedorBandeja">
				<div class="col-xs-12 col-sm-12"></div>
			</div>
		
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion"
							href="#collapseOne">Find and group by age .</a>
					</h3>
				</div>
				<div id="collapseOne" class="panel-collapse collapse in">
					<div class="panel-body" style="padding-left: 5%;">
						<div class="row" style="width: 96%;">

										<?php $patientsfindAndGroupByAge= $patient_model->findAndGroupByAge()?>
										
		<table id="userTableAgeRange" class="table-striped table-bordered nowrap">
			<thead>
				<tr>
					<th>Name</th>
					<th class="hidden-sm">Age</th>
					<th>Phone</th>
					<th>Range Age</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>Name</th>
					<th class="hidden-sm">Age</th>
					<th>Phone</th>
					<th>Range Age</th>
				</tr>
			</tfoot>
			<tbody>
				<!-- Punto 4 Esconde la columna Age para móviles -->
				
        <?php foreach($patientsfindAndGroupByAge as $patient): ?>
				<tr>

					<td><?php echo $patient->patient_name; ?></td>
					<td class="hidden-sm"><?php echo $patient->patient_age; ?></td>
					<td><?php echo $patient->patient_phone; ?></td>
					<td><?php echo $patient->range_age; ?></td>
					<!-- <div class="clearfix visible-xs"></div> -->
				</tr>
        <?php endforeach; ?>
                
			</tbody>
		</table>
		
								</div>
				<ul>
											<p>Number of patients grouped by age</p>
			<!-- Punto 3 Listar numero de paciente por edades -->
			<li><span class='pull-center'>Patients quantity: </span><span class='pull-center'>Age: </span></li>
		</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	

<!-- __________________________ -->
		<div class="container " id="contenedorTableImagenes"
			style="width: 95%; , height: 250%;">
			<div class="container " id="contenedorBandeja">
				<div class="col-xs-12 col-sm-12"></div>
			</div>
		
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion"
							href="#collapseOne">Find by age range.</a>
					</h3>
				</div>
				<div id="collapseOne" class="panel-collapse collapse in">
					<div class="panel-body" style="padding-left: 5%;">
						<div class="row" style="width: 96%;">

								<table id='findAge' border="0" cellspacing="5" cellpadding="5">
								<tbody>
									<tr>
										<td>&nbsp;&nbsp;<a class="requerido"></a>&nbsp;Maximum age:&nbsp;</td>
										<td>
										<input type="number" id="maxAge" name="maxAge" placeholder="Type Maximum age" class="form-control" value="50" disabled >
										<?php $patientsAge = $patient_model->findByAge(50)?>
										
										</td>
									
									</tr>
								</tbody>
							</table>
	<br>
		<table id="userTableAge" class="table-striped table-bordered nowrap">
			<thead>
				<tr>
					<th>Name</th>
					<th class="hidden-sm">Age</th>
					<th>Phone</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>Name</th>
					<th class="hidden-sm">Age</th>
					<th>Phone</th>
				</tr>
			</tfoot>
			<tbody>
				<!-- Punto 4 Esconde la columna Age para móviles -->
				
        <?php foreach($patientsAge as $patient): ?>
				<tr>

					<td><?php echo $patient->patient_name; ?></td>
					<td class="hidden-sm"><?php echo $patient->patient_age; ?></td>
					<td><?php echo $patient->patient_phone; ?></td>
					<!-- <div class="clearfix visible-xs"></div> -->
				</tr>
        <?php endforeach; ?>
                
			</tbody>
		</table>
		
								</div>
				<ul>
											<p >Number of patients grouped by age</p>
			<!-- Punto 3 Listar numero de paciente por edades -->
			<li><span class='pull-center'>Patients quantity: </span><span class='pull-center'>Age: </span></li>
		</ul>
					</div>
				</div>
			</div>
		</div>
	</div>


<!-- ___________________________ -->




		<h1>Patient Listing</h1>

		<!-- 	______________________________________________________ -->


<!-- 		<div class="col-lg-6"> -->
<!-- 			<label class="col-md-4 control-label"><a class="requerido"></a> -->
<!-- 				Filter by Name</label> -->
<!-- 			<div class="input-group"> -->

<!-- 				<input type="text" name="patient_filter_name" /> -->
<!-- 			</div> -->
<!-- 		</div> -->

		<br>
		<!-- 	______________________________________________________ -->


		
		
		<div class="container " id="contenedorTableImagenes"
			style="width: 95%; , height: 250%;">
			<div class="container " id="contenedorBandeja">
				<div class="col-xs-12 col-sm-12"></div>
			</div>
		
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion"
							href="#collapseOne">Busqueda en datatable.</a>
					</h3>
				</div>
				<div id="collapseOne" class="panel-collapse collapse in">
					<div class="panel-body" style="padding-left: 5%;">
						<div class="row" style="width: 96%;">
							<table id='find' border="0" cellspacing="5" cellpadding="5">
								<tbody>
								<tr>
										<td>
									<label for="patient_filterLabel"><a class="requerido"></a>Filter by Name:&nbsp;</label></td>
									<td> <input
										type="text" name="patient_filter" placeholder="Type name" class="form-control" /></td>
								</tr>
								</tbody>
								</table>
								<br>
								<table id='findAge' border="0" cellspacing="5" cellpadding="5">
								<tbody>
									<tr>
										<td><a class="requerido"></a>&nbsp;Minimum age:&nbsp;</td>
										<td><input type="number" id="min" name="min" placeholder="Type Minimum age" class="form-control" ></td>
										<td>&nbsp;&nbsp;<a class="requerido"></a>&nbsp;Maximum age:&nbsp;</td>
										<td><input type="number" id="max" name="max" placeholder="Type Maximum age" class="form-control" ></td>
									</tr>
								</tbody>
							</table>
	<br>
		<table id="userTable" class="table-striped table-bordered nowrap">
			<thead>
				<tr>
					<th>Name</th>
					<th class="hidden-sm">Age</th>
					<th>Phone</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>Name</th>
					<th class="hidden-sm">Age</th>
					<th>Phone</th>
				</tr>
			</tfoot>
			<tbody>
				<!-- Punto 4 Esconde la columna Age para móviles -->
        <?php foreach($patients as $patient): ?>
				<tr>

					<td><?php echo $patient->patient_name; ?></td>
					<td class="hidden-sm"><?php echo $patient->patient_age; ?></td>
					<td><?php echo $patient->patient_phone; ?></td>
					<!-- <div class="clearfix visible-xs"></div> -->
				</tr>
        <?php endforeach; ?>
                
			</tbody>
		</table>
		
								</div>
				<ul>
											<p >Number of patients grouped by age</p>
			<!-- Punto 3 Listar numero de paciente por edades -->
			<li><span class='pull-center'>Patients quantity: </span><span class='pull-center'>Age: </span></li>
		</ul>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- scripts at the bottom! -->
	<script src="public/js/jquery-1.9.1.min.js"></script>

	<!-- this script file is for global js -->
	<script src="public/js/jquery.dataTables.min.js"></script>
	<script src="public/js/jquery-ui.min.js"></script>
	<script src="public/js/script.js"></script>

</body>
</html>
