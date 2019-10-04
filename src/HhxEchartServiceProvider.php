<?php

namespace Encore\HhxEchart;

use Encore\Admin\Admin;
use Illuminate\Support\ServiceProvider;

class HhxEchartServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot(HhxEchart $extension)
    {
        if (! HhxEchart::boot()) {
            return ;
        }

        if ($views = $extension->views()) {
            $this->loadViewsFrom($views, 'HhxEchart');
        }


        if ($this->app->runningInConsole() && $assets = $extension->assets()) {
            $this->publishes(
                [$assets => public_path('vendor/laravel-admin-ext/Hhxechart')],
                'Hhxechart'
            );
        }

//        $this->app->booted(function () {
//            HhxEchart::routes(__DIR__.'/../routes/web.php');
//        });
        Admin::booting(function () {
            Admin::js('vendor/laravel-admin-ext/Hhxechart/echarts.min.js');
        });
    }
}