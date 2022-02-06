<?php

require "vendor/autoload.php";
include "functions.php";

use eftec\bladeone\bladeone;

$Views = __DIR__ . '\Views';
$Cache = __DIR__ . '\Cache';

$Blade = new BladeOne($Views, $Cache);

session_start();

try {

    $dsn = "mysql:host=localhost;dbname=usermgmt";
    $dbh = new PDO($dsn, "root", "");
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    
    echo $e->getMessage();
    
}

if (empty($_POST)) {
    
    echo $Blade->run('index');
    
} else if (isset($_POST['enviar'])) {

    $boton = filter_input(INPUT_POST, 'enviar');
    switch ($boton) {

        case 'Iniciar Sesion':

            echo $Blade->run('login');
            break;

        case 'Registro':

            $pintores = selectPintores($dbh);
            echo $Blade->run('signin', ['pintores' => $pintores]);
            break;

        case 'Confirmar Inicio Sesion':

            $nombre = filter_input(INPUT_POST, 'nombre');
            $_SESSION['nombre'] = $nombre;
            $contra = filter_input(INPUT_POST, 'contra');
            $stmt = defaultSelect($dbh, "SELECT name, password FROM users");
            $encontrado = false;
            // Comprobamos que los datos introducidos coinciden con algun nombre y contraseña de la BDD
            while ($fila = $stmt->fetch()) {
                if ($nombre == $fila['name'] && $contra == $fila['password']) {
                    $encontrado = true;
                    break;
                }
            }

            if ($encontrado) {
                $cuadros = selectPaintings($dbh, $nombre);
                echo $Blade->run('personal', ['nombre' => $nombre, 'cuadros' => $cuadros]);
            } else {
                $texto = "Credenciales incorrectas. Intentalo de nuevo";
                echo $Blade->run('login', ['texto' => $texto]);
            }
            break;

        case 'Confirmar Registro':

            $texto = insertupdateFunction('insertar', $dbh);
            switch ($texto) {

                case "Registrado correctamente. Inserte sus credenciales de nuevo para iniciar sesion":
                    echo $Blade->run('login', ['texto' => $texto]);
                    break;

                case "La contraseña debe tener como minimo 8 caracteres, una letra y un numero":
                    $pintores = selectPintores($dbh);
                    echo $Blade->run('signin', ['texto' => $texto, 'pintores' => $pintores]);
                    break;
            }
            break;

        case 'Ver Cuadro 1':

            $filas = selectInfos($dbh, 'SELECT title, description, year FROM paintings WHERE painter_fk=:data');
            $cuadro = $filas[0];
            echo $Blade->run('cuadro', ['cuadro' => $cuadro]);
            break;

        case 'Ver Cuadro 2':

            $filas = selectInfos($dbh, 'SELECT title, description, year FROM paintings WHERE painter_fk=:data');
            $cuadro = $filas[1];
            echo $Blade->run('cuadro', ['cuadro' => $cuadro]);
            break;

        case 'Ver Cuadro 3':

            $filas = selectInfos($dbh, 'SELECT title, description, year FROM paintings WHERE painter_fk=:data');
            $cuadro = $filas[2];
            echo $Blade->run('cuadro', ['cuadro' => $cuadro]);
            break;

        case 'Modificar Datos':

            // Guardamos en un sesión el nombre actual para posteriormente usarlo como parametro para actualizar los datos
            $_SESSION['nombreviejo'] = $_SESSION['nombre'];
            $nombre = $_SESSION['nombre'];
            $datos = userDataArray($dbh, $nombre, "SELECT name, password, email, painter_fk FROM users WHERE name=:data");
            $pintores = selectPintores($dbh);
            echo $Blade->run('modificar', ['nombre' => $datos['name'], 'contra' => $datos['password'],
                'email' => $datos['email'], 'pintor' => $datos['pintor'], 'pintores' => $pintores]);
            break;

        case 'Cerrar Sesion':

            $texto = 'Has cerrado sesión correctamente';
            echo $Blade->run('index', ['texto' => $texto]);
            break;

        case 'Dar de Baja':

            $nombre = $_SESSION['nombre'];
            dataDelete($dbh, $nombre);
            $texto = "Usuario " . $nombre . " dado de baja correctamente";
            echo $Blade->run('index', ['texto' => $texto]);
            break;

        case 'Confirmar Modificacion Datos':

            $texto = insertupdateFunction('actualizar', $dbh);
            $nombre = $_SESSION['nombre'];
            $nombreviejo = $_SESSION['nombreviejo'];
            switch ($texto) {

                case "Datos actualizados correctamente":
                    $cuadros = selectPaintings($dbh, $nombre);
                    echo $Blade->run('personal', ['texto' => $texto, 'nombre' => $nombre, 'cuadros' => $cuadros]);
                    break;

                case "La contraseña debe tener como minimo 8 caracteres, una letra y un numero":
                    $datos = userDataArray($dbh, $nombre, "SELECT name, password, email, painter_fk FROM users WHERE name=:data");
                    $pintores = selectPintores($dbh);
                    echo $Blade->run('modificar', ['texto' => $texto, 'nombre' => $datos['name'], 'contra' => $datos['password'],
                        'email' => $datos['email'], 'pintor' => $datos['pintor'], 'pintores' => $pintores]);
                    break;
            }
            break;

        case 'Volver a Personal':

            $nombre = $_SESSION['nombre'];
            $cuadros = selectPaintings($dbh, $nombre);
            echo $Blade->run('personal', ['cuadros' => $cuadros, 'nombre' => $nombre]);
            break;
        
    }
} else {

    header("Location: index.php");
    
}