  <div id="page-wrapper" >

    <ul class="breadcrumb">
      <li><a href="<?php echo base_url();?>">Inicio</a></li>
      <li class="active">Articulos</li>
       <li class="active">Fichas</li>
    </ul>
    <!-- /. breadcrumb  -->
    
    
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
                <th style="width: 200px;">Responsable</th>
                <th style="width: 100px;">Proyecto</th>
                <th style="width: 26px;"></th>
              </tr>
            </tr>
          </thead>
          <tbody>

            <?php $i=1; foreach ($item as $articulos): ?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $articulos['numeroemco']; ?></td>
              <td><?php echo $articulos['clasificacionesnombre']; ?></td>
              <td><?php echo $articulos['descripcion']; ?></td>
              <td><?php echo $articulos['serie']; ?></td>
              <td><?php echo $articulos['nombre']; ?></td>
              <td><?php echo $articulos['responsables_apellido']." ".$articulos['responsables_nombre']; ?></td>
              <td><?php echo $articulos['proyecto_nombre']; ?></td>
              <td><a href="<?php echo base_url()."articulo/ficha/".$articulos['id_articulo']?>">Ficha</a></td>
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