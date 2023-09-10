<?php
include_once("../controladorLogin/logueo.read.php");
    if (!isset($_SESSION['id_rol'])) {
        header("location: ../login/login.php");
    } else {
        if ($_SESSION['id_rol']!=1) {
          header('location: inicio.php');
        }
    }  
?>
<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <!-- Inicio Anexo de archivos -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../documentos/limaro/favicon_created_by_logaster.ico" sizes="16x16 24x24 36x36 48x48">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../componente/css/proyecto/style.css">
    <link rel="stylesheet" href="../componente/css/globales/all.min.css">
    <link rel="stylesheet" href="../componente/css/globales/animate.min.css">
    <link rel="stylesheet" href="../componente/css/globales/autoFill.dataTables.min.css">
    <link rel="stylesheet" href="../componente/css/globales/bootstrap.min.css">
    <link rel="stylesheet" href="../componente/css/globales/buttons.dataTables.min.css">
    <link rel="stylesheet" href="../componente/css/globales/colReorder.dataTables.min.css">
    <link rel="stylesheet" href="../componente/css/globales/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="../componente/css/globales/dataTables.dateTime.min.css">
    <link rel="stylesheet" href="../componente/css/globales/datatables.min.css">
    <link rel="stylesheet" href="../componente/css/globales/fixedColumns.dataTables.min.css">
    <link rel="stylesheet" href="../componente/css/globales/fixedHeader.dataTables.min.css">
    <link rel="stylesheet" href="../componente/css/globales/jquery-ui.min.css">
    <link rel="stylesheet" href="../componente/css/globales/keyTable.dataTables.min.css">
    <link rel="stylesheet" href="../componente/css/globales/responsive.dataTables.min.css">
    <link rel="stylesheet" href="../componente/css/globales/rowGroup.dataTables.min.css">
    <link rel="stylesheet" href="../componente/css/globales/rowReorder.dataTables.min.css">
    <link rel="stylesheet" href="../componente/css/globales/scroller.dataTables.min.css">
    <link rel="stylesheet" href="../componente/css/globales/searchBuilder.dataTables.min.css">
    <link rel="stylesheet" href="../componente/css/globales/searchPanes.dataTables.min.css">
    <link rel="stylesheet" href="../componente/css/globales/select.dataTables.min.css">
    <link rel="stylesheet" href="../componente/css/globales/sweetalert2.min.css">
    <script src="../componente/libreria/globales/jquery-3.6.0.min.js" ></script>
    <script src="../componente/libreria/globales/bootstrap.min.js"></script>
    <script src="../componente/libreria/globales/all.min.js"></script>
    <script src="../componente/libreria/globales/autoFill.dataTables.min.js"></script>
    <script src="../componente/libreria/globales/colReorder.dataTables.min.js"></script>
    <script src="../componente/libreria/globales/dataTables.dataTables.min.js"></script>
    <script src="../componente/libreria/globales/dataTables.dateTime.min.js"></script>
    <script src="../componente/libreria/globales/datatables.min.js"></script>
    <script src="../componente/libreria/globales/fixedColumns.dataTables.min.js"></script>
    <script src="../componente/libreria/globales/fixedHeader.dataTables.min.js"></script>
    <script src="../componente/libreria/globales/jquery-ui.min.js" ></script> 
    <script src="../componente/libreria/globales/jszip.min.js"></script>
    <script src="../componente/libreria/globales/keyTable.dataTables.min.js"></script>
    <script src="../componente/libreria/globales/responsive.dataTables.min.js"></script>
    <script src="../componente/libreria/globales/rowGroup.dataTables.min.js"></script>
    <script src="../componente/libreria/globales/rowReorder.dataTables.min.js"></script>
    <script src="../componente/libreria/globales/scroller.dataTables.min.js"></script>
    <script src="../componente/libreria/globales/select.dataTables.min.js"></script>
    <script src="../componente/libreria/globales/sweetalert2.all.min.js"></script>
    <script src="../componente/libreria/globales/sweetalert2.min.js"></script>
    <script src="../componente/libreria/globales/vfs_fonts.js"></script>
    <script src="../js/proyecto/global.js"></script>
    <script src="../js/Login/logueo.js"></script>

 <!-- Fin Anexo de archivos -->