<?php
namespace app\index\controller;
use think\Db;
use think\Request;
use think\Session;
class Menu
{
    public function lists()
    {
        return view ('Menu/lists');
    }



}