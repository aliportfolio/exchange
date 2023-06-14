@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-header">
                    العملات
                    <a href="{{ route('currencies.create') }}" class="btn btn-success btn-sm mr-2">إضافة</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>اسم العملة</th>
                            <th>الاختصار</th>
                            <th>قيمة العملة بالنسبة للعملة الأساسية</th>
                            <th>خيارات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($currencies as $currency)
                            <tr>
                                <td>{{ $currency->name }}</td>
                                <td>{{ $currency->code }}</td>
                                <td>{{ $currency->rate }}</td>
                                <td>
                                    <a href="javascript:void(0);"
                                       onclick="document.getElementById('delete-form-{{ $currency->id }}').submit()"
                                       class="btn btn-danger">
                                        حذف
                                    </a>
                                    <form id="delete-form-{{ $currency->id }}" action="{{ route('currencies.destroy', $currency->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>لا يوجد عملات.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
