<?php

namespace App\Model;

class Size
{
    /**
     * @var string
     */
    private $sku;

    /**
     * @var
     */
    private $size;

    /**
     * Size constructor.
     *
     * @param string $sku
     * @param        $size
     */
    public function __construct(string $sku, string $size)
    {
        $this->sku  = $sku;
        $this->size = $size;
    }

    /**
     * @return string
     */
    public function sku(): string
    {
        return $this->sku;
    }

    /**
     * @return mixed
     */
    public function size(): string
    {
        return $this->size;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'SKU'  => $this->sku,
            'size' => $this->size
        ];
    }
}
