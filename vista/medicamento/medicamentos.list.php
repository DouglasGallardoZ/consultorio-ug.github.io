
<?php require_once 'vista/templates/header.php'; ?>


<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <form action="index.php?c=medicamentos&f=buscar" method="POST">
                <input type="text" name="busqueda" id="busqueda"  placeholder="Buscar..."/>
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Buscar</button>
            </form>       
        </div>
        <div class="col-sm-6 d-flex flex-column align-items-end">
            <a href="index.php?c=medicamentos&f=nuevo"> 
                <button type="button" class="btn btn-primary"><i class="fas fa-plus"></i> Insertar nuevo medicamento</button>
            </a>
        </div>
    </div>
    <div class="table-responsive mt-2">
        <table class="table table-striped table-bordered">
            <thead class="bg-info">
            <th>Código </th>
            <th>Nombre </th>
            <th>Descripción del Medicamento </th>
            <th>Categorización </th>
            <th>P.V.P. </th>
            <th>funcionalidades </th>
            </thead>
            <tbody class="tabladatos">
                <?php
                foreach ($resultados as $fila) {
                    ?>
                    <tr>
                        <td><?php echo $fila['med_codigo']; ?></td>
                        <td><?php echo $fila['med_nombre']; ?></td>
                         <td><?php echo $fila['med_descripcion']; ?></td>
                        <td><?php echo $fila['cat_nombre']; ?></td>
                        <td><?php echo $fila['med_precio']; ?></td>
                        <td><a class="btn btn-primary" href="index.php?c=medicamentos&f=editar&id=<?php echo $fila['med_id']; ?>"><i class="fas fa-marker"></i></a>
                            <a class="btn btn-danger" onclick="if (!confirm('Esta seguro de eliminar el medicamento?'))
                                        return false;"  href="index.php?c=medicamentos&f=eliminar&id=<?php echo $fila['med_id']; ?>">
                                <i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>
<?php require_once 'vista/templates/footer.php'; ?>