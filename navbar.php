<?php
session_start();
ob_start();
include "_conf.php";
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Spotted Italia</title>
    
    <meta name="description" content="Spotta chiunque in qualsiasi parte d'italia!">
    <meta HTTP-EQUIV="keywords" content="Italia italia spotted spotted-italia spotteditalia italiano italiani italy spotted_italia spotted_italy roma milano spottaggi trova persone">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/shards.min.css?v=2.0.1">
    <link rel="stylesheet" href="css/shards-demo.min.css?v=2.0.1">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/a32d1cd9e8.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.10.1.min.js" integrity="sha256-SDf34fFWX/ZnUozXXEH0AeB+Ip3hvRsjLwp6QNTEb3k=" crossorigin="anonymous"></script>

</head>

<body>

<style>
     .gly-rotate-45 {
            filter: progid: DXImageTransform.Microsoft.BasicImage(rotation=0.5);
            -webkit-transform: rotate(90deg);
            -moz-transform: rotate(90deg);
            -ms-transform: rotate(90deg);
            -o-transform: rotate(950deg);
            transform: rotate(90deg);
            display: inline-block;
        }

        .bi {
            -webkit-text-stroke: 1px;
        }
        img[src="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"]{
            display: none;
        }
    </style>
    <div class="nav fixed-bottom">
        <div class="nav-item">
            <i class="material-icons home-icon" onclick="home()">
                <i class="fa-solid fa-home"></i>
            </i>
        </div>
        <div class="nav-item">
            <i class="material-icons search-icon" onclick="cerca()">
                <i class="fa-solid fa-magnifying-glass"></i>
            </i>
        </div>
       <div class="nav-item" onclick="account()">
            <i class="material-icons person-icon">
                <i class="fa-solid fa-user"></i>
            </i>
        </div>
    </div>

    <div class="floating-container">
        <a href="spotta.php" class="floating-button">+</a>
    </div>
    <style>
        @import url("https://fonts.googleapis.com/css?family=Roboto");

        @-webkit-keyframes come-in {
            0% {
                -webkit-transform: translatey(100px);
                transform: translatey(100px);
                opacity: 0;
            }

            30% {
                -webkit-transform: translateX(-50px) scale(0.4);
                transform: translateX(-50px) scale(0.4);
            }

            70% {
                -webkit-transform: translateX(0px) scale(1.2);
                transform: translateX(0px) scale(1.2);
            }

            100% {
                -webkit-transform: translatey(0px) scale(1);
                transform: translatey(0px) scale(1);
                opacity: 1;
            }
        }

        @keyframes come-in {
            0% {
                -webkit-transform: translatey(100px);
                transform: translatey(100px);
                opacity: 0;
            }

            30% {
                -webkit-transform: translateX(-50px) scale(0.4);
                transform: translateX(-50px) scale(0.4);
            }

            70% {
                -webkit-transform: translateX(0px) scale(1.2);
                transform: translateX(0px) scale(1.2);
            }

            100% {
                -webkit-transform: translatey(0px) scale(1);
                transform: translatey(0px) scale(1);
                opacity: 1;
            }
        }
        h1, h2, h3, h4, h5, h6{
            color: var(--light) !important;
        }
        .floating-container {
            position: fixed;
            width: 100px;
            height: 100px;
            bottom: 5rem;
            right: 0;
            margin: 35px 25px;
        }

        .floating-container:hover {
            height: 300px;
        }

        .floating-container:hover .floating-button {
            box-shadow: 0 10px 25px -5px rgb(240 44 86 / 60%);
            -webkit-transform: translatey(5px);
            transform: translatey(5px);
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        .floating-container:hover .element-container .float-element:nth-child(1) {
            -webkit-animation: come-in 0.4s forwards 0.2s;
            animation: come-in 0.4s forwards 0.2s;
        }

        .floating-container:hover .element-container .float-element:nth-child(2) {
            -webkit-animation: come-in 0.4s forwards 0.4s;
            animation: come-in 0.4s forwards 0.4s;
        }

        .floating-container:hover .element-container .float-element:nth-child(3) {
            -webkit-animation: come-in 0.4s forwards 0.6s;
            animation: come-in 0.4s forwards 0.6s;
        }

        .floating-container .floating-button {
            position: absolute;
            width: 65px;
            height: 65px;
            background: #FF3434;
            bottom: 0;
            border-radius: 50%;
            left: 0;
            right: 0;
            margin: auto;
            color: white;
            line-height: 65px;
            text-align: center;
            font-size: 23px;
            z-index: 100;
            box-shadow: 0 10px 25px -5px rgb(240 44 86 / 60%);
            cursor: pointer;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }

        .floating-container .float-element {
            position: relative;
            display: block;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            margin: 15px auto;
            color: white;
            font-weight: 500;
            text-align: center;
            line-height: 50px;
            z-index: 0;
            opacity: 0;
            -webkit-transform: translateY(100px);
            transform: translateY(100px);
        }

        .floating-container .float-element .material-icons {
            vertical-align: middle;
            font-size: 16px;
        }

        .floating-container .float-element:nth-child(1) {
            background: #42A5F5;
            box-shadow: 0 20px 20px -10px rgba(66, 165, 245, 0.5);
        }

        .floating-container .float-element:nth-child(2) {
            background: #4CAF50;
            box-shadow: 0 20px 20px -10px rgba(76, 175, 80, 0.5);
        }

        .floating-container .float-element:nth-child(3) {
            background: #FF9800;
            box-shadow: 0 20px 20px -10px rgba(255, 152, 0, 0.5);
        }

        a {
            text-decoration: none;
        }

        i {
            color: var(--dark) !important;
        }

        .nav-item {
            font-size: 1rem;
        }

        .logout {
            color: var(--dark);
        }

        .fa-right-from-bracket:hover {
            color: var(--danger) !important;
        }

        a {
            text-decoration: none !important;
            border: none;
            outline-style: none;
        }

        body {
            background-color: var(--dark);
        }

        i {
            font-size: 1.5rem !important;
        }

        .nav {
            display: flex;
            width: 100%;
            margin: auto;
            background-color: #fff;
            padding: 20px 20px;
            border-bottom-left-radius: 30px;
            border-bottom-right-radius: 30px;
            box-shadow: 0px 5px 40px rgba(0, 0, 0, 0.8);
            position: fixed;
            bottom: 0;
        }

        .nav-item {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-grow: 1;
            padding: 10px 15px;
            cursor: pointer;
            transition: all 0.2s ease-out;
        }



        .material-icons {
            display: inline;
            font-size: 32px;
            transition: color .3s;
        }

        /* */

        .nav-item.active {

            border-radius: 30px;
            background: #eee;
        }

        .nav-item.active>.nav-text {
            display: inline-block;
        }

        .nav-item.active>.material-icons.home-icon {
            color: #5a35b5;
        }

        .material-icons.home-icon~.nav-text {
            color: #5a35b5;
        }

        .nav-item.active>.material-icons.favorite-icon {
            color: #c9329a;
        }

        .material-icons.favorite-icon~.nav-text {
            color: #c9329a;
        }

        .nav-item.active>.material-icons.search-icon {
            color: #e5a023;
        }

        .material-icons.search-icon~.nav-text {
            color: #e5a023;
        }

        .nav-item.active>.material-icons.person-icon {
            color: #0091a9;
        }

        .material-icons.person-icon~.nav-text {
            color: #0091a9;
        }
    </style>
    <script>
        function home() {
            window.location.href = "index.php";
        }

        function cerca() {
            window.location.href = "cerca.php";
        }

        function ticket() {
            window.location.href = "biglietti_tuoi.php";
        }

        function account() {
            window.location.href = "account.php";
        }

        const navItems = document.getElementsByClassName('nav-item');

        for (let i = 0; i < navItems.length; i++) {
            navItems[i].addEventListener('click', () => {
                for (let j = 0; j < navItems.length; j++)
                    navItems[j].classList.remove('active');

                navItems[i].classList.add('active');
            });
        }
    </script>
    <div class="pb-4"></div>
    <div class="pb-4"></div>
    <div style="padding-left: 2rem">