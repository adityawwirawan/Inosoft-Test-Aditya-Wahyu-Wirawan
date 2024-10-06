@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row g-3 align-items-center" style="padding-bottom: 40px">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Code</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Long</th>
                        <th class="text-center">Lat</th>
                        <th class="text-center">Address</th>
                        <th class="text-center">Frequency</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stores as $store)
                        <tr>
                            <td align="center">{{ $store->id }}</td>
                            <td align="center">{{ $store->code }}</td>
                            <td align="center">{{ $store->name }}</td>
                            <td align="center">{{ $store->longitude }}</td>
                            <td align="left">{{ $store->latitude }}</td>
                            <td align="left">{{ $store->subdistrict.' '.$store->postal_code }}</td>
                            <td align="left">{{ $store->frequency }}</td>
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
