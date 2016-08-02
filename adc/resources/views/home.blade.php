@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    
					{{ Pilot::greeting() }} You are logged in!
					
					@unless (Pilot::current())
					<p>You don't a have pilot on record, would you like to <a href="{{ url('/create') }}">create one</a>?</p>
					@endunless
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
