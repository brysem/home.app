@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Tutorials</h1>
            <div class="panel panel-default">
                <div class="panel-heading">macOS Development</div>
                <div class="panel-body">
                    <a href="https://getgrav.org/blog/macos-sierra-apache-multiple-php-versions">https://getgrav.org/blog/macos-sierra-apache-multiple-php-versions</a>
                </div>
            </div>
            <h1>Commands</h1>
            <div class="panel panel-default">
                <div class="panel-heading">Servers</div>

                <div class="panel-body">
                    <ul class="list-unstyled">
                        <li><strong>Apache</strong></li>
                        <li><pre>{{ implode(PHP_EOL, [
                            'sudo apachectl -k restart', 
                            'sudo apachectl configtest'
                        ]) }}</pre></li>
                        <li><strong>MariaDB</strong></li>
                        <li><pre>mysql.server start</pre></li>
                    </ul>
                </div>
            </div>
            
            <div class="panel panel-default">
                <div class="panel-heading">PHP</div>

                <div class="panel-body">
                    <ul class="list-unstyled">
                        <li><strong>Config</strong></li>
                        <li><pre>/usr/local/etc/php</pre></li>
                        <li><strong>Switch Versions</strong></li>
                        <li>
                            <div class="row">
                                <div class="col-sm-2"><strong>v5.3.29</strong><pre>sphp 53</pre></div>
                                <div class="col-sm-2"><strong>v5.4.45</strong><pre>sphp 54</pre></div>
                                <div class="col-sm-2"><strong>v5.5.38</strong><pre>sphp 55</pre></div>
                                <div class="col-sm-2"><strong>v5.6.29</strong><pre>sphp 56</pre></div>
                                <div class="col-sm-2"><strong>v7.0.14</strong><pre>sphp 70</pre></div>
                                <div class="col-sm-2"><strong>v7.1.0</strong><pre>sphp 71</pre></div>
                            </div>
                        </li>
                        <li><strong>XDebug Toggle</strong></li>
                        <li><pre>xdebug-toggle</pre></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
