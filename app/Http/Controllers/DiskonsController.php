<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use File;
use App\Models\Diskons;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DiskonsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $contents = [
            'diskons' => Diskons::all(),
        ];

        $pagecontent = view('diskons.index',$contents ); // unuk menampilkan view categories dr view

        // masterpage
        $pagemain = array(
            'title' => 'Discounts Index',
            'menu' => 'discount',
            'submenu' => 'diskons',
            'pagecontent' => $pagecontent
        );
        
        return view('masterpage', $pagemain);
    }

    public function create_page()
    {
      $pagecontent = view('diskons.create');
  
      //masterpage
      $pagemain = array(
          'title' => 'Masukan discounts',
          'menu' => 'diskons',
          'submenu' => 'diskons',
          'pagecontent' => $pagecontent,
      );
  
      return view('masterpage', $pagemain);
    }

    public function save_page(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        //active
        $active = FALSE;
        if($request->has('active')) {
            $active = TRUE;
        }


        $saveDiskons = new Diskons;
        $saveDiskons->name = $request->name;
        $saveDiskons->start_date = $request->start_date;
        $saveDiskons->end_date = $request->end_date;
        $saveDiskons->description = $request->description;
        $saveDiskons->active = $active;
        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $re_image = Str::random(20).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save( public_path('/images/diskons/' . $re_image) );
            $saveDiskons->images = $re_image;
        }

        $saveDiskons->save();
        return redirect('diskons')->with('status_success','Created Discounts');


    }

    public function update_page(Diskons $diskons)
    {
        $contents = [
            'diskons' => Diskons::find($diskons->iddiskons)
        ];

        // return $content;

        $pagecontent = view('diskons.update',$contents);

        // masterpage
        $pagemain = array(
            'title' => 'Updated Discounts',
            'menu' => 'diskons',
            'submenu' => 'diskons',
            'pagecontent' => $pagecontent
        );
        
        return view('masterpage', $pagemain);
    }

    public function update_save(Request $request, Diskons $diskons)
    {
        $request->validate([
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        //active
        $active = FALSE;
        if($request->has('active')) {
            $active = TRUE;
        }

        $updateDiskons = Diskons::find($diskons->iddiskons);
        $updateDiskons->name = $request->name;
        $updateDiskons->start_date = $request->start_date;
        $updateDiskons->end_date = $request->end_date;
        $updateDiskons->description = $request->description;
        $updateDiskons->active = $active;
        $image_old =  public_path('/images/diskons/' . $updateDiskons->images);
        if ($request->hasFile('images')) {
            if (File::exists($image_old)) {
            $image = $request->file('images');
            $re_image = Str::random(20).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save( public_path('/images/diskons/' . $re_image) );
            $updateDiskons->images = $re_image;
            }
            File::delete($image_old);
        }
        // return $saveTestimonies;
        $updateDiskons->save();
        return redirect('diskons')->with('status_success','Updated Discounts');

    }

    public function delete(Diskons $diskons)
    {
        $deleteDiskons = Diskons::find($diskons->iddiskons);
        $image_old =  public_path('/images/diskons/' . $deleteDiskons->images);
        File::delete($image_old);        
        $deleteDiskons->delete();
        return redirect('diskons')->with('status_success','Deleted Diskons');
    }
}
