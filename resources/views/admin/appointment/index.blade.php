@extends('admin.layout.admin')

@section('content')
{{-- @include('admin.include.top_bar') --}}
    <!-- BEGIN: Responsive Table -->
    @include('admin.part.alart')
    <div class="intro-y box mt-5">
        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
            <h2 class="font-medium text-base mr-auto">
                Appointments
            </h2>
            <div class="w-full sm:w-auto flex items-center sm:ml-auto mt-3 sm:mt-0">
                {{-- <a href="{{ route('appointments_create') }}" class="btn btn-warning"><i class="fa fa-plus"></i> ADD</a> --}}
            </div>
        </div>
        <div class="p-5" id="responsive-table">
            <div class="preview">
                <div class="overflow-x-auto">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">#</th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Name</th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Phone</th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">email</th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Date of Birth</th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Appointment Date</th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Message</th>
                            </tr>
                        </thead>
                        {{-- <img src="/" alt="" height="50px"> --}}
                        <tbody>
                            @foreach ($collection as $key=>$item)
                                <tr>
                                    <td class="border-b whitespace-nowrap">{{ $key+1 }}</td>
                                    <td class="border-b whitespace-nowrap">{{ $item->name }}</td>
                                    <td class="border-b whitespace-nowrap">{{ $item->phone }}</td>
                                    <td class="border-b whitespace-nowrap">{{ $item->email }}</td>
                                    <td class="border-b whitespace-nowrap">{{ $item->dateOfBirth }}</td>
                                    <td class="border-b whitespace-nowrap">{{ $item->appointmentDate }}</td>
                                    <td class="border-b whitespace-nowrap">{{ $item->message }}</td>
                                    <td class="border-b whitespace-nowrap">
                                        <div class="d-inline">
                                            <form method="POST" action="{{ route('appointments_destroy', $item->id) }}">
                                                @csrf
                                                @method('GET')
                                                <button type="submit" onclick="return confirm('Are you want to delete?')" class="btn btn-denger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    @if ($collection->links()->paginator->hasPages())
                        <div class="d-flex justify-content-center">
                            {!! $collection->links() !!}
                        </div>
                    @endif
                    {{-- <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                          <li class="{{ $collection->links()->paginator->onFirstPage() ? 'page-item disabled : page-item' }}">
                          <li
                          @if ( $collection->links()->paginator->onFirstPage()) class ="page-item disabled" @endif class ="page-item">
                            <a class="page-link" href="{{ $collection->links()->paginator->previousPageUrl() }}" tabindex="-1">Previous</a>
                          </li>
                          <li class="page-item"><a class="page-link" href="#">1</a></li>
                          <li class="page-item"><a class="page-link" href="#">2</a></li>
                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                          <li class="page-item"><a class="page-link" href="#">4</a></li>
                          <li class="page-item"><a class="page-link" href="#">5</a></li>
                          <li class="page-item"><a class="page-link" href="#">6</a></li>
                          <li class="page-item">
                            <a class="page-link" href="{{ $collection->links()->paginator->nextPageUrl() }}">Next</a>
                          </li>
                        </ul>
                      </nav> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- END: Responsive Table -->
@endsection