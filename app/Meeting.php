<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    //指定表名
    protected $table="meeting";
    //指定主键
    protected $primaryKey='m_id';
    //关闭时间戳
    public $timestamps=false;
}
