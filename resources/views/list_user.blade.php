@extends('layouts.app')

@section('content')
@include('components.user-table', ['users' => $users])
@endsection
