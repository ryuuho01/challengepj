@extends('layouts.default')
<style>
  .form-ttl {
    font-size: 20px;
    text-align: center;
    font-weight: bold;
    margin: 30px 0;
  }

  .search-box {
    border: 2px solid black;
    width: 1000px;
    margin: auto;
    padding: 20px;
  }

  form table tr {
    height: 50px;
  }

  .span-adjust {
    text-align: center;
  }

  .sex-ttl {
    background: none;
    border: none;
    font-size: 16px;
    font-weight: bold;
    width: 60px;
    padding-left: 20px;
    margin-right: 10px;
  }

  form table th {
    text-align: left;
    padding-right: 20px;
  }

  form table input {
    height: 35px;
    width: 200px;
    border: 1px solid rgb(185, 185, 185);
    border-radius: 5px;
    /* margin: 0 30px; */
  }

  /*---------- radio button ----------*/
  .radio-input {
    display: none;
  }

  .radio-input+label {
    padding-left: 40px;
    position: relative;
    margin-right: 20px;
  }

  .radio-input+label::before {
    content: "";
    display: block;
    position: absolute;
    top: 0;
    left: 10px;
    transform: translate(-20%, -20%);
    width: 25px;
    height: 25px;
    border: 1px solid rgb(185, 185, 185);
    border-radius: 50%;
  }

  .radio-input:checked+label::after {
    content: "";
    display: block;
    position: absolute;
    top: 4px;
    left: 14px;
    width: 9px;
    height: 9px;
    background: black;
    border-radius: 50%;
  }

  .radio-position {
    padding-left: 20px;
  }

  /*---------- submit button ----------*/
  button {
    /* margin: 50px auto; */
    background: black;
    color: white;
    width: 120px;
    height: 30px;
    border: 1px solid black;
    border-radius: 5px;
    cursor: pointer;
  }

  .button-position {
    text-align: center;
  }

  .reset-position {
    display: flex;
  }

  .reset {
    background: none;
    color: black;
    text-decoration: underline;
    border: none;
    width: 80px;
    display: inline-block;
    margin: auto;
  }

  /*---------- submit button ----------*/

  /* ！！！！！！！！ページネーション全体！！！！！！！！ */
  .hidden {
    width: 1044px;
    /* height: 100px; */
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: auto;
    margin-top: 50px;
  }

  /* ！！！！！！！！ページネーション左側のボックスページ！！！！！！！！ */
  .page-ref-flex {
    display: flex;
  }

  /* ！！！！！！！！ページネーション右側のボックス！！！！！！！！ */
  .page-box {
    width: 70%;
    text-align: right;
    margin-right: -20px;
  }

  /* ！！！！！！！！ページ前後の矢印の装飾「＜＞」！！！！！！！！ */
  .page-css {
    border: 1px solid rgb(185, 185, 185);
    padding: 7px;
    /* margin-right: 7px; */
    font-size: 13px;
    display: table-cell;
    vertical-align: middle;
    text-align: center;
  }

  .relative-ablesize {
    border-left: none;
  }

  .relative-disablesize {
    display: inline-block;
    vertical-align: middle;
    width: 20px;
    margin-right: 10px;
  }

  .relative-disablesize2 {
    display: inline-block;
    vertical-align: middle;
    width: 20px;
    margin-right: -2px;
  }

  .relative-current {
    padding: 6px;
    text-align: center;
    width: 18px;
    height: 17px;
    margin: auto;
    color: white;
    background-color: black;
    display: inline-block;
    vertical-align: middle;
  }

  .relative-other {
    border: 1px solid rgb(185, 185, 185);
    border-right: none;
    padding: 5px;
    text-decoration: none;
    font-size: 17px;
  }

  .relative-other:first-child {
    border: 1px solid rgb(185, 185, 185);
    border-left: none;
  }

  .relative-other:last-child {
    border: 1px solid rgb(185, 185, 185);
    border-right: none;
  }

  .relative-rl-all {
    display: flex;
    width: 700px;
    justify-content: right;
  }

  .relative-rl-all a {
    text-decoration: none;
    display: inline-block;
    vertical-align: middle;
    width: 18px;
    text-align: center;
  }



  /*---------- result box ----------*/
  .result-box {
    width: 1044px;
    margin: auto;
    margin-bottom: 200px;
    /* padding: 20px; */
  }

  .result-box table tr {
    height: 50px;
  }

  .result-box th {
    border-bottom: 1px solid black;
    text-align: left;
    vertical-align: bottom;
    /* width: 142px; */
  }

  .result-box th.id-position {
    text-align: center;
  }

  .result-box table {
    margin: auto;
  }

  .id-box {
    width: 100px;
    text-align: center;
    vertical-align: middle;
  }

  .fullname-box {
    width: 100px;
    vertical-align: middle;
  }

  .gender-box {
    width: 50px;
    vertical-align: middle;
  }

  .email-box {
    width: 250px;
    vertical-align: middle;
  }

  .opinion-box {
    width: 444px;
    vertical-align: middle;
    position: relative;
  }

  .delete-box button {
    width: 70px;

  }

  .delete-box {
    vertical-align: middle;
    width: 100px;
  }

  .fukidashi {
    display: none;
    width: 400px;
    position: absolute;
    top: 35px;
    left: 0px;
    /* padding: 0px; */
    background: rgb(255, 255, 255);
    color: black;
    z-index: 1000;
    /* opacity: 1; */
  }

  .text:hover+.fukidashi {
    display: block;

    /* transition: 0.6s; */
  }
</style>


@section('title', '管理システム')
@section('content')
<div class="form-ttl">
  <h1>管理システム</h1>
</div>

<div class="search-box">
  <form action="/manage" method="POST">
    <table>
      @csrf
      <tr>
        <th>お名前</th>
        <td>
          <input value="{{$olddata['name']}}" name="name" id="name" type="text">
        </td>
        <td class="radio-position" colspan="2">
          <input class="sex-ttl" type="text" value="性別" disabled>
          <input class="radio-input" type="radio" name="gender" id="radio-01" value="3" <?php if ($olddata['gender1'] == "checked") echo "checked"; ?>>
          <label for="radio-01">全て</label>
          <input class="radio-input" type="radio" name="gender" id="radio-02" value="1" <?php if ($olddata['gender2'] == "checked") echo "checked"; ?>>
          <label for="radio-02">男性</label>
          <input class="radio-input" type="radio" name="gender" id="radio-03" value="2" <?php if ($olddata['gender3'] == "checked") echo "checked"; ?>>
          <label for="radio-03">女性</label>
        </td>
      </tr>
      <tr>
        <th>登録日</th>
        <td>
          <input value="{{$olddata['datestart']}}" name="datestart" id="datestart" type="date">
        </td>
        <td class="span-adjust">　~　</td>
        <td>
          <input value="{{$olddata['dateend']}}" name="dateend" id="dateend" type="date">
        </td>
      </tr>
      <tr>
        <th>メールアドレス</th>
        <td>
          <input value="{{$olddata['email']}}" name="email" id="email" type="text">
        </td>
      </tr>
    </table>

    <div class="button-position">
      <button>検索</button><br>
    </div>
  </form>
  <div class="reset-position">
    <button class="reset" onclick="resetClick()">リセット</button>
  </div>
</div>
<!-- -----------------以下リスト表示----------------- -->
<div class="flex">
  {{ $items->links() }}
</div>

<div class="result-box">
  <table>
    <tr>
      <th class="id-position id-box">ID</th>
      <th class="fullname-box">お名前</th>
      <th class="gender-box">性別</th>
      <th class="email-box">メールアドレス</th>
      <th class="opinion-box">ご意見</th>
      <th class="delete-box"></th>
    </tr>
    @foreach ($items as $item)
    <form action="/remove" method="POST">
      @csrf
      <tr>
        <td class="id-box">
          {{$item->id}}
        </td>
        <td class="fullname-box">
          {{$item->fullname}}
        </td>
        <td class="gender-box">
          {{$item->gender}}
        </td>
        <td class="email-box">
          {{$item->email}}
        </td>
        <td class="opinion-box">
          <p class="text">{{Str::limit($item->opinion, 50, '...')}}</p>
          <p class="fukidashi">{{Str::after($item->opinion, Str::limit($item->opinion, 50))}}</p>
        </td>
        <td class="delete-box">
          <!-- <input type="button" value="削除" id="{{$item->id}}" onclick="deleteClick()"> -->
          <input type="text" value="{{$item->id}}" name="id" hidden>
          <!-- <button onclick="deleteClick()">削除</button> -->
          <button>削除</button>
        </td>
      </tr>
    </form>
    @endforeach
  </table>
  <script>
    function resetClick() {
      document.getElementById("name").value = "";
      document.getElementById("radio-01").checked = "checked";
      document.getElementById("datestart").value = "";
      document.getElementById("dateend").value = "";
      document.getElementById("email").value = "";
    }
  </script>
</div>

@endsection