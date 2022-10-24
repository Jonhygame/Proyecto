<?php
include "../php/classBaseDeDatos.php";

class Servicios extends baseDatos{
    function ejecuta($accion){
        $html = '';
        switch ($accion){
            case 'insert':
                $cad="INSERT INTO servicios set id_Usuario='".$_SESSION['id_Usuario']."'";
                $this->m_query($cad);
                $html = $this->listar();
            break;
            case 'update':
                $cad = "UPDATE usuario SET Nombre = '".$_POST['usuario']."' where id_Usuario = ".$_POST['id_Usuario'];
                $this->m_query($cad);
                $html=$this->listar();
            break;
            case 'delete':
                $this->m_query("DELETE from usuario where id_Usuario =".$_POST['id_Usuario']);
                $html = $this->listar();
                break;
            case 'editForm':
                $registro = $this->m_obtenerRegistro("SELECT * from usuario where id_Usuario =".$_POST['id_Usuario']);
            case 'newForm':
                $html.='<div class="container">
                <form method="post">';
                if (isset($registro))
                $html.='<input type="hidden" name="id_Usuario" value="'.$_POST['id_Usuario'].'" />';
                $html.='<div class="row">
                <div class="col-4"></div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label mt-4">Nuevo Usuario</label>
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                    <span class="input-group-text">Nombre</span>
                                    <input type="text" class="form-control" name="nombres" placeholder="Nombre del Usuario" value='.((isset($registro))? $registro["Nombre"] :"").'>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                    <div class="input-group mb-3">
                                    <span class="input-group-text">Apellidos</span>
                                    <input type="text" class="form-control" name="apellidos" placeholder="Apellido del usuario" value="'.((isset($registro))?$registro['Apellido']:"").'">
                                    </div>
                            </div>
                            <div class="form-group">
                                    <div class="input-group mb-3">
                                    <span class="input-group-text">Email</span>
                                    <input type="text" class="form-control" name="correo" placeholder="Email" value="'.((isset($registro))?$registro['Email']:"").'">
                                    </div>
                            </div>
                            <div class="form-group">
                                    <div class="input-group mb-3">
                                    <span class="input-group-text">Password</span>
                                    <input type="text" class="form-control" name="pwd" placeholder="Contraseña" value="">
                                    </div>
                            </div>
                            <div class="form-group">
                                    <div class="input-group mb-3">
                                    <span class="input-group-text">Fecha del ultimo acceso</span>
                                    <input type="date" class="form-control" name="Fecha_Ulti_Acceso" placeholder="Fecha del ultimo acceso" value="'.((isset($registro))?$registro['Fecha_ulti_acceso']:"").'">
                                    </div>
                            </div>'.((isset($registro))?"":"").'
                        </div>
                    </div>
                <div class="row">
                <div class="col-4"></div>
                <div class="col-4">
                <button  class="btn btn-info" >
                '.((isset($registro))? "Actualizar":"Registrar").'
                </button>
                <input type="hidden" name="accion" value="'.((isset($registro))? "update":"insert").'" />
                </div>
                </div>
                </form>
                </div>';
                break;
            case 'list':
                $html = $this->listar();
            break;
            default:
                $html.= $_REQUEST['accion']." Accion no programada";
            break;
        }
        return $html;
    }
    function listar(){
        $res = '<div class="container"><div class="row"><table border="1" class="table table-hover">';
        //Cabecera
        $res.= '<tr>
        <td colspan="2">
        <form method="post">
        <input type="hidden" name="accion" value="newForm">
        <input type="image" width = "35 px" src="../img/agregar.png">
        </form>
        </td>
        <th>Id</th><td/>Nombre Servicio<td>Precio</td><td>Descripcion</td><td>Imagen</td>
        </tr>';
        //Fin de cabezera
        $this->m_query("SELECT * from servicios");
        for($i = 0; $i < $this->a_numRegistros; $i++){
            $tupla = $this->m_recuRegistro();
            $res.='<tr class="table-dark">
            <td>
            <form method="post">
            <input type="hidden" name="accion" value = "editForm"/>
            <input type="hidden" name="id_Servicio" value = "'.$tupla["id_Servicio"].'"/>
            <input type="image" width = "35 px" src="../img/edit.png">
            </form>
            </td>
            <td>
            <form method="post">
            <input type="hidden" name="accion" value = "delete"/>
            <input type="hidden" name="id_Servicio" value ="'.$tupla["id_Servicio"].'"/>
            <input type="image" width="35px" src="../img/basura.png"/>
            </form>
            </td>
            <td>'.$tupla["id_Servicio"].'</td>
            <td>'.$tupla["Nombre"].'</td>
            <td>'.$tupla['Precio'].'</td>
            <td>'.$tupla['Descripcion'].'</td>
            <td>'.$tupla['Imagen'].'</td>
            </tr>';
        }
        return $res.'</table></div></div>';
    }
}

$oServicios = new Servicios();
?>