<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\AddUserAdmin;
use App\User;
use App\Http\Controllers\Controller;
use Datatables;


class UsersController extends Controller
{
    public function index()
    {
        return view('backend.users.index');
    }


    public function create()
    {
        return view('backend.users.add');
    }

    public function store(AddUserAdmin $request, User $user)
    {
        $user->create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

        return redirect()->back()->with(['message' => 'User Added Successfully']);
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('backend.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'min:6|confirmed',
        ]);
        $user = User::find($id);
        $user->name = $request['name'];
        $user->email = $request['email'];
        if (!empty($request['password'])) {
            $user->password = $request['password'];
        }
        $user->save();
        return redirect()->back()->with(['message' => 'User Updated Successfully']);
    }


    public function destroy($id)
    {
        if ($id != 1) {
            $user = User::find($id);
            $user->delete();
        }
        return redirect()->back()->with(['message' => 'User Deleted Not Deleted']);
    }


    public function dataTableUsers(User $user)
    {
        $users = $user->all();
        return Datatables::of($users)
        ->editColumn('name', function ($user){
            return '<a href="'.url('/admin/users/'.$user->id.'/edit').'">'.$user->name.'</a>';
        })
        ->editColumn('Actions', function ($user){
            $key = null;
            if ($user->id != 1) {
                $key .= '<form method="post" action="'.url('admin/users/'.$user->id).'" style="display: inline-block">';
                $key .= csrf_field();
                $key .= '<input type="hidden" name="_method" value="DELETE">';
                $key .= '<button class="btn btn-danger">Delete</button>';
                $key .= '</form>';
                $key .= ' ';
            }
            $key .= '<a href="'.url('/admin/users/'.$user->id.'/edit').'" class="btn btn-success">Edit</a>';
            return $key;
        })
        ->editColumn('admin', function ($user){
            $key = $user->admin == 0 ? 'User' : 'Admin';
            return $key;
        })
        ->make(true);
    }

}
