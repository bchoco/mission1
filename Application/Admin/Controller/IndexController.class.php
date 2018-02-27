<?php
    namespace Admin\Controller;

    class IndexController extends BaseController {
        public function index() {
            $menu = D('Rule');
            $row = M('Users')->where("usn='".session('username')."'")->find();

            $roleid = $row['roleid'];
            $rules = M('Role')->where(array('roid'=>$roleid))->find();

            if ($rules['rules'] === '*'){
                // 超级管理员
                $menuA = $menu->where(array('rulepid'=>0))->select();
                $menuB = $menu->where('rulepid != 0')->select();
            }else{
                $sql1 = "select * from ms_rule where ruleid in ({$rules['rules']}) and rulepid=0 order by ruleid asc";
                $sql2 = "select * from ms_rule where ruleid in ({$rules['rules']}) order by ruleid asc";
                $menuA = $menu->query($sql1);
                $menuB = $menu->query($sql2);
            }

            $this->assign('menuA',$menuA);
            $this->assign('menuB',$menuB);
            $this->display('Index/index');
        }

        public function main() {
            $os = get_os();
            $software = $_SERVER['SERVER_SOFTWARE'];
            $this->assign('os',$os);
            $this->assign('software',$software);
            $this->assign('version',PHP_VERSION);
            $this->assign('sapi',php_sapi_name());
            $this->assign('mysql','mysql');
            $this->assign('tp',THINK_VERSION);
            $this->assign('uploadmax',ini_get('upload_max_filesize'));
            $this->display('Index/main');
        }
    }