<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\test;

class TestController extends Controller
{
    function getData(){
        $data = test::all();
        return view('testShow', ['members' => $data] );
    }
    function addData(Request $req){
        $error = array();
        //------------Empty Check---------------
        if(empty($req->name) || empty($req->email) || empty($req->phone) || empty($req->salary)){
            $error['empty'] = "Please Fill up the form";
        }// /Empty Check/
        //------------Email Check---------------
        $email = $req->email;  
        $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";  
        if (!preg_match ($pattern, $email) ){  
            $error['email'] = 'Enter a valid email';          
        }// /Email Check
         //------------Number Check---------------
         $mobileno = $req->phone;  
         if (!preg_match ("/^[0-9]*$/", $mobileno) ){  
            $error['phone'] = "Only numeric value is allowed.";     
         }//Number Check
         //------------Salary Check---------------
         $salary = $req->salary;  
         if (!preg_match ("/^[0-9]*$/", $salary) ){  
            $error['salary'] = "Only numeric value is allowed.";     
         }//Salary Check

        
        if(count($error)==0){
            $test = new test;
            $test->name = $req->name;
            $test->email = $req->email;
            $test->phone = $req->phone;
            $test->salary = $req->salary;
            if($req->hasFile('image')){
                $file = $req->file('image');
                //$extension = $file->getClientOriginalExtension();
                $originalName = $file->getClientOriginalName();
                $fileName = time()."-".$originalName;
                $file->move('uploads/members/',$fileName);
                $test->image = $fileName;
            }
            if($test->save()){
                return redirect('test'); 
            };
        }else{
            return view('addMember', [ 'error' => $error]);
        }
        }

    
    function deleteData($id){
        $data = test::find($id);
        $data->delete();
        return redirect('test');
    }
    function updateData($id){
        $data = test::find($id);
        return view('updateMember', ['member' => $data] );
    }
    function update(Request $req){
        $error = array();
        //------------Empty Check---------------
        if(empty($req->name) || empty($req->email) || empty($req->phone) || empty($req->salary)){
            $error['empty'] = "Please Fill up the form";
        }// /Empty Check/
        //------------Email Check---------------
        $email = $req->email;  
        $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";  
        if (!preg_match ($pattern, $email) ){  
            $error['email'] = 'Enter a valid email';          
        }// /Email Check
         //------------Number Check---------------
         $mobileno = $req->phone;  
         if (!preg_match ("/^[0-9]*$/", $mobileno) ){  
            $error['phone'] = "Only numeric value is allowed.";     
         }//Number Check
         //------------Salary Check---------------
         $salary = $req->salary;  
         if (!preg_match ("/^[0-9]*$/", $salary) ){  
            $error['salary'] = "Only numeric value is allowed.";     
         }//Salary Check
        if(count($error)==0){
            $test = test::find($req->id);
            $test->name = $req->name;
            $test->email = $req->email;
            $test->phone = $req->phone;
            $test->salary = $req->salary; 
            if($req->hasFile('image')){
                $file = $req->file('image');
                //$extension = $file->getClientOriginalExtension();
                $originalName = $file->getClientOriginalName();
                $fileName = time()."-".$originalName;
                $file->move('uploads/members/',$fileName);
                $test->image = $fileName;
            }else{
                $test->image = $req->previmage;
            }
            if($test->save()){
                return redirect('test'); 
            };
        }else{
            return view('addMember', [ 'error' => $error]);
        }
    }
}