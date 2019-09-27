@extends('layouts.app')

@section('content')

    <table class="table table-bordered table-striped">
        <tbody>
        <tr>
            <th>age</th>
        </tr>
        <tr>
            <th>eyeColor</th>
        </tr>
        <tr>
            <th>name</th>
        </tr>
        <tr>
            <th>gender</th>
        </tr>
        <tr>
            <th>company</th>
        </tr>
        <tr>
            <th>email</th>
        </tr>
        <tr>
            <th>phone</th>
        </tr>
        <tr>
            <th>address</th>
        </tr>

        <tr>
            <td>
                @if ($user->isWait())
                    <span class="badge badge-secondary">Waiting</span>
                @endif
                @if ($user->isActive())
                    <span class="badge badge-primary">Active</span>
                @endif
            </td>
        </tr>
        <tbody>
        </tbody>
    </table>
@endsection
