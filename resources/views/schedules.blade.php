@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row g-3 align-items-center" style="padding-bottom: 40px">
                <form class="form-inline" action="" method="GET">
                    @csrf
                    <div class="row g-3 align-items-center">
                        <div class="col-auto" style="padding-top: 7px;">
                            <a href="{{ route('schedule.export')}}" class="btn btn-dark mb-2"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Export</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row g-3 align-items-center table-responsive" style="padding-bottom: 40px">
            <table class="table">
                <thead>
                    <tr>
                        <th>Sales</th>
                        <th>1-Oct</th>
                        <th>2-Oct</th>
                        <th>3-Oct</th>
                        <th>4-Oct</th>
                        <th>5-Oct</th>
                        <th>6-Oct</th>
                        <th>7-Oct</th>
                        <th>8-Oct</th>
                        <th>9-Oct</th>
                        <th>10-Oct</th>
                        <th>11-Oct</th>
                        <th>12-Oct</th>
                        <th>13-Oct</th>
                        <th>14-Oct</th>
                        <th>15-Oct</th>
                        <th>16-Oct</th>
                        <th>17-Oct</th>
                        <th>18-Oct</th>
                        <th>19-Oct</th>
                        <th>20-Oct</th>
                        <th>21-Oct</th>
                        <th>22-Oct</th>
                        <th>23-Oct</th>
                        <th>24-Oct</th>
                        <th>25-Oct</th>
                        <th>26-Oct</th>
                        <th>27-Oct</th>
                        <th>28-Oct</th>
                        <th>29-Oct</th>
                        <th>30-Oct</th>
                        <th>31-Oct</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($schedules as $rep => $days)
                        <tr>
                            <td>{{ $rep }}</td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td>
                                    {{ isset($days["2024-10-{$day}"]) ? implode(', ', $days["2024-10-{$day}"]) : '' }}
                                </td>
                            @endfor
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
