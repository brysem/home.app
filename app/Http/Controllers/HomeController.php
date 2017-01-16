<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $app_path = '/Users/Atabix/Development/http/app/';
        $dev_path = '/Users/Atabix/Development/http/dev/';
        
        $apps = array_filter(glob($app_path.'*', GLOB_ONLYDIR), 'is_dir');
        $devs = array_filter(glob($dev_path.'*', GLOB_ONLYDIR), 'is_dir');
        
        $hosts['app'] = array_map(function($folder) {
            $name = basename($folder);
            return [
                'name' => str_replace(['_', '-'], ' ', ucwords($name)),
                'url' => "http://$name.app/",
                'icon' => 'https://www.gravatar.com/avatar/'.md5($name).'?d=identicon',
                'path' => $folder,
            ];
        }, $apps);
        
        $hosts['dev'] = array_map(function($folder) {
            $name = basename($folder);
            
            $subs = array_filter(glob($folder .'/*', GLOB_ONLYDIR), 'is_dir');
            
            $subs = array_map(function($folder) use ($name) {
                $sub = basename($folder);
                return [
                    'name' => str_replace(['_', '-'], ' ', ucwords($name)),
                    'url' => "http://$sub.$name.dev/",
                    'path' => $folder
                ];
            }, $subs);
            
            $url = "http://$name.dev/";
            if(count($subs) == 1) {
                $url = $subs[0]['url'];
            }
            
            return [
                'name' => str_replace(['_', '-'], ' ', ucwords($name)),
                'version' => $this->getVersion($folder),
                'url' => $url,
                'icon' => 'https://www.gravatar.com/avatar/'.md5($name).'?d=identicon',
                'path' => $folder,
                'subs' => $subs
            ];
        }, $devs);
        
        return view('home', compact('hosts'));
    }
    
    protected function getVersion($path)
    {
        $file = $path . '/' . '.php_version';
        if (file_exists($file)) {
            $version = floatval(trim(file_get_contents($file)));
            
            return $version;
        }
        
        return 0;
    }
}
