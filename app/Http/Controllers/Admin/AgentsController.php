<?php

namespace App\Http\Controllers\Admin;

use App\Job;
use App\Agent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AgentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agents = Agent::with('profile')->get();

        return view('admin.agents.index')->withAgents($agents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jobs = Job::all();
        
        return view('admin.agents.create')->withJobs($jobs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $profile_data = request()->validate([
            'first_name' => 'string',
            'last_name' => 'string',
            'middle_name' => 'nullable|string',
            'email' => 'nullable|email',
        ]);

        $agent_data = request()->validate([
            'job_id' => 'numeric',
            'role' => 'string',
            'password' => '',
        ]);
        
        try{
            $agent->profile->update($profile_data);
            $agent->update($agent_data);
        } catch(\Exception $e) {
            return redirect()
                ->back()
                ->with('flash', 'La modification a ete faite.');
        }

        return redirect()->route('agents.index')
            ->with('flash', 'La modification a ete faite.');
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
        $agent = Agent::findOrFail($id)->load('profile');
        $jobs = Job::all();

        return view('admin.agents.edit', compact('agent', 'jobs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agent $agent)
    {
        // return request();
        $profile_data = request()->validate([
            'first_name' => 'string',
            'last_name' => 'string',
            'middle_name' => 'nullable|string',
            'email' => 'nullable|email',
        ]);

        $agent_data = request()->validate([
            'job_id' => 'numeric',
            'role' => 'string',
            // 'password' => '',
            // 'p'
        ]);
        
        try{
            $agent->profile->update($profile_data);
            $agent->update($agent_data);
        } catch(\Exception $e) {
            return redirect()
                ->back()
                ->with('flash', 'La modification a ete faite.');
        }

        return redirect()->route('agents.index')
            ->with('flash', 'La modification a ete faite.');
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
