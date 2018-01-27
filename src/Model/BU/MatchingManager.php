<?php
/**
 * Created by PhpStorm.
 * User: esaphp
 * Date: 21.01.18
 * Time: 16:48
 */

namespace App\Model\BU;


use App\Model\BU\Entity\Match;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;

class MatchingManager
{
    //<editor-fold description="Calculator">
    private $matches;

    //<editor-fold description="private Methods">

    private function findMatch($user_id){
        foreach($this->matches as $match){
            if($match->getUserId() == $user_id){
                return $match;
            }
        }
        $match = new Match($user_id);
        $this->matches[] = $match;
        return $match;
    }
    //</editor-fold>

    //<editor-fold description="public Methods">
    public function addMatch($user_id, $nbMatches, $userquery, $weight = 1){
        $totalUserQuery = $userquery->select(['count' => $userquery->func()->count('*')])->first()->count;
        $score = ($nbMatches / $totalUserQuery) * $weight;
        if(isset($user_id)){
            $match = $this->findMatch($user_id);
            $match->addScore($score);
        }
    }
    //</editor-fold>

    //</editor-fold>

    //<editor-fold description="Database">

    private $user_id;

    private $meAndAlreadyConnectedUsersIds;

    public function __construct($user_id, $connectedUsersIds)
    {
        $this->matches = array();
        $this->user_id = $user_id;
        $connectedUsersIds[] = $user_id;
        $this->meAndAlreadyConnectedUsersIds = $connectedUsersIds;
    }

    //<editor-fold description="private Methods">
    private function getUserRecordingsQuery(){
        return TableRegistry::get('Recordings')->find()->select('id')->matching('UsersPreferredTitles', function(Query $q) {
            return $q->where(['UsersPreferredTitles.user_id' => $this->user_id]);
        });
    }

    private function getUserArtistsQuery(){
        return TableRegistry::get('Recordings')->find()->select('Recordings.artist_id')//->distinct('Recordings.artist_id')
            ->matching('UsersPreferredTitles', function(Query $q) {
                return $q->where(['UsersPreferredTitles.user_id' => $this->user_id]);
            });
    }

    private function getUserTagsQuery(){
        return TableRegistry::get('Tags')->find()->select('Tags.id')//->distinct('Tags.id')
            ->matching('Artists', function(Query $q) {
                return $q->where(['Artists.id IN' => $this->getUserArtistsQuery() ]);
            });
    }

    private function getBaseMatchQuery(){
         $query = TableRegistry::get('UsersPreferredTitles')->find('all')
            ->where([
                'user_id NOT IN' => $this->meAndAlreadyConnectedUsersIds
            ]);
         return $query->select(['user_id', 'count' => $query->func()->count('user_id')]);
    }

    private function getRecordingMatches(){
        return $this->getBaseMatchQuery()
            ->where([
                'recording_id IN' => $this->getUserRecordingsQuery()
            ])->toArray();
    }

    private function getArtistMatches(){
        return $this->getBaseMatchQuery()
            ->matching('Recordings', function($q) {
                return $q->where([
                    'Recordings.Artist_id IN ' => $this->getUserArtistsQuery(),
                    'recording_id NOT IN' => $this->getUserRecordingsQuery()
                ]);
            })->toArray();
    }

    private function getTagMatches(){
        return $this->getBaseMatchQuery()
            ->matching('Recordings', function ($q) {
                return $q->where([
                    'Recordings.Artist_id NOT IN ' => $this->getUserArtistsQuery(),
                    'recording_id NOT IN' => $this->getUserRecordingsQuery()
                ])->matching('Artists', function ($q) {
                    return $q->matching('Tags', function($q) {
                        return $q->where(['Tags.id IN' => $this->getUserTagsQuery()]);
                    });
                });
            })->toArray();
    }
    //</editor-fold>

    //<editor-fold description="public Methods">
    //</editor-fold>

    public function getMatches(){

        foreach($this->getRecordingMatches() as $recordingMatch){
            $this->addMatch($recordingMatch->user_id, $recordingMatch->count, $this->getUserRecordingsQuery());
            //$this->addRecordingMatch($recordingMatch->user_id, $recordingMatch->count);
        }

        foreach($this->getArtistMatches() as $artistMatch){
            $this->addMatch($artistMatch->user_id, $artistMatch->count, $this->getUserArtistsQuery(), 0.75);
            //$this->addArtistMatch($artistMatch->user_id, $artistMatch->count);
        }

        foreach($this->getTagMatches() as $tagMatch){
            $this->addMatch($tagMatch->user_id, $tagMatch->count, $this->getUserTagsQuery(), 0.25);
            //$this->addTagMatch($tagMatch->user_id, $tagMatch->count);
        }

        foreach($this->matches as $match){
            $match->setUsername(UsersManager::getUsernameById($match->getUserId()));
        }
        return $this->matches;
        /*
        $matchesRecordings = TableRegistry::get('UsersPreferredTitles')->find('all')
            ->select('user_id')
            ->where([
                'user_id NOT IN' => $this->meAndAlreadyConnectedUsersIds,
                'recording_id IN' => $this->getUserRecordingsQuery()
            ]);

        $matchesArtists = TableRegistry::get('UsersPreferredTitles')->find('all')
            ->where([
                'user_id NOT IN' => $this->meAndAlreadyConnectedUsersIds
            ])
            ->select('user_id')
            ->matching('Recordings', function($q) {
                return $q->where([
                    'Recordings.Artist_id IN ' => $this->getUserArtistsQuery(),
                    'recording_id NOT IN' => $this->getUserRecordingsQuery()
                ]);
            });

        $matchesTags = TableRegistry::get('UsersPreferredTitles')->find('all')
            ->where([
                'user_id NOT IN' => $this->meAndAlreadyConnectedUsersIds
            ])
            ->select('user_id')
            ->matching('Recordings', function ($q) {
                return $q->where([
                    'Recordings.Artist_id NOT IN ' => $userArtists,
                    'recording_id NOT IN' => $userRecordings
                ])->matching('Artists', function ($q) use ($userTags){
                    return $q->matching('Tags', function($q) use ($userTags) {
                        return $q->where(['Tags.id IN' => $userTags]);
                    });
                });
            });

        */

        return $result;
    }
    //</editor-fold>
}