@extends('layouts.app')


@section('content')

    <body>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Show Users') }}</div>

                <div class="card-body">

                    <div class="table-responsive col-sm-12">
                        <table id="users" class="table align-items-center table-flush">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">User</th>
                                <th scope="col">Email</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Updated At</th>
                                <th scope="col">Update</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
    @include('scripts.usersTableScript')
    </body>

@endsection
