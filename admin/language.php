<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {
		
    // updating into the database
	foreach($_POST['lang_value'] as $key=>$val) {
		$arr[$key] = $val;
	}

	for($i=1;$i<=count($arr);$i++) {
		$statement = $pdo->prepare("UPDATE tbl_language SET lang_value=? WHERE lang_id=?");
		$statement->execute(array($arr[$i],$i));
	}
	$success_message = 'Language Settings is updated successfully.';
}

$i=0;
$statement = $pdo->prepare("SELECT * FROM tbl_language");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
foreach ($result as $row) {
	$i++;
	$lang_ids[$i] = $row['lang_value'];
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Idioma de configuración</h1>
	</div>
</section>


<?php
$statement = $pdo->prepare("SELECT * FROM tbl_language");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
foreach ($result as $row) {

}
?>

<section class="content">

  <div class="row">
    <div class="col-md-12">

		<?php if($error_message): ?>
		<div class="callout callout-danger">	
    		<p>
    		  <?php echo $error_message; ?>
    		</p>
		</div>
		<?php endif; ?>

		<?php if($success_message): ?>
		<div class="callout callout-success">
		    <p><?php echo $success_message; ?></p>
		</div>
		<?php endif; ?>

        <form class="form-horizontal" action="" method="post">
        
        <h3 style="font-size:20px;font-weight:500;">Básico</h3>
		<div class="box box-info">
            <div class="box-body">
            	<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Divisa <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[1]" value="<?php echo $lang_ids[1]; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Buscar producto <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[2]" value="<?php echo $lang_ids[2]; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Buscar <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[3]" value="<?php echo $lang_ids[3]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Guardar <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[4]" value="<?php echo $lang_ids[4]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Actualizar <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[5]" value="<?php echo $lang_ids[5]; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Leer más <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[6]" value="<?php echo $lang_ids[6]; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Serial/De serie <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[7]" value="<?php echo $lang_ids[7]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Foto <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[8]" value="<?php echo $lang_ids[8]; ?>">
                    </div>
                </div>
            </div>
        </div>

        <h3 style="font-size:20px;font-weight:500;">Iniciar Sesión</h3>
		<div class="box box-info">
            <div class="box-body">
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Iniciar Sesión <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[9]" value="<?php echo $lang_ids[9]; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Inicio de sesión del cliente <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[10]" value="<?php echo $lang_ids[10]; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Haga clic aquí para ingresar <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[11]" value="<?php echo $lang_ids[11]; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Volver a la página de inicio de sesión <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[12]" value="<?php echo $lang_ids[12]; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Conectado como <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[13]" value="<?php echo $lang_ids[13]; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Cerrar sesión <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[14]" value="<?php echo $lang_ids[14]; ?>">
                    </div>
                </div>
            </div>
        </div>
		
		<h3 style="font-size:20px;font-weight:500;">Registro</h3>
        <div class="box box-info">
            <div class="box-body">
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Registro <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[15]" value="<?php echo $lang_ids[15]; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Registro de cliente <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[16]" value="<?php echo $lang_ids[16]; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Registro exitoso <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[17]" value="<?php echo $lang_ids[17]; ?>">
                    </div>
                </div>
            </div>
        </div>
		
		<h3 style="font-size:20px;font-weight:500;">Carrito y pago</h3>
        <div class="box box-info">
            <div class="box-body">
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Carrito <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[18]" value="<?php echo $lang_ids[18]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Ver carrito <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[19]" value="<?php echo $lang_ids[19]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Actualización de la compra <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[20]" value="<?php echo $lang_ids[20]; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Añadir a la cesta <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[154]" value="<?php echo $lang_ids[154]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Volver al carrito <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[21]" value="<?php echo $lang_ids[21]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Verificar <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[22]" value="<?php echo $lang_ids[22]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Pasar por la caja <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[23]" value="<?php echo $lang_ids[23]; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Por favor inicie sesión como cliente para realizar el pago <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[160]" value="<?php echo $lang_ids[160]; ?>">
                    </div>
                </div>

            </div>
        </div>

		<h3 style="font-size:20px;font-weight:500;">Pago</h3>
        <div class="box box-info">
            <div class="box-body">
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Pedidos <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[24]" value="<?php echo $lang_ids[24]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Historial de pedidos <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[25]" value="<?php echo $lang_ids[25]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Detalles del pedido <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[26]" value="<?php echo $lang_ids[26]; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Fecha y hora de pago <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[27]" value="<?php echo $lang_ids[27]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">ID de transacción <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[28]" value="<?php echo $lang_ids[28]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Monto de pago <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[29]" value="<?php echo $lang_ids[29]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Estado de pago <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[30]" value="<?php echo $lang_ids[30]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Método de pago <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[31]" value="<?php echo $lang_ids[31]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">ID de pago <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[32]" value="<?php echo $lang_ids[32]; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Sección de pago <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[33]" value="<?php echo $lang_ids[33]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Seleccione método de pago <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[34]" value="<?php echo $lang_ids[34]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Seleccione un método <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[35]" value="<?php echo $lang_ids[35]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">PayPal <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[36]" value="<?php echo $lang_ids[36]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Zelle <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[37]" value="<?php echo $lang_ids[37]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Deposito bancario <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[38]" value="<?php echo $lang_ids[38]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Número de tarjeta <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[39]" value="<?php echo $lang_ids[39]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">CVV <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[40]" value="<?php echo $lang_ids[40]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Mes <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[41]" value="<?php echo $lang_ids[41]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Año <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[42]" value="<?php echo $lang_ids[42]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Enviar a este Detalles <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[43]" value="<?php echo $lang_ids[43]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Información de la transacción <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[44]" value="<?php echo $lang_ids[44]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Incluya la identificación de la transacción y otra información correctamente <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[45]" value="<?php echo $lang_ids[45]; ?>">
                    </div>
                </div>				
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Pagar ahora <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[46]" value="<?php echo $lang_ids[46]; ?>">
                    </div>
                </div>
            </div>
        </div>
		
		<h3 style="font-size:20px;font-weight:500;">Producto</h3>
        <div class="box box-info">
            <div class="box-body">				
                
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Nombre del Producto<span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[47]" value="<?php echo $lang_ids[47]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label"> Detalles del Producto<span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[48]" value="<?php echo $lang_ids[48]; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Productos relacionados <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[155]" value="<?php echo $lang_ids[155]; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Ver todos los productos relacionados desde abajo <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[156]" value="<?php echo $lang_ids[156]; ?>">
                    </div>
                </div>			
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Categorías <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[49]" value="<?php echo $lang_ids[49]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Categoría: <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[50]" value="<?php echo $lang_ids[50]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Todos los productos bajo <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[51]" value="<?php echo $lang_ids[51]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Selecciona el tamaño <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[52]" value="<?php echo $lang_ids[52]; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Tamaño <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[157]" value="<?php echo $lang_ids[157]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Seleccionar el color <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[53]" value="<?php echo $lang_ids[53]; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Color <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[158]" value="<?php echo $lang_ids[158]; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Precio <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[159]" value="<?php echo $lang_ids[159]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Precio del producto <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[54]" value="<?php echo $lang_ids[54]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Cantidad <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[55]" value="<?php echo $lang_ids[55]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Agotado <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[56]" value="<?php echo $lang_ids[56]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Compartir este <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[57]" value="<?php echo $lang_ids[57]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Compartir este producto <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[58]" value="<?php echo $lang_ids[58]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Descripción del Producto <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[59]" value="<?php echo $lang_ids[59]; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">No se encontró ningún producto <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[153]" value="<?php echo $lang_ids[153]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Características <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[60]" value="<?php echo $lang_ids[60]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Condiciones <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[61]" value="<?php echo $lang_ids[61]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Política de devoluciones <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[62]" value="<?php echo $lang_ids[62]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Reseñas <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[63]" value="<?php echo $lang_ids[63]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Revisar <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[64]" value="<?php echo $lang_ids[64]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Dar una reseña <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[65]" value="<?php echo $lang_ids[65]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Escribe tu comentario (Opcional) <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[66]" value="<?php echo $lang_ids[66]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Enviar opinión <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[67]" value="<?php echo $lang_ids[67]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">¡Ya has dado una calificación! <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[68]" value="<?php echo $lang_ids[68]; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">¡La calificación se envió correctamente! <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[163]" value="<?php echo $lang_ids[163]; ?>">
                    </div>
                </div>	
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Debes iniciar sesión para dar una reseña. <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[69]" value="<?php echo $lang_ids[69]; ?>">
                    </div>
                </div>					
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">No se encontró ninguna descripción <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[70]" value="<?php echo $lang_ids[70]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">No se encontró ninguna característica <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[71]" value="<?php echo $lang_ids[71]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">No se encontró ninguna condición <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[72]" value="<?php echo $lang_ids[72]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">No se encontró ninguna política de devolución <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[73]" value="<?php echo $lang_ids[73]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">No se encontró ninguna reseña <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[74]" value="<?php echo $lang_ids[74]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Nombre del cliente <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[75]" value="<?php echo $lang_ids[75]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Comentario <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[76]" value="<?php echo $lang_ids[76]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Comentarios <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[77]" value="<?php echo $lang_ids[77]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Clasificación <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[78]" value="<?php echo $lang_ids[78]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Previo <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[79]" value="<?php echo $lang_ids[79]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Próximo <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[80]" value="<?php echo $lang_ids[80]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Sub Total <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[81]" value="<?php echo $lang_ids[81]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Total <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[82]" value="<?php echo $lang_ids[82]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Acción <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[83]" value="<?php echo $lang_ids[83]; ?>">
                    </div>
                </div>
            </div>
        </div>
		
		<h3 style="font-size:20px;font-weight:500;">Facturación y envío</h3>
        <div class="box box-info">
            <div class="box-body">
            	<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Costo de envío <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[84]" value="<?php echo $lang_ids[84]; ?>">
                    </div>
                </div>
            	<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Continuar con el envío <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[85]" value="<?php echo $lang_ids[85]; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Dirección de Envio <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[161]" value="<?php echo $lang_ids[161]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Actualizar dirección de facturación <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[86]" value="<?php echo $lang_ids[86]; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Dirección de envío <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[162]" value="<?php echo $lang_ids[162]; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Actualizar dirección de envío <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[87]" value="<?php echo $lang_ids[87]; ?>">
                    </div>
                </div>				
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Actualizar información de facturación y envío <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[88]" value="<?php echo $lang_ids[88]; ?>">
                    </div>
                </div>				
            </div>
        </div>
		
		<h3 style="font-size:20px;font-weight:500;">Panel</h3>
        <div class="box box-info">
            <div class="box-body">
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Panel <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[89]" value="<?php echo $lang_ids[89]; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Bienvenido al Panel <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[90]" value="<?php echo $lang_ids[90]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Volver al panel <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[91]" value="<?php echo $lang_ids[91]; ?>">
                    </div>
                </div>
            </div>
        </div>
		

		<h3 style="font-size:20px;font-weight:500;">Suscribir</h3>
        <div class="box box-info">
            <div class="box-body">
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Subscribir <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[92]" value="<?php echo $lang_ids[92]; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Suscríbete a nuestro boletín <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[93]" value="<?php echo $lang_ids[93]; ?>">
                    </div>
                </div>
            </div>
        </div>
		
		<h3 style="font-size:20px;font-weight:500;">Dirección de correo electrónico</h3>
        <div class="box box-info">
            <div class="box-body">
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Dirección de correo electrónico <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[94]" value="<?php echo $lang_ids[94]; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Ingrese su correo electrónico <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[95]" value="<?php echo $lang_ids[95]; ?>">
                    </div>
                </div>
            </div>
        </div>
		
		<h3 style="font-size:20px;font-weight:500;">Contraseña</h3>
        <div class="box box-info">
            <div class="box-body">
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Contraseña <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[96]" value="<?php echo $lang_ids[96]; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Olvidó su contraseña <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[97]" value="<?php echo $lang_ids[97]; ?>">
                    </div>
                </div>				
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Repetir la contraseña <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[98]" value="<?php echo $lang_ids[98]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Actualizar contraseña <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[99]" value="<?php echo $lang_ids[99]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Nueva contraseña <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[100]" value="<?php echo $lang_ids[100]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Confirmar nueva contraseña <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[101]" value="<?php echo $lang_ids[101]; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Cambiar la contraseña <span>*</span></label>
                    <div class="col-sm-6">
                        <textarea name="lang_value[149]" class="form-control" cols="30" rows="10" style="height:70px;"><?php echo $lang_ids[149]; ?></textarea>
                    </div>
                </div>
            </div>
        </div>

       
		
		<h3 style="font-size:20px;font-weight:500;">Cliente</h3>
        <div class="box box-info">
            <div class="box-body">
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Nombre Completo <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[102]" value="<?php echo $lang_ids[102]; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Nombre de empresa <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[103]" value="<?php echo $lang_ids[103]; ?>">
                    </div>
                </div>                
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Número de teléfono <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[104]" value="<?php echo $lang_ids[104]; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Dirección <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[105]" value="<?php echo $lang_ids[105]; ?>">
                    </div>
                </div>               
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">País <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[106]" value="<?php echo $lang_ids[106]; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Ciudad <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[107]" value="<?php echo $lang_ids[107]; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Estado <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[108]" value="<?php echo $lang_ids[108]; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Código postal <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[109]" value="<?php echo $lang_ids[109]; ?>">
                    </div>
                </div>
            </div>
        </div>
		
		<h3 style="font-size:20px;font-weight:500;">Otra información</h3>
        <div class="box box-info">
            <div class="box-body">
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Sobre nosotros <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[110]" value="<?php echo $lang_ids[110]; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Publicaciones destacadas <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[111]" value="<?php echo $lang_ids[111]; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Entradas populares <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[112]" value="<?php echo $lang_ids[112]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Mensajes recientes <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[113]" value="<?php echo $lang_ids[113]; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Información del contacto <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[114]" value="<?php echo $lang_ids[114]; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Formulario de contacto <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[115]" value="<?php echo $lang_ids[115]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Nuestra oficina <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[116]" value="<?php echo $lang_ids[116]; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Actualización del perfil <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[117]" value="<?php echo $lang_ids[117]; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Enviar mensaje <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[118]" value="<?php echo $lang_ids[118]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Mensaje <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[119]" value="<?php echo $lang_ids[119]; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">Encuéntrenos en el mapa <span>*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lang_value[120]" value="<?php echo $lang_ids[120]; ?>">
                    </div>
                </div>
            </div>
        </div>


        
        

        <h3 style="font-size:20px;font-weight:500;">Error de mensajes</h3>
        <div class="box box-info">
            <div class="box-body">
            	<div class="form-group">
                    <label for="" class="col-sm-4 control-label">¡Felicitaciones! El pago es exitoso. <span>*</span></label>
                    <div class="col-sm-6">
                        <textarea name="lang_value[121]" class="form-control" cols="30" rows="10" style="height:70px;"><?php echo $lang_ids[121]; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">La información de facturación y envío se actualizó correctamente. <span>*</span></label>
                    <div class="col-sm-6">
                        <textarea name="lang_value[122]" class="form-control" cols="30" rows="10" style="height:70px;"><?php echo $lang_ids[122]; ?></textarea>
                    </div>
                </div>
            	<div class="form-group">
                    <label for="" class="col-sm-4 control-label">El nombre del cliente no puede estar vacío. <span>*</span></label>
                    <div class="col-sm-6">
                        <textarea name="lang_value[123]" class="form-control" cols="30" rows="10" style="height:70px;"><?php echo $lang_ids[123]; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">El número de teléfono no puede estar vacío. <span>*</span></label>
                    <div class="col-sm-6">
                        <textarea name="lang_value[124]" class="form-control" cols="30" rows="10" style="height:70px;"><?php echo $lang_ids[124]; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">La dirección no puede estar vacía. <span>*</span></label>
                    <div class="col-sm-6">
                        <textarea name="lang_value[125]" class="form-control" cols="30" rows="10" style="height:70px;"><?php echo $lang_ids[125]; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">You must have to select a country. <span>*</span></label>
                    <div class="col-sm-6">
                        <textarea name="lang_value[126]" class="form-control" cols="30" rows="10" style="height:70px;"><?php echo $lang_ids[126]; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">La ciudad no puede estar vacía. <span>*</span></label>
                    <div class="col-sm-6">
                        <textarea name="lang_value[127]" class="form-control" cols="30" rows="10" style="height:70px;"><?php echo $lang_ids[127]; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">El estado no puede estar vacío. <span>*</span></label>
                    <div class="col-sm-6">
                        <textarea name="lang_value[128]" class="form-control" cols="30" rows="10" style="height:70px;"><?php echo $lang_ids[128]; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">El código postal no puede estar vacío. <span>*</span></label>
                    <div class="col-sm-6">
                        <textarea name="lang_value[129]" class="form-control" cols="30" rows="10" style="height:70px;"><?php echo $lang_ids[129]; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">La información del perfil se actualizó correctamente. <span>*</span></label>
                    <div class="col-sm-6">
                        <textarea name="lang_value[130]" class="form-control" cols="30" rows="10" style="height:70px;"><?php echo $lang_ids[130]; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">La dirección de correo electrónico no puede estar vacía <span>*</span></label>
                    <div class="col-sm-6">
                        <textarea name="lang_value[131]" class="form-control" cols="30" rows="10" style="height:70px;"><?php echo $lang_ids[131]; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">El correo electrónico y/o la contraseña no pueden estar vacíos. <span>*</span></label>
                    <div class="col-sm-6">
                        <textarea name="lang_value[132]" class="form-control" cols="30" rows="10" style="height:70px;"><?php echo $lang_ids[132]; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">La dirección de Email no coincide. <span>*</span></label>
                    <div class="col-sm-6">
                        <textarea name="lang_value[133]" class="form-control" cols="30" rows="10" style="height:70px;"><?php echo $lang_ids[133]; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">La dirección de correo electrónico debe ser válida. <span>*</span></label>
                    <div class="col-sm-6">
                        <textarea name="lang_value[134]" class="form-control" cols="30" rows="10" style="height:70px;"><?php echo $lang_ids[134]; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">La dirección de correo ya existe. <span>*</span></label>
                    <div class="col-sm-6">
                        <textarea name="lang_value[147]" class="form-control" cols="30" rows="10" style="height:70px;"><?php echo $lang_ids[147]; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Su dirección de correo electrónico no se encuentra en nuestro sistema. <span>*</span></label>
                    <div class="col-sm-6">
                        <textarea name="lang_value[135]" class="form-control" cols="30" rows="10" style="height:70px;"><?php echo $lang_ids[135]; ?></textarea>
                    </div>
                </div>                
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Por favor revisa tu correo electrónico y confirma tu suscripción. <span>*</span></label>
                    <div class="col-sm-6">
                        <textarea name="lang_value[136]" class="form-control" cols="30" rows="10" style="height:70px;"><?php echo $lang_ids[136]; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Su correo electrónico se ha verificado correctamente. Ahora puede iniciar sesión en nuestro sitio web. <span>*</span></label>
                    <div class="col-sm-6">
                        <textarea name="lang_value[137]" class="form-control" cols="30" rows="10" style="height:70px;"><?php echo $lang_ids[137]; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">La contraseña no puede estar vacía. <span>*</span></label>
                    <div class="col-sm-6">
                        <textarea name="lang_value[138]" class="form-control" cols="30" rows="10" style="height:70px;"><?php echo $lang_ids[138]; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Las contraseñas no coinciden. <span>*</span></label>
                    <div class="col-sm-6">
                        <textarea name="lang_value[139]" class="form-control" cols="30" rows="10" style="height:70px;"><?php echo $lang_ids[139]; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Ingrese nuevas contraseñas y vuelva a escribirlas. <span>*</span></label>
                    <div class="col-sm-6">
                        <textarea name="lang_value[140]" class="form-control" cols="30" rows="10" style="height:70px;"><?php echo $lang_ids[140]; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">La contraseña se actualizó correctamente. <span>*</span></label>
                    <div class="col-sm-6">
                        <textarea name="lang_value[141]" class="form-control" cols="30" rows="10" style="height:70px;"><?php echo $lang_ids[141]; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Para restablecer su contraseña, haga clic en el enlace a continuación. <span>*</span></label>
                    <div class="col-sm-6">
                        <textarea name="lang_value[142]" class="form-control" cols="30" rows="10" style="height:70px;"><?php echo $lang_ids[142]; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">SOLICITUD DE RESTABLECIMIENTO DE CONTRASEÑA - OSSHA.COM <span>*</span></label>
                    <div class="col-sm-6">
                        <textarea name="lang_value[143]" class="form-control" cols="30" rows="10" style="height:70px;"><?php echo $lang_ids[143]; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">El tiempo del correo electrónico para restablecer la contraseña (24 horas) ha expirado. Intente nuevamente restablecer su contraseña. <span>*</span></label>
                    <div class="col-sm-6">
                        <textarea name="lang_value[144]" class="form-control" cols="30" rows="10" style="height:70px;"><?php echo $lang_ids[144]; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Se enviará un enlace de confirmación a su dirección de correo electrónico. Obtendrá la información para restablecer la contraseña allí. <span>*</span></label>
                    <div class="col-sm-6">
                        <textarea name="lang_value[145]" class="form-control" cols="30" rows="10" style="height:70px;"><?php echo $lang_ids[145]; ?></textarea>
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-4 control-label">La contraseña se restableció exitosamente. Ahora puedes iniciar sesión. <span>*</span></label>
                    <div class="col-sm-6">
                        <textarea name="lang_value[146]" class="form-control" cols="30" rows="10" style="height:70px;"><?php echo $lang_ids[146]; ?></textarea>
                    </div>
                </div>    
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">¡Lo siento! Su cuenta está inactiva. Por favor contacte con el administrador. <span>*</span></label>
                    <div class="col-sm-6">
                        <textarea name="lang_value[148]" class="form-control" cols="30" rows="10" style="height:70px;"><?php echo $lang_ids[148]; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Correo electrónico de confirmación de registro para OSSHA. <span>*</span></label>
                    <div class="col-sm-6">
                        <textarea name="lang_value[150]" class="form-control" cols="30" rows="10" style="height:70px;"><?php echo $lang_ids[150]; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">¡Gracias por su registro! Tu cuenta ha sido creada. Para activar su cuenta haga clic en el siguiente enlace: <span>*</span></label>
                    <div class="col-sm-6">
                        <textarea name="lang_value[151]" class="form-control" cols="30" rows="10" style="height:70px;"><?php echo $lang_ids[151]; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Su registro está completo. Por favor verifique su dirección de correo electrónico para seguir el proceso de confirmación de su registro. <span>*</span></label>
                    <div class="col-sm-6">
                        <textarea name="lang_value[152]" class="form-control" cols="30" rows="10" style="height:70px;"><?php echo $lang_ids[152]; ?></textarea>
                    </div>
                </div>
                              
            </div>
        </div>



        <div class="box box-info">
            <div class="box-body">
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label"></label>
                    <div class="col-sm-6">
                      <button type="submit" class="btn btn-success pull-left" name="form1">Actualizar</button>
                    </div>
                </div>
            </div>
        </div>

        </form>



    </div>
  </div>

</section>

<?php require_once('footer.php'); ?>