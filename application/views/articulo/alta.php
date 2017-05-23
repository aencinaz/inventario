<div id="page-wrapper" >
  <ul class="breadcrumb">
    <li><a href="<?php echo base_url();?>">Inicio</a></li>
    <li class="active">Alta</li>
  </ul>
  <!-- /. breadcrumb  -->
  <hr />  
  <?php echo form_open(base_url().'articulo/alta') ?>
   
 <div id="signupbox" style=" margin-top:5px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Datos de Articulo</div>
            </div>  
            <div class="panel-body" >
                <form method="post" action=".">
                    <input type='hidden' name='csrfmiddlewaretoken' value='XFe2rTYl9WOpV8U6X5CfbIuOZOELJ97S' />
                            

                    <form  class="form-horizontal" method="post" >
                           <div class="form-group " >
        <label>Clasificación</label>
        <select class="form-control" name="clasificaciones_id">
         <option value=""></option>
          <?php $i=1; foreach ($item as $clasificacion): ?>
          <option value="<?php echo $clasificacion['id']; ?>" <?php echo set_select('facturas_id',$clasificacion['id']); ?>><?php echo $clasificacion['nombre']; ?></option>
          <?php $i++; endforeach ?>                                  
        </select>
        <span class="text-danger"><?php echo form_error('clasificaciones_id'); ?></span>
      </div>
    <div class="form-group " >
        <label>Descripción</label>
        <input class="form-control" name="descripcion" value="<?php echo set_value('descripcion'); ?>" />
         <span class="text-danger"><?php echo form_error('descripcion'); ?></span>
      </div>

      <div class="form-group " >
        <label>Número Emco</label>
        <input class="form-control" name="numeroemco" value="<?php echo set_value('numeroemco'); ?>" />
         <span class="text-danger"><?php echo form_error('numeroemco'); ?></span>
      </div>


      <div class="form-group " >
        <label>Número de Serie</label>
        <input class="form-control" name="serie" value="<?php echo set_value('serie'); ?>" />
         <span class="text-danger"><?php echo form_error('serie'); ?></span>
      </div>

      <div class="form-group " >
        <label>Factura</label>
        <input class="form-control" name="factura" value="<?php echo set_value('factura'); ?>" />
         <span class="text-danger"><?php echo form_error('factura'); ?></span>
      </div>

                        <div class="form-group"> 
                            <div class="aab controls col-md-4 "></div>
                            <div class="controls col-md-8 ">
                              <button type="submit" class="btn btn btn-primary">Guardar</button>    
                                
                            </div>
                        </div> 
                            
                    </form>

                </form>
            </div>
        </div>
    </div> 
</div>






<?php echo form_close(); ?>
</div>
<!-- /. PAGE WRAPPER  -->