<?php

namespace CodePress\CodeDatabase;

use CodePress\CodeDatabase\Contracts\RepositoryInterface;
interface CriteriaInterface{
    public function apply($model, RepositoryInterface $repository);
}