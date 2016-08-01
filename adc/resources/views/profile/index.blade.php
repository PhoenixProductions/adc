<!-- resources/views/userprofile.blade.php //-->
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Your Pilots</div>

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
					<td><!-- TODO: Set active, delete  buttons //--></td>
					@endforeach
					</tbody>
					</table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection