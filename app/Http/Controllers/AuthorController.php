<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $query = DB::table('book_author')
//            ->select('author_id', '')
//            ->get();

//        $query_num = DB::table('book_author')
//            ->select('author_id, count(book_id) as book_num')
//            ->groupBy('author_id')->lists('author_id', 'book_num');


        $query_num = DB::table('book_author')
            ->select('author_id', DB::raw('count(book_id) as book_num'))
            ->groupBy('author_id')
            ->get()->toArray();



        foreach ($query_num as $query) {

            Author::where('id', $query->author_id)->update(['books_number' => $query->book_num]);
        }

        $authors = Author::all();
        return view('author.index')->with('authors', $authors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('author.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $author = new Author();
        $author->name = $request->name;
        $author->last_name = $request->last_name;
        $author->second_name = $request->second_name;

        $author->save();

        return redirect()->route('author.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $author = Author::where('id', $id)->first();

        return view('author.edit')->with('author', $author);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Author::where('id', $id)->update(['name' => $request->name, 'last_name' => $request->last_name, 'second_name' => $request->second_name]);

        return redirect()->route('author.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author = Author::where('id', $id)->first();
        $author->books()->detach();
        $author->delete();

        return redirect('author/');
    }
}
