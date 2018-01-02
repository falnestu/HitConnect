<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ArtistsTagsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ArtistsTagsTable Test Case
 */
class ArtistsTagsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ArtistsTagsTable
     */
    public $ArtistsTags;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.artists_tags',
        'app.artists',
        'app.tags'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ArtistsTags') ? [] : ['className' => ArtistsTagsTable::class];
        $this->ArtistsTags = TableRegistry::get('ArtistsTags', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ArtistsTags);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
