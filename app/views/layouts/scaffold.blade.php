<!doctype html>
<html xmlns="http://www.w3.org/1999/html">
	<head>
		<meta charset="utf-8">
        @include('includes.head')
		<style>
			table form { margin-bottom: 0; }
			form ul { margin-left: 0; list-style: none; }
			.error { color: red; font-style: italic; }
			body { padding-top: 20px; }
		</style>
	</head>

	<body>

		<div class="container">
            <!-- top-navigation content -->
             @include('includes.navbar')

            @if ($message = Session::get('message'))
            </br> </br>
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{{ $message }}}
            </div>
            @endif
            </br>

			@yield('main')
		</div>

	</body>

</html>