@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Entreprise</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('entreprises.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $entreprise->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {{ $entreprise->description }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                @if(!empty($filieres))
                    <strong>Filieres:</strong>
                    @foreach($filieres as $v)
                        <label class="label label-success">{{ $v->name }}</label>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection