  <div id="page-wrapper" >

    <ul class="breadcrumb">
      <li><a href="<?php echo base_url();?>">Inicio</a></li>
      <li class="active">Articulos</li>
    </ul>
    <!-- /. breadcrumb  -->
               <?php if($mensaje!= FALSE){ ?>
                <div class="row">
                <div class="col-md-12">
                  <div class="bs-component">
                    <div class="alert alert-dismissible alert-<?php echo $mensaje['class']; ?>">
                      <button class="close" type="button" data-dismiss="alert">×</button><strong><?php echo $mensaje['strong']; ?>!</strong> <?php echo $mensaje['mensaje']; ?>
                    </div>
                  </div>
                </div>
              </div>
              <?php } ?>   
    <hr />  
    <!-- Advanced Tables -->
    <div class="panel panel-primary">
      <div class="panel-heading">

        
        Listado de Articulos
      </div>
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
              <tr>
                <th style="width: 26px;">#</th>
                <th style="width: 100px;">N° EMCO</th>
                <th>Artículo</th>
                <th>Descripción</th>
                <th style="width: 200px;">N° serie</th>
                <th style="width: 200px;">Dependencia</th>
                <th style="width: 100px;">Proyecto</th>
                <th style="width: 26px;"></th>
                <th style="width: 26px;"></th>
              </tr>
            </tr>
          </thead>
          <tbody>

            <?php $i=1; foreach ($item as $articulos): ?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $articulos['art_numeroemco']; ?></td>
              <td><?php echo $articulos['cla_nombre']; ?></td>
              <td><?php echo $articulos['art_descripcion']; ?></td>
              <td><?php echo $articulos['art_serie']; ?></td>
              <td><?php echo $articulos['dep_nombre']; ?></td>
              <td><?php echo $articulos['pro_nombre']; ?></td>
              <td><a href="<?php echo base_url()."articulo/editar/".$articulos['art_id']?>">Editar</a></td>
              <td><a  onclick="myBtn('<?php echo $articulos['art_id']; ?>')">Eliminar</a></td>
        </tr>
            <?php $i++; endforeach ?>
          </tbody>
        </table>
      </div>

    </div>

    <div class="panel-footer">
      <a href="<?php echo base_url();?>articulo/alta" class="btn btn-primary">Nuevo Articulo</a>
      
    </div>
    <!--End panel-footer -->

  </div>
  <!--End Advanced Tables -->

</div>
  <!-- /. PAGE WRAPPER  -->



<div  id="myModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
        <?php echo form_open(base_url().'articulo/eliminar') ?>
      
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmación de Eliminación</h5>
      </div>
      <div class="modal-body">
            <input type="hidden" class="form-control" name="art_id" id="his_id">
          <div class="form-group">
            <label for="pwd">Clave de Usuario:</label>
            <input type="password" class="form-control" name="usu_password">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Confirmar</button>
      </div>
    </div>
       <?php echo form_close(); ?>
           
  </div>
</div>
  </div>
</div>

