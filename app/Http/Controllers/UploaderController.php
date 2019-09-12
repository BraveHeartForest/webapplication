<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Uploader;
use App\Http\Requests\UploaderRequest;
use Illuminate\Support\Facades\Storage;
/* 2019/9/3 public_path()をC:\xampp\webapplication\public\storageに置換した。（\を/に直して） */

class UploaderController extends Controller
{
    const STORAGE = 'C:/xampp/webapplication/public/storage/img/';   //imgフォルダまでの絶対パスこの後に変更する予定が無いため定数。

    public function getIndex()
    {
        $uploader = Uploader::orderBy('created_at','desc')->paginate(10);
        $id = array_pluck($uploader,"id");  //$uploader内部の"id"を配列として取得。
        if(count($uploader)==0){    //データベースにレコードが0の場合はこの条件が成立する
            $access=null;
            /*データベースにレコードが0の場合はforeachが動かないので、
            $accessが未定義となってエラーを吐き出すのでnullを代入*/
        }
        foreach($id as $value)
        {
            $dir = self::STORAGE.$value; //各IDに対応したフォルダまでの絶対パス。
            $array =[];
            if(file_exists($dir)){
                //フォルダが存在するかを確認する。
                $array = scandir($dir); //$dirの中身を配列形式で取得。globを使うのかと最初は調べていて思ったが、scandirを使うことになった。
                if(count($array)<=2){   //$arrayの要素数が2以下⇔画像がフォルダ内に存在しない。
                    $access[$value] =  null;   //存在しない。
                }else{
                    $access[$value] =  $array[2];   //$arrayの三番目の要素([2])がファイル名です。
                }
                //直接ファイル名を渡すことにしました。
            }else{
                $access[$value] = null;
            }
        }
        //return \File::extension("C:/xampp/webapplication/public/storage/img/16/thum.jpeg");
        //return dd($uploader);
        //return array_pluck($uploader,'id'); //使用可能。
        //{"current_page":1,"data":[],"from":null,"last_page":0,"next_page_url":null,"path":"http:\/\/127.0.0.1:8000\/upload","per_page":5,"prev_page_url":null,"to":null,"total":0}

            return view('uploader.index',['uploaders'=>$uploader,'pict'=>$access]);
    }

    public function confirm(UploaderRequest $req)
    {
        $username = $req->username;
        $thum_name = uniqid("THUM_").".".$req->file('thum')->guessExtension();  //{THUM_(13文字の文字列)}.($_FILES['thum']の拡張子)
        $req->file('thum')->move("C:/xampp/webapplication/public/storage"."/img/tmp",$thum_name);
        //public_path関数はLaravelのヘルパ関数です。publicディレクトリの完全パスを返します。
        //C:\xampp\webapplication\publicと表示されます。
        //File名$req['thum']をpublic/img/tmpに$thum_nameという名称で移動。
        $thum = "/img/tmp/".$thum_name;
        //画像ファイルへのパス。

        $hash = array(
            'thum'=>$thum,
            'username'=>$username,
        );

        return view('uploader.confirm',['hash'=>$hash]);
    }

    public function finish(Request $req)
    {
        $uploader = new Uploader;
        $uploader->username = $req->username;   //UploaderのusernameにRequestのusernameを入力する。
        $uploader->save();

        //レコードを挿入したときのIDを取得。
        $lastInsertedId = $uploader->id;

        //ディレクトリを作成。
        if(!file_exists("C:/xampp/webapplication/public/storage"."/img/".$lastInsertedId)){  //public/img/[最後のid]が存在しないならば、
            mkdir("C:/xampp/webapplication/public/storage"."/img/".$lastInsertedId,0777);  //public/img/[最後のid]の場所に、0777==最も緩いアクセス制限：：のフォルダを作成する。
        }

        //一時保存から本番の格納場所へ移動。
        rename("C:/xampp/webapplication/public/storage" . $req->thum, "C:/xampp/webapplication/public/storage" . "/img/" . $lastInsertedId . "/thum." .pathinfo($req->thum, PATHINFO_EXTENSION));
        //rename(A,B); A=public/img/tmp/{THUM_(13文字の文字列)}.($_FILES['thum']の拡張子),B=public/img/[最後のid]/thum.[選択した画像の拡張子]

        return view('uploader.finish');
    }

    public function remove(Request $req)
    {
        $id = $req->id; //$reqには削除する画像のidが入力されています。
        Uploader::find($id)->delete();  //これで特定のidのレコードを削除します。
        $dir = self::STORAGE.$id;   //選択されたidの画像までの絶対パスを表現。
        self::remove_directory($dir);
        return redirect('/upload');
    }

    private function remove_directory($dir)
    //参考サイト： https://www.sejuku.net/blog/78776
    {
        if(file_exists($dir)){
            //そもそもファイルまたはディレクトリが存在するのかを調査、存在するならば……
            $files = array_diff(scandir($dir),array('.','..'));
            /*array_diff(A1,A2)[A1,A2は配列]はA1を他の配列(今回はA2)と比較して
            A1の要素の中でA2には存在しないものだけを抜き出して配列として返します。
            scandir(filename)はfilename(ファイルへのパス)の中身を配列として取り出す。
            内容は基本的に['.','..']が最低でも含まれている。*/
            foreach($files as $file){
                //内部のモノがファイルかディレクトリかで処理を分岐
                if(is_dir("$dir/$file")){
                    //is_dir(filename)はfilename(ファイルへのパス)がディレクトリであるかどうかを調べる。
                    //ディレクトリならば再度同じ関数を呼び出す。
                    remove_directory("$dir/$file");
                }else{
                    //ファイルならば削除
                    unlink("$dir/$file");
                    //unlink(filename)でfilename(ファイルへのパス)を削除します。
                }
                //指定したディレクトリを削除
                return rmdir($dir);
                //rmdir(string)でstringにあるディレクトリを削除します。但し中身が存在するとエラーを出すので先に中身を空にする必要がありました。
            }
        }
    }
}
