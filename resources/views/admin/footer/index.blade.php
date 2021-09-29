@extends('admin.layout.admin')
@section('content')
@include('admin.part.alart')
    <!-- BEGIN: Responsive Table -->
    <div class="intro-y box mt-5">
        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
            <h2 class="font-medium text-base mr-auto">
                Footer
            </h2>
        </div>
        <div class="p-5" id="responsive-table">
            <div class="preview">
                <div class="overflow-x-auto">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Field</th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Data</th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Action</th>
                            </tr>
                        </thead>
                        {{-- <img src="/" alt="" height="50px"> --}}
                        <tbody>
                            @foreach ($collection as $key=>$item)
                                <tr>
                                    <td class="border-b whitespace-nowrap">Company Name</td>
                                    <td class="border-b whitespace-nowrap">{{ $item->company_name }}</td>
                                    <td class="border-b whitespace-nowrap">
                                        <a type="button" 
                                            class="btn btn-warning waves-effect waves-light m-1 booltip"
                                            onclick="document.getElementById('singleform').style.display = 'block'">
                                            {{-- booltip is a custop tooltip arrtibute, made for avoiding same name conflict with tooltip comes with template --}}
                                            <i class="fas fa-pencil-alt"></i>
                                            <div class="booltiptext">Edit Company</div>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" id="singleform" style="display: none">
                                        <form method="POST" action="{{ route('footer_single_update', $item->id) }}" enctype="multipart/form-data" style="padding-right: 10px" id="horizontal-form">
                                            @csrf
                                            @method('PUT')
                                            <div class="preview">
                                                <div class="form-group p-4 mb-3">
                                                    <label for="horizontal-form-1" class="form-label sm:w-20">Company Name</label>
                                                    <input id="horizontal-form-1" name="company_name" type="text" class="form-control" value="{{ $item->company_name }}">
                                                    @error('company_name')
                                                        <div class="text-theme-6 mt-2">{{ $message }}<br></div>
                                                    @enderror
                                                </div>
                                                <div class="sm:ml-20 sm:pl-5 mt-5" style="text-align: right; margin-right: 20px">
                                                    <button type="button" onclick="document.getElementById('singleform').style.display = 'none'" style="margin-bottom: 30px" class="btn btn-primary">
                                                        <i class="fas fa-window-close"></i>
                                                        &nbsp; close
                                                    </button>
                                                    <button type="submit" style="margin-bottom: 30px" class="btn btn-primary">
                                                        <i class="icon-lock"></i>
                                                        &nbsp; update
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-b whitespace-nowrap">Email</td>
                                    <td class="border-b whitespace-nowrap">{{ $item->email }}</td>
                                        <td class="border-b whitespace-nowrap">
                                            <a type="button" 
                                                class="btn btn-warning waves-effect waves-light m-1 booltip"
                                                onclick="document.getElementById('singleform1').style.display='block'">
                                                <i class="fas fa-pencil-alt"></i>
                                                <div class="booltiptext">Edit Email</div>
                                            </a>
                                        </td>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" id="singleform1" style="display: none">
                                        <form method="POST" action="{{ route('footer_single_update', $item->id) }}" enctype="multipart/form-data" style="padding-right: 10px" id="horizontal-form">
                                            @csrf
                                            @method('PUT')
                                            <div class="preview">
                                                <div class="form-group p-4 mb-3">
                                                    <label for="horizontal-form-1" class="form-label sm:w-20">email</label>
                                                    <input id="horizontal-form-1" name="email" type="text" class="form-control" value="{{ $item->email }}">
                                                    @error('email')
                                                        <div class="text-theme-6 mt-2">{{ $message }}<br></div>
                                                    @enderror
                                                </div>
                                                <div class="sm:ml-20 sm:pl-5 mt-5" style="text-align: right; margin-right: 20px">
                                                    <button type="button" onclick="document.getElementById('singleform1').style.display = 'none'" style="margin-bottom: 30px" class="btn btn-primary"><i class="fas fa-window-close"></i>&nbsp; close</button>
                                                    
                                                    <button type="submit" style="margin-bottom: 30px" class="btn btn-primary"><i class="icon-lock"></i>&nbsp; update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-b whitespace-nowrap">Phone</td>
                                    <td class="border-b whitespace-nowrap">{{ $item->phone }}</td>
                                    <td class="border-b whitespace-nowrap">
                                        <a type="button" 
                                            class="btn btn-warning waves-effect waves-light m-1 booltip"
                                            onclick="document.getElementById('singleform2').style.display='block'">
                                            <i class="fas fa-pencil-alt"></i>
                                            <div class="booltiptext">Edit phone</div>
                                        </a>
                                    </td>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" id="singleform2" style="display: none">
                                        <form method="POST" action="{{ route('footer_single_update', $item->id) }}" enctype="multipart/form-data" style="padding-right: 10px" id="horizontal-form">
                                            @csrf
                                            @method('PUT')
                                            <div class="preview">
                                                <div class="form-group p-4 mb-3">
                                                    <label for="horizontal-form-1" class="form-label sm:w-20">phone</label>
                                                    <input id="horizontal-form-1" name="phone" type="text" class="form-control" value="{{ $item->phone }}">
                                                    @error('phone')
                                                        <div class="text-theme-6 mt-2">{{ $message }}<br></div>
                                                    @enderror
                                                </div>
                                                <div class="sm:ml-20 sm:pl-5 mt-5" style="text-align: right; margin-right: 20px">
                                                    <button type="button" onclick="document.getElementById('singleform2').style.display = 'none'" style="margin-bottom: 30px" class="btn btn-primary"><i class="fas fa-window-close"></i>&nbsp; close</button>
                                                    
                                                    <button type="submit" style="margin-bottom: 30px" class="btn btn-primary"><i class="icon-lock"></i>&nbsp; update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-b whitespace-nowrap">Facebook</td>
                                    <td class="border-b whitespace-nowrap">{{ $item->facebook }}</td>
                                    <td class="border-b whitespace-nowrap">
                                        <a type="button" 
                                            class="btn btn-warning waves-effect waves-light m-1 booltip"
                                            onclick="document.getElementById('singleform3').style.display='block'">
                                            <i class="fas fa-pencil-alt"></i>
                                            <div class="booltiptext">Edit Facebook</div>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" id="singleform3" style="display: none">
                                        <form method="POST" action="{{ route('footer_single_update', $item->id) }}" enctype="multipart/form-data" style="padding-right: 10px" id="horizontal-form">
                                            @csrf
                                            @method('PUT')
                                            <div class="preview">
                                                <div class="form-group p-4 mb-3">
                                                    <label for="horizontal-form-1" class="form-label sm:w-20">Facebook</label>
                                                    <input id="horizontal-form-1" name="facebook" type="text" class="form-control" value="{{ $item->facebook }}">
                                                    @error('facebook')
                                                        <div class="text-theme-6 mt-2">{{ $message }}<br></div>
                                                    @enderror
                                                </div>
                                                <div class="sm:ml-20 sm:pl-5 mt-5" style="text-align: right; margin-right: 20px">
                                                    <button type="button" onclick="document.getElementById('singleform3').style.display = 'none'" style="margin-bottom: 30px" class="btn btn-primary"><i class="fas fa-window-close"></i>&nbsp; close</button>
                                                    
                                                    <button type="submit" style="margin-bottom: 30px" class="btn btn-primary"><i class="icon-lock"></i>&nbsp; update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-b whitespace-nowrap">Feed</td>
                                    <td class="border-b whitespace-nowrap">{{ $item->feed }}</td>
                                    <td class="border-b whitespace-nowrap">
                                        <a type="button" 
                                            class="btn btn-warning waves-effect waves-light m-1 booltip"
                                            onclick="document.getElementById('singleform4').style.display='block'">
                                            <i class="fas fa-pencil-alt"></i>
                                            <div class="booltiptext">Edit Feed</div>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" id="singleform4" style="display: none">
                                        <form method="POST" action="{{ route('footer_single_update', $item->id) }}" enctype="multipart/form-data" style="padding-right: 10px" id="horizontal-form">
                                            @csrf
                                            @method('PUT')
                                            <div class="preview">
                                                <div class="form-group p-4 mb-3">
                                                    <label for="horizontal-form-1" class="form-label sm:w-20">Feed</label>
                                                    <input id="horizontal-form-1" name="feed" type="text" class="form-control" value="{{ $item->feed }}">
                                                    @error('feed')
                                                        <div class="text-theme-6 mt-2">{{ $message }}<br></div>
                                                    @enderror
                                                </div>
                                                <div class="sm:ml-20 sm:pl-5 mt-5" style="text-align: right; margin-right: 20px">
                                                    <button type="button" onclick="document.getElementById('singleform4').style.display = 'none'" style="margin-bottom: 30px" class="btn btn-primary"><i class="fas fa-window-close"></i>&nbsp; close</button>
                                                    
                                                    <button type="submit" style="margin-bottom: 30px" class="btn btn-primary"><i class="icon-lock"></i>&nbsp; update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td class="border-b whitespace-nowrap">
                                        <a type="button" href="{{ route('footer.edit', $item->id) }}" 
                                            class="btn btn-warning waves-effect waves-light m-1">
                                            <i class="fas fa-pencil-alt"></i>&nbsp;
                                            <span>Edit All</span> 
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{-- {!! $collection->links() !!} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Responsive Table -->
@endsection