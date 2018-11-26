<?php
namespace app\index\controller;
use think\Db;
use think\Request;
use think\Session;
class Channel
{
    public function manger()//渠道列表
    {
        $user = Session::get('u');
        $term = DB::table('t_dealer')->select();
        return view ('Channel/manger');
    }

    public function add()//渠道添加
    {
        if(Request::instance()->isPost()){
            $tousername = input('username');//用户名称
            $topwd = input('password');//用户密码
            $tosurepwd = input('surepassword');//用户确认密码
            $tochannelname = input('channelname');//渠道名称
            $tochanneldivide = input('channelname');//渠道分成
            if($topwd !== $tosurepwd){
                return json(array('code'=>404,'msg'=> '请填写一致的密码'));
            }

            $validate = new \think\Validate;
            $validate->rule('username|用户名称', 'require|max:18')
                ->rule([
                    'password|用户密码'  => 'require|max:30',
                    'channelname|渠道名称'  => 'require|max:20',
                ]);
            $data = [
                'username'  => $tousername,
                'password' => $topwd,
                'channelname' => $tochannelname
            ];
            if (!$validate->check($data)) {
                return json(array('code'=>404,'msg'=>$validate->getError()));
            }
            $where =array(

            );


        }
        return view('Channel/add');
    }
}