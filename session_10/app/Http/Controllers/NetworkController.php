<?php

namespace App\Http\Controllers;

use App\Models\Network;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NetworkController extends Controller
{
    public function get(){
        $network = Network::all();
        return view('welcome', compact('network'));
    }

    public function create(Request $request){
        $request->validate([
            'name'=>'required',
            'class'=>'required',
            'file'=>['required','file']
        ]);

        // Storage::disk['public']
        $fileName = $request->file('file')->getClientOriginalName();
        $filePath = $request->file('file')->storeAs('/upload', $fileName, 'public');

        Network::create([
            'name'=>$request->name,
            'class'=>$request->class,
            'file'=>$filePath
        ]);

        return redirect()->route('show');
    }

    public function delete( $id){
        $file = Network::find($id);
        if(Storage::disk('public')->exists($file->file)){
            Storage::disk('public')->delete($file->file);
            $file->delete();
            return redirect()->route('show');

        }
    }

    public function update(Request $request, $id){
        $file = Network::find($id);
        $request->validate([
            'name'=>'required',
            'class'=>'required',
            'file'=>['required','file']
        ]);

        //delete dl yg file sblmnya
        Storage::disk('public')->delete($file->file);

        //update ke data terbaru
        $fileName = $request->file('file')->getClientOriginalName();
        $filePath = $request->file('file')->storeAs('/upload', $fileName, 'public');

        Network::create([
            'name'=>$request->name,
            'class'=>$request->class,
            'file'=>$filePath
        ]);

        return redirect()->route('show');
    }

    public function download($id){
        $file =Network::find($id);
        $filePath = storage_path('app/public/' .$file->file);
        $fileName = basename($file->file);
        // /upload/SE.jpg
        return response()->download($filePath, $fileName);
    }
}
