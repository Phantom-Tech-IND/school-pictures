@extends('layouts.app')

@section('content')
    <x-cart :cart-items="$cartItems" :total="$total"/>
@endsection