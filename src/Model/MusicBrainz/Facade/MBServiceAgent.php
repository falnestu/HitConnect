<?php
/**
 * Created by PhpStorm.
 * User: esaphp
 * Date: 23.11.17
 * Time: 14:52
 */

namespace App\Model\MusicBrainz\Facade;

use App\Model\MusicBrainz\RecordingAgent;

class MBServiceAgent
{
    public static function recording()
    {
        return new RecordingAgent();
    }
}