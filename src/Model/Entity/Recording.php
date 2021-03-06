<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Recording Entity
 *
 * @property int $id
 * @property string $id_musicbrainz
 * @property string $label
 * @property int $artist_id
 */
class Recording extends Entity implements IMusicBrainzJsonParser
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'id_musicbrainz' => true,
        'label' => true,
        'artist_id' => true
    ];

    public static function ToEntity($json)
    {
        $artistjson =$json['artist-credit'][0]['artist'];
        $artist = Artist::ToEntity($artistjson);

        return new Recording([
            'label' => $json['title'],
            'id_musicbrainz' => $json['id'],
            'artist' => $artist
        ]);
    }
}
