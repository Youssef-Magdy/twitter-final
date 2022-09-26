<?php

namespace App\Observers;

use App\Models\Posts;

class PostObserve
{
    /**
     * Handle the Posts "created" event.
     *
     * @param  \App\Models\Posts  $posts
     * @return void
     */
    public function creating(Posts $posts)
    {

        if(!empty(request()->id && empty(request()->comment_id))) {
            $posts->parent_id = request()->id;

        }elseif(!empty(request()->id && !empty(request()->comment_id))){
            $posts->parent_id = request()->comment_id;
        }
        
    }
   
   
     public function created(Posts $posts)
    {

         if(!empty(request()->id)) {
            $posts->base_id = request()->id;
        }else{
            $posts->base_id = $posts->id;
        }
        $posts->save();
    }

    /**
     * Handle the Posts "updated" event.
     *
     * @param  \App\Models\Posts  $posts
     * @return void
     */
    public function updated(Posts $posts)
    {
        //
    }

    /**
     * Handle the Posts "deleted" event.
     *
     * @param  \App\Models\Posts  $posts
     * @return void
     */
    public function deleted(Posts $posts)
    {
        //
    }

    /**
     * Handle the Posts "restored" event.
     *
     * @param  \App\Models\Posts  $posts
     * @return void
     */
    public function restored(Posts $posts)
    {
        //
    }

    /**
     * Handle the Posts "force deleted" event.
     *
     * @param  \App\Models\Posts  $posts
     * @return void
     */
    public function forceDeleted(Posts $posts)
    {
        //
    }
}
