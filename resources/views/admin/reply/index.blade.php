@extends('admin.layout.admin')

@section('content')
    @include('admin.part.alart')
    
    {{-- @php
        dd(session()->all())
    @endphp --}}
    <!-- BEGIN: Responsive Table -->
    <div class="intro-y box mt-5">
        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
            <h2 class="font-medium text-base mr-auto">
                Categories
            </h2>
            <div class="w-full sm:w-auto flex items-center sm:ml-auto mt-3 sm:mt-0">
                <a href="{{ route('reply.create') }}" class="btn btn-warning"><i class="fa fa-plus"></i> ADD</a>
            </div>
        </div>
        <div class="p-5" id="responsive-table">
            <div class="preview">
                <div class="overflow-x-auto">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">#</th>
                                {{-- <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">image</th> --}}
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">name</th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">email</th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">website</th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">body</th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">approved</th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Creator</th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Blog</th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Comment</th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Action</th>
                            </tr>
                        </thead>
                        {{-- <img src="/" alt="" height="50px"> --}}
                        <tbody>
                            @foreach ($collection as $key=>$item)
                                <tr>
                                    <td class="border-b whitespace-nowrap">{{ $key+1 }}</td>
                                    {{-- <td class="border-b whitespace-nowrap"><img src={{ "/uploads/comments/$item->image" }} alt="{{ $item->image }}"></td> --}}
                                    <td class="border-b whitespace-nowrap">{{ $item->name }}</td>
                                    <td class="border-b whitespace-nowrap">{{ $item->email }}</td>
                                    <td class="border-b whitespace-nowrap">{{ $item->website }}</td>
                                    <td class="border-b whitespace-nowrap">{{\Illuminate\Support\Str::limit($item->body, 40, $end='...')}}</td>
                                    <td class="border-b whitespace-nowrap">
                                        @if ($item->approved)
                                        <form action="{{ route('reply.update', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select name="approved" id="" style="display: none">
                                                <option value="0"></option>
                                            </select>
                                            <button type="submit" class="btn btn-primary">Approved</button>
                                            {{-- <i type ="submit" class="btn btn-primary">Approved</i> --}}
                                        </form>
                                        @else
                                            <form action="{{ route('reply.update', $item->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <select name="approved" id="" style="display: none">
                                                    <option value="1"></option>
                                                </select>
                                                <button type="submit" class="btn btn-secondary">Not Approved</button>
                                            </form>
                                            {{-- <i class="btn btn-secondary">Not Approved</i> --}}
                                        @endif    
                                    </td>
                                    <td class="border-b whitespace-nowrap">{{ $item->creator }}</td>
                                    {{-- <td class="border-b whitespace-nowrap">{{ $item->blog_id }}</td> --}}
                                    <td class="border-b whitespace-nowrap">{{ $item->blog_id }}</td>
                                    <td class="border-b whitespace-nowrap">{{ $item->comment_id }}</td>
                                    <td class="border-b whitespace-nowrap">
                                        <div class="justify-content-between">
                                            <a type="button" href="{{ route('category.edit',$item->id) }}" 
                                                class="btn btn-warning waves-effect waves-light m-1">
                                                <i class="fa fa-pencil"></i> 
                                                <span>edit</span>
                                            </a>
                                            <form method="POST" action="{{ route('category.destroy', $item->id) }}">
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
            <div class="source-code hidden">
                <button data-target="#copy-responsive-table" class="copy-code btn py-1 px-2 btn-outline-secondary"> <i data-feather="file" class="w-4 h-4 mr-2"></i> Copy example code </button>
                <div class="overflow-y-auto mt-3 rounded-md">
                    <pre class="source-preview" id="copy-responsive-table"> <code class="text-xs p-0 rounded-md html pl-5 pt-8 pb-4 -mb-10 -mt-10"> HTMLOpenTagdiv class=&quot;overflow-x-auto&quot;HTMLCloseTag HTMLOpenTagtable class=&quot;table&quot;HTMLCloseTag HTMLOpenTagtheadHTMLCloseTag HTMLOpenTagtrHTMLCloseTag HTMLOpenTagth class=&quot;border-b-2 dark:border-dark-5 whitespace-nowrap&quot;HTMLCloseTag#HTMLOpenTag/thHTMLCloseTag HTMLOpenTagth class=&quot;border-b-2 dark:border-dark-5 whitespace-nowrap&quot;HTMLCloseTagFirst NameHTMLOpenTag/thHTMLCloseTag HTMLOpenTagth class=&quot;border-b-2 dark:border-dark-5 whitespace-nowrap&quot;HTMLCloseTagLast NameHTMLOpenTag/thHTMLCloseTag HTMLOpenTagth class=&quot;border-b-2 dark:border-dark-5 whitespace-nowrap&quot;HTMLCloseTagUsernameHTMLOpenTag/thHTMLCloseTag HTMLOpenTagth class=&quot;border-b-2 dark:border-dark-5 whitespace-nowrap&quot;HTMLCloseTagEmailHTMLOpenTag/thHTMLCloseTag HTMLOpenTagth class=&quot;border-b-2 dark:border-dark-5 whitespace-nowrap&quot;HTMLCloseTagAddressHTMLOpenTag/thHTMLCloseTag HTMLOpenTag/trHTMLCloseTag HTMLOpenTag/theadHTMLCloseTag HTMLOpenTagtbodyHTMLCloseTag HTMLOpenTagtrHTMLCloseTag HTMLOpenTagtd class=&quot;border-b whitespace-nowrap&quot;HTMLCloseTag1HTMLOpenTag/tdHTMLCloseTag HTMLOpenTagtd class=&quot;border-b whitespace-nowrap&quot;HTMLCloseTagAngelinaHTMLOpenTag/tdHTMLCloseTag HTMLOpenTagtd class=&quot;border-b whitespace-nowrap&quot;HTMLCloseTagJolieHTMLOpenTag/tdHTMLCloseTag HTMLOpenTagtd class=&quot;border-b whitespace-nowrap&quot;HTMLCloseTag@angelinajolieHTMLOpenTag/tdHTMLCloseTag HTMLOpenTagtd class=&quot;border-b whitespace-nowrap&quot;HTMLCloseTagangelinajolie@gmail.comHTMLOpenTag/tdHTMLCloseTag HTMLOpenTagtd class=&quot;border-b whitespace-nowrap&quot;HTMLCloseTag260 W. Storm Street New York, NY 10025.HTMLOpenTag/tdHTMLCloseTag HTMLOpenTag/trHTMLCloseTag HTMLOpenTagtrHTMLCloseTag HTMLOpenTagtd class=&quot;border-b whitespace-nowrap&quot;HTMLCloseTag2HTMLOpenTag/tdHTMLCloseTag HTMLOpenTagtd class=&quot;border-b whitespace-nowrap&quot;HTMLCloseTagBradHTMLOpenTag/tdHTMLCloseTag HTMLOpenTagtd class=&quot;border-b whitespace-nowrap&quot;HTMLCloseTagPittHTMLOpenTag/tdHTMLCloseTag HTMLOpenTagtd class=&quot;border-b whitespace-nowrap&quot;HTMLCloseTag@bradpittHTMLOpenTag/tdHTMLCloseTag HTMLOpenTagtd class=&quot;border-b whitespace-nowrap&quot;HTMLCloseTagbradpitt@gmail.comHTMLOpenTag/tdHTMLCloseTag HTMLOpenTagtd class=&quot;border-b whitespace-nowrap&quot;HTMLCloseTag47 Division St. Buffalo, NY 14241.HTMLOpenTag/tdHTMLCloseTag HTMLOpenTag/trHTMLCloseTag HTMLOpenTagtrHTMLCloseTag HTMLOpenTagtd class=&quot;border-b whitespace-nowrap&quot;HTMLCloseTag3HTMLOpenTag/tdHTMLCloseTag HTMLOpenTagtd class=&quot;border-b whitespace-nowrap&quot;HTMLCloseTagCharlieHTMLOpenTag/tdHTMLCloseTag HTMLOpenTagtd class=&quot;border-b whitespace-nowrap&quot;HTMLCloseTagHunnamHTMLOpenTag/tdHTMLCloseTag HTMLOpenTagtd class=&quot;border-b whitespace-nowrap&quot;HTMLCloseTag@charliehunnamHTMLOpenTag/tdHTMLCloseTag HTMLOpenTagtd class=&quot;border-b whitespace-nowrap&quot;HTMLCloseTagcharliehunnam@gmail.comHTMLOpenTag/tdHTMLCloseTag HTMLOpenTagtd class=&quot;border-b whitespace-nowrap&quot;HTMLCloseTag8023 Amerige Street Harriman, NY 10926.HTMLOpenTag/tdHTMLCloseTag HTMLOpenTag/trHTMLCloseTag HTMLOpenTag/tbodyHTMLCloseTag HTMLOpenTag/tableHTMLCloseTag HTMLOpenTag/divHTMLCloseTag </code> </pre>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Responsive Table -->
@endsection