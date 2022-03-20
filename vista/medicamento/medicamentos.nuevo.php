<!-- incluimos  Encabezado -->
<?php require_once 'vista/templates/header.php'; ?>

<div class="container">
    <div class="card card-body">
        <form action="index.php?c=medicamentos&f=nuevo" method="POST" name="formMedNuevo" id="formMedNuevo">
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="codigo">C&oacute;digo</label>
                    <input type="text"  name="codigo" id="codigo" class="form-control" placeholder="codigo del medicamento" autofocus="" required/>
                </div>
                <div class="form-group col-sm-6">
                    <label for="nombre">Nombre del medicamento</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="nombre medicamento" required>
                </div>

                <div class="form-group col-sm-6">
                    <label for="categoria">Categorización del medicamento</label>
                    <select id="categoria" name="categoria" class="form-control">
                        <?php foreach ($categorias as $cat) {
                            ?>
                        <option value="<?php echo $cat->cat_id ?>"><?php echo $cat->cat_nombre; ?></option>
                            <?php
                        }
                        ?>   

                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label for="precio">P.V.P. (Precio de Venta al Público)</label>
                    <input type="text" name="precio" id="precio" class="form-control" placeholder="precio medicamento" required>
                </div>          

                <div class="form-group col-sm-12">
                    <label for="descripcion">Descripción del Medicamento</label>
                    <textarea id="descripcion"  name="descripcion" class="form-control" rows="2"></textarea>
                </div>
                <div class="form-group col-sm-12">
                    <input type="checkbox" id="estado" name="estado" >
                    <label for="estado">Activo</label>
                </div>
                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="index.php?c=medicamentos&a=index" class="btn btn-primary">Cancelar</a>
                </div>
            </div>  
        </form>


    </div>
</div>

<!-- incluimos  pie de pagina -->
<?php require_once 'vista/templates/footer.php'; ?>
