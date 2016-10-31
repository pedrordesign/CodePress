<?php

namespace CodePress\CodeDatabase\Tests;

use CodePress\CodeDatabase\Contracts\CriteriaCollection;
use CodePress\CodeDatabase\Contracts\CriteriaInterface;
use CodePress\CodeDatabase\Criteria\FindByDescription;
use CodePress\CodeDatabase\Criteria\FindByNameAndDescription;
use CodePress\CodeDatabase\Criteria\OrderByNameDesc;
use CodePress\CodeDatabase\Models\Category;
use CodePress\CodeDatabase\Repository\CategoryRepository;

use Illuminate\Database\Eloquent\Builder;
use Mockery as m;

class CategoryRepositoryCriteriaTest extends AbstractTestCase
{
    /**
     * @var CategoryRepository
     */
    private $repository;
    private $globalDescriptionToTest = 'asdasdasdasd';
    public function setUp()
    {
        parent::setUp();
        $this->migrate();
        $this->repository = new CategoryRepository();
        $this->createCategory();
        $this->create_category_description_equals($this->globalDescriptionToTest);
    }

    public function test_if_is_instanceof_criteria_collection()
    {
        $this->assertInstanceOf(CriteriaCollection::class, $this->repository);
    }

    public function test_if_can_get_criteriacollection()
    {
        $result = $this->repository->getCriteriaCollection();
        $this->assertCount(0, $result);
    }

    public function test_if_can_add_criteria()
    {
        $mockCriteria = m::mock(CriteriaInterface::class);
        $result = $this->repository->addCriteria($mockCriteria);
        $this->assertInstanceOf(CategoryRepository::class, $result);
        $this->assertCount(1, $this->repository->getCriteriaCollection());
    }

    public function test_if_can_get_by_criteria()
    {
        $criteria = new FindByNameAndDescription('Category 1', 'Description 1');
        $repository = $this->repository->getByCriteria($criteria);
        $this->assertInstanceOf(CategoryRepository::class, $repository);

        $result = $repository->all();
        $this->assertCount(1, $result);
        $result = $result->first();
        $this->assertEquals($result->name, 'Category 1');
        $this->assertEquals($result->description, 'Description 1');

    }

    public function test_if_can_apply_criteria()
    {
        // CREATING CATEGORIES WITH SAME DESCRIPTION ON CONSTRUCTOR
        $criteria1 = new FindByDescription($this->globalDescriptionToTest);
        $criteria2 = new OrderByNameDesc();

        $this->repository
            ->addCriteria($criteria1)
            ->addCriteria($criteria2);

        $repository = $this->repository->applyCriteria();
        $this->assertInstanceOf(CategoryRepository::class, $repository);

        $result = $repository->all();
        $this->assertCount(2, $result);
        $this->assertEquals($result[0]->name, 'Category Um');
        $this->assertEquals($result[1]->name, 'Category Dois');
    }

    public function test_can_list_all_categories_with_criteria()
    {
        // CREATING CATEGORIES WITH SAME DESCRIPTION ON CONSTRUCTOR
        $criteria1 = new FindByDescription($this->globalDescriptionToTest);
        $criteria2 = new OrderByNameDesc();

        $this->repository
            ->addCriteria($criteria1)
            ->addCriteria($criteria2);

        $result = $this->repository->all();
        $this->assertCount(2, $result);
        $this->assertEquals($result[0]->name, 'Category Um');
        $this->assertEquals($result[1]->name, 'Category Dois');
    }

    private function create_category_description_equals($description)
    {
        Category::create([
            'name' => 'Category Dois',
            'description' => $description
        ]);
        Category::create([
            'name' => 'Category Um',
            'description' => $description
        ]);

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