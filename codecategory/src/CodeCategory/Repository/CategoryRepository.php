<?php

namespace CodePress\CodeCategory\Repository;

use CodePress\CodeDatabase\AbstractRepository;
use CodePress\CodeDatabase\Models\Category;

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