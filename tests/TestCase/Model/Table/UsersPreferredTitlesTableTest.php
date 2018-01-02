<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersPreferredTitlesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersPreferredTitlesTable Test Case
 */
class UsersPreferredTitlesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersPreferredTitlesTable
     */
    public $UsersPreferredTitles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users_preferred_titles',
        'app.users',
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
        $config = TableRegistry::exists('UsersPreferredTitles') ? [] : ['className' => UsersPreferredTitlesTable::class];
        $this->UsersPreferredTitles = TableRegistry::get('UsersPreferredTitles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UsersPreferredTitles);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
