<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bulding;

class BuldingsController extends Controller
{
    public function index()
    {
        return view('backend.buldings.index');
    }

    public function create()
    {
        return view('backend.buldings.add');
    }

    public function store(BuldingsRequest $request)
    {

    }



    public function dataTableBuldings(Bulding $bulding)
    {
        $bulding = $bulding->all();
        return Datatables::of($bulding)
        ->editColumn('type', function ($bulding){
            $type = bulding_type();
            return '<span class="badge badge-success">'.$type[$bulding->type].'</span>';
        })
        ->editColumn('status', function ($bulding){
            return $bulding->status == 0 ? '<span class="badge badge-danger">Deactivated</span>' : '<span class="badge badge-success">Activated</span>';
        })
        ->editColumn('Actions', function ($bulding){
            $key = null;
            $key .= '<a href="'.url('/admin/buldings/delete/'.$bulding->id).'" class="btn btn-danger">Delete</a>';
            $key .= '<a href="'.url('/admin/buldings/edit/'.$bulding->id).'" class="btn btn-success">Edit</a>';
            return $key;
        })
        ->make(true);
    }
}
