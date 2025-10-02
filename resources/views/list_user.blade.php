@extends('layouts.app')

@section('contents')
@include('components.user-table', ['users' => $users])
@endsection
