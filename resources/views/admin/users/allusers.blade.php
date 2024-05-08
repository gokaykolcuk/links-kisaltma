@extends('back.layouts.master')
@section('content')
<link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
 
<!-- Responsive datatable examples -->
<link href="{{asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />     
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">All User</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">All User</a></li>
                    <li class="breadcrumb-item active">All User</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">All User</h4>
                <p class="card-title-desc">DataTables has most features enabled by
                    default, so all you need to do to use it with your own tables is to call
                    the construction function: <code>$().DataTable();</code>.
                </p>

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Phone</th>
                        <th>Actions</th>
                        <th>Active</th>
                    </tr>
                    </thead>
                    <tbody>
                      
                        @foreach($allusers as $key=>$user)
                        <tr>
                             
                               
                             <td> {{$key+1}} </td>
                             <td>{{$user->fullname}}</td>
                             <td>{{$user->email}}</td>
                             <td>{{$user->username}}</td>
                             <td>{{$user->phone}}</td>
                              
                             <td> 
                                <a href="{{route('admin.users.edit',$user->id)}}" class="btn btn-outline-primary">Edit</a>
                                <a href="{{route('admin.users.show',$user->id)}}" class="btn btn-outline-warning">Show</a>
                                <form action="{{ route('categories.delete', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                                </form>
                                {{-- <a href="{{route('categories.delete',$cat->id)}}" class="btn btn-outline-danger">Delete</a> --}}
                             </td>
                             <td>
                                @if ($user->status == 'active')
                                 <a href="{{route('inactive.user',$user->id)}}" class="btn btn-outline-primary" title="Make Inactive"><i class="fa-solid fa-thumbs-down"></i></a>
                                @else 
                                <a href= "{{route('active.user',$user->id)}}" class="btn btn-outline-primary" title="Make active"><i class="fa-solid fa-thumbs-up"></i></a>

                                @endif
                             </td>
                        </tr>
                        @endforeach
                        
                       
                     
                    </tbody>
                </table>

            </div>
        </div>
    </div> 
</div>  


 <!-- Required datatable js -->
 <script src="{{asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
 <script src="{{asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
 <!-- Buttons examples -->
 <script src="{{asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
 <script src="{{asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
 <script src="{{asset('assets/libs/jszip/jszip.min.js')}}"></script>
 <script src="{{asset('assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
 <script src="{{asset('assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
 <script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
 <script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
 <script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>

 <script src="{{asset('assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
 <script src="{{asset('assets/libs/datatables.net-select/js/dataTables.select.min.js')}}"></script>
 
 <!-- Responsive examples -->
 <script src="{{asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
 <script src="{{asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

 <!-- Datatable init js -->
 <script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>
@endsection