@extends('admin.layout.admin')

@section('content')

    <div class="intro-y box mt-5">
        @include('admin.part.alart')
        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
            <h2 class="font-medium text-base mr-auto">
                Blogs
            </h2>
            <div class="w-full sm:w-auto flex items-center sm:ml-auto mt-3 sm:mt-0">
                <a href="{{ route('blogs.create') }}" class="btn btn-warning"><i class="fa fa-plus"></i> ADD</a>
            </div>
        </div>
        <div class="p-5" id="responsive-table">
            <div class="preview">
                <div class="overflow-x-auto">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">#</th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Image</th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Category</th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">subCategory</th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Title</th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">body</th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">tags</th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Creator</th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($collection as $key=>$item)
                                <tr>
                                    <td class="border-b whitespace-nowrap">{{ $key+1 }}</td>
                                    <td class="border-b whitespace-nowrap"><img src='{{ asset("/uploads/blogs/$item->image") }}' height="200px" alt="{{ $item->image }}"></td>
                                    <td class="border-b whitespace-nowrap">{{ $item->Category_info->name }}</td>
                                    <td class="border-b whitespace-nowrap">{{ $item->SubCategory_info->name }}</td>
                                    <td class="border-b whitespace-nowrap">{{ $item->title }}</td>
                                    <td class="border-b whitespace-nowrap">{{ \Illuminate\Support\Str::limit($item->body, 60, $end='...') }}</td>
                                    <td class="border-b whitespace-nowrap">
                                        {{-- @php
                                            dd($item->tags);
                                        @endphp --}}
                                        {{-- @php
                                            dd($item->all());
                                        @endphp --}}
                                        {{-- @if (is_array($item->tags) || is_object($item->tags)) --}}
                                            {{-- @foreach ((array)$item->tags as $tag)
                                                {{ $tag }}
                                                {{-- @php
                                                    dd($tag->all());
                                                @endphp --}}
                                            {{-- @endforeach --}} 
                                        {{-- @endif --}}
                                        {{-- {{ explode(',', $item->tags ) }} --}}
                                        @foreach (explode(',', $item->tags ) as $tag)
                                        <span class="btn btn-outline-secondary">{{ $tag }}</span>
                                        
                                        {{-- <div class="card" style="border: 1px solid gray">
                                            <div class="card-body">
                                            </div>
                                        </div> --}}
                                        @endforeach
                                    </td>
                                    <td class="border-b whitespace-nowrap">{{ $item->user_info->name }}</td>
                                    <td class="border-b whitespace-nowrap">
                                        <div class="d-">
                                            <a type="button" href="{{ route('blogs.edit', $item->id) }}" 
                                                class="btn btn-warning waves-effect waves-light m-1">
                                                <i class="fa fa-pencil"></i> 
                                                <span>Edit</span>
                                            </a>
                                            <form method="POST" action="{{ route('blogs.destroy', $item->id) }}">
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
                </div>
            </div>
        </div>
    </div>
<!-- END: Responsive Table -->
@endsection