<?php
namespace App\Plugins\FuckYou;

use Dcat\Admin\Admin;
use Dcat\Admin\Layout\Menu;
use Illuminate\Support\Facades\Route;
use App\Plugins\FuckYou\src\database\create;
use App\Plugins\FuckYou\src\Controllers\IndexController;
use App\Plugins\FuckYou\src\Controllers\FuckyouController;

class boot {
    public function handle(){
        // $this->route();
        $this->menu();
        $this->route();
        $this->SqlReg();
    }

    // 定义插件路由
    public function route(){
        Route::group([
            'prefix'     => config('admin.route.prefix'),
            'middleware' => config('admin.route.middleware'),
        ], function () {
            // Route::get('fuduji', [IndexController::class,'show']);
            Route::prefix('fuck')->group(function () {
                Route::get('/info', [IndexController::class,'show']);
                Route::get('/', [FuckyouController::class,'index']);
                Route::post('/', [FuckyouController::class,'store']);
                Route::get('/{id}/edit', [FuckyouController::class,'edit']);
                Route::get('/{id}', [FuckyouController::class,'show']);
                Route::delete('/{id}', [FuckyouController::class,'destroy']);
                Route::put('/{id}', [FuckyouController::class,'update']);
                Route::get('/create', [FuckyouController::class,'create']);
            });
        });        
    }

    public function menu(){
        // 注册菜单
        Admin::menu(function (Menu $menu) {
            $menu->add([
                [
                    'id'            => 100, // 此id只要保证当前的数组中是唯一的即可
                    'title'         => 'FuckYou',
                    'icon'          => 'feather icon-printer',
                    'uri'           => 'fuduji',
                    'parent_id'     => 0, 
                    'permission_id' => 'administrator', // 与权限绑定
                    'roles'         => 'administrator', // 与角色绑定
                ],   
                [
                    'id'            => 101, // 此id只要保证当前的数组中是唯一的即可
                    'title'         => '说明',
                    'icon'          => '',
                    'uri'           => 'fuck/info',
                    'parent_id'     => 100, 
                    'permission_id' => 'administrator', // 与权限绑定
                    'roles'         => 'administrator', // 与角色绑定
                ],
                [
                    'id'            => 102, // 此id只要保证当前的数组中是唯一的即可
                    'title'         => '管理',
                    'icon'          => '',
                    'uri'           => 'fuck',
                    'parent_id'     => 100, 
                    'permission_id' => 'administrator', // 与权限绑定
                    'roles'         => 'administrator', // 与角色绑定
                ]
            ]);
        });
    }
    public function SqlReg(){
        (new create())->up();
    }
}