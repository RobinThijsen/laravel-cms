<?php

namespace LaravelCMS\Trait;

use LaravelCMS\Exceptions\NoTableForSortable;

trait LaravelCMSTrait
{
    public ?string $table = null;
    public string $sortedBy = 'id';
    public string $sortedDirection = 'asc';

    /**
     * @throws NoTableForSortable
     */
    public function getBy(): string
    {
        if (is_null($this->table)) {
            throw new NoTableForSortable();
        }

        return "{$this->table}.{$this->sortedBy}";
    }

    public function toggleDirection(): void
    {
        $this->sortedDirection = $this->sortedDirection === 'asc' ? 'desc' : 'asc';
    }
}
