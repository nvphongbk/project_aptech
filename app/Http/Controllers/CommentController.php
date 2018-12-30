<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\TinTuc;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\RedirectResponse;

class CommentController extends Controller
{
    //
    public function getXoa($id,$idTinTuc)
    {
        $comment = Comment::find($id)->delete();
        return redirect('admin/tintuc/sua/'.$idTinTuc)->with('thongbao','Đã xóa bình luận thành công');
    }
    public function postComment(Request $request,$id)
    {
        $idtintuc=$id;
        $comment = new Comment;
        $comment->idTinTuc = $idtintuc;
        $comment->idUser = Auth::user()->id;
        $comment->NoiDung = $request->NoiDung;
        $comment->save();
        return redirect('tintuc/'.$id);
    }
}
