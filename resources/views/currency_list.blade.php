@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="m-0 font-weight-bold text-primary mb-3">
                            @lang('Currency list for selected date')
                        </h5>
                    </div>
                    <table class="table text-gray-900">
                        <thead>
                        <tr>
                            <th scope="col">№</th>
                            <th scope="col">@lang('Date')</th>
                            <th scope="col">@lang('Value')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($currencies as $index=>$item)
                            <tr>
                                <th scope="row">{{$index+1}}</th>
                                <td>
                                    {{date_format($item->date, 'd-m-Y') }}
                                </td>
                                <td>
                                    {{$item->value}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
