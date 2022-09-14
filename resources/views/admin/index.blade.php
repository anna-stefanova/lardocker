@extends('layouts.admin')
@section('title') Панель управления @endsection
@section('content')
    @php $message = "Test message"; @endphp
    <x-alert type="warning" :message="$message"></x-alert>
@endsection
