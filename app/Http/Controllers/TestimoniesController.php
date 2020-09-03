<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use File;
use App\Models\Testimonies;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TestimoniesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $contents = [
            'testimonies' => Testimonies::all(),
        ];

        $pagecontent = view('testimonies.index',$contents );

        // masterpage
        $pagemain = array(
            'title' => 'Index Testimonies',
            'menu' => 'testimonies',
            'submenu' => '',
            'pagecontent' => $pagecontent
        );
        
        return view('masterpage', $pagemain);
    }

    public function create_page()
    {
        $pagecontent = view('testimonies.create');

        $pagemain = array(
            'title' => 'masukan testimonies user anda',
            'menu' => 'testimonies',
            'submenu' => 'testimonies',
            'pagecontent' => $pagecontent
        );

        return view('masterpage', $pagemain);
    }

    public function save_page(Request $request)
    {
        // return $request->all();
        $request->validate([
            'name' => 'required',
            'jobrole' => 'required',
            'active' => '',
            'description' => 'required',
        ]);

        //active
        $active = FALSE;
        if($request->has('active')) {
            $active = TRUE;
        }

        $saveTestimonies = new Testimonies;
        $saveTestimonies->name = $request->name;
        $saveTestimonies->jobrole = $request->jobrole;
        $saveTestimonies->description = $request->description;
        $saveTestimonies->active = $active;
        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $re_image = Str::random(20).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save( public_path('/images/' . $re_image) );
            $saveTestimonies->images = $re_image;
        }
        // return $saveTestimonies;
        $saveTestimonies->save();
        return redirect('testimonies')->with('status_success','Created testimonies');
        
    }

    public function update_page(Testimonies $testimonies)
    {
     
        $contents = [
            'testimonies' => Testimonies::find($testimonies->idtestimonies)
        ];

        // return $content;

        $pagecontent = view('testimonies.update',$contents);

        // masterpage
        $pagemain = array(
            'title' => 'Update Testimonies',
            'menu' => 'testimonies',
            'submenu' => 'testimonies',
            'pagecontent' => $pagecontent
        );
        
        return view('masterpage', $pagemain);

    }

    public function update_save(Request $request, Testimonies $testimonies)
    {
        $request->validate([
            'name' => 'required',
            'jobrole' => 'required',
            'active' => '',
            'description' => 'required',
        ]);

        //active
        $active = FALSE;
        if($request->has('active')) {
            $active = TRUE;
        }

        $saveTestimonies = Testimonies::find($testimonies->idtestimonies);
        $saveTestimonies->name = $request->name;
        $saveTestimonies->jobrole = $request->jobrole;
        $saveTestimonies->description = $request->description;
        $saveTestimonies->active = $active;
        
        $image_old =  public_path('/images/' . $saveTestimonies->images);
        if ($request->hasFile('images')) {
            if (File::exists($image_old)) {
            $image = $request->file('images');
            $re_image = Str::random(20).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save( public_path('/images/' . $re_image) );
            $saveTestimonies->images = $re_image;
            }
            File::delete($image_old);
        }
        // return $saveTestimonies;
        $saveTestimonies->save();
        return redirect('testimonies')->with('status_success','Updated testimonies');

    }

    public function delete(Testimonies $testimonies)
    {
        $deleteTestimonies = Testimonies::find($testimonies->idtestimonies);
        $image_old =  public_path('/images/' . $deleteTestimonies->images);
        File::delete($image_old);        
        $deleteTestimonies->delete();
        return redirect('testimonies')->with('status_success','Deleted testimonies');
    }

}
