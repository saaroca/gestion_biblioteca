<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Books;

class ApiController extends Controller
{
    public function index() {
        $libros = Books::with('author')->get();
        return response()->json($libros);
    }

    public function store(Request $request) {
        try{
            $request->validate([
                'title' => 'required|string',
                'author_id' => 'required|integer',
                'published_year' => 'required|integer',
            ]);

            $book = new Books();
            $book->title = $request->input('title');
            $book->author_id = $request->input('author_id');
            $book->published_year = $request->input('published_year');
            $book->save();
            return response()->json([
                'message' => 'Libro guardado correctamente',
                'book' => $book
            ], 201);
        } catch(\Exception $e){
            return response()->json([
                'message' => 'Error al guardar el libro',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id) {
        try{
            $book = Books::find($id);
            if($book){
                $book->delete();
                return response()->json([
                    'message' => 'Libro eliminado correctamente'
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Libro no encontrado'
                ], 404);
            }
        } catch(\Exception $e){
            return response()->json([
                'message' => 'Error al eliminar el libro',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
