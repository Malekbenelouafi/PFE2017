@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Filieres Management</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('filieres.create') }}"> Create New Filiere</a>
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
        @foreach ($filieres as $key => $filiere)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $filiere->name }}</td>
                <td>{{ $filiere->description }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('filieres.show',$filiere->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('filieres.edit',$filiere->id) }}">Edit</a>

                    {!! Form::open(['method' => 'DELETE','route' => ['filieres.destroy', $filiere->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>
    {!! $filieres->render() !!}
@endsection