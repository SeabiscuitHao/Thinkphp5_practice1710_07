<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
class Base extends Controller
{
    public function _initialize()
    {
        $this -> right();
        $cateres = Db::name('cate') -> order('id asc') -> select();
        $this -> assign('cateres',$cateres);
    }
    public function right()
    {
      $clickres = Db::name('article') -> order('click desc') -> limit(8) -> select();
      $tjres = Db::name('article') -> where('state','=',1) -> order('click desc') -> limit(8) -> select();
      $this -> assign(array(
        'clickres' => $clickres,
        'tjres' => $tjres,
      ));
    }
}
