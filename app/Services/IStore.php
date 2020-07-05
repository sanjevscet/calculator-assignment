<?php

namespace App\Services;

/**
 * Interface for Store, declaring functions for StoreService
 */
Interface IStore
{
    /**
     *  Store value in DB
     *
     * @param float $value
     *
     * @return bool
     */
    public function save(float $value): bool;


    /**
     *  Retrieve the stored value
     *
     * @return float|null
     */
    public function retrieve(): ?float;

    /**
     * Clear the stored value
     *
     * @return void
     */
    public function clear(): void;
}
