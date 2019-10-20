<?php

/*
  Plugin Name: MediaMind
  Plugin URI: https://github.com/EvalynnHadassahSamuel/MediaMind
  Description: Messing around with Rest stuff. See where it goes.
  Author: (The Lovely and Talented) EvaLynn Samuel
  Version: 1

  $Id: MediaMind.php 3309 2019-10-19 22:44:57Z ev $
 */

define(APP_NAME, 'MediaMind');

class MediaMind {

    public function __construct() {
        
    }

    function RegisterEndpoints() {

        $Endpoints = [
            ['methods' => 'GET', 'callback' => [$this, 'Index']],
            ['methods' => 'GET', 'callback' => [$this, 'AliensHaveLanded']],
        ];

        foreach ($Endpoints as $Endpoint) {
            register_rest_route(APP_NAME, $Endpoint['callback'][1], $Endpoint);
        }
    }

    function Index() {
        $junk = ['monkey' => 'pants', 'sloth' => 'tie dye', 'fish' => 'rain coat'];
        return rest_ensure_response($junk);
    }

    public function AliensHaveLanded() {
        $junk = ['date' => date('Y-m-d g:ia'), 'formal_greeting' => 'Hey, is it okay to park here?'];
        return rest_ensure_response($junk);
    }

    public function __destruct() {
        
    }

}

function PluginInstance() {
    return new MediaMind();
}

add_action('rest_api_init', [PluginInstance(), 'RegisterEndpoints']);
