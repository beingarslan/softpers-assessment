<?php

namespace App\Http\Livewire;

use App\Imports\FileImport;
use App\Models\File;
use App\Models\FileContent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;


use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class FileUpload extends Component
{
    use WithFileUploads;

    public $_file;
    public $alert;
    public function save()
    {
        $this->validate([
            '_file' => 'required|mimes:xls,xlsx,csv|max:1024', // 1MB Max
        ]);

        try {
            $path = $this->_file->getRealPath();
            // dd($path);
            // session()->flash('message', 'Post successfully updated.');
            $file_ = File::create([
                'user_id' => Auth::user()->id
            ]);
            // config(['excel.import.startRow' => 2]);

            Excel::import(new FileImport($file_->id), $path);
            $this->alert = "alert-success";
            session()->flash('message', 'File has been uploaded.');

        } catch (\Throwable $th) {
            $this->alert = "alert-danger";
            session()->flash('message', 'Error while uploading the file.');
            //throw $th;
        }
        // $data = Excel::import(new FileContent(), $path);
        // dd($data);
        // if ($data->count() > 0) {
        //     $file_ = File::create([
        //         'user_id' => Auth::user()->id
        //     ]);
        //     foreach ($data->toArray() as $key => $value) {
        //         foreach ($value as $row) {
        //             $insert_data[] = array(
        //                 'name'   => $row[0],
        //                 'roll_num'   => $row[1],
        //                 'tester'    => $row[2],
        //                 'file_id'  => $file_->id,
        //             );
        //         }
        //     }

        //     if (!empty($insert_data)) {
        //         DB::table('file_contents')->insert($insert_data);
        //     }
        // }

    }

    public function render()
    {
        return view('livewire.file-upload');
    }
}
