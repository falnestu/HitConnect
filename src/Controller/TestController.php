<?php
/**
 * Created by PhpStorm.
 * User: esaphp
 * Date: 08.10.17
 * Time: 17:08
 */

namespace App\Controller;

use App\Model\MusicBrainz\Facade\MBServiceAgent;
use App\Model\MusicBrainz\RecordingAgent;

class TestController extends AppController
{
    public function index(){
        $authUser = $this->Auth->user();
        $this->set('authUser', $authUser['firstname'] . ' ' . $authUser['lastname']);
        //$http = new Client();
        //$url = 'https://musicbrainz.org/ws/2/artist/?query=artist:bonobo&fmt=json';
        //$url = 'https://musicbrainz.org/ws/2/recording/';
        //$userAgent = 'HitConnect/1.0.0 (bastleroy@gmail.com)';
        $artist = 'U2';
        $recording = 'Sunday';
        //$query = ['query' => 'artist:'. $artist . ' AND recording:'.$recording . ' AND type:album' ,'fmt'=>'json'];
        $queryArgs = ['artist' => $artist, 'recording' => $recording ];
        //$options = ['headers'=> ['User-Agent' => $userAgent]];
        //$response = $http->get($url,$query,$options);
        $response = MBServiceAgent::recording()->Search($queryArgs);
        $result = json_decode($response->body());
        dd($result);
        foreach ($result as $key=>$value) {
            if (!is_array($value))
                echo $key . ' : ' . $value . '</br>';
            if(is_array($value))
            {
                foreach($value as $val) //echo $val;
                    //dd(get_object_vars($val));
                    if (isset($val->isrcs)){
                        echo $val->id . ' : ' . $val->title . '('. $val->score .')' . '</br>';
                    }

            }
        }
        die();
    }


}