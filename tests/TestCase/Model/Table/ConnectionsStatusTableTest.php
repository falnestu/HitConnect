<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ConnectionsStatusTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ConnectionsStatusTable Test Case
 */
class ConnectionsStatusTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ConnectionsStatusTable
     */
    public $ConnectionsStatus;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.connections_status',
        'app.connections',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ConnectionsStatus') ? [] : ['className' => ConnectionsStatusTable::class];
        $this->ConnectionsStatus = TableRegistry::get('ConnectionsStatus', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ConnectionsStatus);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
