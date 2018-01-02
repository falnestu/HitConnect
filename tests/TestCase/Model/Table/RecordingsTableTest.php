<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RecordingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RecordingsTable Test Case
 */
class RecordingsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RecordingsTable
     */
    public $Recordings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.recordings'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Recordings') ? [] : ['className' => RecordingsTable::class];
        $this->Recordings = TableRegistry::get('Recordings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Recordings);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
