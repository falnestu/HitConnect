<?php
/**
 * Created by PhpStorm.
 * User: esaphp
 * Date: 02.01.18
 * Time: 14:51
 */

namespace App\Model\BU;


use App\Model\MusicBrainz\Facade\MBServiceAgent;
use Cake\ORM\TableRegistry;

class PreferencesManager
{
    /**
     * @param $data est une entité recording associé à un artiste venant de musicbrainz envoyé par formulaire
     */
    public static function add($data, $user_id){
        //<editor-fold desc="Artist">
        $artistsTable = TableRegistry::get('Artists');
        $artist = $artistsTable->findOrCreate($data['artist']);
            //ArtistsManager::findOrCreate($data['artist']);
        //</editor-fold>

        //<editor-fold desc="Tags">
        $artistMB = MBServiceAgent::artist()->searchByArtistId($artist->id_musicbrainz);
        $tags = [];
        foreach($artistMB['Tags'] as $tag){
            $tags[] = TableRegistry::get('Tags')->findOrCreate(['label' => $tag->label]);
        }
        if(!empty($tags))
            $artistsTable->Tags->link($artist, $tags);
        //</editor-fold>

        //<editor-fold desc="Recordings">
        //On récupère les 2 données id_musicbrainz et label
        $recordingData= [
            'id_musicbrainz' => $data['id_musicbrainz'],
            'label' => $data['label'],
            'artist_id' => $artist->id
        ];
        //array_slice($data,0,2);
        //$recordingData['artist_id'] = $artist->id;
        //retrouve ou crée un recording
        $recording = TableRegistry::get('Recordings')->findOrCreate($recordingData);
        //$recording = RecordingsManager::findOrCreate($recordingData);
        //</editor-fold>

        //<editor-fold desc="Preferences">
        //On vérifie si la préférence n'existe pas déjà
        $userPrefferedTitleTable = TableRegistry::get('UsersPreferredTitles');
        $userPrefferedTitleData = ['user_id' => $user_id, 'recording_id' => $recording->id ];
        $userPrefferedTitleQuery = $userPrefferedTitleTable->find('all',
            [ 'conditions' => $userPrefferedTitleData]);
        if(!$userPrefferedTitleQuery->isEmpty()) return false;
        $userPrefferedTitle = $userPrefferedTitleTable->newEntity($userPrefferedTitleData);
        //</editor-fold>

        return $userPrefferedTitleTable->save($userPrefferedTitle);
    }

    public static function delete($userPrefferedTitleId){
        $userPrefferedTitleTable = TableRegistry::get('UsersPreferredTitles');
        $entity = $userPrefferedTitleTable->get($userPrefferedTitleId);
        return $userPrefferedTitleTable->delete($entity);
    }

    public static function getAllByUserId($user_id){
        $userPrefferedTitleTable = TableRegistry::get('UsersPreferredTitles');
        $userPrefferedTitleQuery = $userPrefferedTitleTable->findAllByUserId($user_id);
        $userPrefferedTitleQuery->contain('Recordings.Artists');
        return $userPrefferedTitleQuery->toArray();

    }
}