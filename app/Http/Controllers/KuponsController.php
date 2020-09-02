<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Kupons;
use Illuminate\Http\Request;

class KuponsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $contents = [
            'kupons' => Kupons::all(),
        ];

        $pagecontent = view('kupons.index',$contents ); // unuk menampilkan view categories dr view

        // masterpage
        $pagemain = array(
            'title' => 'Kupons',
            'menu' => 'discount',
            'submenu' => 'kupons',
            'pagecontent' => $pagecontent
        );
        
        return view('masterpage', $pagemain);
    }

    public function create_page()
    {
        $pagecontent = view('kupons.create');
  
      //masterpage
      $pagemain = array(
          'title' => 'Created Kupons',
          'menu' => 'kupons',
          'submenu' => 'kupons',
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

        $saveKupons = new Kupons;
        $saveKupons->name = $request->name;
        $saveKupons->start_date = $request->start_date;
        $saveKupons->end_date = $request->end_date;
        $saveKupons->save();
        return redirect('kupons')->with('status_success','Created kupons');


    }

    public function update_page(Kupons $kupons)
    {
        $contents = [
            'kupons' => Kupons::find($kupons->idkupons)
        ];

        // return $content;

        $pagecontent = view('kupons.update',$contents);

        // masterpage
        $pagemain = array(
            'title' => 'Updated Kupons',
            'menu' => 'kupons',
            'submenu' => 'kupons',
            'pagecontent' => $pagecontent
        );
        
        return view('masterpage', $pagemain);
    }

    public function update_save(Request $request,Kupons $kupons)
    {
        $request->validate([
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

            $updateKupons = Kupons::find($kupons->idkupons);
            $updateKupons->name = $request->name;
            $updateKupons->start_date = $request->start_date;
            $updateKupons->end_date = $request->end_date;
            $updateKupons->save();
            return redirect('kupons')->with('status_success','Update kupons');
    }

    public function delete(Kupons $kupons)
    {
        $deleteKupons = Kupons::find($kupons->idkupons);
        $deleteKupons->delete();
        return redirect('kupons')->with('status_success','Deleted kupons');

    }
}
