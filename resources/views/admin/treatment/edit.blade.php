@extends('admin.layout.admin')

@section('content')
    @include('admin.part.alart')
    <!-- BEGIN: Horizontal Form -->
    <div class="intro-y box mt-5">
        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Treatment Edit
            </h2>
            <div class="form-check w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">
                <a href="{{ route('treatment.index') }}" class="btn btn-primary"><i class="icon-backward"></i> &nbsp; Back</a>
            </div>
        </div>
        <form method="POST" action="{{ route('treatment.update', $collection->id) }}" enctype="multipart/form-data" id="horizontal-form">
            @csrf
            @method('PUT')
            <div class="preview">
                <div class="form-group p-4">
                    <label for="horizontal-form-1" class="form-label sm:w-20">Name</label>
                    <input id="horizontal-form-1" name="name" type="text" class="form-control" value="{{ $collection->name }}">
                    @error('name')
                        <div class="text-theme-6 mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group p-4">
                    <label for="horizontal-form-1" class="form-label sm:w-20">Cost</label>
                    <input id="horizontal-form-1" name="cost" type="text" class="form-control" value="{{ $collection->cost }}">
                    <span class="text-theme-6 mt-2 cost"></span>
                </div>
                <div class="sm:ml-20 sm:pl-5 mt-5">
                    <button type="submit" style="margin-bottom: 30px" class="btn btn-primary"><i class="icon-lock"></i>&nbsp; Add</button>
                </div>
            </div>
        </form>
    </div>
    <!-- END: Horizontal Form -->
@endsection