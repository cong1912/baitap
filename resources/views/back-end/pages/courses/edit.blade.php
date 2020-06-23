@extends('back-end.layouts.master',['page' => __('User Management'), 'pageSlug' => 'course'])
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('back-end\plugins\dropify\dropify.min.css')}}">
    <link href="{{asset('back-end\assets\css\scrollspyNav.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('content')

    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="container">
            <div class="container">
                <div class="row layout-top-spacing">
                    <div id="fuSingleFile" class="col-lg-12 layout-spacing ">
                        <div class="statbox widget box box-shadow">
                            @include('alerts.success')
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>Form upload khóa học</h4>
                                    </div>
                                </div>
                            </div>
                            <form  method="post" action="{{ route('courses.update',$course )}}" autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                @method('put')

                                <div class="widget-content widget-content-area container">

                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} ">
                                        <p>tên khóa học</p>
                                        <label for="t-text" class="sr-only">Text</label>
                                        <input id="t-text" type="text" name="name" placeholder="tên khóa học" value="{{ $course->name }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" required="">
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group{{ $errors->has('content') ? ' has-danger' : '' }}">
                                        <p>Nội dung </p>
                                        <textarea id="textarea" name="content" class="ckeditor textarea{{ $errors->has('content') ? ' is-invalid' : '' }}" maxlength="225" rows="2" placeholder="This textarea has a limit of 225 chars.">{!!$course->content!!}</textarea>
                                        @include('alerts.feedback', ['field' => 'content'])
                                    </div>
                                    <input class="btn btn-primary" type="submit" value="Submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="footer-wrapper">
            <div class="footer-section f-section-1">
                <p class="">Copyright © 2020 <a target="_blank" href="https://designreset.com">DesignReset</a>, All rights reserved.</p>
            </div>
            <div class="footer-section f-section-2">
                <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
    <script src="{{asset('back-end\plugins\dropify\dropify.min.js')}}"></script>
    <script src="{{asset('back-end\plugins\blockui\jquery.blockUI.min.js')}}"></script>
    <!-- <script src="plugins/tagInput/tags-input.js"></script> -->
    <script src="{{asset('back-end\assets\js\users\account-settings.js')}}"></script>
    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->
@endsection
