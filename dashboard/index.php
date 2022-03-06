<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Registro de usuarios</h1>
    
    
    
 <?php
include_once '../php/config.php';

$consulta = "SELECT id, username, email, password, role FROM users";
$resultado = $connection->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
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
                        <table id="tablaPersonas" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <caption>Usuarios</caption>
                        <thead class="text-center">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Correo</th>                                
                                <th scope="col">Contraseña</th>  
                                <th scope="col">Rol</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($data as $dat) {                                                        
                            ?>
                            <tr>
                                <td><?php echo $dat['id'] ?></td>
                                <td><?php echo $dat['username'] ?></td>
                                <td><?php echo $dat['email'] ?></td>
                                <td><?php echo $dat['password'] ?></td>
                                <td><?php echo $dat['role'] ?></td>      
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
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formPersonas">    
            <div class="modal-body">
                <div class="form-group">
                <label for="" class="col-form-label">Nombre:</label>
                <input type="text" class="form-control" id="username" required>
                </div>
                <div class="form-group">
                <label for="" class="col-form-label">Correo:</label>
                <input type="text" class="form-control" id="email" required>
                </div>
                <div class="form-group">
                <label for="" class="col-form-label">Contraseña:</label>
                <input type="text" class="form-control" id="password" required>
                </div>                
                <div class="form-group">
                <label for="" class="col-form-label">Rol:</label>
                <select class="form-control" id="role" required>
                    <option value="paciente">Paciente</option>
                    <option value="doctor">Doctor</option>
                    <option value="admin">Administrador</option>
                </select>
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