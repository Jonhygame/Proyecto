<?php
include "../php/classBaseDeDatos.php";

class Promocion extends baseDatos{
    function ejecuta($accion){
        $html = '';
        switch ($accion){
            case 'insert':
                $cad = "INSERT INTO promocion set";
                foreach ($_POST as $key => $value) {
                    if($key!="accion"){
                        $cad .= " ". $key."='".$value."', ";
                    }
                }
                $cad = substr($cad, 0, -2);
                $this->m_query($cad);
                $html = $this->listar();
            break;
            case 'update':
                $cad = "UPDATE promocion SET  ";
                foreach ($_POST as $key => $value) {
                    if($key!="accion"){
                        if ($key!="id_Promocion") {
                            $cad .= " ". $key."='".$value."', ";
                        }
                    }
                }
                $cad = substr($cad, 0, -2);
                $cad .= " WHERE id_Promocion=".$_POST['id_Promocion'];
                $this->m_query($cad);
                $html = $this->listar();
            break;
            case 'delete':
                $this->m_query("DELETE from promocion where id_Promocion =".$_POST['id_Promocion']);
                $html = $this->listar();
            break;
            case 'editForm':
                $registro = $this->m_obtenerRegistro("SELECT * from Promocion where id_Promocion =".$_POST['id_Promocion']);
            case 'newForm':
                $html.='<form id="formPromocion" form method="post">
                <div class="container">';
                if (isset($registro)) 
                $html.='<input type="hidden" name="id_Promocion" value="'.$_POST['id_Promocion'].'" />';
                $html.='<div class="row">
                    <div class="">
                        <div class="form-group">
                        <label class="form-label mt-4">'.((isset($registro))?"Rol":"Nuevo Rol").'</label>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Promocion</span>
                                    <input id="Nombre" type="text" class="form-control" name="Nombre" placeholder="Nombre de la promocion " value="'.((isset($registro))?$registro["Nombre"]:"").'">
                                </div>
                                <div class="input-group mb-3">';
                                $html.=$this->m_crearLista("servicios", "id_Servicio", "Nombre", "Nombre",((isset($registro))?$registro['id_Servicio']:""));
                                $html.='</div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Porcentaje</span>
                                    <input id="Porcentaje" type="text" class="form-control" name="Porcentaje" placeholder="Porcentaje" value="'.((isset($registro))? $registro[2] :"").'">
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-4">
                <button type="button" class="btn btn-info" onClick="promocion(\''.((isset($registro))?'update':'insert').'\')">'.((isset($registro))? "Actualizar":"Registrar").'</button>
                </div>
                </div>
                </form>';
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
        <input type="image" scope="row" type="image" width = "35 px" src="../img/agregar.png" onClick="promocion(\'newForm\')">
        </td><th>Id</th><td/>Nombre de la promo</th><th>Porcentaje</th><th>Servicio</th></tr>';
        //Fin de cabezera
        $this->m_query("SELECT * FROM Promocion P JOIN Servicios S ON S.id_servicio=P.id_servicio");
        for($i = 0; $i < $this->a_numRegistros; $i++){
            $tupla = $this->m_recuRegistro();
            $res.='<tr class="table-dark"><td>
                <input type="image" width = "35 px" src="../img/edit.png" onClick="promocion(\'editForm\','.$tupla['id_Promocion'].')">
            </td>
            <td>
                <input type="image" width="35px" src="../img/basura.png" onClick="promocion(\'delete\','.$tupla['id_Promocion'].')"/>
            </td>
            <td>'.$tupla["id_Promocion"].'</td>
            <td>'.$tupla[1].'</td>
            <td>'.$tupla[2].'%</td>
            <td>'.$tupla["Nombre"].'</td></tr>';
        }
        return $res.'</table></div></div>';
    }
}

$oPromocion = new Promocion();
if(isset($_REQUEST["accion"])){
    echo $oPromocion->ejecuta($_REQUEST['accion']);
}else{
}
?>