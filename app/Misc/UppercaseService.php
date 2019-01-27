<?php
/**
 * Created by PhpStorm.
 * User: alish
 * Date: 1/27/19
 * Time: 6:52 AM
 */

namespace App\Misc;


use GuzzleHttp\Client;

class UppercaseService
{
    protected $client;
    protected $url;

    public function __construct()
    {
        $this->client = new Client();
        $this->url = env('UPPERCASE_SERVICE_URL');
    }

    public function convert($q)
    {

        $response = $this->client->post($this->url . '/api/uppercase', [
            'form_params' => [
                'query' => $q
            ]
        ]);

        $body = json_decode($response->getBody(), 1);

        return $body['result'];
    }

}