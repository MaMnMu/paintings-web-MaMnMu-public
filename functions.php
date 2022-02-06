<?php

// Selecciona los pintores para mostrarlos en el html select
function selectPintores($dbh) {
    $stmt = defaultSelect($dbh, "SELECT name FROM painters");
    $pintores = array();
    while ($fila = $stmt->fetch()) {
        array_push($pintores, $fila['name']);
    }
    return $pintores;
}

// Select por defecto para cualquier consulta
function defaultSelect($dbh, $consulta) {
    $stmt = $dbh->prepare($consulta);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    return $stmt;
}

// Valida los campos introducidos y en caso de ser válidos, comprueba si se solicita insertar o actualizar y lo  hace
function insertupdateFunction($operacion, $dbh) {
    $nombreviejo = $_SESSION['nombreviejo'];
    $nombre = filter_input(INPUT_POST, 'nombre');
    $email = filter_input(INPUT_POST, 'email');
    $pintor = filter_input(INPUT_POST, 'pintor');
    $contra = filter_input(INPUT_POST, 'contra');
    if (preg_match("/[A-Za-z]/", $contra) && preg_match("/[0-9]/", $contra) && strlen($contra) >= 8) {
        $_SESSION['nombre'] = $nombre;
        switch ($operacion) {
            case "insertar":
                dataInsertUpdate('insertar', $dbh, $nombre, $contra, $email, $pintor, '');
                $texto = "Registrado correctamente. Inserte sus credenciales de nuevo para iniciar sesion";
                break;
            case "actualizar":
                dataInsertUpdate('actualizar', $dbh, $nombre, $contra, $email, $pintor, $nombreviejo);
                $texto = "Datos actualizados correctamente";
                break;
        }
        return $texto;
    } else {
        $texto = "La contraseña debe tener como minimo 8 caracteres, una letra y un numero";
        return $texto;
    }
}

// Comprueba si se solicita insertar o actualizar y lo hace
function dataInsertUpdate($operacion, $dbh, $nombre, $contra, $email, $pintor, $nombreviejo) {
    $consulta = "";
    switch ($operacion) {
        case "insertar":
            $consulta = "INSERT INTO users (name, password, email, painter_fk) VALUES (:name, :password, :email, :painter_fk)";
            $stmt = $dbh->prepare($consulta);
            break;
        case "actualizar":
            $consulta = "UPDATE users SET name=:name, password=:password, email=:email, painter_fk=:painter_fk WHERE name=:oldname";
            $stmt = $dbh->prepare($consulta);
            $stmt->bindParam(':oldname', $nombreviejo);
            break;
    }
    $stmt->bindParam(':name', $nombre);
    $stmt->bindParam(':password', $contra);
    $stmt->bindParam(':email', $email);
    switch ($pintor) {
        case "Francisco de Goya":
            $valor = "1";
            $stmt->bindParam(':painter_fk', $valor);
            break;
        case "Diego Velázquez":
            $valor = "2";
            $stmt->bindParam(':painter_fk', $valor);
            break;
        case "Van Gogh":
            $valor = "3";
            $stmt->bindParam(':painter_fk', $valor);
            break;
    }
    $stmt->execute();
}

// Delete por defecto para cualquier query de borrado
function dataDelete($dbh, $nombre) {
    $consulta = 'DELETE FROM users WHERE name=:name';
    $stmt = $dbh->prepare($consulta);
    $stmt->bindParam(':name', $nombre);
    $stmt->execute();
}

// Select con un parametro de busqueda
function rowParamSelect($dbh, $dato, $consulta) {
    $stmt = $dbh->prepare($consulta);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->bindParam(':data', $dato);
    $stmt->execute();
    return $stmt;
}

// Select del nombre, contraseña, email y pintor de un usuario
function userDataArray($dbh, $nombre, $consulta) {
    $stmt = rowParamSelect($dbh, $nombre, $consulta);
    $fila = $stmt->fetch();
    $pintor = "";
    switch ($fila['painter_fk']) {
        case 1: $pintor = "Francisco de Goya";
            break;
        case 2: $pintor = "Diego Velázquez";
            break;
        case 3: $pintor = "Van Gogh";
            break;
    }
    return ['name' => $nombre, 'password' => $fila['password'], 'email' => $fila['email'], 'pintor' => $pintor];
}

// Comprueba el painter_fk asociado al nombre introducido y luego selecciona los titulos de las pinturas asociados a ese painter_fk
function selectPaintings($dbh, $nombre) {
    $stmt1 = rowParamSelect($dbh, $nombre, "SELECT painter_fk FROM users WHERE name=:data");
    $fila = $stmt1->fetch();
    $valPintor = $fila['painter_fk'];
    $_SESSION['valPintor'] = $valPintor;
    switch ($valPintor) {
        case '1':
            $stmt2 = rowParamSelect($dbh, '1', "SELECT title FROM paintings WHERE painter_fk=:data");
            break;
        case '2':
            $stmt2 = rowParamSelect($dbh, '2', "SELECT title FROM paintings WHERE painter_fk=:data");
            break;
        case '3':
            $stmt2 = rowParamSelect($dbh, '3', "SELECT title FROM paintings WHERE painter_fk=:data");
            break;
    }
    $cuadros = $stmt2->fetchAll();
    return $cuadros;
}

// Selecciona la información de un cuadro
function selectInfos($dbh, $consulta) {
    $valPintor = $_SESSION['valPintor'];
    $stmt = rowParamSelect($dbh, $valPintor, $consulta);
    $filas = $stmt->fetchAll();
    return $filas;
}
