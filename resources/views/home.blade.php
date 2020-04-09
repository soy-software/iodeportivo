@extends('layouts.app')
@section('breadcrumbs', Breadcrumbs::render('home'))
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Administración</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Bienvenido
                </div>
            </div>
        </div>
    </div>
</div>


@push('linksCabeza')

@endpush

@prepend('linksPie')
    <script>
    $('#menuInicio').addClass('active');
    </script>
    
@endprepend

@endsection
