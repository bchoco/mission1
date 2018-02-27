<?php
namespace Admin\Controller;

class TaskController extends BaseController {
    // 分配任务
    public function taskedit(){
        // employee结构树

        $this->display();
    }

    // 显示任务分配情况
    public function lists(){
        $task = M('Task');

        $list = $task->select();
        foreach ($list as $k=>$v){
            $list[$k]['rn'] = $k+1;
            $list[$k]['tcreatetime'] = date('Y-m-d H:i:s',$v['tcreatetime']);
        }

        $data = array(
            'data'=>$list
        );

        $this->ajaxReturn($data);
    }

    public function addtask(){
        if (IS_AJAX){
            $tname = I('post.tname');
            $thour = I('post.thour');
            $wid_arr = I('post.wid_arr');
            $wname_arr = I('post.wname_arr');
            $uu = getUUID();

            // task
            $data['tid'] = $uu;
            $data['tname'] = $tname;
            $data['thour'] = $thour;
            $data['tworker'] = implode(',',$wname_arr);
            $data['tcreatetime'] = time();
            $res0 = M('Task')->add($data);

            // task_worker
            $tw = M('TaskWorker');
            foreach ($wid_arr as $v){
                $data1 = [];
                $data1['tid'] = $uu;
                $data1['wid'] = $v;
                $res1 = $tw->add($data1);
            }

            if ($res0 && $res1){
                $re = array('m'=>'ok');
            }else{
                $re = array('m'=>'error');
            }

            $this->ajaxReturn($re);
        }
    }


    // 修改task task_worker表
    public function edittask(){
        if (IS_AJAX){
            $tid = I('post.tid');
            $tname = I('post.tname');
            $thour = I('post.thour');
            $wid_arr = I('post.wid_arr');
            $wname_arr = I('post.wname_arr');

            $data0['tname'] = $tname;
            $data0['tworker'] = implode(',',$wname_arr);
            $data0['thour'] = $thour;

            $res0 = M('Task')->where(array('tid'=>$tid))->save($data0);

            $tw = M('TaskWorker');
            $tw->where(array('tid'=>$tid))->delete();

            foreach ($wid_arr as $v){
                $data1 = [];
                $data1['tid'] = $tid;
                $data1['wid'] = $v;
                $res1 = $tw->add($data1);
            }

            if ($res0 && $res1){
                $re = array('m'=>'ok','d'=>$tid);
            }else{
                $re = array('m'=>'error');
            }

            $this->ajaxReturn($re);
        }
    }

    public function getTreeData(){
        $tid = I('post.tid');
        $dept = M('Department')->field('did,dname,dpid')->select();

        // 该任务执行人id数组
        if ($tid == -1){
            // 获取全部
            $executor = M('TaskWorker')
                ->field('wid')
                ->select();
        }else{
            // 获取指定
            $executor = M('TaskWorker')
                ->where(array('tid'=>$tid))
                ->field('wid')
                ->select();
        }

        $a = [];
        foreach($executor as $v){
            $a[] = $v['wid'];
        }

        // 组织架构
        $result = M('Department')
            ->alias('d')
            ->join('ms_workers w on d.did = w.wdepartment')
            ->select();

        //$data = [
        //  { id: did, pid: dpid, text: dname },
        //  { id: 1001, pid: wdepartment, text: wname },
            //  { id: 1, pid: 0, text: 'president' },
            //  { id: 2, pid: 1, text: 'technology' },
            //  { id: 3, pid: 1, text: 'administration' },
            //  { id: 4, pid: 3, text: 'John' },
            //  { id: 5, pid: 2, text: 'Peter' }
            //  { id: 6, pid: 1, text: 'Luis' }
            //  { id: 7, pid: 2, text: 'Wang' }
        //  ]
        $data = [];
        foreach ($dept as $k=>$v){
            $data[$k]['id']   = $v['did'];
            $data[$k]['pid']  = $v['dpid'];
            $data[$k]['text'] = $v['dname'];
        }
        foreach ($result as $k=>$v){
            //$index = $v['wid']*1000+1;
            $index = $v['wid'].'_';
            $data[$index]['id']   = $index;
            $data[$index]['pid']  = $v['wdepartment'];
            $data[$index]['text'] = $v['wname'];
            if(in_array($v['wid'],$a)){
                $data[$index]['ischecked'] = true;
            }
        }

        if (!empty($data)){
            $re = array('m'=>'ok','d'=>$data);
        }else{
            $re = array('m'=>'error');
        }

        $this->ajaxReturn($re);
    }

    // 根据任务id获取任务信息
    public function getInfoTid(){
        $tid = I('post.tid');
        $task = M('Task');
        $result = $task
            ->where(array('tid'=>$tid))
            ->find();



        if (empty($result)){
            $data = array('m'=>'error');
        }else{
            $data = array('m'=>'ok','d'=>$result);
        }

        $this->ajaxReturn($data);
    }

}