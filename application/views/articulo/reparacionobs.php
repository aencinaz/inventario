<div id="page-wrapper" >
  <ul class="breadcrumb">
    <li><a href="<?php echo base_url();?>">Inicio</a></li>
    <li class="active" >Reparación</li>
  </ul>
  <!-- /. breadcrumb  -->
  <hr/>  
 <?php echo form_open(base_url().'articulo/reparacionobs')?>
 <input type="hidden" name="art_id" value=<?php echo $id_articulo;?>  > 
 <input type="hidden" name="dep_id" value=<?php echo $articulos['dep_id'];?>
<div class="panel panel-default">
  <div class="panel-body">
   <div class="form-group " >
        <label>Obseraciones</label>
       <textarea name="his_observacion" class="form-control" rows="3"></textarea>
         <span class="text-danger"><?php echo form_error('his_observacion'); ?></span>
      </div>
    </div>
 <button type="submit"  class="btn btn-success ">Guardar Registro</button>
</div>
<?php echo form_close(); ?>
</div>
<!-- /. PAGE WRAPPER  -->