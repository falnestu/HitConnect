<?php
/**
 * Created by PhpStorm.
 * User: esaphp
 * Date: 08.10.17
 * Time: 17:08
 */

namespace App\Controller;

use App\Model\MusicBrainz\Facade\MBServiceAgent;
use Cake\ORM\TableRegistry;

class TestController extends AppController
{
    public function index()
    {
        $authUser = $this->Auth->user();
        $this->set('authUser', $authUser['firstname'] . ' ' . $authUser['lastname']);
        $artist = 'U2';
        //$recording = 'Sunday';
        //$queryArgs = ['artist' => $artist];//, 'recording' => $recording ];
        $queryArgs = 'U2';
        $response = MBServiceAgent::recording()->search($queryArgs);
        foreach ($response as $entity) {
            //echo $entity->id_musicbrainz . ' - ' . $entity->artist->id_musicbrainz . '</br>';
            echo $entity->label . ' - ' . $entity->artist->label . '</br>';
        }

        $test_artists_id = "a3cb23fc-acd3-4ce0-8f36-1e5aa6a18432";
        $artist = MBServiceAgent::artist()->searchByArtistId($test_artists_id);
        foreach($artist['Tags'] as $tag){
            debug($tag);
            //TableRegistry::get('ArtistsTags')->findOrCreate($tag->label);
        }
        die();
    }

}