<?php
    require_once __DIR__ . '/../models/Result.php';
    require_once __DIR__ . '/../controllers/ResultController.php';

    $resultController = new \Controllers\ResultController();

    $res = $resultController->getSelect();
    foreach ($res as $value) {
        echo $value['name'];
    }