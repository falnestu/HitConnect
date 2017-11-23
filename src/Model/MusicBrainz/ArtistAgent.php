<?php
/**
 * Created by PhpStorm.
 * User: esaphp
 * Date: 23.11.17
 * Time: 15:48
 */

namespace App\Model\MusicBrainz;


class ArtistAgent extends BaseMusicBrainzAgent
{
    protected $entity = 'artist';

    public function __construct()
    {
        parent::__construct();
    }
}