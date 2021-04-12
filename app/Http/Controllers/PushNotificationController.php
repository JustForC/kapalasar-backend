<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PushNotificationController extends Controller
{
    public function send() {
        $url = "https://14920aec-e01c-4e30-bdfa-fa5129387f91.pushnotifications.pusher.com/";
        $client = new \GuzzleHttp\Client([
            'base_uri' => $url
        ]);
        $response = $client->request('POST', 'publish_api/v1/instances/14920aec-e01c-4e30-bdfa-fa5129387f91/publishes', [
        'headers' => [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer 9D95BB6208995615CFF1825EFEBCB50B919F83B93EAD9A4ADC9B953E53FEDAC4'
        ],
        'body' => '
        {"interests":
            [
                "hello"
            ],
            "web":
                {"notification":
                    {
                        "title":"Free Ongkir",
                        "body":"Tunggu apalagi! Beli 2 gratis 1",
                        "icon":"https://kapalasar.id/images/icons/icon-96x96.jpg",
                        "deep_link":"https://kapalasar.id/flash_sale"
                    }
                }
            }'
        ]);
        echo $response->getBody();

    }
}
