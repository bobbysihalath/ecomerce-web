@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-title card-body">
                <h2>ແກ້ໄຂ</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('comment-update') }}">
                    @csrf
                    <div class="form-group">

                        <label for="inputAddress">ຄຳເຫັນ</label>
                        <input type="text" class="form-control" id="comment" name="comment" placeholder="ປ້ອນຄຳເຫັນ" value="{{$comment->comment }}" required>
                        <input type="text" class="form-control" id="id" name="id" hidden="" value="{{$comment->id }}" required>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">ສິນຄ້າ</label>
                        <select id="product" class="form-control" name="product_id" required>
                            <option selected>ເລືອກສິນຄ້າ</option>
                            @foreach($product as $item)
                                <option value="{{$item->id}}" {{ $item->id === $comment->product->id  ? 'selected' : '' }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row justify-content-center">
                        <button type="submit" class="btn btn-primary">ບັນທືກການແກ້ໄຂ</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
