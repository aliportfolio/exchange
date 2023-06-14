@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-header">إضافة عملة جديدة</div>
                <div class="card-body">
                    <form action="{{ route('currencies.store') }}" method="post">
                        @csrf

                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger">{{ $error }}</div>
                            @endforeach
                        @endif

                        @if(session()->get('msg'))
                            <div class="alert alert-success">{{ session()->get('msg') }}</div>
                        @endif

                        <div class="form-group">
                            <label for="name">اسم العملة</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label for="code">اختصار العملة</label>
                            <input type="text" class="form-control" name="code" id="code">
                        </div>
                        <div class="form-group">
                            <label for="rate">
                                قيمة العملة
                                <small>
                                    مثال:
                                    قيمة الليرة السورية <strong>9000</strong> مقابل العملة الأساسية
                                </small>
                            </label>
                            <input type="number" min="1" class="form-control w-50" name="rate" id="rate" placeholder="9000">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="حفظ">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
