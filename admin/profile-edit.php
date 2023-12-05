<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {

	if($_SESSION['user']['role'] == 'Super Admin') {

		$valid = 1;

	    if(empty($_POST['full_name'])) {
	        $valid = 0;
	        $error_message .= "El nombre no puede estar vacío.<br>";
	    }

	    if(empty($_POST['email'])) {
	        $valid = 0;
	        $error_message .= 'La dirección de correo electrónico no puede estar vacía<br>';
	    } else {
	    	if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
		        $valid = 0;
		        $error_message .= 'La dirección de correo electrónico debe ser válida.<br>';
		    } else {
		    	// current email address that is in the database
		    	$statement = $pdo->prepare("SELECT * FROM tbl_user WHERE id=?");
				$statement->execute(array($_SESSION['user']['id']));
				$result = $statement->fetchAll(PDO::FETCH_ASSOC);
				foreach($result as $row) {
					$current_email = $row['email'];
				}

		    	$statement = $pdo->prepare("SELECT * FROM tbl_user WHERE email=? and email!=?");
		    	$statement->execute(array($_POST['email'],$current_email));
		    	$total = $statement->rowCount();							
		    	if($total) {
		    		$valid = 0;
		        	$error_message .= 'La dirección de correo ya existe<br>';
		    	}
		    }
	    }

	    if($valid == 1) {
			
			$_SESSION['user']['full_name'] = $_POST['full_name'];
	    	$_SESSION['user']['email'] = $_POST['email'];

			// updating the database
			$statement = $pdo->prepare("UPDATE tbl_user SET full_name=?, email=?, phone=? WHERE id=?");
			$statement->execute(array($_POST['full_name'],$_POST['email'],$_POST['phone'],$_SESSION['user']['id']));

	    	$success_message = 'La información del usuario se actualiza correctamente.';
	    }
	}
	else {
		$_SESSION['user']['phone'] = $_POST['phone'];

		// updating the database
		$statement = $pdo->prepare("UPDATE tbl_user SET phone=? WHERE id=?");
		$statement->execute(array($_POST['phone'],$_SESSION['user']['id']));

		$success_message = 'La información del usuario se actualiza correctamente.';	
	}
}

if(isset($_POST['form2'])) {

	$valid = 1;

	$path = $_FILES['photo']['name'];
    $path_tmp = $_FILES['photo']['tmp_name'];

    if($path!='') {
        $ext = pathinfo( $path, PATHINFO_EXTENSION );
        $file_name = basename( $path, '.' . $ext );
        if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' ) {
            $valid = 0;
            $error_message .= 'Debes subir un archivo jpg, jpeg, gif o png<br>';
        }
    }

    if($valid == 1) {

    	// removing the existing photo
    	if($_SESSION['user']['photo']!='') {
    		unlink('../assets/uploads/'.$_SESSION['user']['photo']);	
    	}

    	// updating the data
    	$final_name = 'user-'.$_SESSION['user']['id'].'.'.$ext;
        move_uploaded_file( $path_tmp, '../assets/uploads/'.$final_name );
        $_SESSION['user']['photo'] = $final_name;

        // updating the database
		$statement = $pdo->prepare("UPDATE tbl_user SET photo=? WHERE id=?");
		$statement->execute(array($final_name,$_SESSION['user']['id']));

        $success_message = 'La foto del usuario se actualizó correctamente.';
    	
    }
}

if(isset($_POST['form3'])) {
	$valid = 1;

	if( empty($_POST['password']) || empty($_POST['re_password']) ) {
        $valid = 0;
        $error_message .= "La contraseña no puede estar vacía<br>";
    }

    if( !empty($_POST['password']) && !empty($_POST['re_password']) ) {
    	if($_POST['password'] != $_POST['re_password']) {
	    	$valid = 0;
	        $error_message .= "Las contraseñas no coinciden<br>";	
    	}        
    }

    if($valid == 1) {

    	$_SESSION['user']['password'] = md5($_POST['password']);

    	// updating the database
		$statement = $pdo->prepare("UPDATE tbl_user SET password=? WHERE id=?");
		$statement->execute(array(md5($_POST['password']),$_SESSION['user']['id']));

    	$success_message = 'La contraseña del usuario se actualizó correctamente.';
    }
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Editar perfil</h1>
	</div>
</section>

<?php
$statement = $pdo->prepare("SELECT * FROM tbl_user WHERE id=?");
$statement->execute(array($_SESSION['user']['id']));
$statement->rowCount();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
foreach ($result as $row) {
	$full_name = $row['full_name'];
	$email     = $row['email'];
	$phone     = $row['phone'];
	$photo     = $row['photo'];
	$status    = $row['status'];
	$role      = $row['role'];
}
?>


<section class="content">

	<div class="row">
		<div class="col-md-12">
				
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#tab_1" data-toggle="tab">Actualizar información</a></li>
						<li><a href="#tab_2" data-toggle="tab">Actualizar foto</a></li>
						<li><a href="#tab_3" data-toggle="tab">Actualizar contraseña</a></li>
					</ul>
					<div class="tab-content">
          				<div class="tab-pane active" id="tab_1">
							
							<form class="form-horizontal" action="" method="post">
							<div class="box box-info">
								<div class="box-body">
									<div class="form-group">
										<label for="" class="col-sm-2 control-label">Nombre <span>*</span></label>
										<?php
										if($_SESSION['user']['role'] == 'Super Admin') {
											?>
												<div class="col-sm-4">
													<input type="text" class="form-control" name="full_name" value="<?php echo $full_name; ?>">
												</div>
											<?php
										} else {
											?>
												<div class="col-sm-4" style="padding-top:7px;">
													<?php echo $full_name; ?>
												</div>
											<?php
										}
										?>
										
									</div>
									<div class="form-group">
							            <label for="" class="col-sm-2 control-label">Foto existente</label>
							            <div class="col-sm-6" style="padding-top:6px;">
							                <img src="../assets/uploads/<?php echo $photo; ?>" class="existing-photo" width="140">
							            </div>
							        </div>
									
									<div class="form-group">
										<label for="" class="col-sm-2 control-label">Dirección de correo electrónico <span>*</span></label>
										<?php
										if($_SESSION['user']['role'] == 'Super Admin') {
											?>
												<div class="col-sm-4">
													<input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
												</div>
											<?php
										} else {
											?>
											<div class="col-sm-4" style="padding-top:7px;">
												<?php echo $email; ?>
											</div>
											<?php
										}
										?>
										
									</div>
									<div class="form-group">
										<label for="" class="col-sm-2 control-label">Teléfono </label>
										<div class="col-sm-4">
											<input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
										</div>
									</div>
									<div class="form-group">
										<label for="" class="col-sm-2 control-label">Role <span>*</span></label>
										<div class="col-sm-4" style="padding-top:7px;">
											<?php echo $role; ?>
										</div>
									</div>
									<div class="form-group">
										<label for="" class="col-sm-2 control-label"></label>
										<div class="col-sm-6">
											<button type="submit" class="btn btn-success pull-left" name="form1">Actualizar información</button>
										</div>
									</div>
								</div>
							</div>
							</form>
          				</div>
          				<div class="tab-pane" id="tab_2">
							<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
							<div class="box box-info">
								<div class="box-body">
									<div class="form-group">
							            <label for="" class="col-sm-2 control-label">Nueva foto</label>
							            <div class="col-sm-6" style="padding-top:6px;">
							                <input type="file" name="photo">
							            </div>
							        </div>
							        <div class="form-group">
										<label for="" class="col-sm-2 control-label"></label>
										<div class="col-sm-6">
											<button type="submit" class="btn btn-success pull-left" name="form2">Actualizar foto</button>
										</div>
									</div>
								</div>
							</div>
							</form>
          				</div>
          				<div class="tab-pane" id="tab_3">
							<form class="form-horizontal" action="" method="post">
							<div class="box box-info">
								<div class="box-body">
									<div class="form-group">
										<label for="" class="col-sm-2 control-label">Contraseña </label>
										<div class="col-sm-4">
											<input type="password" class="form-control" name="password">
										</div>
									</div>
									<div class="form-group">
										<label for="" class="col-sm-2 control-label">Vuelva a escribir la contraseña </label>
										<div class="col-sm-4">
											<input type="password" class="form-control" name="re_password">
										</div>
									</div>
							        <div class="form-group">
										<label for="" class="col-sm-2 control-label"></label>
										<div class="col-sm-6">
											<button type="submit" class="btn btn-success pull-left" name="form3">Actualizar contraseña</button>
										</div>
									</div>
								</div>
							</div>
							</form>

          				</div>
          			</div>
				</div>			

		</div>
	</div>
</section>

<?php require_once('footer.php'); ?>