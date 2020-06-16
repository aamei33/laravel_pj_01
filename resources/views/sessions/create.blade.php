@extends('layouts.default')
@section('title','登录')

@section('content')
@section('content')
    <div class="offset-md-2 col-md-8">
        <div class="card ">
            <div class="card-header">
                <h5>登录</h5>
            </div>
            <div class="card-body">
                <!--  提交登录的信息时 的验证错信息提示  -->
                @include('shared._errors')

                <form method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="email">邮箱：</label>
                        <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                    </div>

                    <div class="form-group">
                        <label for="password">密码：</label>
                        <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                    </div>

                    <button type="submit" class="btn btn-primary">登录</button>
                </form>

                <hr>

                <p>还没账号？<a href="{{ route('signup') }}">现在注册！</a></p>
            </div>
        </div>
    </div>
@stop
