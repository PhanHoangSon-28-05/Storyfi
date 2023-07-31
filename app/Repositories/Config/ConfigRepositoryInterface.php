<?php

namespace App\Repositories\Config;

use App\Repositories\RepositoryInterface;

interface ConfigRepositoryInterface extends RepositoryInterface
{
    public function getConfig($key);

    public function addConfig($attributes = []);
    public function updateConfig($id, $attributes = []);
    public function deleteConfig($id);
}
