<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Http\Requests\ApplicationUpdateRequest;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = Application::all();
        return view('users/index', ['models'=> $models]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApplicationRequest $request)
    {
        $model = new Application();
        $model->theme = $request->theme;
        $model->message = $request->message;
        $model->name = $request->name;
        $model->email = $request->email;
        $model->file = $request->file('file')->store('public');
        $image = explode('/', $model->file);
        $model->file = array_pop($image);
        $model->status = 0;
        $model->save();
        return redirect()->route('users.index')->with('status', 'Отправлено');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $models = Application::find($id);
        return view('users.update', ['models'=> $models]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ApplicationUpdateRequest $request, $id)
    {
        $model = new Application();
        $model->theme = $request->theme;
        $model->message = $request->message;
        $model->name = $request->name;
        $model->email = $request->email;
        if (isset($request->file)){
            Storage::delete($model->file);
            $model->file = $request->file('file')->store('public');
            $image = explode('/', $model->file);
            $model->file = array_pop($image);
        }
        $model->update();
        return redirect()->route('users.index')->with('status', 'Обновлено');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Application::find($id);
        Storage::delete($model->file);
        $model->delete();
        return redirect()->route('users.index')->with('status', 'Удалено');
    }
}
