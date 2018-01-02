<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ArtistsTagsFixture
 *
 */
class ArtistsTagsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'artist_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'tag_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'artist_id' => ['type' => 'index', 'columns' => ['artist_id'], 'length' => []],
            'tag_id' => ['type' => 'index', 'columns' => ['tag_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['artist_id', 'tag_id'], 'length' => []],
            'artists_tags_ibfk_1' => ['type' => 'foreign', 'columns' => ['artist_id'], 'references' => ['artists', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'artists_tags_ibfk_2' => ['type' => 'foreign', 'columns' => ['tag_id'], 'references' => ['tags', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'artist_id' => 1,
            'tag_id' => 1
        ],
    ];
}
