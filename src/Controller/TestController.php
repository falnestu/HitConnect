<?php
/**
 * Created by PhpStorm.
 * User: esaphp
 * Date: 08.10.17
 * Time: 17:08
 */

namespace App\Controller;

use App\Model\MusicBrainz\Facade\MBServiceAgent;

class TestController extends AppController
{
    public function index(){
        $authUser = $this->Auth->user();
        $this->set('authUser', $authUser['firstname'] . ' ' . $authUser['lastname']);
        $artist = 'U2';
        //$recording = 'Sunday';
        $queryArgs = ['artist' => $artist];//, 'recording' => $recording ];
        //$queryArgs = 'donne';
        $response = MBServiceAgent::recording()->search($queryArgs);
        foreach ($response as $entity){
            echo $entity->id_musicbrainz . ' ' . $entity->label . ' ' . $entity->artist->label . '</br>';
        }
        die();
    }


}