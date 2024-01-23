<?php

namespace App\Http\Controllers;
use App\Models\section;
use App\Models\person;
use Illuminate\Http\Request;
use App\Models\project;
use Session;

class formController extends Controller
{
    public function storeData(Request $request){
        $section=new section();
        $section->title=$request->title;
        $section->subtitle=$request->subtitle;
        $section->description=$request->description;
        $section->save();

        Session::flash('msg','Section Data has been successfully created.');
        return redirect('/form');
    }


    public function showData(){
        $showData=section::all();
        
        return view('admin.showData', compact('showData'));
    }


    public function editData($title){
        $editData = section::where('title', $title)->first();
        return view('admin.edit', compact('editData'));
    }

    public function updateData(Request $request, $title){
        $section = section::where('title', $title)->first();
    
        if (!$section) {
            abort(404); // Handle record not found
        }
    
        $section->title = $request->title;
        $section->subtitle = $request->subtitle;
        $section->description = $request->description;
        $section->save();
    
        Session::flash('msg', 'Section Data has been successfully updated.');
        return redirect('/show');
    }
    
    



    public function storeProject(Request $request){



        $project=new project();
        $project->title=$request->title;
        $project->livelink=$request->livelink;
        $project->description=$request->description;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $base64Image = base64_encode(file_get_contents($image->getRealPath()));
            $project->image = $base64Image;
        }
        $project->save();

        Session::flash('msg','Project Data has been successfully created.');
        return redirect('/project');
    }


    public function showProject(){
        $projects = project::all();
        return view('admin.create_project', compact('projects'));
    }




    public function storePerson(Request $request){

        $people=new person();
        $people->name=$request->name;
        $people->designation=$request->designation;
        $people->email=$request->email;
        $people->phone=$request->phone;
        $people->bio=$request->bio;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $base64Image = base64_encode(file_get_contents($image->getRealPath()));
            $people->image = $base64Image;
        }
        $people->save();

        Session::flash('msg','Personal Information has been successfully inserted.');
        return redirect('/personal-info');
    }


    public function showInfo(){
        $showInfo=person::all();
        
        return view('admin.personal', compact('showInfo'));
    }

}
