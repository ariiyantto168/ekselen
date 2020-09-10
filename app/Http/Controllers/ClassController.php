<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use File;
use App\Models\Classes;
use App\Models\Subclass;
use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $contents = [
            'classes' => Classes::with('categories','subclass')->get(),
        ];

        $pagecontent = view('class.index',$contents ); // unuk menampilkan view categories dr view

        // masterpage
        $pagemain = array(
            'title' => 'Classes',
            'menu' => 'class',
            'submenu' => 'classes',
            'pagecontent' => $pagecontent
        );
        
        return view('masterpage', $pagemain);
    }

    public function create_page()
    {
        $contents = [
            'categories' => Categories::all(),
        ];

      $pagecontent = view('class.create', $contents);
  
      //masterpage
      $pagemain = array(
          'title' => 'Masukan class',
          'menu' => 'classes',
          'submenu' => 'classes',
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


        $saveClasses = new Classes;
        $saveClasses->name = $request->name;
        $saveClasses->idcategories = $request->idcategories;


        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $re_image = Str::random(20).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save( public_path('/images/class/images/' . $re_image) );
            $saveClasses->images = $re_image;
        }
        // return $saveClasses;
        $saveClasses->save();

        $saveSubclass = new Subclass;
        $saveSubclass->idclass = $saveClasses->namemateri;
        return $saveSubclass;
        $saveSubclass->save();


        return redirect('classes')->with('status_success','Created Class');



    }

    public function update_page(Classes $classes)
    {
        $contents = [
            'classes' => Classes::find($classes->idclass),
            'categories' => Categories::all(),
        ];

        // return $content;

        $pagecontent = view('class.update',$contents);

        // masterpage
        $pagemain = array(
            'title' => 'Updated Class',
            'menu' => 'classes',
            'submenu' => 'classes',
            'pagecontent' => $pagecontent
        );
        
        return view('masterpage', $pagemain);
    }

    public function update_save(Request $request, Classes $classes)
    {
        // return $request->all();
        $request->validate([
            'name' => 'required',
        ]);

        $updateClasses = Classes::find($classes->idclass);
        $updateClasses->name = $request->name;
        $updateClasses->idcategories = $request->idcategories;

        
        $image_old =  public_path('/images/class/images/' . $updateClasses->images);
        if ($request->hasFile('images')) {
            if (File::exists($image_old)) {
            $image = $request->file('images');
            $re_image = Str::random(20).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save( public_path('/images/class/images/' . $re_image) );
            $updateClasses->images = $re_image;
            }
            File::delete($image_old);
        }
        // return $saveTestimonies;
        $updateClasses->save();
        return redirect('classes')->with('status_success','Updated Class');

    }

    public function delete(Classes $classes)
    {
        $deleteClasses = Classes::find($classes->idclass);
        $image_old =  public_path('/images/class/images/' . $deleteClasses->images);
        File::delete($image_old);        
        $deleteClasses->delete();
        return redirect('classes')->with('status_success','Deleted Classes');
    }
}
