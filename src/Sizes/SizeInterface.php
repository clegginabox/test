<?php

namespace App\Sizes;

interface SizeInterface
{
    /**
     * @param array $data
     *
     * @return array
     */
    public function sort(array $data): array;
}
