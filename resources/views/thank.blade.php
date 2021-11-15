@extends('layouts.default')
<style>
  .thank {
    text-align: center;
    margin-top: 200px;
  }

  /*---------- submit button ----------*/
  button {
    margin: 50px auto;
    background: black;
    width: 120px;
    height: 30px;
    border: 1px solid black;
    border-radius: 5px;
    cursor: pointer;
  }

  .button-position {
    text-align: center;
  }
  a {
    color: white;
    text-decoration: none;
  }
</style>


@section('title', '送信完了')
@section('content')
<div class="thank">
  <p>ご意見いただきありがとうございました。</p>
</div>
<div class="button-position">
  <button><a href="/">トップページへ</a></button>
</div>

@endsection