<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ninja;
use App\Models\Dojo;

class NinjaController extends Controller
{
    public function index() {
        // route --> /ninjas/
        // fetch all records & pass into the index view
  
        // $ninjas = Ninja::all();
        $ninjas = Ninja::with('dojo')->orderBy('created_at', 'desc')->paginate(10);
  
        return view('ninjas.index', ['ninjas' => $ninjas]);
      }
  
      public function show($id) {
        // route --> /ninjas/{id}
        $ninja =Ninja::with('dojo')->findOrFail($id);
        return view('ninjas.show', ['ninja' => $ninja]);
        // fetch a single record & pass into show view

      }
  
      public function create() {
        $dojos = Dojo::all();
        // route --> /ninjas/create
        // render a create view (with web form) to users
        return view('ninjas.create',['dojos'=> $dojos]);
      }
  
      public function store() {
        // --> /ninjas/ (POST)
        // hanlde POST request to store a new ninja record in table
      }
  
      public function destroy($id) {
        // --> /ninjas/{id} (DELETE)
        // handle delete request to delete a ninja record from table
      }
  
      // edit() and update() for edit view and update requests
      // we won't be using these routes
}
