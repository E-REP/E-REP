@extends('app.layouts.app')

@include('app.includes.navigation')

@section('content')
<script>
    const globalData = {};
    globalData.authUserId = {!! $authUserId !!};
    globalData.profileId = {!! $profileId !!};
</script>
<div id="root"></div>
@endsection
