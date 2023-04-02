<?php

namespace App\OlhoVivo\src;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Exception\RequestException;

class OlhoVivo
{
    public $token;
    public $url;
    public function autenticar() {
        $return = false;
        try {
            $autenticar = new Client([
                'base_uri' => $this->url,
                'timeout' => 2.0,
                'cookies' => true //shared session for this client
            ]);
            
            $login = $autenticar->request(
                'POST',
                'Login/Autenticar',
                ['query' => ['token' => $this->token]]
                );
            if (!(json_decode($login->getBody()))) {
                throw new \Exception("Failed to login with this token.");
            } elseif (!($login->hasHeader('Set-Cookie'))) {
                throw new \Exception("Server didn't set credentials.");
            }

            $return = $login->getBody();
        } catch (RequestException $e) {
            throw new \Exception("HTTP request/response error: {$e->getMessage()}");
        } finally {
            return $return;
        }
    }
    
}