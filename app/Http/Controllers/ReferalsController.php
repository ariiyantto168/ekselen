<?php

namespace App\Http\Controllers;

use App\Models\Referals;
use Illuminate\Http\Request;

class ReferalsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $contents = [
            'referals' => Referals::all(),
        ];

        $pagecontent = view('referals.index',$contents ); // unuk menampilkan view categories dr view

        // masterpage
        $pagemain = array(
            'title' => 'Referals Index',
            'menu' => 'discount',
            'submenu' => 'referals',
            'pagecontent' => $pagecontent
        );
        
        return view('masterpage', $pagemain);
    }

    public function create_page()
    {
      $pagecontent = view('referals.create');
  
      //masterpage
      $pagemain = array(
          'title' => 'Input your referals',
          'menu' => 'referals',
          'submenu' => 'referals',
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
        $saveReferals = new Referals;
        $saveReferals->name = $request->name;
        $saveReferals->save();
        return redirect('referals')->with('status_success','Created Referals');
    }

    public function update_page(Referals $referals)
    {
        $contents = [
            'referals' => Referals::find($referals->idreferals)
        ];

        // return $content;

        $pagecontent = view('referals.update',$contents);

        // masterpage
        $pagemain = array(
            'title' => 'Update Your Referals',
            'menu' => 'referals',
            'submenu' => 'referals',
            'pagecontent' => $pagecontent
        );
        
        return view('masterpage', $pagemain);
    }

    public function update_save(Request $request, Referals $referals)
    {
        $request->validate([
            'name' => 'required',
        ]);
            // kiri dari database kanan dari blade
        $saveReferals = Referals::find($referals->idreferals);
        $saveReferals->name = $request->name;
        $saveReferals->save();
        return redirect('referals')->with('status_success','Updated Referals');
    }

    public function delete(Referals $referals)
    {
        $deleteReferals = Referals::find($referals->idreferals);
        //   return $deleteReferals;
        $deleteReferals->delete();
        return redirect('referals')->with('status_success','Deleted Referals');

    }
}
