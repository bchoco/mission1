<?php
namespace Admin\Controller;

class LaborTimeController extends BaseController {
    // 合同工时维护
    public function labortimeedit(){
        // 雇员状态
        $empl = array('normal','vacation','hidden');
        // 部门架构
        $res0 = M('Department')->field('did,dname,dpid')->select();
        $res1 = generateTree($res0,'did','dpid');
        $dept = getTreeData($res1);

        $this->assign('deptInfo',$dept);
        $this->assign('empl',$empl);
        $this->display();
    }

    // ajax显示员工列表
    public function lists(){
        $workers = D('Workers');

        $list = $workers
            ->alias('w')
            ->join('ms_department d on w.wdepartment = d.did')
            ->select();

        $data = array(
            'data'=>$list
        );

        $this->ajaxReturn($data);
    }

    // 添加雇员
    public function addEmployee(){
        if (IS_AJAX){
            $ename = I('post.ename');
            $edept = I('post.edept');
            $ehours = I('post.ehours');
            $etel = I('post.etel');
            $esta = I('post.esta');

            $data['wname'] = $ename;
            $data['wdepartment'] = $edept;
            $data['wstatus'] = $esta;
            $data['wlaborhours'] = round($ehours,2);
            $data['wtel'] = $etel;

            $result = M('Workers')->add($data);

            if ($result === false){
                $ret = array('m'=>'error');
            }else{
                $ret = array('m'=>'ok','d'=>round($ehours,2));
            }

            $this->ajaxReturn($ret);
        }
    }

    public function getInfosEid(){
        if(IS_AJAX){
            $eid = I('post.eid');
            $d = M('Workers')->where(array('wid'=>$eid))->find();

            if ($d){
                $re = array('m'=>'ok','d'=>$d);
            }else{
                $re = array('m'=>'error','d'=>$eid);
            }

            $this->ajaxReturn($re);
        }
    }

    // 编辑工时
    public function editHour(){
        if (IS_AJAX){
            $wn = I("post.wn");
            $wd = I("post.wd");
            $wh = I("post.wh");
            $wt = I("post.wt");
            $ws = I("post.ws");
            $wid = I("post.wid");

            $data['wname'] = $wn;
            $data['wdepartment'] = $wd;
            $data['wstatus'] = $ws;
            $data['wlaborhours'] = $wh;
            $data['wtel'] = $wt;

            $result = M('Workers')->where(array('wid'=>$wid))->save($data);

            if ($result === false){
                $ret = array('m'=>'error');
            }else{
                $ret = array('m'=>'ok','d'=>$data);
            }

            $this->ajaxReturn($ret);
        }
    }
}