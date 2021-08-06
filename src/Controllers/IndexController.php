<?php
namespace App\Plugins\FuckYou\src\Controllers;

use Dcat\Admin\Widgets\Card;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Widgets\Markdown;
use App\Http\Controllers\Controller;

class IndexController extends Controller{

    public function show(Content $content){
        $content->title('FuckYou插件');
        $content->header('FuckYou插件');
        $content->description('FuckYou插件信息');
        $content->body(Card::make(
            Markdown::make(read_file(plugin_path("FuckYou/README.md")))
        ));
        return $content;
    }
    
}