  <div id="page-wrapper" >

    <ul class="breadcrumb">
      <li><a href="<?php echo base_url();?>">Inicio</a></li>
      <li class="active">Clasificación</li>
    </ul>
    <!-- /. breadcrumb  -->
    
    
    <hr />  


    <!-- Advanced Tables -->
    <div class="panel panel-primary">
      <div class="panel-heading">

        
        Listado de Clasificación
      </div>
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
              <tr>
                <th style="width: 26px;">#</th>
                <th>Nombre</th>
                <th style="width: 26px;"></th>
                <th style="width: 26px;"></th>
              </tr>
            </tr>
          </thead>
          <tbody>

            <?php $i=1; foreach ($item as $clasificacion): ?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $clasificacion['cla_nombre']; ?></td>
              <td><a href="<?php echo base_url()."clasificacion/editar/".$clasificacion['cla_id']?>">Editar</a></td>
              <td><a href="<?php echo base_url()."clasificacion/eliminar/".$clasificacion['cla_id']?>">Eliminar</a></td>
            </tr>
            <?php $i++; endforeach ?>
          </tbody>
        </table>
      </div>

    </div>

    <div class="panel-footer">
      <a href="<?php echo base_url();?>clasificacion/nuevo" class="btn btn-primary">Nueva Clasificación</a>
      
    </div>
    <!--End panel-footer -->

  </div>
  <!--End Advanced Tables -->

</div>
  <!-- /. PAGE WRAPPER  -->