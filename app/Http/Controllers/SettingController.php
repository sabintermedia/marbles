<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SettingController extends Controller
{

    public $setting;

    public function __construct()
    {
       $this->setting = new Setting;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data = Setting::all();
      return view('settings', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        $settingID = $setting->id;
        return view('showSetting');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
      $data = Setting::findOrFail($setting->id);
      return view('editsettings', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
      $id = $setting->id;
      $data = $request->validate([
        'content' => 'numeric|max:10'
      ]);

      Setting::whereId($id)->update($data);
      return redirect('/setting')->with('success','Setting saved');
    }

    /**
     * Update n in game view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  array  $setting
     * @return \Illuminate\Http\Response
     */
    public function updategame(Request $request, $setting)
    {
      $set = collect($setting);
      $data = $request->validate([
        'content' => 'numeric|max:10'
      ]);

      Setting::whereId(1)->update($data);
      return redirect('/playgame')->with('success','Setting saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
