<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\FileContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    public function files(){
        $files =  File::where('user_id', Auth::user()->id)->has('fileContent')->get();
    
        // dd($files);
        return view('files',[
            'files' => $files
        ]);
    }

    public function file($id){
        if (File::where('id', $id)->where('user_id', Auth::user()->id)->has('fileContent')->exists()) {
            $file = FileContent::where('file_id', $id)->get();

            return view('file',[
                'file' => $file
            ]);
        }
        else{
            abort(404);
        }
    }
}
