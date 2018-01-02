<?php
/**
 * Created by PhpStorm.
 * User: esaphp
 * Date: 23.11.17
 * Time: 15:48
 */

namespace App\Model\MusicBrainz;


use App\Model\Entity\Artist;

class ArtistAgent extends BaseMusicBrainzAgent
{
    protected $entity = 'Artist';

    public function __construct()
    {
        parent::__construct();
    }
}