<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bulding;
use App\Http\Requests\BuldingsRequest;
use Auth;
use DB;

class BuldingsController extends Controller
{
    public function index()
    {
        $bus = Bulding::orderBy('id', 'DESC')->paginate(9);
        return view('backend.buldings.index', compact('bus'));
    }

    public function create()
    {
        return view('backend.buldings.add');
    }

    public function store(BuldingsRequest $request)
    {
        // `id`, `name`, `price`, `rooms`, `rent`, `square`,
        // `type`, `small_dis`, `meta`, `langtude`, `latitude`,
        // `larg_dis`, `status`, `user_id`
        $bu = new Bulding();
        $bu->name       =   $request['name'];
        $bu->price      =   $request['price'];
        $bu->rooms      =   $request['rooms'];
        $bu->rent       =   $request['rent'];
        $bu->square     =   $request['square'];
        $bu->type       =   $request['type'];
        $bu->small_dis  =   $request['small_dis'];
        $bu->meta       =   $request['meta'];
        $bu->langtude   =   $request['langtude'];
        $bu->latitude   =   $request['latitude'];
        $bu->larg_dis   =   $request['larg_dis'];
        $bu->status     =   $request['status'];
        $bu->place_id   =   $request['place_id'];
        $bu->user_id    =   Auth::user()->id;
        $bu->save();

        return redirect('/admin/buldings')->with(['message' => 'Done']);
    }


    public function edit($id)
    {
        $bulding = Bulding::find($id);
        return view('backend.buldings.edit', compact('bulding'));
    }

    public function update(BuldingsRequest $request, $id)
    {
        $bu = Bulding::find($id);
        $bu->name       =   $request['name'];
        $bu->price      =   $request['price'];
        $bu->rooms      =   $request['rooms'];
        $bu->rent       =   $request['rent'];
        $bu->square     =   $request['square'];
        $bu->type       =   $request['type'];
        $bu->small_dis  =   $request['small_dis'];
        $bu->meta       =   $request['meta'];
        $bu->langtude   =   $request['langtude'];
        $bu->latitude   =   $request['latitude'];
        $bu->larg_dis   =   $request['larg_dis'];
        $bu->status     =   $request['status'];
        $bu->place_id   =   $request['place_id'];
        $bu->save();
        return redirect()->back()->with(['message' => 'The Bulding Updated Successfully']);
    }

    public function delete($id)
    {
        $bu = Bulding::find($id);
        $bu->delete();
        return redirect()->back()->with(['message' => 'The Bulding Deleted Successfully']);
    }

    public function showAllEnabled()
    {
        $buldings = Bulding::where('status', 1)->orderBy('id', 'desc')->paginate(9);
        $active = 'all';
        return view('frontend.all', compact('buldings', 'active'));
    }
    public function showAllEgar()
    {
        $buldings = Bulding::where('status', 1)->where('rent', 0)->orderBy('id', 'desc')->paginate(9);
        $active = 'egar';
        return view('frontend.all', compact('buldings', 'active'));
    }
    public function showAllTamleek()
    {
        $buldings = Bulding::where('status', 1)->where('rent', 1)->orderBy('id', 'desc')->paginate(9);
        $active = 'tamleek';
        return view('frontend.all', compact('buldings', 'active'));
    }
    public function showVillas()
    {
        $buldings = Bulding::where('status', 1)->where('type', 0)->orderBy('id', 'desc')->paginate(9);
        $active = 'villa';
        return view('frontend.all', compact('buldings', 'active'));
    }
    public function showApartments()
    {
        $buldings = Bulding::where('status', 1)->where('type', 1)->orderBy('id', 'desc')->paginate(9);
        $active = 'apartment';
        return view('frontend.all', compact('buldings', 'active'));
    }
    public function showBeatchHomes()
    {
        $buldings = Bulding::where('status', 1)->where('type', 2)->orderBy('id', 'desc')->paginate(9);
        $active = 'beachhome';
        return view('frontend.all', compact('buldings', 'active'));
    }


    public function search(Request $request, Bulding $buldings)
    {
        $requestAll = array_except($request->all(), ['submit', '_token', 'page']);
        $query = DB::table('buldings')->select('*')->where('status', 1);
        $breadcrumb = [];
        $count = count($requestAll);
        $i = 0;
        foreach ($requestAll as $key => $req) {
            $i++;
            if (!empty($req)) {
                if ($key == 'price_from' && $requestAll['price_to'] == '') {
                    // dd("price from not empty");
                    $query->where('price', '>=', $req);
                }elseif($key == 'price_to' && $requestAll['price_from'] == ''){
                    // dd("price to not empty");
                    $query->where('price', '<=', $req);
                }else {
                    if ($key != 'price_to' && $key != 'price_from') {
                        $query->where($key, $req);
                    }
                }
                $breadcrumb[$key] = $req;
            }elseif ($count == $i && !empty($requestAll['price_to']) && !empty($requestAll['price_from'])) {
                $query->whereBetween('price', [intval($requestAll['price_from']), intval($requestAll['price_to'])]);
            }
        }
        $buldings = $query->paginate(9);
        return view('frontend.all', compact('buldings', 'breadcrumb'));
    }

    public function single($id)
    {
        $bulding = Bulding::findOrFail($id);
        $same_rent = Bulding::where('rent', $bulding->rent)->orderBy(DB::raw('RAND()'))->take(3)->get();
        $same_type = Bulding::where('type', $bulding->type)->orderBy(DB::raw('RAND()'))->take(3)->get();
        return view('frontend.single', compact('bulding', 'same_rent', 'same_type'));
    }

}
