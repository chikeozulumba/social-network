@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Notifications</div>

                <div class="panel-body">
                    <ul class="list-group">
                      @foreach ($nots as $not)
                        <li class="list-group-item">
                          {{ $not->data['name'] }} 
                          <i>{{ $not->data['message'] }}</i>
                          <span class="pull-right">
                            <small>
                              {{ $not->created_at->diffForHumans() }}
                            </small>
                          </span>
                        </li>
                      @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
