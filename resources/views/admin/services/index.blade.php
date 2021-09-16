@extends('admin.layout.admin')

@section('content')
@include('admin.part.alart')
    <!-- BEGIN: Responsive Table -->
    <div class="intro-y box mt-5">
        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
            <h2 class="font-medium text-base mr-auto">
                Services
            </h2>
            <div class="w-full sm:w-auto flex items-center sm:ml-auto mt-3 sm:mt-0">
                <a href="{{ route('service.create') }}" class="btn btn-warning"><i class="fa fa-plus"></i> ADD</a>
            </div>
        </div>
        <div class="p-5" id="responsive-table">
            <div class="preview">
                <div class="overflow-x-auto">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">#</th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Title</th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Description</th>
                            </tr>
                        </thead>
                        {{-- <img src="/" alt="" height="50px"> --}}
                        <tbody>
                            @foreach ($collection as $key=>$item)
                                <tr>
                                    <td class="border-b whitespace-nowrap">{{ $key+1 }}</td>
                                    <td class="border-b whitespace-nowrap">{{ $item->title }}</td>
                                    <td class="border-b whitespace-nowrap">{{ \Illuminate\Support\Str::limit($item->description, 60, $end='...') }}</td>
                                    <td class="border-b whitespace-nowrap">
                                        <div class="d-inline">
                                            <a type="button" href="{{ route('service.edit',$item->id) }}" 
                                                class="btn btn-warning waves-effect waves-light m-1">
                                                <i class="fa fa-pencil"></i> 
                                                <span>edit</span>
                                            </a>
                                            <form method="POST" action="{{ route('service.destroy', $item->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you want to delete?')" class="btn btn-denger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {!! $collection->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Responsive Table -->
@endsection