<?php

$db = new PDO('sqlite:prueba.db');

$db->exec("
    CREATE TABLE IF NOT EXISTS prueba (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nombre TEXT NOT NULL
    )
");

$db->exec("INSERT INTO prueba (nombre) VALUES ('Funciona')");

$resultado = $db->query("SELECT * FROM prueba")
                ->fetchAll(PDO::FETCH_ASSOC);

print_r($resultado);