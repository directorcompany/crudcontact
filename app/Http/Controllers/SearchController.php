<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class SearchController extends Controller
{
    //
    public function get() {
        
        $search=request()->search;
       $get=Contact::query()->where('name','LIKE',"%{$search}%")
          ->orWhere('telephone','LIKE',"%{$search}%")
          ->orWhere('email','LIKE',"%{$search}%")
         ->paginate(15);
          
         return view('layout.search',compact('get')) 
         ->with('i', (request()->input('page', 1) - 1) * 5);;
    }
}
