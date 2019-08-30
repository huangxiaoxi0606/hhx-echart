<?php

namespace Encore\HhxEchart;

use Encore\Admin\Extension;

class HhxEchart extends Extension
{
    public $name = 'hhx-echart';

    public $views = __DIR__.'/../resources/views';

    public $assets = __DIR__.'/../resources/assets';

    public $menu = [
        'title' => 'Hhxechart',
        'path'  => 'hhx-echart',
        'icon'  => 'fa-gears',
    ];
    public static function __callStatic($name, $arguments)
    {
        return view('echarts::'.$name, $arguments[0]);
    }
}