<?php
include "../php/classBaseDeDatos.php";

class Users extends baseDatos{
    function ejecuta($accion){
        $html = '';
        switch ($accion){
            case 'insert':
                $cad="INSERT into usuario SET usuario='".$_POST['usuario']."'";
                $this->m_query($cad);
                $html = $this->listar();
            break;
            case 'update':
                $cad = "UPDATE usuario SET usuario = '".$_POST['usuario']."' where id_Usuario = ".$_POST['id_Usuario'];
                $this->m_query($cad);
                $html=$this->listar();
            break;
            case 'updateProfile':
                if($_FILES['Foto']['name'] != ''){
                    $extension = explode(".",$_FILES['Foto']['name']);
                    $extension = $extension[count($extension)-1];
                    $nomFinal = $_SESSION['id_Usuario'].".".$extension;
                }
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
                <input type="text" class="form-control" name="usuario" placeholder="Nombre del Usuario" value='.((isset($registro))? $registro["Nombre"] :"").'>
                </div>
                </div>
                </div>
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
            case 'viewProfile':
                $html = $this->viewProfile();
            break;
            default:
                $html.= $_REQUEST['accion']." Accion no programada";
            break;
        }
        return $html;
    }
    function viewProfile(){
        
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
        </td><th>Id</th><td/>Nombre Completo<td>Email</td><td>Fecha de ultimo acceso</td><td>Accesos</td><td>Genero</td><td>Rol</td>
        </tr>';
        //Fin de cabezera
        $this->m_query("SELECT * from usuario order by id_usuario");
        for($i = 0; $i < $this->a_numRegistros; $i++){
            $tupla = $this->m_recuRegistro();
            $res.='<tr class="table-dark">
            <td>
            <form method="post">
            <input type="hidden" name="accion" value = "editForm"/>
            <input type="hidden" name="id_Usuario" value = "'.$tupla["id_Usuario"].'"/>
            <input type="image" width = "35 px" src="../img/edit.png">
            </form>
            </td>
            <td>
            <form method="post">
            <input type="hidden" name="accion" value = "delete"/>
            <input type="hidden" name="id_Usuario" value ="'.$tupla["id_Usuario"].'"/>
            <input type="image" width="35px" src="../img/basura.png"/>
            </form>
            </td>
            <td>'.$tupla["id_Usuario"].'</td>
            <td>'.$tupla["Nombre"].' '.$tupla['Apellido'].'</td>
            <td>'.$tupla['Email'].'</td>
            <td>'.$tupla['Fecha_ulti_acceso'].'</td>
            <td>'.$tupla['Accesos'].'</td>
            <td>'.$tupla['Genero'].'</td>
            <td>'.(($tupla['id_Rol']=='1')?"Administrador":"Usuario").'</td>
            </tr>';
        }
        return $res.'</table></div></div>';
    }
}

$oUsers = new Users();
?>