@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <div class="">
                        <h5 class="m-0 font-weight-bold text-primary mb-3">
                            @lang('Currencies list')
                        </h5>
                    </div>
                    <table class="table text-gray-900">
                        <thead>
                        <tr>
                            <th scope="col">№</th>
                            <th scope="col">@lang('ValuteID')</th>
                            <th scope="col">@lang('Name')</th>
                            <th scope="col">@lang('charCode')</th>
                            <th scope="col">@lang('numCode')</th>
                            <th scope="col">@lang('value')</th>
                            <th scope="col">@lang('date')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($currencies as $currency)
                            <tr>
                                <th scope="row">{{$currency->id}}</th>
                                <td>
                                    {{$currency->valuteID }}
                                </td>
                                <td>
                                    {{$currency->name}}
                                </td>
                                <td>
                                    {{$currency->charCode}}
                                </td>
                                <td>
                                    {{$currency->numCode}}
                                </td>
                                <td>
                                    {{$currency->value}}
                                </td>
                                <td>
                                    {{date_format($currency->date, 'd-m-Y')}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$currencies->appends(['from'=>$from, 'to'=>$to])->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
