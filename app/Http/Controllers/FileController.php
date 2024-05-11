<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{

    public function index()
    {
        $title = 'History Files';
        $files = File::where('user_id', auth()->id())->get();

        return view('files.index', compact('files', 'title'));
    }


    public function store(Request $request)
    {

        $request->validate([
            'history.*' => 'required|mimes:pdf|max:2048',
        ]);

        if ($request->hasfile('history')) {

            foreach ($request->file('history') as $file) {
                $name = time() . rand(1, 100) . '.' . $file->extension();
                $file->move(public_path() . '/storage/files/', $name);

                $fileModel = new File();
                $fileModel->name = $file->getClientOriginalName();
                $fileModel->filename = $name;
                $fileModel->path = '/files/' . $name;
                $fileModel->user_id = auth()->id();
                $fileModel->save();
            }
        }

        return back()->with('success', 'Files uploaded successfully');
    }

    public function destroy($id)
    {
        $file = File::find($id);
        $file->delete();
        return back()->with('success', 'File deleted successfully');
    }


    public function download($id)
    {
        $file = File::find($id);
        $filePath = $file->path;
        
        return Storage::download('public'.$filePath, $file->name);
    }
}
