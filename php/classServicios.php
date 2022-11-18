<?php
include "../php/classBaseDeDatos.php";

class Servicios extends baseDatos{
    function ejecuta($accion){
        $html = '';
        switch ($accion){
            case 'insert':
                if ($_FILES['img']['name']!=="") {
                    $tipoArch = $_FILES['img']['type'];
                    $ImgSubida = fopen($_FILES['img']['tmp_name'],'r');
                    $sizeImg = $_FILES['img']['size'];
                    $binarioImg = fread($ImgSubida,$sizeImg);
                    $binarioImg = addslashes($binarioImg);
                    $cad="INSERT INTO servicios SET Nombre ='".$_POST['nombre']."', Precio='".$_POST['precio']."', Descripcion='".$_POST['desc']."', Imagen='".$binarioImg."', type='".$tipoArch."'";
                }else{
                    $cad="INSERT INTO servicios SET Nombre ='".$_POST['nombre']."', Precio='".$_POST['precio']."', Descripcion='".$_POST['desc']."'";
                }
                $this->m_query($cad);
                $html = $this->listar();
            break;
            case 'update':
                if ($_FILES['img']['name']!=="") {
                    $tipoArch = $_FILES['img']['type'];
                    $ImgSubida = fopen($_FILES['img']['tmp_name'],'r');
                    $sizeImg = $_FILES['img']['size'];
                    $binarioImg = fread($ImgSubida,$sizeImg);
                    $binarioImg = addslashes($binarioImg);
                    $cad = "UPDATE servicios SET Nombre ='".$_POST['nombre']."', Precio='".$_POST['precio']."', Descripcion='".$_POST['desc']."', Imagen='".$binarioImg."', type='".$tipoArch."' where id_Servicio=".$_POST['id_Servicio'];
                }else{
                $cad = "UPDATE servicios SET Nombre ='".$_POST['nombre']."', Precio='".$_POST['precio']."', Descripcion='".$_POST['desc']."' where id_Servicio=".$_POST['id_Servicio'];
                }
                $this->m_query($cad);
                $html=$this->listar();
            break;
            case 'delete':
                $this->m_query("DELETE from servicios where id_Servicio =".$_POST['id_Servicio']);
                $html = $this->listar();
                break;
            case 'editForm':
                $registro = $this->m_obtenerRegistro("SELECT * from servicios where id_Servicio =".$_POST['id_Servicio']);
            case 'newForm':
                $html.='<div class="container">
                <form method="post" enctype="multipart/form-data">';
                if (isset($registro))
                $html.='<input type="hidden" name="id_Servicio" value="'.$_POST['id_Servicio'].'" />';
                $html.='<div class="row">
                <div class="col-4"></div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label mt-4">'.(isset($registro)?"Servicio":"Nuevo Servicio").'</label>
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                    <input type="file" accept=".jpg,.png,.jpeg,.gif" class="form-control" name="img" placeholder="Imagen" value="">
                                    <img src="'.(isset($registro)?"data:".$registro['type'].";base64,".base64_encode($registro['Imagen']):"").'" alt="" height = "36 px" class="Foto"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                    <div class="input-group mb-3">
                                    <span class="input-group-text">Nombre</span>
                                    <input type="text" class="form-control" name="nombre" placeholder="Nombre del Servicio" value="'.((isset($registro))?$registro['Nombre']:"").'">
                                    </div>
                            </div>
                            <div class="form-group">
                                    <div class=" mb-3">
                                    <span class="input-group-text">Descripcion</span>
                                    <input type="text" class="form-control" name="desc" placeholder="Pequeña descripcion de el servicio" value="'.((isset($registro))?$registro['Descripcion']:"").'">
                                    </div>
                            </div>
                            <div class="form-group">
                                    <div class="input-group mb-3">
                                    <span class="input-group-text">Precio</span>
                                    <input type="text" class="form-control" name="precio" placeholder="Precio del servicio" value="'.((isset($registro))?$registro['Precio']:"").'">
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
            <td><img src="'.(isset($tupla)?"data:".$tupla['type'].";base64,".base64_encode($tupla['Imagen']):"").'" alt="" height = "36 px" class="Foto"/></td>
            </tr>';
        }
        return $res.'</table></div></div>';
    }
}

$oServicios = new Servicios();
?>