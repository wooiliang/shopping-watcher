<?php

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$pageurl = "https://www.lazada.com.my/products/pre-order-delivery-in-14-days-enhanced-touch-n-go-card-to-be-released-by-batches-i3175099305-s16072707014.html";

while(1) {
    $ch = curl_init($pageurl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $html = curl_exec ( $ch );
    curl_close($ch);

    if (!str_contains($html, 'Out of stock')) {
        echo '[' . date("H:i:s") . '] In stock', PHP_EOL;
        SesEmail::sendEmail($html);
    } else {
        echo '[' . date("H:i:s") . '] Out of stock', PHP_EOL;
    }
    sleep(60);
}
