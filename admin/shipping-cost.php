<?php require_once('header.php'); ?>

<?php

if(isset($_POST['form1'])) {

    $valid = 1;

    if(empty($_POST['country_id'])) {
        $valid = 0;
        $error_message .= 'Debes tener que seleccionar un país.<br>';
    }

    if($_POST['amount'] == '') {
        $valid = 0;
        $error_message .= 'La cantidad no puede estar vacía.<br>';
    } else {
        if(!is_numeric($_POST['amount'])) {
            $valid = 0;
            $error_message .= 'Debe ingresar un número válido.<br>';
        }
    }

    if($valid == 1) {
        $statement = $pdo->prepare("INSERT INTO tbl_shipping_cost (country_id,amount) VALUES (?,?)");
        $statement->execute(array($_POST['country_id'],$_POST['amount']));

        $success_message = 'El costo de envío se agregó correctamente.';
    }

}


if(isset($_POST['form2'])) {
    $valid = 1;

    if($_POST['amount'] == '') {
        $valid = 0;
        $error_message .= 'La cantidad no puede estar vacía.<br>';
    } else {
        if(!is_numeric($_POST['amount'])) {
            $valid = 0;
            $error_message .= 'Debe ingresar un número válido.<br>';
        }
    }

    if($valid == 1) {

        $statement = $pdo->prepare("UPDATE tbl_shipping_cost_all SET amount=? WHERE sca_id=1");
        $statement->execute(array($_POST['amount']));

        $success_message = 'El costo de envío para el resto del mundo se actualiza correctamente.';

    }
}
?>


<section class="content-header">
    <div class="content-header-left">
        <h1>Agregar costo de envío</h1>
    </div>
</section>

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

                <div class="box box-info">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Seleccionar país <span>*</span></label>
                            <div class="col-sm-4">
                                <select name="country_id" class="form-control select2">
                                    <option value="">Seleccione un país</option>
                                    <?php
                                    $statement = $pdo->prepare("SELECT * FROM tbl_country ORDER BY country_name ASC");
                                    $statement->execute();
                                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($result as $row) {


                                        $statement = $pdo->prepare("SELECT * FROM tbl_shipping_cost WHERE country_id=?");
                                        $statement->execute(array($row['country_id']));
                                        $total = $statement->rowCount();
                                        if($total) {
                                            continue;
                                        }

                                        ?>
                                        <option value="<?php echo $row['country_id']; ?>"><?php echo $row['country_name']; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Cantidad <span>*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="amount">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label"></label>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-success pull-left" name="form1">Agregar</button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>


        </div>
    </div>
</section>




<section class="content-header">
	<div class="content-header-left">
		<h1>Ver costos de envío</h1>
	</div>
</section>


<section class="content">

  <div class="row">
    <div class="col-md-12">


      <div class="box box-info">
        
        <div class="box-body table-responsive">
          <table id="example1" class="table table-bordered table-hover table-striped">
			<thead>
			    <tr>
			        <th>#</th>
			        <th>Nombre del país</th>
                    <th>Cantidad de Paises</th>
			        <th>Acción</th>
			    </tr>
			</thead>
            <tbody>
            	<?php
            	$i=0;
            	$statement = $pdo->prepare("SELECT * 
                                        FROM tbl_shipping_cost t1
                                        JOIN tbl_country t2 
                                        ON t1.country_id = t2.country_id 
                                        ORDER BY t2.country_name ASC");
            	$statement->execute();
            	$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
            	foreach ($result as $row) {
            		$i++;
            		?>
					<tr>
	                    <td><?php echo $i; ?></td>
	                    <td><?php echo $row['country_name']; ?></td>
                        <td><?php echo $row['amount']; ?></td>
	                    <td>
	                        <a href="shipping-cost-edit.php?id=<?php echo $row['shipping_cost_id']; ?>" class="btn btn-primary btn-xs">Editar</a>
	                        <a href="#" class="btn btn-danger btn-xs" data-href="shipping-cost-delete.php?id=<?php echo $row['shipping_cost_id']; ?>" data-toggle="modal" data-target="#confirm-delete">Borrar</a>
	                    </td>
	                </tr>
            		<?php
            	}
            	?>
            </tbody>
          </table>
        </div>
      </div> 

      <h4 style="background: #dd4b39;color:#fff;padding:10px 20px;">NT: Si un país no existe en la lista anterior, se aplicará el siguiente costo de envío "Resto del mundo".</h4>

</section>


<section class="content-header">
    <div class="content-header-left">
        <h1>Costo de envío (Resto del mundo)</h1>
    </div>
</section>

<section class="content">

    <?php
    $statement = $pdo->prepare("SELECT * FROM tbl_shipping_cost_all WHERE sca_id=1");
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
    foreach ($result as $row) {
        $amount = $row['amount'];
    }
    ?>

    <div class="row">
        <div class="col-md-12">

            <form class="form-horizontal" action="" method="post">
                <div class="box box-info">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Cantidad <span>*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="amount" value="<?php echo $amount; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label"></label>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-success pull-left" name="form2">Actualizar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>


        </div>
    </div>
</section>


<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Eliminar confirmación</h4>
            </div>
            <div class="modal-body">
            ¿Estás seguro que quieres eliminar este artículo?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-danger btn-ok">Borrar</a>
            </div>
        </div>
    </div>
</div>


<?php require_once('footer.php'); ?>