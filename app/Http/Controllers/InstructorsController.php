<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use File;
use App\Models\Instructors;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InstructorsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $contents = [
            'instructors' => Instructors::all(),
        ];

        $pagecontent = view('instructors.index',$contents ); // unuk menampilkan view categories dr view

        // masterpage
        $pagemain = array(
            'title' => 'Index Instructors',
            'menu' => 'master',
            'submenu' => 'instructors',
            'pagecontent' => $pagecontent
        );
        
        return view('masterpage', $pagemain);
    }

    public function create_page()
    {
      $pagecontent = view('instructors.create');
  
      //masterpage
      $pagemain = array(
          'title' => 'Created Data Instructors',
          'menu' => 'instructors',
          'submenu' => 'instrcutors',
          'pagecontent' => $pagecontent,
      );
  
      return view('masterpage', $pagemain);
    }

    public function save_page(Request $request)
    {
        // return $request->all();
        $request->validate([
            'name' => 'required',
            'job_role' => 'required',
        ]);


        $saveInstructors = new Instructors;
        $saveInstructors->name = $request->name;
        $saveInstructors->job_role = $request->job_role;
        ;
        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $re_image = Str::random(20).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save( public_path('/images/instructors/' . $re_image) );
            $saveInstructors->images = $re_image;
        }
        // return $saveTestimonies;
        $saveInstructors->save();
        return redirect('instructors')->with('status_success','Created Insructors');
        
    }
}
