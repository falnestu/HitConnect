<?php
/**
 * Created by PhpStorm.
 * User: esaphp
 * Date: 23.11.17
 * Time: 14:53
 */

namespace App\Model\MusicBrainz;


class RecordingAgent extends BaseMusicBrainzAgent
{
    protected $entity = 'recording';

    public function __construct()
    {
        parent::__construct();
    }
}