@extends('layouts.default')

<style>
  .form-ttl {
    font-size: 20px;
    text-align: center;
    font-weight: bold;
    margin: 30px 0;
  }

  /*---------- form ----------*/
  .form {
    width: 700px;
    margin: auto;
    margin-top: 30px;
  }

  /*---------- form_cell ----------*/
  tr {
    height: 70px;
    /* vertical-align: top; */
  }

  th {
    text-align: left;
    width: 150px;
  }

  /*---------- input ----------*/
  input {
    border: none;
    background: none;
  }

  /*---------- opinion ----------*/
  .opinion-ttl {
    display: table-cell;
    vertical-align: top;
  }

  textarea {
    /* width: 100%;
    height: 100px; */
    border: none;
    resize: none;
    background: none;
  }

  /*---------- submit button ----------*/
  button {
    margin: 30px auto 0 110px;
    background: black;
    color: white;
    width: 100px;
    height: 30px;
    border: 1px solid black;
    border-radius: 5px;
    cursor: pointer;
  }

  .button-position {
    text-align: center;
  }

  /*---------- back button ----------*/
  .back-button {
    margin: 0;
    width: 100%;
    background: none;
    color: black;
    border: none;
    text-decoration: underline;
    text-align: center;
  }
</style>

@section('title', '内容確認')
@section('content')
<div class="form-ttl">
  <h1>内容確認</h1>
</div>
<div class="form">
  <form class="form_content" action="/post" method="POST" name="form">
    <table>
      @csrf
      <tr>
        <th>お名前</th>
        <td>
          <input type="text" name="fullname" value="{{$items->last_name}} {{$items->first_name}}" disabled>
          <input type="text" name="fullname" value="{{$items->last_name}} {{$items->first_name}}" hidden>
        </td>
      </tr>
      <tr>
        <th>性別</th>
        <td>
          <input type="text" name="gender" value="{{$items->gender}}" disabled>
          <input type="text" name="gender" value="{{$items->gender}}" hidden>
        </td>
      </tr>
      <tr>
        <th>メールアドレス</th>
        <td>
          <input type="text" name="email" value="{{$items->email}}" disabled>
          <input type="text" name="email" value="{{$items->email}}" hidden>
        </td>
      </tr>
      <tr>
        <th>郵便番号</th>
        <td>
          <input type="text" name="postcode" value="{{$items->postcode}}" disabled>
          <input type="text" name="postcode" value="{{$items->postcode}}" hidden>
        </td>
      </tr>
      <tr>
        <th>住所</th>
        <td>
          <input type="text" name="address" value="{{$items->address}}" disabled>
          <input type="text" name="address" value="{{$items->address}}" hidden>
        </td>
      </tr>
      <tr>
        <th>建物名</th>
        <td>
          <input type="text" name="building_name" value="{{$items->building_name}}" disabled>
          <input type="text" name="building_name" value="{{$items->building_name}}" hidden>
        </td>
      </tr>
      <tr>
        <th class="opinion-ttl">ご意見</th>
        <td>
          <textarea name="opinion" cols="60" rows="4" disabled>{{$items->opinion}}</textarea>
          <textarea name="opinion" cols="60" rows="4" hidden>{{$items->opinion}}</textarea>
        </td>
      </tr>
      <tr>
        <td class="button-position" colspan="2"><button>送信</button></td>
      </tr>
    </table>
    <button class="back-button" type="button" onclick="history.back()">修正する</button>
  </form>
</div>
@endsection