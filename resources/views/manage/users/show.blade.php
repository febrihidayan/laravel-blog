@extends('layouts.manage')

@section('content')
<div class="columns">
    <div class="column">
        <h1 class="title is-4">Show User</h1>
    </div>
    <div class="column">
        <a href="{{ route('manage.users.index') }}" class="button is-light is-pulled-right">Back</a>
        <a href="{{ route('manage.users.edit', $user->id) }}" class="button is-light is-pulled-right mr-3">Edit</a>
    </div>
</div>
<hr>
<div class="content">
    <div class="field">
        <label class="label">Name</label>
        <pre>{{ $user->name }}</pre>
    </div>
    <div class="field">
        <label class="label">Email Address</label>
        <pre>{{ $user->email }}</pre>
    </div>
    <div class="field">
        <label class="label">Role</label>
        <pre>{{ $user->role }}</pre>
    </div>
    <div class="field">
        <label class="label">Created</label>
        <pre>{{ $user->created }}</pre>
    </div>
    <div class="field">
        <label class="label">Updated</label>
        <pre>{{ $user->updated }}</pre>
    </div>
</div>
@endsection