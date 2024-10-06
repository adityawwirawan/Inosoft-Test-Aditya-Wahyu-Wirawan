@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row g-3 align-items-center" style="padding-bottom: 40px">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center" width=20%>#</th>
                        <th class="text-left">Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sales as $sales)
                        <tr>
                            <td align="center">{{ $sales["id"] }}</td>
                            <td align="left">{{ $sales["name"] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- <div style="float: right">
                {{ $stores->links() }}
                <span style="text-align:right">
                    <p>
                        Showing {{ $stores->count() }} of {{ $stores->total() }} Data(s).
                    </p>
                </span>
            </div> --}}
        </div>
    </div>
</div>
@endsection
