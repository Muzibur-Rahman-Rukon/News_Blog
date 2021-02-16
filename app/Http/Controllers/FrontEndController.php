<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use DB;
session_start();

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Latest Two Image On Slider
        $slide = DB::table('tbl_news')->inRandomOrder()->take(2)->get();

        //Random 4 Image On Slider
        $randon_four_image=DB::table('tbl_news')->inRandomOrder()->take(4)->get();

        //Four Active Category
        $four_active_category=DB::table('tbl_category')->where('active','=',1)->take(4)->get();
        //Active All Category For Nav
         $all_active_category_for_nav=DB::table('tbl_category')->where('active','=',1)->take(6)->get();

        //All News
        $allNews=DB::table('tbl_news')->get();

        //All Category
        $allCat=DB::table('tbl_category')->get();
        //All Advertisement
        $allAdvertisement=DB::table('tbl_advertisement')->where('active_status','=',1)->take(1)->get();
        //All Common Post
        $commonPost= DB::table('tbl_comment')
        ->select('post_id')
        ->groupBy('post_id')
        ->orderByRaw('COUNT(*) DESC')
        ->limit(3)
        ->get();
        //Last 3 Record
        $lastThreeeRecord= DB::table('tbl_news')->take(3)->get();




        
        
        $header=view('pages.header')->with('allAdvertisement',$allAdvertisement)
        ->with('all_active_category_for_nav',$all_active_category_for_nav);
        $body=view('pages.body')
        ->with('commonPost',$commonPost)
        ->with('best_two_slide',$slide)
        ->with('four_active_category',$four_active_category)
        ->with('allNews',$allNews)
        ->with('allCat',$allCat)
        ->with('lastThreeeRecord',$lastThreeeRecord)
        ->with('randon_four_image',$randon_four_image);
        $footer=view('pages.footer');
        return view('master')
        ->with('header',$header)
        ->with('body',$body)
         ->with('footer',$footer);
    }

    public function page_by_category($cat_id){
        $allNews=DB::table('tbl_news')->where('id','=',$cat_id)->get();
         $allCat=DB::table('tbl_category')->get();
          $allAdvertisement=DB::table('tbl_advertisement')->where('active_status','=',1)->take(1)->get();
           $all_active_category_for_nav=DB::table('tbl_category')->where('active','=',1)->take(6)->get();
        $header=view('pages.header')
        ->with('allAdvertisement',$allAdvertisement)
        ->with('all_active_category_for_nav',$all_active_category_for_nav);
        $body=view('pages.page_by_category')
        ->with('allNews',$allNews)
        ->with('allCat',$allCat);
        $footer=view('pages.footer');
         return view('master')
        ->with('header',$header)
        ->with('body',$body)
         ->with('footer',$footer);

    }
    public function page_by_newsId($news_id){
        $allNews=DB::table('tbl_news')->where('news_id',$news_id )->get();
        $allCommentByNewsId=DB::table('tbl_comment')->where('post_id',$news_id )->get();
         $allCat=DB::table('tbl_category')->get();
          $allAdvertisement=DB::table('tbl_advertisement')->where('active_status','=',1)->take(1)->get();
           $all_active_category_for_nav=DB::table('tbl_category')->where('active','=',1)->take(6)->get();
        $header=view('pages.header')
        ->with('allAdvertisement',$allAdvertisement)
        ->with('all_active_category_for_nav',$all_active_category_for_nav);
        $body=view('pages.page_by_newsId')
        ->with('allCommentByNewsId',$allCommentByNewsId)
        ->with('allNews',$allNews)
        ->with('allCat',$allCat);
        $footer=view('pages.footer');
         return view('master')
        ->with('header',$header)
        ->with('body',$body)
         ->with('footer',$footer);

    }
    public function userRegister(){


          $allAdvertisement=DB::table('tbl_advertisement')->where('active_status','=',1)->take(1)->get();
           $all_active_category_for_nav=DB::table('tbl_category')->where('active','=',1)->take(6)->get();


        $header=view('pages.header')
        ->with('allAdvertisement',$allAdvertisement)
        ->with('all_active_category_for_nav',$all_active_category_for_nav);

        $body=view('pages.userRegister');
        $footer=view('pages.footer');
         return view('master')
        ->with('header',$header)
        ->with('body',$body)
         ->with('footer',$footer);
    }
     public function userLogin(){


          $allAdvertisement=DB::table('tbl_advertisement')->where('active_status','=',1)->take(1)->get();
           $all_active_category_for_nav=DB::table('tbl_category')->where('active','=',1)->take(6)->get();


        $header=view('pages.header')
        ->with('allAdvertisement',$allAdvertisement)
        ->with('all_active_category_for_nav',$all_active_category_for_nav);
        
        $body=view('pages.userLogin');
        $footer=view('pages.footer');
         return view('master')
        ->with('header',$header)
        ->with('body',$body)
         ->with('footer',$footer);
    }
    public function save_user(Request $request){

        $data['user_name']=$request->user_name;
        $data['user_email']=$request->user_email;
        $data['user_password']=md5($request->user_password);
        if (empty($data['user_name'])) {
            Session::put('message','দয়া করে আপনার সকল তথ্য দিয়ে রেজিস্টার করুন');
            return Redirect::to('/userRegister');
        }
        elseif (empty($data['user_email'])) {
            Session::put('message','দয়া করে আপনার সকল তথ্য দিয়ে রেজিস্টার করুন');
            return Redirect::to('/userRegister');
        }
        elseif (empty($data['user_password'])) {
            Session::put('message','দয়া করে আপনার সকল তথ্য দিয়ে রেজিস্টার করুন');
            return Redirect::to('/userRegister');
        }
        else{
            echo "string";
            exit();
        DB::table('tbl_user')->insert($data);
       Session::put('message','আপনার রেজিস্ট্রেশন সম্পন্ন হয়েছে এখন লগইন করুন');

        return Redirect::to('/userLogin');
    }

    }
     public function user_loginAttempt(Request $request)
    {
         $user_email=$request->user_email;
         $user_password=md5($request->user_password);
          $users = DB::table('tbl_user')
                 ->where('user_email', $user_email)
                 ->where('user_password', $user_password)
                 ->first();
                
      if($users){

              Session::put('user_name',$users->user_name);
              Session::put('user_id',$users->user_id);

              
              return Redirect::to('/');
              
        
      }
      else{
          Session::put('message','আপনি ভুল ইমেইল অথবা পাসোয়ার্ড ট্রাই করছেন');
         return Redirect::to('/userLogin');
    }
}
 public function logoutUser(){
        Session::put('user_name',null);
        Session::put('user_id',null);
       
        return Redirect::to('/');
    }
 public function postComment(Request $request){

        $data['post_id']=$request->post_id;
        $data['user_id']=$request->user_id;
        $data['comment_body']=$request->comment_body;
        $data['user_name']=$request->user_name;

        if (empty($data['post_id'])) {
            
            return Redirect::to('/page_by_newsId',$data['post_id']);
        }
       
        
        else{
            
        DB::table('tbl_comment')->insert($data);
       
        $allNews=DB::table('tbl_news')->where('news_id',$data['post_id'] )->get();
        $allCommentByNewsId=DB::table('tbl_comment')->where('post_id',$data['post_id'] )->get();
         $allCat=DB::table('tbl_category')->get();
          $allAdvertisement=DB::table('tbl_advertisement')->where('active_status','=',1)->take(1)->get();
           $all_active_category_for_nav=DB::table('tbl_category')->where('active','=',1)->take(6)->get();
        $header=view('pages.header')
        ->with('allAdvertisement',$allAdvertisement)
        ->with('all_active_category_for_nav',$all_active_category_for_nav);
        $body=view('pages.page_by_newsId')
        ->with('allCommentByNewsId',$allCommentByNewsId)
        ->with('allNews',$allNews)
        ->with('allCat',$allCat);
        $footer=view('pages.footer');
         return view('master')
        ->with('header',$header)
        ->with('body',$body)
         ->with('footer',$footer);

       

        
    }

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
