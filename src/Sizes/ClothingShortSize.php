<?php

namespace App\Sizes;

use App\Model\Size;

class ClothingShortSize implements SizeInterface
{
    private static $sizes = [
        'XS',
        'S',
        'M',
        'L',
        'XL',
        'XXL',
        'XXXL',
        'XXXXL'
    ];

    /**
     * @inheritdoc
     */
    public function sort(array $data): array
    {
        $sizes = self::$sizes;

        usort($data, function (Size $a, Size $b) use ($sizes) {
            $positionA = array_search($a->size(), $sizes);
            $positionB = array_search($b->size(), $sizes);

            return $positionA <=> $positionB;
        });

        return $data;
    }
}
