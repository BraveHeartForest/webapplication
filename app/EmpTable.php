<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DeptTable;
use Illuminate\Support\Facades\DB;



class EmpTable extends Model
{
    const UPDATED_AT = null;
    const CREATED_AT = null;
//更新日時は不要

    public $timestamps = false;
    //timestampsを更新しないという設定。

    protected $primaryKey = 'emp_id';
    //primaryKeyのオーバーライド


    protected $table ='emp_table';  //emp_tableを扱う。

    protected $fillable = [
        'emp_pass','emp_name','gender','address','birthday','authority','dept_id'
    ];

    //protected $guarded = array('emp_id');   fillableとguardedのどちらかしか使えない。

    public static $rules = array(
        'emp_name'=>'required',
        'emp_pass'=>'required|same:emp_pass_confirm',
        'gender'=>'required',
        'address'=>'required',
        'birthday'=>'required',
        'authority'=>'required',
        'dept_id'=>'required|integer|min:1',
    );

    public static $messages_of_rules=[
        'emp_name.required'=>'名前が入力されていません。',
        'emp_pass.required'=>'パスワードが入力されていません。',
        'emp_pass.same'=>'パスワードが一致しません。',
        'address.required'=>'住所不定です。',
        'birthday.required'=>'生年月日を入力してください。',
        'dept_id.required'=>'部署IDが入力されていません。',
        'dept_id.integer'=>'部署IDは半角の整数で入力してください。',
        'dept_id.min'=>'部署IDは1以上で入力してください。',
        'required'=>'必須項目です。',
    ];



    public static $rules_edit = array(
        'old_pass'=>'required',  //same:old_pass_confirm'は<input type="hidden">の脆弱性によって不採用。
        'emp_name'=>'required',
        'gender'=>'required',
        'address'=>'required',
        'birthday'=>'required',
        'dept_id'=>'required|integer',
    );

    public function dept()
    {
        return $this->belongsTo('App\DeptTable');
    }

    public static function getData()
    {
        return EmpTable::join('dept_table','emp_table.dept_id','=','dept_table.dept_id')
        ->get();

        /*return DB::table('emp_table')->join('dept_table','emp_table.dept_id','=','dept_table.dept_id')
        ->get();*/
    }
}
