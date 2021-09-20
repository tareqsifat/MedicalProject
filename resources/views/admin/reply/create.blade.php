@extends('admin.layout.admin')

@section('content')
    <!-- BEGIN: Horizontal Form -->
    <div class="intro-y box mt-5">
        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">Comment</h2>
            <div class="form-check w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">
                <a href="{{ route('reply.index') }}" class="btn btn-primary"><i class="icon-backward"></i>
                    &nbsp; Back</a>
            </div>
        </div>
        <form method="POST" class="insert_form" action="{{ route('reply.store') }}" enctype="multipart/form-data" id="horizontal-form">
            @csrf
            <div class="preview">
                <div class="form-group p-4">
                    <label for="horizontal-form-1" class="form-label sm:w-20">name</label>
                    @error('name')
                        <div class="text-theme-6 mt-2">{{ $message }}<br></div>
                    @enderror
                    <input id="horizontal-form-1" name="name" type="text" class="form-control" placeholder="name">
                </div>
                <div class="form-group p-4">
                    <label for="horizontal-form-1" class="form-label sm:w-20">body</label>
                    @error('email')
                        <div class="text-theme-6 mt-2">{{ $message }}<br></div>
                    @enderror
                    <input id="horizontal-form-1" name="email" type="email" class="form-control" placeholder="email">
                </div>
                <div class="form-group p-4">
                    <label for="horizontal-form-1" class="form-label sm:w-20">website</label>
                    @error('website')
                        <div class="text-theme-6 mt-2">{{ $message }}<br></div>
                    @enderror
                    <input id="horizontal-form-1" name="website" type="text" class="form-control" placeholder="website">
                </div>
                <div class="form-group p-4">
                    <label for="horizontal-form-1" class="form-label sm:w-20">body</label>
                    @error('body')
                    <div class="text-theme-6 mt-2">{{ $message }}<br></div>
                    @enderror
                    <input id="horizontal-form-1" name="body" type="text" class="form-control" placeholder="body">
                </div>
                <div class="form-group p-4">
                    <label for="horizontal-form-1" class="form-label sm:w-20">blog_id</label>
                    @error('blog_id')
                    <div class="text-theme-6 mt-2">{{ $message }}<br></div>
                    @enderror
                    <input id="horizontal-form-1" name="blog_id" type="text" class="form-control" placeholder="blog_id">
                </div>
                <div class="form-group p-4">
                    <label for="horizontal-form-1" class="form-label sm:w-20">comment_id</label>
                    @error('comment_id')
                    <div class="text-theme-6 mt-2">{{ $message }}<br></div>
                    @enderror
                    <input id="horizontal-form-1" name="comment_id" type="text" class="form-control" placeholder="comment_id">
                </div>
                <div class="sm:ml-20 sm:pl-5 mt-5">
                    <button type="submit" style="margin-bottom: 30px" class="btn btn-primary"><i class="icon-lock"></i> Add</button>
                </div>
            </div>
        </form>
    </div>
    <!-- END: Horizontal Form -->
@endsection