<!-- resources/views/userprofile.blade.php //-->
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Your Pilots <a class="btn btn-default pull-right" href="{{ url('/create')}}">+</a></div>

                <div class="panel-body">
                    <table>
					<thead>
					<th>Name</th>
					<th></th>
					</thead>
					<tbody>
					@foreach($pilots as $pilot)
					<tr>
					<td><div>{{ $pilot->name }}</div></td>
					<td>
					<form action="{{ url('/switch/'.$pilot->id) }}" method="POST">
					{{ csrf_field() }}<input type="submit" value="Switch To" id="switch-pilot-{{$pilot->id}}" class="btn-primary"/>
					</form>
					<form action="{{ url('/profile/'.$pilot->id) }}" method="POST">
					{{ csrf_field() }}{{method_field("DELETE")}}<input type="submit" value="Delete" id="delete-pilot-{{$pilot->id}}"/></form></td>
					@endforeach
					</tbody>
					</table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection