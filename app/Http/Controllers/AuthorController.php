<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;

class AuthorController extends Controller
{
      // mengambil semua data
      public function all()
      {
          return Author::all();
      }
  
      // mengambil data by id
      public function show($id)
      {
          return Author::find($id);
      }
  
      // menambah data
      public function store(Request $request)
      {
          return Author::create($request->all());
      }
  
      // mengubah data
      public function update($id, Request $request)
      {
          $author = Author::find($id);
          $author->update($request->all());
          return $author;
      }
  
      // menghapus data
      public function delete($id)
      {
          $author = Author::find($id);
          $author->delete();
          return 204;
      }
}
