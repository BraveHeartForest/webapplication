<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmpTable;
use App\DeptTable;
use Illuminate\Support\Facades\DB;
use Session;
use App\Http\Requests\LoginForm;


class EmpTableController extends Controller
{

    public function create()
    {
        $data=[];   //アクセスする度に内容が増えてしまうため、毎回初期化。
        $data = DeptTable::getAllData();
        return view('admin.emp',['dept'=>$data]);
    }

    public function empConfirm(Request $request){
        $this->validate($request,EmpTable::$rules,EmpTable::$messages_of_rules);
        $form = $request->all();
        unset($form['_token']);
        unset($form['emp_pass_confirm']);
        //return var_dump($form);
        $data =[];
        $dept = DeptTable::getIdData($form['dept_id']);
        /*
        $dept = DeptTable::getAllData();
        foreach($dept as $key => $dept_name)
        {
            $data[$key+1] = json_decode(json_encode($dept_name), true);
            //https://qiita.com/muramount/items/6be585bf9c031a997d9a を参考にして一次配列に変換。
        }
        */
        //return var_dump($data)."<br>".$form['dept_id'];
        return view('main.emp_confirm',['data'=>$form,'dept'=>$dept]);
    }

    public function store(Request $request)
    {
        //従業員を追加するメソッド。
        //この段階ではハッシュ化せずとも良い。登録時にハッシュ化されていれば良いため。
        $emp=new EmpTable;
        $form = $request->all();
        //$form['emp_pass'] = decrypt($form['emp_pass']);
        //$form['emp_pass_confirm'] = decrypt($form['emp_pass_confirm']);
        unset($form['_token']);
        unset($form['emp_pass_confirm']);
        $form['emp_pass']=md5($form['emp_pass']);   //暗号化
        $emp->fill($form)->save();
        return redirect('/list');   //->with('form',$form);
    }

    public function getUpdate(Request $request)
    {
        return redirect('/list');
    }

    public function edit(Request $request)
    {
        $dept_name=[];   //アクセスする度に内容が増えてしまうため、毎回初期化。
        $dept_name = DeptTable::getAllData();
        $id=$request->id;
        $data=DB::table('emp_table')->where('emp_id',$id)->get();
        foreach($data as $key => $datum){
            $array = $datum;
        }
        session('emp_pass',$array->emp_pass);
        return view('main.edit',['data'=>$array,'id'=>$id,'dept'=>$dept_name]);   //'request'=>$requestを付け加え、editで$request->idをするとクエリ文字列が表示された。
    }

    public function update(Request $request)
    {
        $request['old_pass']=md5($request['old_pass']);
        $this->validate($request,EmpTable::$rules_edit);
        //不発$this->validate($request->old_pass,session('emp_pass'));
        $id = $request->emp_id;
        $emp = EmpTable::find($id); //データベースから引っ張ってきたレコード群
        Session::put('emp_pass',$emp->emp_pass);
        $form = $request->all();    //Request即ち入力されたデータ群
        unset($form['_token']);
        //unset($form['old_pass_confirmation']);    input hiddenだとソースコードから読み取れるのでold_pass_confirmation自体をカット
        if($form['new_pass']==null){    //新しいパスワードが入力されていないとき。
            unset($form['new_pass']);   //formからnew_passの項目を削除。
            $form['emp_pass']=$form['old_pass'];    //formにemp_passという項目を作成、内容は古いパスワード。
            unset($form['old_pass']);   //formからold_passの項目を削除。
            if($form['emp_pass']!=session('emp_pass')){ //入力されたパスワードとDBから取得したパスワードが等しくないならば
                return redirect('/list');   //一覧画面に戻る。
            }
        }else{  //新しいパスワードが入力されているならば
            if($form['old_pass']!=session('emp_pass')){ //以前のパスワードがDBから取得したパスワードと等しくないならば
                return redirect('/list');   //一覧画面に戻る。
            }   //一致したならば以下の通りに進む。
            unset($form['old_pass']);   //formからold_passの項目を削除。
            //fillableやguardで入力が制限されているならばこれは必要であるか？
            $form['emp_pass']=$form['new_pass'];    //formにemp_passの項目を追加。内容は新しいパスワード
            unset($form['new_pass']);   //formからnew_passの項目を削除
            $form['emp_pass']=md5($form['emp_pass']);   //新しいパスワードには暗号化がされていないはずなのでここで暗号化。古いパスワードは登録時点で暗号化されているので不要。
        }
        $emp->fill($form)->save();
        Session::forget('emp_pass');
        //return var_dump($form);   //テスト用。
        //return session('emp_pass');   //元々のemp_passが表示される。
        return redirect('/list');
    }

    public function destroy(Request $request)
    {
        $id=$request->id;
        EmpTable::find($id)->delete();
        return redirect('/list');
    }

    public function getLogin(Request $request)
    {
        $param = ['msg'=>'名前とパスワードを入力してください。'];
        return view('auth.session',$param);
    }

    public function postLogin(LoginForm $request)
    {
        //$this->validate($request,EmpTable::$rules_login);
        $emp_name = $request->emp_name;
        $emp_pass = $request->emp_pass;
        $emp_pass = md5($emp_pass);
        $exists = Emptable::where('emp_name',$emp_name)->where('emp_pass',$emp_pass)->exists();
        if($exists==true){
            $param=['msg'=>'ログイン状態です。'];
            $data=EmpTable::where('emp_name',$emp_name)->where('emp_pass',$emp_pass)->select('emp_id','authority')->get();
            //var_dumpするとobject(Illuminate\Database\Eloquent\Collection)#213...となる。ここから一気に情報を抜き出す方法はないものか？
            $datas =$data->toArray(); //オブジェクトを配列に変換
            //array(1) { [0]=> array(1) { ["authority"]=> int(0) } }という中身authorityの値を取得するには$authority2[0]['authority']とする必要がある。
            //もっとスマートなやり方はないものか？
            $request->session()->put('user',$emp_name);
            $request->session()->put('auth',$datas[0]['authority']);
            $request->session()->put('emp_id',$datas[0]['emp_id']);
            return view('auth.session',$param);
        }else{
            $param=['msg'=>'ログインに失敗しました。'];
            //Session::forget('user');
            //Session::forget('auth');
            return view('auth.session',$param);
        }
    }

    public function listing(Request $request)
    {
        /*$emp = DB::table('emp_table')->get();
        foreach($emp as $element){
            $elements = $element;
        }
        */
        /*
        $dept_name=DB::table('emp_table')
        ->join('dept_table','emp_table.dept_id','=','dept_table.dept_id')
        ->get();
        */
        $dept_name=EmpTable::getData();
        //もう少し賢いやり方が欲しい。
        return view('main.list',['elements'=>$dept_name]);
    }

    public function logout(Request $request)
    {
        //$request->session()->flush(); 完全削除だとトークンも消えるため、formでの移動が出来ない。
        Session::forget('user');
        Session::forget('emp_id');
        Session::forget('auth');
        Session::forget('emp_pass');
        $param = ['msg'=>'名前とパスワードを入力してください。'];
        return view('auth.session',$param);
    }
}
