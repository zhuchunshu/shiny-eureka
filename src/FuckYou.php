<?php

namespace App\Plugins\FuckYou\src;

use App\Plugins\FuckYou\src\Models\FuckYou as Model;

class FuckYou {
    /**
     * 接收到的数据
     *
     * @var object
     */
    public $data;

    /**
     * 插件信息
     *
     * @var array
     */
    public $value;
    
    public $order;

    public $orderCount;

    /**
     * 注册方法
     *
     * @param object 接收到的数据 $data
     * @param array 插件信息 $value
     * @return void
     */
    public function register($data,$value){
        $this->data = $data;
        $this->value = $value;
        $this->order = $order = GetZhiling($data,"#");
        $this->orderCount = count($order);
        $this->boot();
    }

    public function boot(){
        if(Model::where(["qq" => $this->data->user_id,"group" => $this->data->group_id])->count()){
            sendMsg([
                "message_id" => $this->data->message_id
            ],"delete_msg");
        }else if(Model::where("qq",$this->data->user_id)
        ->where("group","=",null)
        ->count()){
            sendMsg([
                "message_id" => $this->data->message_id
            ],"delete_msg");
        }
    }
}