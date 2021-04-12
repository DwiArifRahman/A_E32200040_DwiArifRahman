@extends('layouts.app') 

@section('content')  
<div class="jumbotron jumbotron-fluide">   
    <div class="container">    
        <h1 class="display-4">Personal Data</h1>    
        <p class="lead">this page is My Personal Bio</p>   
    </div>  
    <p>Nama : {{ $nama }}</p>
    <p>Mata Pelajaran</p>
    <ul>
        @foreach ($pelajaran as $p)
        <li>{{ $p }}</li> 
        @endforeach
</div> 
@endsection 