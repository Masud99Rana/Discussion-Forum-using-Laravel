<?php

namespace LaravelForum\Providers;

use Illuminate\Support\ServiceProvider;


use LaravelForum\Channel;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        // View::share('channels',[
        //     'name' => 'channel111'
        // ]); //in blade file->{{$channels['name']}}

        // View::share('channels','channel1');
        //in blade file-> {{$channels}}
    

        View::share('channels',Channel::all());

    }
}
