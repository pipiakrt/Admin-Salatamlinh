<?php

namespace App\Observers;

use App\Models\Category as Model;
use \Illuminate\Support\Facades\Log;

class Category
{
    /**
     * Handle the Category "created" event.
     *
     * @param  \App\Models\Model  $category
     * @return void
     */
    public function created(Model $category)
    {
        //
    }

    /**
     * Handle the Category "updated" event.
     *
     * @param  \App\Models\Model  $category
     * @return void
     */
    public function updated(Model $category)
    {
        //
    }

    /**
     * Handle the Category "deleted" event.
     *
     * @param  \App\Models\Model  $category
     * @return void
     */
    public function deleted(Model $category)
    {
        //
    }

    /**
     * Handle the Category "restored" event.
     *
     * @param  \App\Models\Model  $category
     * @return void
     */
    public function restored(Model $category)
    {
        //
    }

    /**
     * Handle the Category "force deleted" event.
     *
     * @param  \App\Models\Model  $category
     * @return void
     */
    public function forceDeleted(Model $category)
    {
        //
    }
}
