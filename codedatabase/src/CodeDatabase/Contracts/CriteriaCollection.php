<?php

use CodePress\CodeDatabase\Contracts\CriteriaInterface;

interface CriteriaCollection{

    public function addCriteria(CriteriaInterface $criteria);

    public function getCriteriaCollection();

    public function getByCriteria(CriteriaInterface $CriteriaInterface);

    public function applyCriteria();

}