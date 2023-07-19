<?php

namespace App\Repositories\Client\Home\Category;

use App\Repositories\RepositoryInterface;

interface CategoryRepositoryInterface extends RepositoryInterface
{
    public function getIndex_category();
    public function get_category($slug);
}
