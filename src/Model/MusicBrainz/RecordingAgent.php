<?php
/**
 * Created by PhpStorm.
 * User: esaphp
 * Date: 23.11.17
 * Time: 14:53
 */

namespace App\Model\MusicBrainz;


use App\Model\Entity\Artist;
use App\Model\Entity\Recording;

class RecordingAgent extends BaseMusicBrainzAgent
{
    protected $entity = 'Recording';

    public function __construct()
    {
        parent::__construct();
    }
}