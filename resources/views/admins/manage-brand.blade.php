@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <div class="container-fluid">
        <div class="panel-body">
            <div class="d-flex justify-content-between">
                <h2>ຈັດການຂໍ້ມູນແບຣນ</h2>
                <a href="{{ url('/insert-brand') }}" class="float-right btn btn-info"><i class="fa fa-plus"></i>&nbsp;ເພິ່ມຂໍ້ມູນ</a>
            </div>
        </div>
        <br/>
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
                                        <button
                                            type="button"
                                            class="btn btn-outline-primary btn-circle  btn-circle ml-2">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </a>
                                </td>
                                <td><a href="/delete-brand/{{$brand->id}}">
                                        <button type="button"
                                                class="btn btn-outline-warning btn-circle  btn-circle ml-2">
                                            <i class="fa fa-trash"></i>
                                        </button>
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
