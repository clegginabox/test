<?php

namespace App\Model;

class Product
{
    /**
     * @var string
     */
    private $plu;

    /**
     * @var string
     */
    private $name;

    /**
     * @var array
     */
    private $sizes = [];

    /**
     * Product constructor.
     *
     * @param string $plu
     * @param string $name
     * @param array  $sizes
     * @param string $sizeSort
     */
    public function __construct(string $plu, string $name, array $sizes, string $sizeSort)
    {
        $this->plu      = trim($plu);
        $this->name     = trim($name);
        $this->sizes[]  = new Size($sizes[0], $sizes[1]);
        $this->sizeSort = trim($sizeSort);
    }

    /**
     * @return string
     */
    public function plu(): string
    {
        return $this->plu;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function sizes(): array
    {
        return $this->sizes;
    }

    /**
     * @return string
     */
    public function sizeSort(): string
    {
        return $this->sizeSort;
    }

    /**
     * @param array $sizes
     */
    public function addSize(array $sizes)
    {
        $this->sizes = array_merge($this->sizes, $sizes);
    }

    /**
     * @param array $size
     */
    public function setSize(array $size)
    {
        $this->sizes = $size;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $product = [
            'plu'   => $this->plu,
            'name'  => $this->name,
        ];

        $sizes = [];

        foreach ($this->sizes as $size) {
            $sizes[] = $size->toArray();
        }

        $product['sizes'] = $sizes;

        return $product;
    }
}
