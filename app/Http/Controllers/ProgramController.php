<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['programs'] = \App\Models\Program::all();
        return view('layouts/programs',$this->data);
    }

   
    public function createprograms()
    {

        return view('layouts/createprograms');
    }

   
    public function storePrograms(Request $request)
    {
        $data = request()->validate([
            'program_name' => 'required|string',
			'program_code'=>'required|string',
            'program_time' => 'required',
            'program_type' =>  'required|string',
		]);
        $uuid = Str::uuid()->toString();
        $array_data = array_merge(['uuid'=>$uuid],$data);
		 \App\Models\Program::create($array_data);
        return redirect('/programs')->with('Created successfully');
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
    public function editprograms($id)
    { 
		$this->data['program'] = \App\Models\Program::find($id);
        return view('layouts/editprogram',$this->data);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProgram()
    {
          $data = request()->all();
          $program_id = request('program_id');
		 \App\Models\Program::find($program_id)->update($data);
         return redirect('/programs')->with('success','Edited successfully');
         
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
