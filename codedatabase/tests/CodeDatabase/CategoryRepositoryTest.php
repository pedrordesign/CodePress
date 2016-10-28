<?php

namespace CodePress\CodeDatabase\Tests;

use CodePress\CodeDatabase\AbstractRepository;
use CodePress\CodeDatabase\Models\Category;
use CodePress\CodeDatabase\Repository\CategoryRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Mockery as m;

class CategoryRepositoryTest extends AbstractTestCase
{
    /**
     * @var CategoryRepository
     */
    private $repository;
    public function setUp()
    {
        parent::setUp();
        $this->migrate();
        $this->repository = new CategoryRepository();
        $this->createCategory();
    }

    public function test_can_model()
    {
        $this->assertEquals(Category::class, $this->repository->model());
    }

    public function test_if_can_make_model()
    {
        $result = $this->repository->makeModel();
        $this->assertInstanceOf(Category::class, $result);

        $reflectionClass = new \ReflectionClass($this->repository);
        $reflectionProperty = $reflectionClass->getProperty('model');
        $reflectionProperty->setAccessible(true);

        $result = $reflectionProperty ->getValue($this->repository);
        $this->assertInstanceOf(Category::class, $result);
    }

    public function test_can_make_model_in_constructor()
    {

        $reflectionClass = new \ReflectionClass($this->repository);
        $reflectionProperty = $reflectionClass->getProperty('model');
        $reflectionProperty->setAccessible(true);

        $result = $reflectionProperty ->getValue($this->repository);
        $this->assertInstanceOf(Category::class, $result);
    }

    public function test_can_list_all_categories()
    {
        $result = $this->repository->all();
        $this->assertCount(3, $result);
        $this->assertNotNull($result[0]->description);

        $result = $this->repository->all(['name']);
        $this->assertNull($result[0]->description);
    }

    public function test_can_create_category()
    {
        $result = $this->repository->create([
            'name' => 'Category 4',
            'description' => 'Description 4'
        ]);

        $this->assertInstanceOf(Category::class, $result);
        $this->assertEquals('Category 4', $result->name);
        $this->assertEquals('Description 4', $result->description);

        $result = Category::find(4);
        $this->assertEquals('Category 4', $result->name);
        $this->assertEquals('Description 4', $result->description);
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