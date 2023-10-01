@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <div class="card shadow">
        <div class="card-body ">
            <div class="d-flex justify-content-between">
                <h1 class="h3 mb-4 text-gray-800">{{ __('ຈັດການຂໍ້ມູນແບນ') }}</h1>
                <a class="btn btn-info" href="{{ url('/insert-brand') }}">ເພິ່ມຂໍ້ມູນ</a>
            </div>

        </div>
    </div>



        <!-- DataTales Example -->
        @if(count($brands) > 0)
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">ລາຍການຂໍ້ມູນ</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ລຳດັບ</th>
                            <th>ຊື່</th>
                            <th>ແກ້ໄຂ</th>
                            <th>ລຶບ</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($brands as $brand)
                            <tr class="tborder">
                                <td>{{ $brand->id}}</td>
                                <td>{{ $brand->name}}</td>

                                <td><a href="/update-brand/{{$brand->id}}">
                                        <button class="btn btn-primary">Update</button>
                                    </a>
                                </td>
                                <td><a href="/delete-brand/{{$brand->id}}">
                                        <button class="btn btn-danger">Delete</button>
                                    </a>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @else
            <div class="text-center">No Brand</div>
        @endif
@endsection
