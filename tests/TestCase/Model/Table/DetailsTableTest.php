<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DetailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DetailsTable Test Case
 */
class DetailsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DetailsTable
     */
    protected $Details;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Details',
        'app.Contacts',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Details') ? [] : ['className' => DetailsTable::class];
        $this->Details = TableRegistry::getTableLocator()->get('Details', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Details);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
