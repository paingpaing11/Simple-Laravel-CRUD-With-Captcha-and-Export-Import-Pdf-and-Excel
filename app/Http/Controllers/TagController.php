<?php

namespace App\Http\Controllers;

use App\Models\Item\Tag;
use App\Exports\ExportTag;
use App\Imports\ImportTag;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Redirect;


class TagController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::paginate(3);
        return view('tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required|min:3',
            'image' => 'required|mimes:jpg,png.jpeg',
            'email' => 'required',
            'title' => 'required',
            'status' => 'required',
            'position' => 'required',
            'department' => 'required',
            'phone' => 'required|min:8|max:11|regex:/^([0-9\s\-\+\(\)]*)$/',
            'nrc' => 'required'
        ]);
        if(request()->has('image')){
            $image = request()->file('image');
            $file_name = $image->getClientOriginalName();
            $image->move(public_path('/Image'), $file_name);
            $image_path = "/Image/".$file_name;
            Tag::create([
                'name' => request()->name,
                'image' => $image_path,
                'email' => request()->email,
                'title' => request()->title,
                'status' => request()->status,
                'position' => request()->position,
                'department' => request()->department,
                'nrc' => request()->nrc,
                'phone' => request()->phone
            ]);
            return redirect(route('tag.index'))->with('success', 'Created successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tag = Tag::where('id', $id)->first();
        if(!$tag){
            return Redirect::back()->withErrors(['msg' => 'There is no data']);
        }
        return view('tag.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tag = Tag::find($id);
        return view('tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // return request()->all();
        request()->validate([
            'name' => 'required|min:3',
            // 'image' => 'required|mimes:jpg,png.jpeg',
            'email' => 'required',
            'title' => 'required',
            'status' => 'required',
            'position' => 'required',
            'department' => 'required',
            'phone' => 'required|min:8|max:11|regex:/^([0-9\s\-\+\(\)]*)$/',
            'nrc' => 'required'
        ]);

        $tag = Tag::where('id', $id);
        if(request()->has('image')){
            $image = request()->file('image');
            $name = $image->getClientOriginalName();
            $image->move(public_path('/image'), $name);
            $image_name = '/image/'.$name;
        }else{
            $image_name = $tag->first()->image;
        }
        $tag->update([
            'name' => request()->name,
            'email' => request()->email,
            'image' => $image_name,
            'position' => request()->position,
            'status' => request()->status,
            'department' => request()->department,
            'nrc' => request()->nrc,
            'phone' => request()->phone,
        ]);
        return redirect(route('tag.index'))->with('success', 'Your updating is successfully done');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tag = Tag::where('id', $id);
        $tag->delete();
        return redirect(route('tag.index'))->with('success', 'Deleting done');

    }

    //PDF export Data
    public function exportPDF(){
        $tags = Tag::orderBy('id', 'DESC')->get();
        $data['tags'] = $tags;
        $pdf = Pdf::loadView('pdf.tag', $data);
        return $pdf->download('tag.pdf');
        // return $pdf->stream();
    }

    public function import(){
        Excel::import(new ImportTag, request()->file('file'));
        return redirect()->back();
    }

    public function export(){
        return Excel::download(new ExportTag, 'tags.xlsx');
    }
}
