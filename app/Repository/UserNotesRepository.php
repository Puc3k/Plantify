<?php

namespace App\Repository;

use App\Models\User;

interface UserNotesRepository
{
    public function updateModel(User $user, array $data);
    public function all();
    public function get(int $id);

}
