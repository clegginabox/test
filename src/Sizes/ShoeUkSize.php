<?php

namespace App\Sizes;

use App\Model\Size;

class ShoeUkSize implements SizeInterface
{
    /**
     * @inheritdoc
     */
    public function sort(array $data): array
    {
        $adultSizes = array_filter($data, function ($value) {
            return strpos($value->size(), '(Child)') === false;
        });

        $childSizes = array_filter($data, function ($value) {
            return strpos($value->size(), '(Child)') !== false;
        });

        $this->naturalStringSort($adultSizes);
        $this->naturalStringSort($childSizes);

        return array_merge($childSizes, $adultSizes);
    }

    /**
     * Natural sort by size string
     *
     * @param array $data
     */
    private function naturalStringSort(array &$data): void
    {
        usort($data, function (Size $a, Size $b) {
            return strnatcmp($a->size(), $b->size());
        });
    }
}
