<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PersonalInfo;
use DB;
use PDF;
use File;
use Spatie\Browsershot\Browsershot;

class CVBuilderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $personal_info = new PersonalInfo();
        $personal_info->name = $request->name;
        $personal_info->job_title = $request->job_title;
        $personal_info->address = $request->address;
        $personal_info->email = $request->email;
        $personal_info->phone_no = $request->phone_no;
        $personal_info->website_link = $request->website_link;
        $personal_info->bio = $request->bio;
        $personal_info->save();

        $image = '';
        $image_name = '';
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $personal_info->image = $image_name;
            $destination_path = public_path('/cvBuilder/assets/uploads/profile_images/' . $personal_info->id);
            $image->move($destination_path, $image_name);
        }

        $educations = [];
        $experiences = [];
        $skills = [];
        $social_links = [];
        $hobbys = [];

        if(isset($request->field_of_studys)){
            foreach($request->field_of_studys as $key=> $field){
                if(isset($field)){
                    array_push($educations,['user_id' => $personal_info->id,'field_of_study' => $field, 'degree' => $request->degrees[$key],
                    'school' => $request->schools[$key], 'from_year' => date('Y-m-d',strtotime($request->edu_from_year[$key])),'to_year' => date('Y-m-d',strtotime($request->edu_to_year[$key]))]);
                }
            }
        }
        DB::table('education')->insert($educations);

        if(isset($request->companys)){
            foreach($request->companys as $key=> $company){
                if(isset($company)){
                    array_push($experiences,['user_id' => $personal_info->id,'company' => $company, 'position' => $request->positions[$key],
                    'from_year' => date('Y-m-d',strtotime($request->exp_from_year[$key])),'to_year' => date('Y-m-d',strtotime($request->exp_to_year[$key]))]);
                }
            }
        }
        DB::table('experiences')->insert($experiences);

        if(isset($request->skills)){
            foreach($request->skills as $key=> $skill){
                if(isset($skill)){
                    array_push($skills,['user_id' => $personal_info->id,'skill' => $skill, 'proficiency' => $request->proficiencys[$key]]);
                }
            }
        }
        DB::table('skills')->insert($skills);

        if(isset($request->social_names)){
            foreach($request->social_names as $key=>$name){
                if(isset($name)){
                    array_push($social_links,['user_id' => $personal_info->id,'name' => $name, 'link' => $request->social_links[$key]]);
                }
            }
        }
        DB::table('social_links')->insert($social_links);

        // if(isset($request->hobbys)){
        //     foreach($request->hobbys as $key=>$hobby){
        //         if(isset($hobby)){
        //             array_push($hobbys,['user_id' => $personal_info->id,'name' => $hobby]);
        //         }
        //     }
        // }
        // DB::table('hobbies')->insert($hobbys);
        return view('cvBuilder.cv',compact('personal_info'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
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
        //
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
