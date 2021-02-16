<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;
use Session;
use DB;
session_start();

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function login()
    {
       return view('admin.login');
    }

     public function admin_login_check(Request $request)
    {
         $admin_email_address=$request->admi_email_id;
         $admin_password=md5($request->admin_password_id);
          $users = DB::table('tbl_admin')
                 ->where('admi_email_id', $admin_email_address)
                 ->where('admin_password_id', $admin_password)
                 ->first();
                
      if($users){

              Session::put('admin_name',$users->admin_name);
              Session::put('id',$users->admin_id);

              
              return Redirect::to('/index');
              
        
      }
      else{
          Session::put('exception','Email or Password Invalid');
         return Redirect::to('/admin');
    }
}

    public function index()
    {
       
               $dashboard=view('admin.dashboard');
               $footer=view('admin.footer');
               return view('loginmaster')
               ->with('content',$dashboard)
               ->with('footer',$footer);
        
    }
    public function addJob(){

               $dashboard=view('admin.addJob');
               $footer=view('admin.footer');
               return view('loginmaster')
               ->with('content',$dashboard)
               ->with('footer',$footer);

    }
    public function manageJob(){
              $dashboard=view('admin.manage');
               $footer=view('admin.footer');
               return view('loginmaster')
               ->with('content',$dashboard)
               ->with('footer',$footer);
    }
     public function addJobCategory(){
              $dashboard=view('admin.addJobCategory');
               $footer=view('admin.footer');
               return view('loginmaster')
               ->with('content',$dashboard)
               ->with('footer',$footer);
    }
     public function viewCategory(){

             $id=Session::get('id');
            if($id==NULL){
          
            return Redirect::to('/admin')->send();

            }
      $cat_info=DB::table('tbl_category')->get();
              $dashboard=view('admin.viewCategory')->with('all_category_info',$cat_info);
               $footer=view('admin.footer');
               return view('loginmaster')
               ->with('content',$dashboard)
               ->with('footer',$footer);
    }
     public function addCompany(){
              $dashboard=view('admin.addCompany');
               $footer=view('admin.footer');
               return view('loginmaster')
               ->with('content',$dashboard)
               ->with('footer',$footer);
    }
     public function viewAllNews(){
            $cat_info=DB::table('tbl_category')->get();
            $news_info=DB::table('tbl_news')->get();

              $dashboard=view('admin.viewCompany')->with('all_news_info',$news_info)
              ->with('all_cat_info',$cat_info);
               $footer=view('admin.footer');
               return view('loginmaster')
               ->with('content',$dashboard)
               ->with('footer',$footer);
    }
     public function viewallUser(){
      $cat_info=DB::table('tbl_user')->get();
              $dashboard=view('admin.viewallUser')->with('all_user',$cat_info);
               $footer=view('admin.footer');
               return view('loginmaster')
               ->with('content',$dashboard)
               ->with('footer',$footer);
    }
      public function logout(){
        Session::put('admin_name',null);
        Session::put('id',null);
       
        return Redirect::to('/admin');
    }

    public function save_category(Request $request){
         $data=array();
         $data['cat_name']=$request->cat_name;
        DB::table('tbl_category')->insert($data);
       Session::put('message','Save Category Information Successfully');

        return Redirect::to('/addJobCategory');
    }
    public function edit_category($category_id){
     
    $id=Session::get('id');
    if($id==NULL){
      
        return Redirect::to('/admin')->send();

  }

  $cat_info=DB::table('tbl_category')
  ->where('id', $category_id)->first();
    

     $dashboard=view('admin.editCategory')->with('all_category_info',$cat_info);
               $footer=view('admin.footer');
               return view('loginmaster')
               ->with('content',$dashboard)
               ->with('footer',$footer);

}
public function edit_news($news_id){
  $news_info=DB::table('tbl_news')
  ->where('news_id',$news_id)->first();

   $cat_info=DB::table('tbl_category')->get();


   $dashboard=view('admin.editNews')->with('all_news_info',$news_info)
                                    ->with('all_category_info',$cat_info);
               $footer=view('admin.footer');
               return view('loginmaster')
               ->with('content',$dashboard)
               ->with('footer',$footer);

}
public function update_category(Request $request){
    
    $affected = DB::table('tbl_category')
    ->where('id', $request->id)
    ->update(['cat_name' => $request->cat_name]);
   
    return Redirect::to('/viewCategory');
    
}
public function update_news(Request $request){
         $data=array();
         $data['id']=$request->id;
         $data['news_id']=$request->news_id;
         $data['news_body']=$request->news_body;
         $data['news_title']=$request->news_title;

         if($request->img != ''){ 
         unlink($request->prev_image); 
         $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

  
        $imageName = time().'.'.$request->img->extension(); 
        $upload_path='img/';
        $image_url=$upload_path . $imageName;
        $success=$request->img->move($upload_path,$imageName);

        if ($success) {
          # code...
         
        
         $data['img']=$image_url;

          $affected = DB::table('tbl_news')
          ->where('news_id', $data['news_id'])
          ->update($data);

        return Redirect::to('/viewAllNews');
        }
     }
     else{
    
       $affected = DB::table('tbl_news')
          ->where('news_id', $data['news_id'])
          ->update(['id' => $data['id'],'news_body' => $data['news_body'],'news_title' => $data['news_title']]);
            return Redirect::to('/viewAllNews');
     }

}
public function delete_category($category_id){
       
    DB::table('tbl_category')->where('id', $category_id)->delete();
    
   return Redirect::to('/viewCategory');
}
public function delete_user($category_id){
       
    DB::table('tbl_user')->where('user_id', $category_id)->delete();
    
   return Redirect::to('/viewallUser');
}
public function delete_comment($category_id){
       
    DB::table('tbl_comment')->where('comment_id', $category_id)->delete();
    
   return Redirect::to('/viewallComment');
}
public function delete_advertisement($category_id){
       
    DB::table('tbl_advertisement')->where('ad_id', $category_id)->delete();
    
   return Redirect::to('/viewCategory');
}
public function delete_news($category_id){
       
    DB::table('tbl_news')->where('news_id', $category_id)->delete();
    
   return Redirect::to('/viewAllNews');
}
 public function addNews(){

              $cat_info=DB::table('tbl_category')->get();
              

               $dashboard=view('admin.addNews')->with('all_category_info',$cat_info);
               $footer=view('admin.footer');
               return view('loginmaster')
               ->with('content',$dashboard)
               ->with('footer',$footer);

    }
    public function save_news(Request $request){
       $data=array();
         $data['id']=$request->id;
         $data['news_body']=$request->news_body;
         $data['news_title']=$request->news_title;
        

         $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

  
        $imageName = time().'.'.$request->img->extension(); 
        $upload_path='img/';
        $image_url=$upload_path . $imageName;
        $success=$request->img->move($upload_path,$imageName);

        if ($success) {
          # code...
         
        
         $data['img']=$image_url;

          DB::table('tbl_news')->insert($data);
         Session::put('message','Save  News Successfully');

        return Redirect::to('/addNews');
        }
       
      
      else{
         
          DB::table('tbl_news')->insert($data);
         Session::put('message','Save  News Successfully');

        return Redirect::to('/addNews');
         
      }
         
       
    }
    public function make_cat_active($catid){

        DB::table('tbl_category')
       ->where('id', $catid)
       ->update(['active' => 1]);
       return Redirect::to('/viewCategory');
    }
     public function make_cat_deactive($catid){

        DB::table('tbl_category')
       ->where('id', $catid)
       ->update(['active' => 0]);
       return Redirect::to('/viewCategory');
    }
     public function addAdvertisement(){
              

               $dashboard=view('admin.addAdvertisement');
               $footer=view('admin.footer');
               return view('loginmaster')
               ->with('content',$dashboard)
               ->with('footer',$footer);

    }
    public function save_advertisement(Request $request){
         $data=array();
         $data['company_name']=$request->company_name;
         $data['contract']=$request->contract;
        

         $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

  
        $imageName = time().'.'.$request->img->extension(); 
        $upload_path='img/';
        $image_url=$upload_path . $imageName;
        $success=$request->img->move($upload_path,$imageName);

        if ($success) {
          # code...
         
        
         $data['img']=$image_url;

          DB::table('tbl_advertisement')->insert($data);
         Session::put('message','Save  News Successfully');

        return Redirect::to('/addAdvertisement');
        }
       
      
      else{
         
          DB::table('tbl_advertisement')->insert($data);
         Session::put('message','Save  News Successfully');

        return Redirect::to('/addAdvertisement');
         
      }
    }
    public function viewAllAdvertisement(){


      $cat_info=DB::table('tbl_advertisement')->get();
              $dashboard=view('admin.viewAllAdvertisement')->with('all_advertisement',$cat_info);
               $footer=view('admin.footer');
               return view('loginmaster')
               ->with('content',$dashboard)
               ->with('footer',$footer);
    }
     public function edit_advertisement($ad_id){
     
                $news_info=DB::table('tbl_advertisement')
               ->where('ad_id',$ad_id)->first();


               $dashboard=view('admin.edit_advertisement')->with('all_advertisement',$news_info);
               $footer=view('admin.footer');
               return view('loginmaster')
               ->with('content',$dashboard)
               ->with('footer',$footer);

  }
  public function update_ad(Request $request){
         $data=array();
         $data['ad_id']=$request->ad_id;
         $data['company_name']=$request->company_name;
         $data['contract']=$request->contract;

         if($request->img != ''){ 
         unlink($request->prev_image); 
         $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

  
        $imageName = time().'.'.$request->img->extension(); 
        $upload_path='img/';
        $image_url=$upload_path . $imageName;
        $success=$request->img->move($upload_path,$imageName);

        if ($success) {
          # code...
         
        
         $data['img']=$image_url;

          $affected = DB::table('tbl_advertisement')
          ->where('news_id', $data['news_id'])
          ->update($data);

        return Redirect::to('/viewAllAdvertisement');
        }
     }
     else{

    
       $affected = DB::table('tbl_advertisement')
          ->where('ad_id', $data['ad_id'])
          ->update(['ad_id' => $data['ad_id'],'company_name' => $data['company_name'],'contract' => $data['contract']]);
            return Redirect::to('/viewAllAdvertisement');
     }

}
 public function make_ad_active($catid){

        DB::table('tbl_advertisement')
       ->where('ad_id', $catid)
       ->update(['active_status' => 1]);
       return Redirect::to('/viewAllAdvertisement');
    }
     public function make_ad_deactive($catid){

        DB::table('tbl_advertisement')
       ->where('ad_id', $catid)
       ->update(['active_status' => 0]);
       return Redirect::to('/viewAllAdvertisement');
    }

     public function viewallComment(){
     

      $allcomment=DB::table('tbl_comment')->get();
              $dashboard=view('admin.viewallComment')->with('allcomment',$allcomment);
               $footer=view('admin.footer');
               return view('loginmaster')
               ->with('content',$dashboard)
               ->with('footer',$footer);
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
        //
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
