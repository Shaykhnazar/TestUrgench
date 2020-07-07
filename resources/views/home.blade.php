@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Parse currency from XML to DB</div>
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
                    <form action="{{route('parse')}}" method="get" id="parse_form">
                        <div class="form-group">
                            <label for="datepicker">Date</label>
                            <div >
                                <input id="datepicker" class="form-control" type="text" name="date" title="Choose the date which need currency valute"/>
                            </div>
                        </div>
                        <div>
                            <button type="submit" id="but" class="btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
