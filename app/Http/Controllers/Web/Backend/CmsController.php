<?php

namespace App\Http\Controllers\Web\Backend;

use Exception;
use App\Models\C_M_S;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CmsController extends Controller
{

    public function modernsectioncreate(){
        $cms = C_M_S::find(9);
        return view("backend.layouts.listingsection.index",compact('cms'));
    }

    public function modernsectionupdate(Request $request){
        $cms = C_M_S::find(9);
        if($request->hasFile('image')){
            $image_file_on_uploads = public_path('uploads/backend/'.$cms->image_url);
            if(File::exists($image_file_on_uploads)){
                @unlink($image_file_on_uploads);
            }
            $file = $request->file('image');
            $name = $file->getClientOriginalExtension();
            $filename = rand().'.'.$name;
            $file->move(public_path('uploads/backend/'), $filename);
        }
        try {
            $cms = C_M_S::find(9);
            $cms->title = $request->title;
            $cms->description = $request->description;
            $cms->image_url = $filename;
            $cms->save();
            if($cms){
                return back()->with('t-success','Content updated successfully');
            }else{
                return back()->with('t-error','Content failed to update');
            }
        } catch (Exception $e) {
            return response()->json(['error' => 'Record not found'], 404);
        }
    }
         //
    public function listingcreate(){
            $cms = C_M_S::find(9);
            return view("backend.layouts.listingsection.index",compact('cms'));
        }
        public function listingupdate(Request $request){
            try {
                $cms = C_M_S::find(9);
                $cms->title = $request->title;
                $cms->description = $request->description;
                $cms->save();
                if($cms){
                    return back()->with('t-success','Content updated successfully');
                }else{
                    return back()->with('t-error','Content failed to update');
                }
            } catch (Exception $e) {
                return response()->json(['error' => 'Record not found'], 404);
            }
        }

        //
    public function ownsectioncreate(){
        $cms = C_M_S::find(8);
        return view("backend.layouts.ownsection.index",compact('cms'));
    }
    public function ownsectionupdate(Request $request){
        try {
            $cms = C_M_S::find(8);
            $cms->title = $request->title;
            $cms->description = $request->description;
            $cms->save();
            if($cms){
                return back()->with('t-success','Content updated successfully');
            }else{
                return back()->with('t-error','Content failed to update');
            }
        } catch (Exception $e) {
            return response()->json(['error' => 'Record not found'], 404);
        }
    }

     //
     public function placeworksectioncreate(){
        $cms = C_M_S::find(7);
        return view("backend.layouts.workplace.index",compact('cms'));
    }
    public function placeworksectionupdate(Request $request){
        try {
            $cms = C_M_S::find(7);
            $cms->title = $request->title;
            $cms->description = $request->description;
            $cms->save();
            if($cms){
                return back()->with('t-success','Content updated successfully');
            }else{
                return back()->with('t-error','Content failed to update');
            }
        } catch (Exception $e) {
            return response()->json(['error' => 'Record not found'], 404);
        }
    }
       //
    public function aboutworkcreate(){
        $cms = C_M_S::find(6);
        return view("backend.layouts.aboutwork.index",compact('cms'));
    }
    public function aboutworkupdate(Request $request){
        $cms = C_M_S::find(6);
        if($request->hasFile('image')){
            $image_file_on_uploads = public_path('uploads/backend/'.$cms->image_url);
            if(File::exists($image_file_on_uploads)){
                @unlink($image_file_on_uploads);
            }
            $file = $request->file('image');
            $name = $file->getClientOriginalExtension();
            $filename = rand().'.'.$name;
            $file->move(public_path('uploads/backend/'), $filename);
        }
        try {
            $cms = C_M_S::find(6);
            $cms->title = $request->title;
            $cms->description = $request->description;
            $cms->image_url = $filename;
            $cms->save();
            if($cms){
                return back()->with('t-success','Content updated successfully');
            }else{
                return back()->with('t-error','Content failed to update');
            }
        } catch (Exception $e) {
            return response()->json(['error' => 'Record not found'], 404);
        }
    }

     //
     public function aboutcreate(){
        $cms = C_M_S::find(5);
        return view("backend.layouts.propertyabout.index",compact('cms'));
    }
    public function aboutupdate(Request $request){
        $cms = C_M_S::find(5);

        if($request->hasFile('image')){
            $image_file_on_uploads = public_path('uploads/backend/'.$cms->image_url);
            if(File::exists($image_file_on_uploads)){
                @unlink($image_file_on_uploads);
            }
            $file = $request->file('image');
            $name = $file->getClientOriginalExtension();
            $filename = rand().'.'.$name;
            $file->move(public_path('uploads/backend/'), $filename);
        }
        else{
            $filename = $cms->image_url;
        }
        if($request->hasFile('icon')){
            $icon_file_on_uploads = public_path('uploads/backend/'.$cms->image_icon);
            if(File::exists(path: $icon_file_on_uploads)){
                @unlink($icon_file_on_uploads);
            }
            $file = $request->file('icon');
            $name = $file->getClientOriginalExtension();
            $iconname = rand().'.'.$name;
            $file->move(public_path('uploads/backend/'), $iconname);
        }else{
            $iconname = $cms->image_icon;
        }
        try {
            // $cms = C_M_S::find(5);
            $cms->title = $request->title;
            $cms->sub_title = $request->sub_title;
            $cms->image_url = $filename;
            $cms->image_icon = $iconname;
            $cms->save();
            if($cms){
                return back()->with('t-success','Content updated successfully');
            }else{
                return back()->with('t-error','Content failed to update');
            }
        } catch (Exception $e) {
            return back()->with('t-error',$e->getMessage());
        }
    }
       //
       public function useabilitycreate(){
        $cms = C_M_S::find(4);
        return view("backend.layouts.useability.index",compact('cms'));
    }
    public function useabilityupdate(Request $request){
        $cms = C_M_S::find(4);

        if($request->hasFile('image')){
            $image_file_on_uploads = public_path('uploads/backend/'.$cms->image_url);
            if(File::exists($image_file_on_uploads)){
                @unlink($image_file_on_uploads);
            }
            $file = $request->file('image');
            $name = $file->getClientOriginalExtension();
            $filename = rand().'.'.$name;
            $file->move(public_path('uploads/backend/'), $filename);
        }
        try {
            $cms = C_M_S::find(4);
            $cms->title = $request->title;
            $cms->sub_title = $request->sub_title;
            $cms->image_url = $filename;
            $cms->save();
            if($cms){
                return back()->with('t-success','Content updated successfully');
            }else{
                return back()->with('t-error','Content failed to update');
            }
        } catch (Exception $e) {
            return response()->with('t-error', $e->getMessage());
        }
    }
      //
      public function administrationcreate(){
        $cms = C_M_S::find(3);
        return view("backend.layouts.administation.index",compact('cms'));
    }
    public function administrationupdate(Request $request){
        $cms = C_M_S::find(3);

        if($request->hasFile('image')){
            $image_file_on_uploads = public_path('uploads/backend/'.$cms->image_url);
            if(File::exists($image_file_on_uploads)){
                @unlink($image_file_on_uploads);
            }
            $file = $request->file('image');
            $name = $file->getClientOriginalExtension();
            $filename = rand().'.'.$name;
            $file->move(public_path('uploads/backend/'), $filename);
        }
        try {
            $cms = C_M_S::find(3);
            $cms->title = $request->title;
            $cms->sub_title = $request->sub_title;
            $cms->image_url = $filename;
            $cms->save();
            if($cms){
                return back()->with('t-success','Content updated successfully');
            }else{
                return back()->with('t-error','Content failed to update');
            }
        } catch (Exception $e) {
            return response()->json(['error' => 'Record not found'], 404);
        }
    }

    //
    public function supportcreate(){
        $cms = C_M_S::find(2);
        return view("backend.layouts.supportsection.index",compact('cms'));
    }
    public function supportupdate(Request $request){
       $cms = C_M_S::find(2);
       if($request->hasFile('image')){
        $image_file_on_uploads = public_path('uploads/backend/'.$cms->image_url) ;
        if(File::exists($image_file_on_uploads)){
            @unlink($image_file_on_uploads);
        }
        $file = $request->file('image');
        $name = $file->getClientOriginalExtension();
        $filename = rand().'.'.$name;
        $file->move(public_path('uploads/backend/'), $filename);
    }
        try {
            $cms = C_M_S::find(2);
            $cms->title = $request->title;
            $cms->sub_title = $request->sub_title;
            $cms->image_url = $filename;
            $cms->save();
            if($cms){
                return back()->with('t-success','Content updated successfully');
            }else{
                return back()->with('t-error','Content failed to update');
            }
        } catch (Exception $e) {
            return response()->json(['error' => 'Record not found'], 404);
        }
    }
       //
       public function propertycreate(){
        $cms = C_M_S::find(1);
        return view("backend.layouts.choseproperty.index",compact('cms'));
    }
    public function propertyupdate(Request $request){
        try {
            $cms = C_M_S::find(1);
            $cms->title = $request->title;
            $cms->sub_title = $request->sub_title;
            $cms->save();
            if($cms){
                return back()->with('t-success','Content updated successfully');
            }else{
                return back()->with('t-error','Content failed to update');
            }
        } catch (Exception $e) {
            return response()->json(['error' => 'Record not found'], 404);
        }
    }
}
