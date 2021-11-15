@extends('layouts.default')
<style>
  .form-ttl {
    font-size: 20px;
    text-align: center;
    font-weight: bold;
    margin: 30px 0;
  }

  h2 {
    color: red;
    text-align: center;
  }

  .error_txt {
    color: red;
  }

  .error {
    color: red;
    text-align: left;
  }

  /*---------- form ----------*/
  .form {
    width: 700px;
    margin: auto;
    margin-top: 30px;
  }

  /*---------- form_cell ----------*/
  tr {
    height: 43px;
    /* vertical-align: top; */
  }

  th {
    text-align: left;
    width: 150px;
  }

  /*---------- require ----------*/
  span {
    color: red;
  }

  /*---------- input ----------*/
  input {
    width: 100%;
    height: 35px;
    border-radius: 5px;
    border: 1px solid rgb(185, 185, 185);
  }

  .name-input {
    width: 240px;
  }

  .postcode-input {
    width: 90%;
  }

  /*---------- sample ----------*/
  p {
    color: rgb(185, 185, 185);
    padding-left: 10px;
  }

  /*---------- postcode ----------*/
  .postcode-text {
    text-align: right;
  }

  /*---------- opinion ----------*/
  .opinion-ttl {
    display: table-cell;
    vertical-align: top;
  }

  textarea {
    width: 100%;
    height: 100px;
    border-radius: 5px;
    border: 1px solid rgb(185, 185, 185);
    resize: none;
  }

  /*---------- submit button ----------*/
  button {
    margin: 30px auto;
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
</style>



@section('title', 'お問い合わせ')
@section('content')

<!-- <script type="text/javascript">
  function check_01() {
    if (form.last_name.value == "") {
      alert("姓を入力してください");
    }
  }

  function check_02() {
    if (form.first_name.value == "") {
      alert("名を入力してください");
    }
  }

  function check_03() {
    if (form.email.value == "") {
      alert("メールアドレスを入力してください");
    } else if (form.email.value == "") {
      alert("メールアドレスの形式で入力してください");
    }
  }
</script> -->
<!-- onBlur="return check_01()" -->

<div class="form-ttl">
  <h1>お問い合わせ</h1>
</div>
@if (count($errors) > 0)
<h2>入力に誤りがあります</h2>
@endif
<div class="form">
  <form class="form_content" action="/confirm" method="POST" name="form" id="form">

    <table>
      @csrf
      <tr>
        <th>お名前<span>※</span></th>
        <td><input value="{{old('last_name')}}" class="name-input" type="text" name="last_name"></td>
        <td><input value="{{old('first_name')}}" class="name-input" type="text" name="first_name"></td>
      </tr>
      <tr>
        <td></td>
        <td>
          <p>　例）山田</p>
        </td>
        <td>
          <p>　例）太郎</p>
        </td>
      </tr>
      @error('last_name')
      <tr>
        <th></th>
        <th class="error_txt" colspan="2">エラー：{{$message}}</th>
      </tr>
      @enderror
      @error('first_name')
      <tr>
        <th></th>
        <th class="error_txt" colspan="2">エラー：{{$message}}</th>
      </tr>
      @enderror
      <tr>
        <th>性別<span>※</span></th>
        <td>
          <input class="radio-input" type="radio" name="gender" id="radio-01" checked="checked" value="男性">
          <!-- <input  name="gender" id="radio-01" checked="checked" value="男性"> -->
          <label for="radio-01">男性</label>
          <input class="radio-input" type="radio" name="gender" id="radio-02" value="女性">
          <label for="radio-02">女性</label>
        </td>
        <td></td>
      </tr>
      <tr>
        <th>メールアドレス<span>※</span></th>
        <td colspan="2"><input value="{{old('email')}}" type="text" name="email"></td>
      </tr>
      <tr>
        <th></th>
        <td>
          <p>　例）test@example.com</p>
        </td>
        <th></th>
      </tr>
      @error('email')
      <tr>
        <th></th>
        <th class=" error_txt" colspan="2">エラー：{{$message}}</th>
      </tr>
      @enderror

      <tr>
        <th>郵便番号<span>※</span></th>
        <td class="postcode-text" colspan="2">〒　<input value="{{old('postcode')}}" class="postcode-input" type="text" name="postcode" id="postcode" onKeyUp="$('#postcode').zip2addr('#address');"></td>
      </tr>
      <tr>
        <th></th>
        <td colspan="2">
          <p>　　　　例）123-4567</p>
        </td>
      </tr>
      @error('postcode')
      <tr>
        <th></th>
        <th class="error_txt" colspan="2">エラー：{{$message}}</th>
      </tr>
      @enderror

      <tr>
        <th>住所<span>※</span></th>
        <td colspan="2"><input value="{{old('address')}}" type="text" name="address" id="address"></td>
      </tr>
      <tr>
        <th></th>
        <td>
          <p>　例）東京都渋谷区千駄ヶ谷1-2-3</p>
        </td>
        <th></th>
      </tr>
      @error('address')
      <tr>
        <th></th>
        <th class="error_txt" colspan="2">エラー：{{$message}}</th>
      </tr>
      @enderror
      <tr>
        <th>建物名</th>
        <td colspan="2"><input value="{{old('building_name')}}" type="text" name="building_name"></td>
      </tr>
      <tr>
        <th></th>
        <td>
          <p>　例）千駄ヶ谷マンション101</p>
        </td>
        <th></th>
      </tr>
      <tr>
        <th class="opinion-ttl">ご意見<span>※</span></th>
        <td colspan="2"><textarea name="opinion">{{ old('opinion') }}</textarea></td>
      </tr>
      @error('opinion')
      <tr>
        <th></th>
        <th class="error_txt" colspan="2">エラー：{{$message}}</th>
      </tr>
      @enderror
      <tr>
        <td class="button-position" colspan="3"><button>確認</button></td>
      </tr>
    </table>
  </form>

  <script src="js/jquery.validate.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/val.js"></script>

</div>

@endsection