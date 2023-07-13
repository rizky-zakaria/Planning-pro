<?php

namespace App\Providers;

use App\Models\Durasi;
use App\Models\Proyek;
use App\Models\Rab;
use App\Models\Uraian;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer([
            'layouts.dashboard.template',
            'dashboard.admin.dashboard',
            'dashboard.direktur.dashboard',
            'dashboard.estimator.dashboard',
            'dashboard.draftek.dashboard',
        ], function ($view) {
            $user = Auth::user();
            $proyekCount = Proyek::count();
            $rabCount = Rab::count();
            $uraianCount = Uraian::count();
            $waktuCount = Durasi::count();
            $view->with([
                'user' => $user,
                'proyekCount' => $proyekCount,
                'rabCount' => $rabCount,
                'uraianCount' => $uraianCount,
                'waktuCount' => $waktuCount,
            ]);
        });
    }
}
