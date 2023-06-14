@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-header">إضافة مشروع جديد</div>
                <div class="card-body">
                    <form action="{{ route('store') }}" method="post">
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
                            <label for="name">اسم المشروع</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label for="description">وصف المشروع</label>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="6"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="cost">تكلفة المشروع (بالعملة الأساسية)</label>
                            <input type="number" min="1" class="form-control w-50" name="cost" id="cost" onkeyup="calc(event)">
                        </div>
                        <div class="form-group">
                            @forelse($currencies as $currency)
                                <h6>
                                    التكلفة ب
                                    <span>{{ $currency->name }}:</span>
                                    <strong class="cost_result" data-rate="{{ $currency->rate }}">0</strong>
                                    <strong>{{ $currency->code }}</strong>
                                </h6>
                            @empty

                            @endforelse
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


@push('js')
    <script>
        function calc(e) {
            let el = $('.cost_result'),
                cost = e.target.value,
                res;

            for(let i = 0; i < el.length; i++)
            {
                res = cost * el[i].getAttribute('data-rate')
                el[i].innerText = res
            }
        }
    </script>
@endpush
