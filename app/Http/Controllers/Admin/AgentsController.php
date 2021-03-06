<?php

namespace App\Http\Controllers\Admin;

use App\Job;
use App\User;
use App\Agent;
use App\Profile;
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
        $agents = Agent::with('profile', 'job')->get();

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
    public function store(Request $request, Agent $agent, User $user, Profile $profile)
    {
        // validation                           
        request()->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'middle_name' => 'nullable|string',
            'email' => 'nullable|email',
            'job_id' => 'required|numeric',
            'role' => 'required|string',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);
        
        try{
            $profile = $profile->create(request()->only([
                'first_name',
                'last_name',
                'middle_name',
                'email',
            ]));

            $client_request = request()->only([
                'role',
                'job_id'
            ]);

            $client_request['profile_id'] = $profile->id;
            
            $agent = $agent->create($client_request);
            
            $user_request = request()->only([
                'owner_type',
                'owner_id',
                'username',
                'password'
            ]);

            $user_request['owner_type'] = "App\Agent";
            $user_request['owner_id'] = $agent->id;

            $user->create($user_request);
        } catch(\Exception $e) {
            // flash('Une Erreur est survenue ! Reessayer.')->danger();
            
            return redirect()
                ->back()
                ->with('flash', 'Une Erreur est survenue ! Reessayer.');
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
        request()->validate([
            'password' => 'required_with:password_confirmation',
            'password_confirmation' => 'required_with:password|same:password',
        ]);

        $profile_data = request()->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'middle_name' => 'nullable|string',
            'email' => 'nullable|email',
        ]);

        $agent_data = request()->validate([
            'job_id' => 'required|numeric',
            'role' => 'required|string'
        ]);
        
        try{
            $agent->profile->update($profile_data);
            $agent->update($agent_data);
            $agent->data->update(request()->only('password'));
        } catch(\Exception $e) {
            return redirect()
                ->back()
                ->with('flash', 'La modification a echouee.');
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
        $agent = Agent::findOrFail($id);
        // return $agent->profile;
        
        $agent->data->delete();
        $agent->profile->delete();
        $agent->delete();

        return redirect()->route('agents.index');
    }
}
