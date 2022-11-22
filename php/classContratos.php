<?php
include "../php/classBaseDeDatos.php";

class Contratos extends baseDatos{
    function ejecuta($accion){
        $html = '';
        switch ($accion){
            case 'insert':
                $cad="INSERT INTO contrato set Estatus='Pend',Fecha=now(),id_Servicio=".$_POST['Nombre'].",id_Usuario=".$_SESSION['id_Usuario'];
                $this->m_query($cad);
                $html = $this->list();
            break;
            case 'update':
                $cad = "UPDATE contrato SET Nombre = '".$_POST['usuario']."' where id_Usuario = ".$_POST['id_Usuario'];
                $this->m_query($cad);
            break;
            case 'delete':
                $this->m_query("DELETE from contrato where id_Usuario =".$_SESSION['id_Usuario']." and id_Servicio=".$_POST['id_Servicio']." and id_Contrato=".$_POST['id_Contrato']);
                $html = $this->list();
                break;
            case 'editForm':
                $registro = $this->m_obtenerRegistro("SELECT * from contrato where id_Usuario =".$_POST['id_Usuario']);
            case 'newForm':
                $html.='<div class="container">
                <form method="post">';
                if (isset($registro))
                $html.='<input type="hidden" name="id_Usuario" value="'.$_POST['id_Usuario'].'" />';
                $html.='<div class="row">
                    <div class="row">
                        <div class="form-group">
                            <label class="form-label mt-4">Nuevo Servicio</label>
                        </div>';
                        $html.=$this->m_crearLista("servicios", "id_Servicio", "Nombre", "Nombre");
                        $html.='</div>
                <div class="row">
                <div class="col-4"></div>
                <div class="col-4">
                <button  class="btn btn-info" style="margin-top: 20px;">
                '.((isset($registro))? "Actualizar":"Registrar").'
                </button>
                <input type="hidden" name="accion" value="'.((isset($registro))? "update":"insert").'" />
                </div>
                </div>
                </form>
                </div>';
                break;
            case 'list':
                echo '<h4>Servicios contratados</h4>';
                $html = $this->list();
                break;
            default:
                $html.= $_REQUEST['accion']." Accion no programada";
            break;
        }
        return $html;
    }
    function list(){
        $res = '<div class="container"><div class="row"><table border="1" class="table table-hover">';
        //Cabecera
        $res.= '<tr>
        <td/>Servicio<td>Dia de vencimiento</td><td>Eliminar</td>
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
            <form method="post">
            <td><input type="image" width = "35 px" src="../img/basura.png"></td>
            <input type="hidden" name="accion" value="delete" />
            <input type="hidden" name="id_Usuario" value="'.$tupla['id_Usuario'].'" />
            <input type="hidden" name="id_Servicio" value="'.$tupla['id_Servicio'].'" />
            <input type="hidden" name="id_Contrato" value="'.$tupla['id_Contrato'].'" />
            </form>
            </tr>';
        }
        return $res.'</table></div></div>';
    }
}

$oContratos = new Contratos();
?>