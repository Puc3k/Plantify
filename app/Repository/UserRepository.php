<?php

namespace App\Repository;

interface UserRepository
{
    public function list();
    public function get(int $id);

}
