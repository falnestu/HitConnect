<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Artist Entity
 *
 * @property int $id
 * @property string $id_musicbrainz
 * @property string $label
 */
class Artist extends Entity implements IJsonParser
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
        'label' => true
    ];

    public static function ToEntity($json)
    {
        // TODO: Implement ToEntity() method.
    }
}
