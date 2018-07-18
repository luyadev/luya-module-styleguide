<?php

namespace luya\styleguide\assets;

class ResourcesAsset extends \luya\web\Asset
{
    public $sourcePath = '@styleguide/resources';
    
    public $js = [
        'dist/js/script.js'
    ];
    
    public $css = [
        'dist/css/main.css'
    ];
    
    public $publishOptions = [
        'only' => [
            'css/*',
            'js/*',
        ]
    ];
    
    public $depends = [
        // 'yii\web\JqueryAsset',
    ];
}
