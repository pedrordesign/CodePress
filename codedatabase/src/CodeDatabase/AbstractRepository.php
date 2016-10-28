<?php

namespace CodePress\CodeDatabase;

use CodePress\CodeDatabase\Contracts\RepositoryInterface;

abstract class AbstractRepository implements RepositoryInterface{

    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    public abstract function model();

    public function makeModel(){
        $class = $this->model();
        $this->model = new $class;
        return $this->model;
    }

}