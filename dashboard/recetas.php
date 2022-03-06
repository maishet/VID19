<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Registro de recetas médicas</h1>
    
    
    
 <?php
include_once '../php/config.php';
$consulta = "SELECT username FROM users WHERE role='paciente'";
$resultado = $connection->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);

$consulta2 = "SELECT * FROM receta";
$resultado2 = $connection->prepare($consulta2);
$resultado2->execute();
$data2=$resultado2->fetchAll(PDO::FETCH_ASSOC);
?>


<div class="container">
        <div class="row">
            <div class="col-lg-12">            
            </div>    
        </div>    
    </div>    
    <br>  
<div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="tablaRecetas" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <caption>Recetas médicas</caption>
                        <thead class="text-center">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Paciente</th>
                                <th scope="col">Descripción</th>                                
                                <th scope="col">URL</th>  
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($data2 as $dat2) {                                                        
                            ?>
                            <tr>
                                <td><?php echo $dat2['id'] ?></td>
                                <td><?php echo $dat2['title'] ?></td>
                                <td><?php echo $dat2['meet'] ?></td>
                                <td><?php echo $dat2['url'] ?></td>   
                                <td></td>
                            </tr>
                            <?php
                                }
                            ?>                                
                        </tbody>        
                       </table>                    
                    </div>
                </div>
        </div>  
    </div>    
      
<!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document2">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" dat2a-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formRecetas">    
            <div class="modal-body">
                <div class="form-group">
                    <label for="" class="col-form-label">Paciente:</label>
                    <select class="form-control" id="title" required>
                        <!-- <option value="" selected>Seleccione un doctor</option> -->
                    <?php                            
                        foreach($data as $dat) {                                                        
                        ?>
                        <option value="<?php echo $dat['username'] ?>"><?php echo $dat['username'] ?></option>
                        <?php
                        }
                    ?>  
                    <!-- <input type="text" class="form-control" id="doctor" required> -->
                    </select>
                </div>
                <!-- <div class="form-group">
                <label for="" class="col-form-label">Paciente:</label>
                <input type="text" class="form-control" id="title" required>
                </div> -->
                <div class="form-group">
                <label for="" class="col-form-label">Enlace meet:</label>
                <input type="text" class="form-control" id="meet" required>
                </div>
                <div class="form-group">
                <label for="" class="col-form-label">URL:</label>
                <input type="text" class="form-control" id="url" required>
                </div>                          
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" dat2a-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div>  
      
    
    
</div>
<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior.php"?>