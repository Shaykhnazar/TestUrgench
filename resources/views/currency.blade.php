@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Api get currency method</div>
                    <div class="card-body" >
                        <div>
                            @if ($message = Session::get('success'))
                                <div class="alert sm alert-success">
                                    <p>
                                        {{ $message }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </p>
                                </div>
                            @endif
                            @if ($message = Session::get('danger'))
                                <div class="alert sm alert-danger">
                                    <p>
                                        {{ $message }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </p>
                                </div>
                            @endif
                        </div>
                        <form action="{{route('get_currency')}}" method="get" id="currency_form">
                            <div class="form-group">
                                <label for="valute_id">Value ID</label>
                                <div>
                                    <input id="valute_id" class="form-control" type="text" name="valute_id" title="Choose the value ID which need currency valute"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="datepicker3">From Date</label>
                                <div>
                                    <input id="datepicker3" class="form-control" type="text" name="from" title="Choose the from date which need currency valute"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="datepicker2">To Date</label>
                                <div>
                                    <input id="datepicker2" class="form-control" type="text" name="to" title="Choose the to date which need currency valute"/>
                                </div>
                            </div>
                            <div>
                                <button type="submit" id="get_cur_btn" class="btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
