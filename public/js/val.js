(function(){
  //標準エラーメッセージの変更
  $.extend($.validator.messages, {
    email: 'メールアドレスの形式で入力してください',
    postcode: '<br>郵便番号は8文字で入力してください　　　　　　　　　　　',
    maxlength: '<br>120文字以内で入力してください',
  });

　//追加ルールの定義
  var methods = {
    postcode: function(value, element){
      return /^\d{11}$|^\d{3}-\d{4}$/.test(value);
    },
  };

  //メソッドの追加
  $.each(methods, function(key) {
    $.validator.addMethod(key, this);
  });

  //入力項目の検証ルール定義
  var rules = {
    last_name: { required: true },
    first_name: {required: true},
    email: { required: true, email: true },
    postcode: { required: true, postcode: true},
    // postcode: "postcode",
    address: {required: true},
    opinion: {required: true, maxlength: 120}
  };

  //入力項目ごとのエラーメッセージ定義
  var messages = {
    last_name: {
      required: "<br>姓を入力してください"
    },
    first_name: {
      required: "<br>名を入力してください"
    },
    email: {
      required: "<br>メールアドレスを入力してください"
    },
    postcode: {
      required: "<br>郵便番号を入力してください　　　　　　　　　　　　　　  "
    },
    address: {
      required: "<br>住所を入力してください"
    },
    opinion: {
      required: "<br>ご意見を入力してください"
    }
  };

  $(function(){
    $('#form').validate({
      rules: rules,
      messages: messages,

      //エラーメッセージ出力箇所調整
      errorPlacement: function (error, element) {
        // element.style.color = 'red';
        error.insertAfter(element);
        
      }
    });
  });

})();