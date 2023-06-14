@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-header">تحويل بين العملات</div>
                <div class="card-body">

                    @if(isset($result))
                        <div class="alert alert-success">
                            المبلغ:
                            <strong>{{ $result }}</strong>
                        </div>
                    @endif

                    <form action="" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">الكمية</label>
                            <input type="text" class="form-control" name="amount">
                        </div>
                        <div class="form-group">
                            <label for="">من</label>
                            <select class="form-control" name="from" id="">
                                <option value="">اختر عملة</option>
                                @foreach($currencies as $currency)
                                    <option value="{{ $currency->code }}">{{ $currency->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">إلى</label>
                            <select class="form-control" name="to" id="">
                                <option value="">اختر عملة</option>
                                @foreach($currencies as $currency)
                                    <option value="{{ $currency->code }}">{{ $currency->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="تحويل">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
