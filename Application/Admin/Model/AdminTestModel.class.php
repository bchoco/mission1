<?php
namespace AdminTest\Model;
use Think\Model\RelationModel;

class AdminTestModel extends RelationModel {
    protected $pk = 'muid';

    protected $fields = array('muid','usn','pwd','avatar','email','loginfailure','createtime','updatetime','token','ustatus');

}