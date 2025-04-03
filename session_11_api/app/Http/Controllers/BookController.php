<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\Catch_;

class BookController extends Controller
{
    public function getBook(){
        $books = Book::paginate(5);
        return response()->json([
            'data' => $books
        ],200);
    }

    public function createBook(Request $request){
        // $request->validate([
        //     'name'=>'required'
        // ]) gabisa nnt gada tulisan errornya
        //Untuk validate harus pake validator
        try{
            $validator = Validator::make($request->all(),[
                'title'=>['required', 'string', 'min:3'],
                'price'=>['required', 'integer', 'min:0'],
                'author'=>['required', 'string', 'min:3'],
                'releaseDate'=>['required', 'date'],
                'image'=>['required','image'],
            ]);
            if($validator->fails()){
                return response()->json([
                    'errors' => $validator->errors()
                ],400);
            }

            //buat front endnya harus disesuain gmnngirim datanya: formdata atau base64

            //contoh pake form data
            //formData
            $fileName = $request->file('image')->getClientOriginalName();
            $filePath = $request->file('image')->storeAs('upload', $fileName, 'public');
            // $book = Book::create($request->all());

            //base64
            // $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64Image))
            // $fileName = Str::uuid() . '_' . $request->title;
            // Storage::disk('public')->put($fileName,$imageData);
            $book = Book::create([
                'title'=>$request->title,
                'price'=>$request->price,
                'author'=>$request->author,
                'releaseDate'=>$request->releaseDate,
                'image'=>$filePath, //asset('storage/' . $fileName)
            ]);

            return response()->json(["message"=>"book has been created",
            "data"=> $book], 201);
        }catch(\Exception $e){
            return response() ->json(["error" => $e->getMessage()], 500);
        }
    }

    public function delete($id){
        try{
            $book = Book::find($id);
            if(empty($book)){
                return response()->json(['error'=>"this data is not found"], 404);
            }
            $book->delete();
            return response()->json(["message"=>"Book data has successfully deleted"], 200);
        }Catch(\Exception $e){
            return response()->json(['error'=> $e->getMessage()], 500);
        }
    }

    public function edit(Request $request, $id){
        try{
            $book = Book::find($id);
            if(empty($book)){
                return response()->json(['error'=>"this data is not found"], 404);
            }
            $validator = Validator::make($request->all(),[
                'title'=>['required', 'string', 'min:3'],
                'price'=>['required', 'integer', 'min:0'],
                'author'=>['required', 'string', 'min:3'],
                'releaseDate'=>['required', 'date'],
                'image'=>['required','image'],
            ]);
            if($validator->fails()){
                return response()->json([
                    'errors' => $validator->errors()
                ],400);
            }
            $book = $book ->update($request->all());
            return response()->json(["message"=>"book has been updated",
            "data"=> $book], 201);
        }catch(\Exception $e){
            return response() ->json(["error" => $e->getMessage()], 500);
        }
    }
}
