@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">My Quizzes</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Quizz Name</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Correct answers</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($quizzes as $quiz)
                                    <tr>
                                        <th scope="row">{{ $loop->index + 1}}</th>
                                        <td>{{ $quiz->name }}</td>
                                        <td>{{ $quiz->created_at }}</td>
                                        <td>{{ $quiz->result }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
