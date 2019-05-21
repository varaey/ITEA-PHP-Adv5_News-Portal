<?php
declare(strict_types=1);

namespace App\Model;

final class Category
{
    private $name;
    private $slug;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }
}
