<?php
    require_once ("../vendor/autoload.php");

    use MercadoPago\Client\Preference\PreferenceClient;
    use MercadoPago\MercadoPagoConfig;

    MercadoPagoConfig::setAccessToken("TEST-4808156112961165-102416-f319912a4a575a0ed10c567e5d0a2bd5-1520338902");
    $total = 0;
    $client = new PreferenceClient();
    $preference = $client->create([
    "items"=> array(
        array(
        "id" => "01",
        "title" => "Compra Amor & Moda",
        "quantity" => 1,
        "currency_id" => "ARS",
        "unit_price" => $total
        )
    )
    ]);
    //$preference->save();
    $preference->auto_return = "approved";
    $preference->binary_mode = true;

    $preference->back_urls = array(
        "success" => "",
        "failure" => ""
    );

?>