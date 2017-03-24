@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Entreprise Management</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('entreprises.create') }}"> Create New Entreprise</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Description</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($entreprises as $key => $entreprise)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $entreprise->name }}</td>
                <td>{{ $entreprise->description }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('entreprises.show',$entreprise->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('entreprises.edit',$entreprise->id) }}">Edit</a>

                    {!! Form::open(['method' => 'DELETE','route' => ['entreprises.destroy', $entreprise->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>
    {!! $entreprises->render() !!}
@endsection