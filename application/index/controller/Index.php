<?php
namespace app\index\controller;
use think\Db;
use think\Request;
use think\Session;
class Index
{
    public function index()
    {
        $term = Db::table('t_channel')->select();
        $tree = getTree($term, 0);
        print_r($tree);
    }

    public function login()
    {
        if(Request::instance()->isPost()){
           $toaccount = input('account');
           $topwd = input('password');
           if(empty($toaccount)){
               return json(array('code'=>404,'msg'=>'登录账号不能为空'));
           }
           if(empty($topwd)){
               return json(array('code'=> 404,'msg'=>'登录密码不能为空'));
           }

           $suser = Db::table('t_dealer')->where(['account'=> $toaccount])->find();
          if(empty($suser)){
              return json(array('code'=>404,'msg'=>'登录账号不正确'));
          }
            if(password_verify($topwd, $suser['password'])) {//判断登录密码是否正确
                Session::set('u',$suser);
                return json(array('code'=>200));
               // return view('Menu/lists');
            }else{
                return json(array('code'=>404,'msg'=>'请输入正确的登录密码'));
            }

           //  $password = '123456';
           //  $options = [
           //      'cost' => 11, // 默认是10，用来指明算法递归的层数
           //      'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
           //  ];
           //  $crypt = password_hash($password, PASSWORD_DEFAULT, $options);
        }
        return view('Index/login');
    }
}
