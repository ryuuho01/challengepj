@extends('layouts.default')
<style>
  .title {
    font-size: 60px;
    text-align: center;
    margin: 100px 0;
  }

  .menu {
    /* width: 2000px; */
    font-size: 30px;
    /* text-align: center; */
    display: flex;
    justify-content: center;
  }
  .menu div {
    margin: 20px;
  }
</style>

@section('title', 'COACHTECHからの挑戦状')
@section('content')
<div class="title">
  <h1>COACHTECHからの挑戦状</h1>
</div>
<div class="menu">
  <div>
    <a href="/contact">お問い合わせページはコチラ</a>
  </div>
  <div>
    <a href="/manage">管理システムはコチラ</a>
  </div>
</div>
@endsection