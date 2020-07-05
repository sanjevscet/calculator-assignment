<?php

namespace App\Services;
use App\Store;

/**
 * Our Store Service to Save, retrieve & clear the user value
 */
final class StoreService implements IStore
{

    /**
     *  Store value in DB
     *
     * @param float $value
     *
     * @return bool
     */
    public function save(float $value): bool
    {
        $store = Store::first();
        $id = $store ? $store->id : 1;
        $updateOrCreate = Store::updateOrCreate(
            ['id' => $id],
            ['value' => $value]
        );

        return !!$updateOrCreate;
    }

    /**
     *  Retrieve the stored value
     *
     * @return float|null
     */
    public function retrieve(): ?float
    {
        $store = Store::first();

        return $store ? $store->value : null;
    }

    /**
     * Clear the stored value
     *
     * @return void
     */
    public function clear(): void
    {
        Store::query()->delete();
    }
}
