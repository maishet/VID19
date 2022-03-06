<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Citas médicas reservadas</h1>
    
    
    
 <?php
include_once '../php/config.php';

$consulta = "SELECT username FROM users WHERE role='doctor'";
$resultado = $connection->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);

$consulta1 = "SELECT * FROM files";
$resultado1 = $connection->prepare($consulta1);
$resultado1->execute();
$data1=$resultado1->fetchAll(PDO::FETCH_ASSOC);
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
                        <table id="tablaCitas" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <caption>Citas médicas</caption>
                        <thead class="text-center">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Paciente</th>
                                <th scope="col">Numero Telefónico</th>                                
                                <th scope="col">Email</th>  
                                <th scope="col">Enlace meet</th>
                                <th scope="col">Saturacion oxigeno</th>
                                <th scope="col">Doctor(a)</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Hora</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($data1 as $dat1) {                                                        
                            ?>
                            <tr>
                                <td><?php echo $dat1['id'] ?></td>
                                <td><?php echo $dat1['paciente'] ?></td>
                                <td><?php echo $dat1['number'] ?></td>
                                <td><?php echo $dat1['email'] ?></td>
                                <td><?php echo $dat1['sintomas'] ?></td>
                                <td><?php echo $dat1['saturacion'] ?></td> 
                                <td><?php echo $dat1['doctor'] ?></td>
                                <td><?php echo $dat1['fecha'] ?></td>
                                <td><?php echo $dat1['hora'] ?></td>     
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
<div class="modal fade" id="modalCRUD1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document1">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formCitas">    
            <div class="modal-body">
                <div class="form-group">
                <label for="" class="col-form-label">Paciente:</label>
                <input type="text" class="form-control" id="paciente" required>
                </div>
                <div class="form-group">
                <label for="" class="col-form-label">Numero:</label>
                <input type="text" class="form-control" id="number" required>
                </div>
                <div class="form-group">
                <label for="" class="col-form-label">Email:</label>
                <input type="text" class="form-control" id="email" required>
                </div>
                <div class="form-group">
                <label for="" class="col-form-label">Enlace Meet:</label>
                <input type="text" class="form-control" id="sintomas" required>
                </div>
                <div class="form-group">
                <label for="" class="col-form-label">Saturacion:</label>
                <input type="number" class="form-control" id="saturacion" required min="90" max="100">
                </div>
                <div class="form-group">
                    <label for="" class="col-form-label">Doctor(a):</label>
                    <select class="form-control" id="doctor" required>
                        <!-- <option value="" selected>Seleccione un doctor</option> -->
                    <?php                            
                        foreach($data as $dat) {                                                        
                        ?>
                        <option value="<?php echo $dat['username'] ?>">Doctor(a): <?php echo $dat['username'] ?></option>
                        <?php
                        }
                    ?>  
                    <!-- <input type="text" class="form-control" id="doctor" required> -->
                    </select>
                </div>
                <div class="form-group">
                <label for="" class="col-form-label">Fecha:</label>
                <input type="date" class="form-control" id="fecha" required>
                </div>
                <div class="form-group">
                <label for="" class="col-form-label">Hora:</label>
                <input type="text" class="form-control" id="hora" required>
                </div>
                                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div>  
      
    
    
</div>
<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior.php"?>