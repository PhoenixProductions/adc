<!-- resources/views/userprofile.blade.php //-->
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $pilot->name }}</div>

                <div class="panel-body">
					{{ $pilot->birthdate }}
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Ranks</div>

                <div class="panel-body">
{{ $pilot->rankcombat }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection