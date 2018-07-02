<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }
    //课程列表
     public function edu()
    {
        return view('pages.edu');
    }
    //课程详情
    public function edudetail()
    {
        return view('pages.edudetail');
    }
    //课程学习
     public function eduplay()
    {
        return view('pages.eduplay');
    }
    //立即报名
     public function eduenrol()
    {
        return view('pages.eduenrol');
    }
    public function forgot()
    {
        return view('pages.forgot');
    }


}
