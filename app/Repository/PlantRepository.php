<?php

namespace App\Repository;

interface PlantRepository
{
    public function filterBy(?string $phrase, int $size = 15);

}
