<div id="page-wrapper" >
  <ul class="breadcrumb">
    <li><a href="<?php echo base_url();?>">Inicio</a></li>
      <li><a href="<?php echo base_url().'articulo/fichas';?>">Articulos</a></li>
    <li class="active">Ficha</li>
  </ul>
  <!-- /. breadcrumb  -->
  <hr />  
  <div class="panel panel-primary">
    <div class="panel-heading">
      Artículo
    </div>
   

    <div class="row panel-body">
      <div class="col-md-6">
      <div class="form-group " >
        <label>Descripción</label>
        <input class="form-control" name="art_descripcion" value="<?php echo $item['art_descripcion']; ?>" />
      </div>
      <div class="form-group " >
        <label>Clasificación</label>
        <input class="form-control" name="art_responsable" value="<?php echo $item['cla_nombre']; ?>" />
      </div>
      <div class="form-group " >
        <label>Número Emco</label>
        <input class="form-control" name="art_numeroemco" value="<?php echo $item['art_numeroemco']; ?>" />
      </div>
      <div class="form-group " >
        <label>Número de Serie</label>
        <input class="form-control" name="art_serie" value="<?php echo $item['art_serie']; ?>" />
      </div>
      <div class="form-group " >
        <label>Número de Factura</label>
        <input class="form-control" name="art_factura" value="<?php echo $item['art_factura']; ?>" />
      </div>
       <div class="form-group " >
        <label>Proyecto</label>
        <input class="form-control" name="art_proyecto" value="<?php echo $item['pro_nombre']; ?>" />
      </div>

      <div class="form-group " >
        <label>Responsable</label>
        <input class="form-control" name="responsable" value="<?php echo $item['res_apellido']." ".$item['res_nombre']; ?>" />
      </div>
    
      </div>
      
      <div class="col-md-6 ">
        <div class='row  panel-body'>
              <div>
                <label>Imagen</label>
              </div>  
        </div>
      <div class='row  panel-body'>  
              <img src="<?php echo base_url();?>assets/uploads/thumbs/<?php echo 'img'.$item['art_id'].'_thumb.jpg';?>" width='400px' height='600px' class="img-responsive" alt="Responsive image">
      </div>
      <div class='row  panel-body'>
            <!--$ERROR MUESTRA LOS ERRORES QUE PUEDAN HABER AL SUBIR LA IMAGEN-->
                  <?=@$error?>
              <div id="formulario_imagenes">
                  <span><?php echo validation_errors(); ?></span>

                  <?=form_open_multipart(base_url()."articulo/do_upload/".$item['art_id'])?>
                  <div class="row">
                  <div class="col-md-6">
                  <input class="btn btn-default" type="file" name="userfile" />
                  </div>
                  <div class="col-md-6">   
                  <input class="btn btn-primary" type="submit" value="Subir imágenes" />
                  </div>
                </div>
              <?=form_close()?>
              </div>

      </div>
      </div>
    </div>
    <!-- /. panel-body  -->



    <div class="panel-footer">
    </div>
    <!--End panel-footer -->
    </div>
    <!-- /. panel panel-primary  -->


    <div class="panel panel-primary">
    <div class="panel-heading">
      Historial
    </div>
    <div class="panel-body">
   

    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
              <tr>
                <th style="width: 26px;">#</th>
                <th>Fecha</th>
                <th>Motivo</th>
                <th>Destino</th>                
                <th>Originador</th>
                <th>Observación</th>
                <th></th>
              </tr>
            </tr>
          </thead>
          <tbody>

            <?php $i=1; foreach ($historial as $historial_item): ?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $historial_item['his_fecha']; ?></td>
              <td><?php echo $historial_item['his_tipo']; ?></td>
              <td><?php echo $historial_item['dep_nombre']; ?></td>
              <td><?php echo $historial_item['usu_login']; ?></td>
              <td><?php echo $historial_item['his_observacion']; ?></td>
             <td><a  onclick="myBtn('<?php echo $historial_item['his_id']; ?>')">Eliminar</a></td>
            </tr>
            <?php $i++; endforeach ?>
          </tbody>
        </table>



    </div>
    <!-- /. panel-body  -->
    <div class="panel-footer">
    </div>
    <!--End panel-footer -->
    </div>
    <!-- /. panel panel-primary  -->

</div>
<!-- /. PAGE WRAPPER  -->





<div  id="myModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
        <?php echo form_open(base_url().'articulo/eliminarhistorial') ?>
      
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmación de Eliminación</h5>
      </div>
      <div class="modal-body">
            <input type="hidden" class="form-control" name="art_id" value="<?php echo $item['art_id']; ?>">
            <input type="hidden" class="form-control" name="his_id" value="" id="his_id">
          <div class="form-group">
            <label for="pwd">Clave de Usuario:</label>
            <input type="password" class="form-control" name="usu_password">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Confirmar</button>
      </div>
    </div>
       <?php echo form_close(); ?>
           
  </div>
</div>
  </div>
</div>

