<?php
    header('Content-Type: application/json');

    require_once("../config/conexion.php");
    require_once("../models/Categoria.php");
    $categoria = new Categoria();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["op"]){ //GET: obtener
        case "GetAll":
            $datos = $categoria->get_categoria();
            echo json_encode($datos); //para que la información la escriba en el postman con formato JSON
            break;

        case "GetId":
            $datos = $categoria->get_categoria_x_id($body["cat_id"]);
            echo json_encode($datos);
            break;
        
        case "Insert":
            $datos = $categoria->insert_categoria($body["cat_nom"], $body["cat_obs"]);
            echo json_encode("Insert Correcto");
            break;

        case "Update":
            $datos = $categoria->update_categoria($body["cat_id"], $body["cat_nom"], $body["cat_obs"]);
            echo json_encode("Update Correcto");
            break;
        
        case "Delete":
            $datos = $categoria->delete_categoria($body["cat_id"]);
            echo json_encode("Delete Correcto");
            break;

    }


?>