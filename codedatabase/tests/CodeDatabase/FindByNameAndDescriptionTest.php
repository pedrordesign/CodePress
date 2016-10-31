<?php

namespace CodePress\CodeDatabase\Tests;

use CodePress\CodeDatabase\Criteria\FindByNameAndDescription;
use CodePress\CodeDatabase\Models\Category;
use CodePress\CodeDatabase\Repository\CategoryRepository;
use CodePress\CodeDatabase\Contracts\CriteriaInterface;
use Mockery as m;

class FindByNameAndDescriptionTest extends AbstractTestCase
{
    /**
     * @var CategoryRepository
     */
    private $repository;

    private $criteria;

    public function setUp()
    {
        parent::setUp();
        $this->migrate();
        $this->repository = new CategoryRepository();
        $this->criteria = new FindByNameAndDescription();
        $this->createCategory();
    }

    public function test_if_is_instanceof_criteria_interface()
    {
        $this->assertInstanceOf(CriteriaInterface::class, $this->criteria);
    }

    public function createCategory()
    {
        Category::create([
            'name' => 'Category 1',
            'description' => 'Description 1'
        ]);
        Category::create([
            'name' => 'Category 2',
            'description' => 'Description 2'
        ]);
        Category::create([
            'name' => 'Category 3',
            'description' => 'Description 3'
        ]);

    }

}