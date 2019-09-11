<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\EmpTable;

class DeptTable extends Model
{
    const UPDATED_AT = null;
    const CREATED_AT = null;
    //http://kayakuguri.github.io/blog/2017/12/13/eloquent-updated-at-null/
    protected $table = 'dept_table';


    public $timestamps = false;
    //timestampsを利用しない。

    protected $primaryKey = "dept_id";
    //primaryKeyの変更

    protected $fillable = [
        'dept_id','dept_name',
    ];

    public static $rules = array(
        'dept_id'=>'integer|required|min:0|max:127|unique:dept_table,dept_id',
        'dept_name'=>'required|unique:dept_table,dept_name',
    );

    public static $message = array(
        'dept_id.integer'=>'部署IDは整数で入力してください。',
        'dept_id.required'=>'部署IDが入力されていません。',
        'dept_id.min'=>'部署IDは１以上127以下の自然数で入力してください。',
        'dept_id.max'=>'部署IDは１以上127以下の自然数で入力してください。',
        'dept_id.unique'=>'その部署IDは使用済みです。',
        'dept_name.required'=>'部署名が入力されていません。',
        'dept_name.unique'=>'その部署名はもう存在しています。'
    );

    public function employee()
    {
        return $this->hasMany('App\EmpTable');
    }

    public function getName()
    {
        return $this->dept_name;
    }

    public static function getAllData()
    {
        $dept_data = DB::table('dept_table')->get();

        return $dept_data;
    }

    public static function getIdData($id)
    {
        $dept_data = DB::table('dept_table')->where('dept_id',$id)->get();

        return $dept_data;
    }
}
