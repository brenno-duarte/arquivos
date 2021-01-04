<?php 

ini_set("display_errors", 1);
error_reporting(E_ALL);

require_once 'vendor/autoload.php';
require_once 'config.php';
session_start(); 
use Analytics\Analytics;
use Analytics\Resources\Cookie;
use Analytics\Resources\Session;

#(new Analytics())->report();

#var_dump(Session::show("cod_id"));

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/sidebar.css">
    <link rel="stylesheet" href="assets/css/theme-2.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <!-- Font awesome 5 -->
    <link href="assets/fonts/fontawesome/css/fontawesome-all.min.css" type="text/css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="border-right bg-menu shadow no-border" id="sidebar-wrapper">
            <div class="sidebar-heading shadow welcome mb-4">
                <span class="navbar-brand" href="#">
                    <p class="txt-5 font-weight-bold">
                        <i class="fas fa-door-open"></i>
                        Bem vindo
                    </p>
                    <small class="txt-5">Brenno Duarte de Lima</small>
                </span>
            </div>
            <div class="scroll-1">
                <ul class="list-group list-group-flush bg-menu">
                    <a href="dashboard.php" class="list-group-item list-group-item-action no-border bg-menu">
                        <i class="fas fa-chart-line"></i> Dashboard
                    </a>

                    <a class="list-group-item list-group-item-action no-border bg-menu" href="#submenu"
                        data-toggle="collapse" aria-expanded="false">
                        <i class="fas fa-file-alt"></i>
                        Dropdown
                        <i class="fas fa-arrows-alt-v"></i>
                    </a>
                    <ul class="collapse list-unstyled" id="submenu">
                        <a href="#" class="subitem">
                            <li class="p-3">Item</li>
                        </a>
                        
                        <a href="#" class="subitem">
                            <li class="p-3">Item</li>
                        </a>

                        <a href="#" class="subitem">
                            <li class="p-3">Item</li>
                        </a>
                    </ul>

                    <a href="user.php" class="list-group-item list-group-item-action no-border bg-menu">
                        <i class="far fa-user"></i> Users
                    </a>

                    <a href="user.php" class="list-group-item list-group-item-action no-border bg-menu">
                        <i class="far fa-user"></i> Users
                    </a>
                    <a href="user.php" class="list-group-item list-group-item-action no-border bg-menu">
                        <i class="far fa-user"></i> Users
                    </a>
                    <a href="user.php" class="list-group-item list-group-item-action no-border bg-menu">
                        <i class="far fa-user"></i> Users
                    </a>
                    <a href="user.php" class="list-group-item list-group-item-action no-border bg-menu">
                        <i class="far fa-user"></i> Users
                    </a>
                    <a href="user.php" class="list-group-item list-group-item-action no-border bg-menu">
                        <i class="far fa-user"></i> Users
                    </a>
                    <a href="user.php" class="list-group-item list-group-item-action no-border bg-menu">
                        <i class="far fa-user"></i> Users
                    </a>

                    <a href="about.php" class="list-group-item list-group-item-action no-border bg-menu">
                        <i class="fas fa-address-card"></i> About
                    </a>
                </ul>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light bg-5 w-100 bg-menu-2 shadow-sm">
                <button class="btn btn-theme" id="menu-toggle">
                    <i class="fas fa-arrows-alt-h p-1 "></i>
                </button>

                <button class="navbar-toggler navbar-icon bg-8" type="button" data-toggle="collapse"
                    data-target="#navbar-menu-2" aria-controls="navbar-menu-2" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbar-menu-2">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item mr-3">
                            <form action="#" method="get">
                                <input type="text" placeholder="&#xf002; Search..." class="input-search">
                            </form>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown username" data-toggle="dropdown" href="#" role="button"
                                aria-haspopup="true" aria-expanded="false">
                                <span id="username" class="username">
                                    <i class="fa fa-user username"></i>    
                                    Brenno Duarte de Lima
                                </span>
                            </a>
                            <div class="dropdown-menu bg-menu mt-2 no-border">
                                <div class="text-center font-weight-bold dropdown-name">
                                    Olá, Brenno Duarte de Lima <span for="nameCookie"></span>
                                </div>
                                <a class="dropdown-item" href="#">Meu perfil</a>
                                <a class="dropdown-item" href="#">Sair</a>
                            </div>
                        </li>
                        <a class="nav-link dropdown btn btn-4" href="#" role="button">
                            <i class="fas fa-sign-out-alt"></i>
                            Sair
                        </a>
                    </ul>
                </div>
            </nav>

            <section class="container-fluid">