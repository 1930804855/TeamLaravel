<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Meeting;
use App\Salesman;
use App\Client;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $page = config('app.pageSize');
        $meeting = Meeting::select('meeting.*','c_name','s_name')
                            ->leftjoin('client','meeting.c_id','=','client.c_id')
                            ->leftjoin('salesman','meeting.s_id','=','salesman.s_id')
                            ->orderBy('m_id','desc')
                            ->paginate($page);
        return view('meeting.index',['meeting'=>$meeting]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $salesman = Salesman::all();
        $client = Client::all();
        //dd($client);
        return view('meeting.create',compact('salesman','client'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([ 
            'm_man' => 'required|meeting', 
            'c_id' => 'required', 
            's_id' => 'required',
            'm_address' => 'required',
        ],[
            'm_man.required' =>"拜访人必填",
            'c_id.required' =>'客户必填',
            's_id.required' =>'业务员必填',
            'm_address.required' =>'访问地址必填',

        ]);

        $data = $request ->except("_token");
        $data['m_time'] = time();
        $res = Meeting::insert($data);
        if($res){
            return redirect('meeting/index');
        }
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
        $meetingInfo = Meeting::find($id);
        $salesman = Salesman::all();
        $client = Client::all();
        return view('meeting.edit',compact('salesman','client','meetingInfo'));
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
        //接收值
        $data = $request ->except('_token');
        $res = Meeting::where('m_id',$id) ->update($data);
        if($res!==false){
            return redirect('meeting/index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Meeting::destroy($id);
        if($res){
            return redirect('meeting/index');
        }
    }
}
