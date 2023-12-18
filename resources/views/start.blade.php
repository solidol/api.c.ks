@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>College Web API</h1>
                    </div>

                    <div class="card-body">
                        @if (Auth::user())
                            <p class="fs-2">Вітаємо, {{ Auth::user()->userable->fullname }}!</p>
                        @else
                            <p class="fs-2">Тільки для авторизованих користувачів!</p>
                            <p class="fs-3">Для перегляду довідки авторизуйтеся за допомогою облікових даних електронного
                                журналу</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
