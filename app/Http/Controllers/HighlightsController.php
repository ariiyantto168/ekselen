<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Highlights;
use App\Models\Categories;
use App\Models\Classes;

class HighlightsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $contents = [
            'highlights' => Highlights::with('categories','classes')->get(),
        ];

        // return $contents;

        $pagecontent = view('highlights.index',$contents ); // unuk menampilkan view categories dr view

        // masterpage
        $pagemain = array(
            'title' => 'Highlights content',
            'menu' => 'class',
            'submenu' => 'highlights',
            'pagecontent' => $pagecontent
        );
        
        return view('masterpage', $pagemain);
    }

    public function create_page()
    {
        $contents = [
            'categories' => Categories::all(),
            'classes' => Classes::all(),
        ];

        $pagecontent = view('highlights.create', $contents);
  
      //masterpage
      $pagemain = array(
          'title' => 'Masukan highlights',
          'menu' => 'highlights',
          'submenu' => 'highlights',
          'pagecontent' => $pagecontent,
      );
  
      return view('masterpage', $pagemain);
    }

    public function save_page(Request $request)
    {
        // return $request->all();
        $request->validate([
            'name' => 'required',
        ]);
            // kiri dari database kanan dari blade
        $saveHighlights = new Highlights;
        $saveHighlights->name = $request->name;
        $saveHighlights->idcategories = $request->idcategories;
        $saveHighlights->idclass = $request->idclass;
        // return $saveHighlights;
        $saveHighlights->save();
        return redirect('highlights')->with('status_success','Created highlights');
    }

    public function update_page(Highlights $highlights)
    {
        $contents = [
            'highlights' => Highlights::find($highlights->idhighlights)
        ];

        // return $content;

        $pagecontent = view('highlights.update',$contents);

        // masterpage
        $pagemain = array(
            'title' => 'Highlights Update',
            'menu' => 'highlights',
            'submenu' => 'highlights',
            'pagecontent' => $pagecontent
        );
        
        return view('masterpage', $pagemain);
    }
}
