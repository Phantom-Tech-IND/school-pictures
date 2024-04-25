@extends('layouts.app')
@section('content')
    @include('components.team', ['teamMembers' => \App\Constants\Constants::TEAM_MEMBERS])
@endsection
