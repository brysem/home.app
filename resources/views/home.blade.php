@extends('layouts.app')

@section('content')
<div class="container">
    <h1>.app Projects</h1>
    <div class="row">
        @foreach($hosts['app'] as $host)
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
            <div class="panel panel-default panel-host">
                <div class="panel-heading">
                    <a href="{{ $host['url'] }}">{{ $host['name'] }}</a>
                </div>

                <div class="panel-body">
                    <a href="{{ $host['url'] }}">
                        <img src="{{ $host['icon'] }}" alt="{{ $host['name'] }}">
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
    <h1>.dev Projects</h1>
    <div class="row">
        @foreach($hosts['dev'] as $host)
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
            <div class="panel panel-default panel-host">
                <div class="panel-heading">
                    <a href="{{ $host['url'] }}">{{ $host['name'] }}</a>
                </div>
                
                @if ($host['version'] > 0)
                    <div class="panel-version">
                        @if ($host['version'] >= 7)
                            <span class="label label-success">{{ $host['version'] }}</span>
                        @elseif ($host['version'] >= 5.6)
                            <span class="label label-warning"> {{ $host['version'] }}</span>
                        @else
                            <span class="label label-danger"> {{ $host['version'] }}</span>
                        @endif
                    </div>
                @endif

                <div class="panel-body">
                    <a href="{{ $host['url'] }}">
                        <img src="{{ $host['icon'] }}" alt="{{ $host['name'] }}">
                    </a>
                    
                    <ul class="list-unstyled hidden">
                        @foreach($host['subs'] as $sub)
                            <li>
                                <a href="{{ $sub['url'] }}">
                                    {{ parse_url($sub['url'], PHP_URL_HOST) }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@section('javascript')
<script type="text/javascript">
    $(document).ready(function() {
        $('.panel-host').mouseover(function() {
            $(this).find('.list-unstyled').removeClass('hidden');
        }).mouseout(function() {
            $(this).find('.list-unstyled').addClass('hidden');
        });
    });
</script>
@endsection
