<?php

namespace App\Http\Controllers;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Http\Redirect;
use App\ImageUpload;

class ImageUploadController extends Controller
{
    public function index(Request $request){

        if($request->has('del')){
            $file = new Filesystem;
            $file->cleanDirectory('public/images');
            return Redirect::back();
        }
        $images = \File::allFiles(public_path('images'));
        return View('form')->with(array('images'=>$images));

    }
    public function fileCreate(Request $request)
    {
        return view('imageupload');
    }

    public function fileStore(Request $request)
    {
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images'), $imageName);

        return response()->json(['success' => $imageName]);
    }

    public function fileDestroy(Request $request)
    {
        $filename = $request->get('filename');
        ImageUpload::where('filename', $filename)->delete();
        $path = public_path() . '/images/' . $filename;
        return $filename;
    }
}
