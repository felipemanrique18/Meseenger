@extends('layouts.app')

@section('content')
<b-container fluid style="height: calc(100vh - 56px);" class="pl-0">
    <b-row class="h-100" no-gutters>
        <b-col cols="4">
            <contactolist-component></contactolist-component>
        </b-col>
        <b-col cols="8">
            <activeconversation-component></activeconversation-component>
        </b-col>
    </b-row>
</b-container>
@endsection
