<!-- incluimos  Encabezado -->
<?php require_once 'vista/templates/header.php'; ?>
?>

<div class="container">
    <div class="card card-body">
        <form action="index.php?c=medicamentos&f=editar" method="POST" name="formMedNuevo" id="formMedNuevo">
            <input type="hidden" name="id" id="id" value="<?php echo $med['med_id']; ?>"/>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="codigo">C&oacute;digo</label>
                    <input type="text"  name="codigo" id="codigo" value="<?php echo $med['med_codigo']; ?>" class="form-control" placeholder="codigo del medicamento" autofocus="" required/>
                </div>
                <div class="form-group col-sm-6">
                    <label for="nombre">Nombre del medicamento</label>
                    <input type="text" name="nombre" id="nombre" value="<?php echo $med['med_nombre']; ?>" class="form-control" placeholder="nombre medicamento" required>
                </div>

                <div class="form-group col-sm-6">
                    <label for="categoria">Categorización del medicamento</label>
                    <select id="categoria" name="categoria" class="form-control">
                       <?php
                       foreach ($categorias as $cat) {
                           $selected='';
                           if($cat->cat_id == $med['med_idCategoria']){
                                 $selected='selected="selected"';
                           }
                           echo  "<option ".$selected." value='".$cat->cat_id."'>".$cat->cat_nombre."</option>";
                       }
                        ?>
                      
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label for="precio">P.V.P. (Precio de Venta al Público)</label>
                    <input type="text" name="precio" id="precio" value="<?php echo $med['med_precio']; ?>" class="form-control" placeholder="precio medicamento" required>
                </div>          

                <div class="form-group col-sm-12">
                    <label for="descripcion">Descripción del Medicamento</label>
                    <textarea id="descripcion"  name="descripcion"  class="form-control" rows="2"><?php echo $med['med_descripcion']; ?>
                    </textarea>
                </div>
                <div class="form-group col-sm-12">
                    <input type="checkbox" id="estado" value="<?php echo $med['med_estado']?>" 
                           name="estado" <?php echo ($med['med_estado'] == 1)?'checked="checked"':''; ?>>
                    
                    <label for="estado">Activo</label>
                </div>
                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-primary" onclick="if (!confirm('Esta seguro de modificar el medicamento')) return false;" >Guardar</button>
                    <a href="index.php?c=medicamentos&a=index" class="btn btn-primary">Cancelar</a>
                </div>
                    
            </div>  
        </form>
    </div>
</div>

<!-- incluimos  pie de pagina -->
<?php require_once 'vista/templates/footer.php'; ?>
