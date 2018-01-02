<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ConnectionsFixture
 *
 */
class ConnectionsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'source_users_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'target_users_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'connections_status_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'timestamp', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'timestamp', 'length' => null, 'null' => false, 'default' => '0000-00-00 00:00:00', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'connections_status_id' => ['type' => 'index', 'columns' => ['connections_status_id'], 'length' => []],
            'source_users_id' => ['type' => 'index', 'columns' => ['source_users_id'], 'length' => []],
            'target_users_id' => ['type' => 'index', 'columns' => ['target_users_id'], 'length' => []],
        ],
        '_constraints' => [
            'connections_ibfk_1' => ['type' => 'foreign', 'columns' => ['connections_status_id'], 'references' => ['connections_status', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'connections_ibfk_2' => ['type' => 'foreign', 'columns' => ['source_users_id'], 'references' => ['users', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'connections_ibfk_3' => ['type' => 'foreign', 'columns' => ['target_users_id'], 'references' => ['users', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'id' => 1,
            'source_users_id' => 1,
            'target_users_id' => 1,
            'connections_status_id' => 1,
            'created' => 1513518305,
            'modified' => 1513518305
        ],
    ];
}
