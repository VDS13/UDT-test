<?php
    $dbhost = '127.0.0.1';
    $dbname = 'test';
    $dbuser = 'root';
    $dbpass = '';
    $charset = 'utf8';

    $dsn = "mysql:host=$dbhost;dbname=$dbname;charset=$charset";

    $option = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];
    try {
        $pdo = new PDO($dsn, $dbuser, $dbpass, $opt);
        $ins = 0;
        $upd = 0;
        if (($handle = fopen("./product.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 0, ";")) !== FALSE) {
                $insert_array = array();
                for ($i = 0; $i < count($data); $i++) {
                    $insert_array[] = addslashes($data[$i]);
                }
                $statement = $pdo->prepare('INSERT INTO product (name, art, price, quantity) VALUES (?, ?, ?, ?) ON DUPLICATE KEY UPDATE price = VALUES(price), quantity = VALUES(quantity)');
                $statement->execute($insert_array);
                if ($statement->rowCount() == 1) {
                    $ins++;
                } else if ($statement->rowCount() == 2) {
                    $upd++;
                }
            }
            fclose($handle);
        }
        echo 'Количество добавленных строк: '. $ins . '\nКоличество обновленных строк: '. $upd;
        $pdo = null;
    } catch (PDOException $e) {
        die('Подключение не удалось: ' . $e->getMessage());
    }