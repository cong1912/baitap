@extends('back-end.layouts.master',['page' => __('User Management'), 'pageSlug' => 'news'])
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('back-end\plugins\dropify\dropify.min.css')}}">
    <link href="{{asset('back-end\assets\css\users\account-setting.css')}}" rel="stylesheet" type="text/css">
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{asset('back-end\assets\css\scrollspyNav.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('back-end\plugins\editors\quill\quill.snow.css')}}">

    <!--  END CUSTOM STYLE FILE  -->
@endsection
@section('content')
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="account-settings-container layout-top-spacing">
                <div class="account-content">
                    <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                <form id="general-info" method="post" action="{{ route('news.store') }}" autocomplete="off" enctype="multipart/form-data" class="section general-info">
                                    <div class="info">
                                        @csrf
                                        <h6 class="">General Information</h6>
                                        <div class="row">
                                            <div class="col-lg-11 mx-auto">
                                                <div class="row">
                                                    <div class="col-xl-2 col-lg-12 col-md-4">
                                                        <div class="upload mt-4 pr-md-4{{ $errors->has('image') ? ' has-danger' : '' }}">
                                                            <input type="file" id="input-file-max-fs" name="image" required class="dropify{{ $errors->has('image') ? ' is-invalid' : '' }}" data-default-file="" data-max-file-size="2M">
                                                            <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload Picture</p>
                                                            @include('alerts.feedback', ['field' => 'image'])
                                                        </div>

                                                    </div>
                                                    <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                        <div class="form">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                                                        <label for="title">Tiêu đề bài viết</label>
                                                                        <input type="text" class="form-control mb-6" name="title" id="title" required placeholder="tên phần mềm">
                                                                        @include('alerts.feedback', ['field' => 'title'])
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label class="dob-input">Danh mục</label>
                                                                    <div class="d-sm-flex d-block">
                                                                        <div class="form-group mr-1">
                                                                            <select class="form-control" name="category" id="year">
                                                                                <option value="1">tin tức</option>
                                                                                <option value="2">tuyển dụng</option>
                                                                                <option value="3">tra cứu</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group editor-container{{ $errors->has('tomtat') ? ' has-danger' : '' }}">
                                                                <label for="aboutBio">Nội dung tóm tắt</label>
                                                                <textarea class="ckeditor" name="tomtat" id="aboutBio" required  cols="80" rows="10" ></textarea>
                                                                @include('alerts.feedback', ['field' => 'tomtat'])
                                                            </div>
                                                            <div class="form-group editor-container{{ $errors->has('content') ? ' has-danger' : '' }}">
                                                                <label for="aboutBio">Nội dung bài viết</label>
                                                                <textarea class="ckeditor" name="content" id="aboutBio" required placeholder="nội dung bài viết" cols="80" rows="10" ></textarea>
                                                                @include('alerts.feedback', ['field' => 'content'])
                                                            </div>
                                                            <div class="row">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-right ">
                                            <button id="add-work-platforms" type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--  END CONTENT AREA  -->
@endsection
@section('script')

    <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
    <script src="{{asset('back-end\plugins\dropify\dropify.min.js')}}"></script>
    <script src="{{asset('back-end\plugins\blockui\jquery.blockUI.min.js')}}"></script>
    <!-- <script src="plugins/tagInput/tags-input.js"></script> -->
    <script src="{{asset('back-end\assets\js\users\account-settings.js')}}"></script>
    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->
    <script src="{{asset('back-end\assets\js\scrollspyNav.js')}}"></script>
    <script src="{{asset('back-end\plugins\editors\quill\quill.js')}}"></script>
    <script src="{{asset('back-end\plugins\editors\quill\custom-quill.js')}}"></script>
@endsection
