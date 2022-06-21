<?php

namespace App\Repository;

use App\Models\User;

interface UserRepository
{
    public function list();
    public function get(int $id);
    public function getNotes(int $plantId);
    public function getUserNote(int $plantId, int $userId);
    public function createNote(int $userId, array $data);
    public function updateNote(int $plantId, int $userId, int $noteId): void;
    public function updateModel(User $user, array $data): void;
}
