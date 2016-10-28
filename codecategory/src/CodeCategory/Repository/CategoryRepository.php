<?php

namespace CodePress\CodeCategory\Repository;

use CodePress\CodeCategory\Models\Category;
use CodePress\CodeDatabase\AbstractRepository;

class CategoryRepository extends AbstractRepository
{

    public function columns($id, $columns = array('*'))
    {
        // TODO: Implement columns() method.
    }

    public function model()
    {
        return Category::class;
    }

}