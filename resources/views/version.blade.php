@extends('layouts.app')

@section('content')
<div class="container">
    <h1>PHP Versions</h1>
    <div class="row">
        @foreach ($versions as $version)
        <div class="col-md-2">
            <div class="panel @if($current_version == $version) panel-primary @else panel-default @endif text-center">
                <div class="panel-heading"><strong>{{ $version }}</strong></div>
                <div class="panel-body">
                    <img src="{{ 'https://www.gravatar.com/avatar/'.md5($version).'?d=identicon' }}" alt="{{ $version }}">
                    <br><br>
                    <i><span class="text-info">sphp</span> {{ str_replace('.', '', $version) }}</i>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
