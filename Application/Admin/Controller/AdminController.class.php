<?php
    namespace Admin\Controller;

    class AdminController extends BaseController {
        public function index() {
            $this->display('Admin/index');
        }

        public function lst() {
            $adminmodel = D('Admin');
            $list = array();
            foreach($adminmodel->relation(true)->select() as $row) {
                $row['lastlogintime'] = date('Y-m-d H:i:s',$row['lastlogintime']);
                $list[] = $row;
            }
            $data = array(
                'data'=>$list
            );
            $this->ajaxReturn($data);
        }
    }
?>