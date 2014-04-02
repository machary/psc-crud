@extends('layouts.scaffold')

@section('main')

<h1>Show Userrole</h1>

<p>{{ link_to_route('admin.userroles.index', 'Return to all userroles') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>User_name</th>
				<th>Role_name</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $userrole->user_name }}}</td>
					<td>{{{ $userrole->role_name }}}</td>
                    <td>{{ link_to_route('admin.userroles.edit', 'Edit', array($userrole->user_name), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.userroles.destroy', $userrole->user_name))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
