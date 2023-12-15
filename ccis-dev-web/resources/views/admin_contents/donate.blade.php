@extends('layout.app')
@section('content')
    @if(session('success'))
        <div class="m-4 alert alert-success alert-dismissible fade show" role="alert"> 
            <strong> 
                {{session('success')}}
            </strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> 
            </button> 
        </div>
    @endif
    <h5>Donate</h5>
@endsection