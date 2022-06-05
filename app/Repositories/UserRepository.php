<?php

namespace App\Repositories;

namespace App\Repository;

use Illuminate\Support\Collection;

interface UserRepository
{
    public function list(): Collection;
    public function get(int $id);

}
