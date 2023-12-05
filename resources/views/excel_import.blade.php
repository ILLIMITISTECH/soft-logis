@extends('admin.layouts.admin')

@section('section')
<div class="page-content">
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('import.excel') }}" class="row" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group col-10">
                <label for="file">Charger le fichier a importer</label>
                <input type="file" name="file" id="file" class="form-control">
            </div>
            <button type="submit" class="btn btn-outline-primary col-2 btn-sm py-1">Import</button>
        </form>
    </div>

    <div class="container text-danger">
        Pour reussir l'importation il faut avoir un gabarie Excel avec les colonnes suivantes :
    </div>
</div>
@endsection
