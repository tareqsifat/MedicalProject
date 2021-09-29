@extends('admin.layout.admin')

@section('content')
@include('admin.part.alart')
    <!-- BEGIN: Responsive Table -->
    <div class="intro-y box mt-5">
        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
            <h2 class="font-medium text-base mr-auto">
                Footer
            </h2>
            <div class="w-full sm:w-auto flex items-center sm:ml-auto mt-3 sm:mt-0">
                <a href="{{ route('footer.create') }}" class="btn btn-warning"><i class="fa fa-plus"></i> ADD</a>
            </div>
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
                                    <td id="singleform" style="display: none">
                                        @include('admin.include.single_update', [
                                            'collection' => $item,
                                            'name' => 'company_name'
                                        ])
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-b whitespace-nowrap">Email</td>
                                    <td class="border-b whitespace-nowrap">{{ $item->email }}</td>
                                    <td class="border-b whitespace-nowrap">
                                        <a type="button" href="{{ route('footer.edit', $item->id) }}" 
                                            class="btn btn-warning waves-effect waves-light m-1 booltip">
                                            <i class="fas fa-pencil-alt"></i>
                                            <div class="booltiptext">Edit Email</div>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-b whitespace-nowrap">Phone</td>
                                    <td class="border-b whitespace-nowrap">{{ $item->phone }}</td>
                                    <td class="border-b whitespace-nowrap">
                                        <a type="button" href="{{ route('footer.edit', $item->id) }}" 
                                            class="btn btn-warning waves-effect waves-light m-1 booltip">
                                            <i class="fas fa-pencil-alt"></i>
                                            <div class="booltiptext">Edit Phone</div>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-b whitespace-nowrap">Facebook</td>
                                    <td class="border-b whitespace-nowrap">{{ $item->facebook }}</td>
                                    <td class="border-b whitespace-nowrap">
                                        <a type="button" href="{{ route('footer.edit', $item->id) }}" 
                                            class="btn btn-warning waves-effect waves-light m-1 booltip">
                                            <i class="fas fa-pencil-alt"></i>
                                            <div class="booltiptext">Edit Facebook</div>
                                        </a>

                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-b whitespace-nowrap">Feed</td>
                                    <td class="border-b whitespace-nowrap">{{ $item->feed }}</td>
                                    <td class="border-b whitespace-nowrap">
                                        <a type="button" href="{{ route('footer.edit', $item->id) }}" 
                                            class="btn btn-warning waves-effect waves-light m-1 booltip">
                                            <i class="fas fa-pencil-alt"></i>
                                            <div class="booltiptext">Edit Feed</div>
                                        </a>
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