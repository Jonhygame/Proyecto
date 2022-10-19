<?php
include "../php/classBaseDeDatos.php";

class Contratos extends baseDatos{
    function ejecuta($accion){
        $html = '';
        switch ($accion){
            case 'insert':
                $cad="INSERT INTO contrato set id_Usuario=".$_SESSION['id_Usuario'].", Estatus='Pend',Fecha=".date("Y-m-d").",id_Servicio=".$_POST['id_Servicio'];
                $this->m_query($cad);
            break;
            case 'update':
                $cad = "UPDATE contrato SET Nombre = '".$_POST['usuario']."' where id_Usuario = ".$_POST['id_Usuario'];
                $this->m_query($cad);
            break;
            case 'delete':
                $this->m_query("DELETE from contrato where id_Usuario =".$_POST['id_Usuario']);
                break;
            case 'editForm':
                $registro = $this->m_obtenerRegistro("SELECT * from contrato where id_Usuario =".$_POST['id_Usuario']);
            case 'newForm':
                $html.='<div class="container">
                <form method="post">';
                if (isset($registro))
                $html.='<input type="hidden" name="id_Usuario" value="'.$_POST['id_Usuario'].'" />';
                $html.='<div class="row">
                <div class="col-4"></div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label mt-4">Nuevo Servicio</label>
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
            case 'userList':
                echo '<h4>Servicios contratados</h4>';
                $html = $this->userList();
                break;
            default:
                $html.= $_REQUEST['accion']." Accion no programada";
            break;
        }
        return $html;
    }
    function userList(){
        $res = '<div class="container"><div class="row"><table border="1" class="table table-hover">';
        //Cabecera
        $res.= '<tr>
        <td/>Servicio<td>Dia de vencimiento</td>
        </tr>';
        //Fin de cabezera
        $this->m_query("SELECT * from contrato C join Servicios S on C.id_Servicio=S.id_Servicio where id_Usuario = '".$_SESSION['id_Usuario']."'");
        for($i = 0; $i < $this->a_numRegistros; $i++){
            $tupla = $this->m_recuRegistro();
            $dia = explode("-",$tupla['Fecha']);
            $dia = $dia[2];
            $res.='<tr class="table-dark">
            <td>'.$tupla["Nombre"].'</td>
            <td>'.$dia.'</td>
            </tr>';
        }
        return $res.'</table></div></div>';
    }
}

$oContratos = new Contratos();
?>