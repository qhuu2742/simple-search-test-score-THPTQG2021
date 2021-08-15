<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
  function search()
  {



    return view('search');
  }

  function find(Request $request)
  {
    $request->validate([
      'query' => 'required|min:7'
    ],

    [
      'query.required' => 'Mày phải nhập số báo danh vào',
      'query.min' => 'Số báo danh phải có 7 ký tự'
    ]);

    $search_text = $request->input('query');
    
    $hcm       = DB::table('hcm')->where('SBD', 'LIKE', '%' . $search_text . '%');
    $ba        = DB::table('03_csv')->where('SBD', 'LIKE', '%' . $search_text . '%');
    
    $countries = DB::table('02_csv')->where('SBD', 'LIKE', '%' . $search_text . '%')
    ->unionAll($ba)
    ->unionAll($hcm)
    ->paginate(2);
    
    
    return view('search', ['countries' => $countries]);
  }
}
