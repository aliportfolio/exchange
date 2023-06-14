@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-header">
                    المشاريع
                    <a href="{{ route('projects.create') }}" class="btn btn-success btn-sm mr-2">إضافة</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>اسم المشروع</th>
                            <th>التكلفة بالعملة الأساسية</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($projects as $project)
                            <tr>
                                <td>{{ $project->name }}</td>
                                <td>{{ $project->cost }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td>لا يوجد مشاريع.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
