<?php

namespace App\Http\Controllers\v1\Upload;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Image;
class UploadController extends Controller
{
    public function Upload(Request $request)
    {

        // dd(public_path('images/company'));/domains/hihyper.com/public_html/images/company
        if ($request->img)
        {
            $messages = array(
                'mimes'    => 'فرمت فایل انتخابی باید jpeg, png,jpg باشد.' ,
                'max'      => 'حجم فایل انتخابی باید کمتر از 500kb باشد.' ,
                'image'    => 'لطفا یک عکس انتخاب کنید.'
            );
            $validator = Validator::make($request->all(), [
                'img' => 'image|mimes:jpg,jpeg,png,svg|max:500',
            ] , $messages);

            if ($validator->fails()) {
                return response()->json([ 'data' => [ 'error' => true,'data' => 'error' ,   'message' => $validator->errors()->all() ]], 200 );
            }

            $image = $request->file('img');
            $picName = time().'.'.$request->img->extension();

            $destinationPath = '/home/karaveli/laravelServer/public/images/company';
          
            $imgFile = Image::make($image->getRealPath());


            $imgFile->resize(null, 170 ,  function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$picName , 70);
        }
        // if($request->img)

        // {
        //     $picName = time().'.'.$request->img->extension();
        //     $request->img->move('/home/karaveli/laravelServer/public/images/company',$picName);
        // }
        elseif ($request->file)
        {
            if($request->file->getMimeType() != 'application/pdf')
            {
                return response()->json([ 'data' => [ 'error' => true,'data' => 'error' ,   'message' => 'فرمت فایل نادرست است' ]], 200 );
            }

            $picName = time().'.'.$request->file->extension();
            $request->file->move('/home/karaveli/laravelServer/public/pdfs/resume',$picName);
        }

//        $request->img->move('/home/hihyhihy/domains/hihyper.com/public_html/images/company',$picName);

        return response()->json([ 'data' => [ 'success' => true, 'data' => $picName, 'message' => 'اطلاعات شما با موفقیت ثبت گردید.' ]], 200 );
    }

    public function UploadFile(Request $request)
    {
        $fileName = time().'.'.$request->file->extension();
        $request->file->move(public_path('files/resume'),$fileName);
        return $fileName;
    }
}
