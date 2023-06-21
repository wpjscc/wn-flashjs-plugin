<?php namespace Wpjscc\Flashjs\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Wpjscc\Flashjs\Models\Config;

class Index extends Controller
{
    public $implement = [    ];


    protected $publicActions = [
        'app',
        'index',
        'action',
    ];

    
    public function __construct()
    {
        parent::__construct();
    }

    public function app($identifier = null)
    {
        return response(
            str_replace(
                '{{endpoint}}',
                \Url::to('backend/wpjscc/flashjs/index/index/'.$identifier),
                file_get_contents(plugins_path(
                    'wpjscc/flashjs/assets/js/app.js'
                ))
            ),
            200, 
            ['Content-Type' => 'text/javascript']
        );
    }


    public function index($identifier = null)
    {
        return response()->json([
            'js' => [
                $this->combineAssets([
                    '/plugins/wpjscc/flashjs/assets/js/flash.min.js'
                ], $this->getLocalPath($this->assetPath))
            ],
            'css' => [
                $this->combineAssets([
                    '/plugins/wpjscc/flashjs/assets/js/flash.min.css'
                ], $this->getLocalPath($this->assetPath))
            ],
            'action' => [
                \Url::to('backend/wpjscc/flashjs/index/action/'.$identifier)
            ]
        ]);
    }


    public function action($identifier = null)
    {
        // todo 查询自定义的js
        return response(
            Config::where('identifier', $identifier)->first()->config ?? '',
            200,
            ['Content-Type' => 'text/javascript']
        );
        
        return response(file_get_contents(plugins_path(
            'wpjscc/flashjs/assets/js/action.js'
        )), 200, ['Content-Type' => 'text/javascript']);
    }

}
