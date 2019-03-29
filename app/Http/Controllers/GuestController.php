<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guest;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Guest::whereNull('deleted_at')->get();
        return view('guests.index',['data'=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|email',
            'gender'=>'required',
            'address'=>'required',
        ]);

        $guest = new Guest([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'phone_number' => $request->get('phone_number'),
            'gender' => $request->get('gender'),
            'address' => $request->get('address')
        ]);
        $guest->save();

        return redirect('/')->with('success', 'Successfully saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $guest = Guest::find($id);
        return view('guests.edit',['guest'=> $guest]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Guest::find($id);
        return view('guests.edit',['data'=> $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|email',
            'gender'=>'required',
            'address'=>'required',
        ]);


        $guest = Guest::find($id);
        $guest->first_name =  $request->get('first_name');
        $guest->last_name = $request->get('last_name');
        $guest->email = $request->get('email');
        $guest->phone_number = $request->get('phone_number');
        $guest->gender = $request->get('gender');
        $guest->address = $request->get('address');
        $guest->save();
        
        return redirect('/guests/'.$id.'/edit')
            ->with(['success'=>'Successfully updated!'])
            ->withInput(['data'=>$guest]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guest = Guest::find($id);
        $guest->delete();

        return redirect('/')->with('success', 'Successfully deleted!');
    }
}
