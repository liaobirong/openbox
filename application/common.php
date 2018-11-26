<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
function getTree($data, $pId)
{
    $tree = '';
    foreach($data as $k => $v)
    {
        if($v['cparentid'] == $pId)
        { //父亲找到儿子
            $v['cparentid'] = getTree($data, $v['cid']);
            $tree[] = $v;
            //unset($data[$k]);
        }
    }
    return $tree;
}