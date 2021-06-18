<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\ImageUpload;

class ImageUploadController extends Controller
{
    public function index(Request $request){

        $images = \File::allFiles(public_path('images'));
        if($request->has('del')){
            foreach($images as $image){
                \File::delete(public_path('images').'/'.$image->getFilename());
            }
            return Redirect::to('list');
        }
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
