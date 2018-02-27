<?php
namespace Admin\Controller;

class AuthorityController extends BaseController {
    // 管理员维护
    public function admin(){
        // 获取部门列表
        $res0 = M('Department')->field('did,dname,dpid')->select();
        $res1 = generateTree($res0,'did','dpid');
        $dept = getTreeData($res1);

        $this->assign('deptInfo',$dept);
        $this->display();
    }

    // 获取管理员列表
    public function lists(){
        if (IS_AJAX){
            $u = M('Users');

            $list = $u
                ->alias('u')
                ->join('left join ms_role r on u.roleid = r.roid')
                ->join('left join ms_department d on u.dept=d.did')
                ->select();

            foreach ($list as $k=>$v){
                if ($list[$k]['logintime'] == 0){
                    $list[$k]['logintime'] = '--';
                }else{
                    $list[$k]['logintime'] = date('Y-m-d H:i:s',$v['logintime']);
                }
            }

            $data = array(
                'data'=>$list
            );

            $this->ajaxReturn($data);
        }

    }

    // 获取用户信息
    public function getInfoUid(){
        if (IS_AJAX){
            $uid = I('post.uid');
            $result = M('Users')
                ->where(array('muid'=>(int)$uid))
                ->find();

            if (empty($result)){
                $data = array('m'=>'error');
            }else{
                $data = array('m'=>'ok','d'=>$result);
            }

            $this->ajaxReturn($data);
        }
    }

    // 新增用户(管理员)
    public function addAdmin(){
        if (IS_AJAX){
            $name = I('post.name');
            $pwd = I('post.pwd');
            $dept = I('post.dept');
            $status = I('post.status');

            // 处理数据
            $salt = substr(getUUID(),0,5);
            $pwd = md5($pwd.$salt);

            // 写入
            $d['usn'] = $name;
            $d['pwd'] = $pwd;
            $d['createtime'] = time();
            $d['ustatus'] = $status;
            $d['roleid'] = 2;
            $d['salt'] = $salt;
            $d['dept'] = $dept;

            $res = M('Users')->add($d);
            if ($res){
                $data = array('m'=>'ok');
            }else{
                $data = array('m'=>'error');
            }

            $this->ajaxReturn($data);
        }
    }

    // 修改管理员
    public function editAdmin(){
        if (IS_AJAX){
            $name = I('post.name');
            $pwd = I('post.pwd');
            $dept = I('post.dept');
            $status = I('post.status');
            $uid = I('post.uid');

            // 处理数据
            $adm = M('Users');
            $tmp = $adm->where(array('muid'=>$uid))->field('salt')->find();
            $salt = $tmp['salt'];
            $pwd = md5($pwd.$salt);

            // 写入
            $d['usn'] = $name;
            $d['pwd'] = $pwd;
            $d['updatetime'] = time();
            $d['ustatus'] = $status;
            $d['roleid'] = 2;
            $d['dept'] = $dept;

            $res = M('Users')->where(array('muid'=>$uid))->save($d);
            if ($res){
                $data = array('m'=>'ok');
            }else{
                $data = array('m'=>'error','d'=>$d);
            }

            $this->ajaxReturn($data);
        }

    }

    // 部门维护
    public function role(){
        // 获取管理组架构
        $tmp0 = M('Role')->select();
        $tmp1 = generateTree($tmp0,'roid','ropid');
        $roleInfo = getTreeData($tmp1);

        // 获取所有权限架构
        $r0 = M('Rule')->field('ruleid,ruleitem,rulepid')->select();
        $r1 = generateTree($r0,'ruleid','rulepid');

        $html = '<ul id="tree1">';
        foreach($r1 as $v){
            $html .= '<li><span>'.$v['ruleid'].'-'.$v['ruleitem'].'</span>';
                if (isset($v['son'])){
                    $html .= '<ul>';
                    foreach($v['son'] as $vs){
                        $html .= '<li><span>'.$vs['ruleid'].'-'.$vs['ruleitem'].'</span></li>';
                    }
                    $html .= '</ul>';
                }
            $html .= '</li>';
        }
        $html .= '</ul>';

        /*echo  "<pre/>";
        var_export($html);
        exit;*/

        $this->assign('roleInfo',$roleInfo);
        $this->assign('html',$html);
        $this->display();
    }

    // 获取组列表
    public function rolelists(){
        $role = M('Role');

        $list = $role->select();

        $data = array(
            'data'=>$list
        );

        $this->ajaxReturn($data);
    }

    //插入新管理组
    public function insertRole(){
        if (IS_AJAX){
            $name = I('post.name');
            $parent = I('post.parent');
            $privilege = I('post.privilege');

            $data['ropid'] = $parent;
            $data['roname'] = $name;
            $data['rules'] = implode(',',$privilege);

            $res = M('Role')->add($data);

            if ($res == false){
                $re = array('m'=>'ok');
            }else{
                $re = array('m'=>'error');
            }

            $this->ajaxReturn($re);
        }
    }

    // 获取管理组信息
    public function getInfoRid(){
        if (IS_AJAX){
            // 基本信息
            $roleid = I('post.roleid');
            $res = M('Role')->where(array('roid'=>$roleid))->find();
            $rules = explode(',',$res['rules']);

            // 权限树
            $tmp = M('Rule')->select();
            $tmp0 = generateTree($tmp,'ruleid','rulepid');
            $tree_data = getTreeData($tmp0);
            //$data = [
            //  { id: ruleid, pid: rulepid, text: roleitem },
            //  { id: 1001, pid: wdepartment, text: wname },
            //  ]
            $data = [];
            foreach ($tree_data as $k=>$v){
                $data[$k]['id']   = $v['ruleid'];
                $data[$k]['pid']  = $v['rulepid'];
                $data[$k]['text'] = $v['ruleitem'];
                if (in_array($v['ruleid'],$rules) || $rules === ['*']){
                    $data[$k]['ischecked'] = true;
                }
            }

            if ($res){
                $arr = array('m'=>'ok','d'=>$res,'t'=>$data);
            }else{
                $arr = array('m'=>'error');
            }

            $this->ajaxReturn($arr);
        }
    }

    public function editRole(){
        if (IS_AJAX){
            $roid = I('post.r_id');
            $roname = I('post.r_name');
            $ropid = I('post.r_parent');
            $rules = I('post.r_priv');

            $data['roname'] = $roname;
            $data['ropid'] = $ropid;
            $data['rules'] = implode(',',$rules);

            $res = M('Role')->where(array('roid'=>$roid))->save($data);
            if ($res === false){
                $r = array('m'=>'error');
            }else{
                $r = array('m'=>'ok');
            }

            $this->ajaxReturn($r);
        }
    }
}