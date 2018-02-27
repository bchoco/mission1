<?php
    namespace Admin\Controller;
    use Think\Controller;

    class PublicController extends Controller {

        public $token;

        public function __construct(){
            parent::__construct();
            // 生成token
            $this->token = substr(getUUID(),0,6);
        }

        public function login() {
            if (session('username')){
                $this->redirect('Index/index');
            }
            $this->display('Public/login');
        }

        public function check() {
            //var_dump($this->token);exit;
            if(IS_POST) {
                $username = I('post.username');
                $password = I('post.password');

                $usr = M('Users');
                // 登录验证
                $res = $usr->where(array('usn'=>$username))->find();
                if($res) {
                    $p1 = md5($password.$res['salt']);
                    if ($p1 === $res['pwd']){
                        // 成功
                        session('username',$res['usn']);
                        session('utoken',$this->token);
                        session('avatar',$res['avatar']);

                        $data['token'] = $this->token;
                        $usr->where(array('usn'=>$username))->field('token')->save($data);

                        redirect('/admin/index/index', 0);
                    }else{
                        // 失败
                        $this->error('密码错误');
                    }
                } else {
                    // 失败
                    $this->error('用户不存在');
                }
            } else {
                $this->error('非法请求');
            }
        }


        public function logout() {
            //删除所有session
            session(null);
            $this->redirect('login');
        }

    }
?>