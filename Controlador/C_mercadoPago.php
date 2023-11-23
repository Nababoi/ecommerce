<?php

     require_once ("../vendor/autoload.php");

     use MercadoPago\Client\Preference\PreferenceClient;
     use MercadoPago\MercadoPagoConfig;


     MercadoPagoConfig::setAccessToken("TEST-4808156112961165-102416-f319912a4a575a0ed10c567e5d0a2bd5-1520338902");
   
     if(isset($total)){
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
    
     $preference->binary_mode = true;
     $preference->back_urls = array(
         "success" => "http://www.misitio.com.ar",
         "failure" => ""
     );
     //$preference->auto_return = "approved";
     
 
     


    //  $payment_url = $preference->sandbox_init_point;  // Cambiar a init_point en producción

    //  // Agregar un parámetro a la URL de éxito
    //  $success_url = "http://192.168.0.217/ecommerce/success.php?transaction_completed=true";
          
    //  // Redirigir al usuario a la URL de pago
   
    //  exit();
     

    ///////////////////////////////////
}

?>