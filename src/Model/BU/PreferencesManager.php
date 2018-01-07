<?php
/**
 * Created by PhpStorm.
 * User: esaphp
 * Date: 02.01.18
 * Time: 14:51
 */

namespace App\Model\BU;


use App\Model\Entity\Recording;
use Cake\ORM\TableRegistry;

class PreferencesManager
{
    /**
     * @param $data est une entité recording associé à un artiste venant de musicbrainz envoyé par formulaire
     */
    public static function add($data, $user_id){
        //<editor-fold desc="Artist">
        $artist = ArtistsManager::findOrCreate($data['artist']);
        //</editor-fold>

        //<editor-fold desc="Tags">

        //</editor-fold>

        //<editor-fold desc="Recordings">
        //On récupère les 2 données id_musicbrainz et label
        $recordingData = array_slice($data,0,2);
        $recordingData['artist_id'] = $artist->id;
        //retrouve ou crée un recording
        $recording = RecordingsManager::findOrCreate($recordingData);
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