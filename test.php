<?php

$db = new PDO('sqlite:' .__DIR__ . '/DB/invoices.db');

$db->exec("
    CREATE TABLE IF NOT EXISTS test (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL
    )
");

$db->exec("INSERT INTO test (name) VALUES ('DB OK!')");

$result = $db->query("SELECT * FROM test")
                ->fetchAll(PDO::FETCH_ASSOC);

print_r($result);