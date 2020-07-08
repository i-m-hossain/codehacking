<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersEditRequest;
use App\Http\Requests\UsersRequest;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //
        $users = User::all();

        return view ('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::pluck('name', 'id')->all();

        return view ('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        //
        if(trim($request->password='')){
          $input = $request->except('password');
        }else{
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }
        if($file = $request->file('photo_id')){ // checking if the photo is uploaded

            $name = time().$file->getClientOriginalName(); // appending time with the images name
            $file->move('images', $name); // moving the uploaded file to public image directory
            $photo = Photo::create(['file'=>$name]); //creating the photo in database 'photos table' which has a photo id
            $input['photo_id'] = $photo->id; // assigning the photo_id


        }

        User::create($input);

        return redirect('/admin/users');


//        User::create($request->all());
//        return redirect('/admin/users');
//        return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return view ('admin.users.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::findOrFail($id);
        $roles = Role::pluck('name', 'id')->all();
        return view('admin.users.edit', compact('user', 'roles'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersEditRequest $request, $id)
    {
        //
        if(trim($request->password='')){
            $input = $request->except('password');
        }else{
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }
        $user = User::findOrFail($id);

        if ($file = $request->file('photo_id')){//finding if the file is uploaded
            $name = time().$file->getClientOriginalName();// giving the file a  name
            $file->move('images', $name);//moving the file to a directory
            $photo = Photo::create(['file'=>$name]); //creating the photo in photos table which has an id
            $input['photo_id'] = $photo->id; //assigning he file id to photo id

        }


        $user->update($input);
        return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
