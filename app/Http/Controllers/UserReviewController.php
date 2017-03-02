<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\UserReview;
use Response;
class UserReviewController extends Controller
{
    public function GetAllUserReview(Userreview $userreview)
    {
      $GetAllUserReview = $userreview->all();
      return response()->json($GetAllUserReview);
    }
    public function GetByIdUserReview($id)
    {
      $GetByIdUserReview = UserReview::find($id);
      return $GetByIdUserReview;
    }
    public function CreateUserReview(Request $request)
    {
      $userreview = new UserReview;
      $userreview->id=$request->input('id');
      $userreview->order_id=$request->input('order_id');
      $userreview->product_id=$request->input('product_id');
      $userreview->user_id=$request->input('user_id');
      $userreview->rating=$request->input('rating');
      $userreview->review=$request->input('review');
      $userreview->created_at=$request->input('created_at');
      $userreview->updated_at=$request->input('updated_at');
    	$isSave=$userreview->save();

    	if(!$isSave)
    	{
     	     return Response::json("Gagal Update Data",500);
    	}
      return Response::json("Data Berhasil Disimpan",201);
    }
    public function UpdateUserReview(Request $request, $id)
    {
      $userreview=UserReview::find($id);

      if(!is_null($request->input('id')))
        {$userreview->id=$request->input('id');}
      if(!is_null($request->input('order_id')))
        {$userreview->order_id=$request->input('order_id');}
      if(!is_null($request->input('product_id')))
        {$userreview->product_id=$request->input('product_id');}
      if(!is_null($request->input('user_id')))
        {$userreview->user_id=$request->input('user_id');}
      if(!is_null($request->input('rating')))
        {$userreview->rating=$request->input('rating');}
      if(!is_null($request->input('review')))
        {$userreview->review=$request->input('review');}
      if(!is_null($request->input('created_at')))
        {$userreview->created_at=$request->input('created_at');}
      if(!is_null($request->input('updated_at')))
        {$userreview->updated_at=$request->input('updated_at');}

      $isUpdate=$userreview->save();

      if(!$isUpdate)
    	{
     	     return Response::json("Gagal Update Data",500);
    	}
      return Response::json("Data Berhasil Di Update",201);
    }
    public function DeleteUserReview(Request $request, $id)
    {
      $userreview=UserReview::find($id);
    	if(is_null($userreview))
    	{
    		return Response::json("Data Tidak Ada!",404);
    	}

    	$isDelete=$userreview->delete();

    	if(!$isDelete)
    	{
    		return Response::json("Hapus Data Gagal",500);
    	}

    	return Response::json("Hapus Data Berhasil",200);
    }
}
