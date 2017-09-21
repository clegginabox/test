<?php

namespace App\Sizes;

use App\Model\Size;

class ShoeEuSize implements SizeInterface
{
    /**
     * @inheritdoc
     */
    public function sort(array $data): array
    {
        usort($data, function(Size $a, Size $b) {
            return $a->size() <=> $b->size();
        });

        return $data;
    }
}
