<!-- 社員情報登録 -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>社員情報登録</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/sample.css">
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header"><a class="navbar-brand" href="select.php">社員情報一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form id="employeeForm" method="post" action="insert.php">
  <div class="jumbotron">
    <fieldset>
      <legend>社員情報登録</legend>
      <label>社員番号：<input type="number" name="shainno" id="shainno" class="form-control" minlength="6" maxlength="6" placeholder="例: 123456"></label><br>
      <label>名前：<input type="text" name="name" id="name" class="form-control" placeholder="例: 山田太郎"></label><br>
      <label>性別：
        <select name="gender" id="gender" class="form-control">
          <option value="">--選択してください--</option>
          <option value="男性">男性</option>
          <option value="女性">女性</option>
          <option value="その他">その他</option>
        </select>
      </label><br>
      <label>年齢：<input type="number" name="age" id="age" class="form-control" min="18" max="100" placeholder="例: 30"></label><br>
      <label>部署：
        <select name="busho" id="busho" class="form-control">
        <option value="">--選択してください--</option>
        <option value="営業部">営業部</option>
          <option value="人事部">人事部</option>
          <option value="IT部">IT部</option>
        </select>
      </label><br>
      <label>役職：
        <select name="position" id="position" class="form-control">
        <option value="">--選択してください--</option>
          <option value="マネージャー">マネージャー</option>
          <option value="一般職">一般職</option>
          <option value="役員">役員</option>
        </select>
      </label><br>
      <label>入社年：<input type="number" name="year" id="year" class="form-control" minlength="4" maxlength="4" placeholder="例: 2020"></label><br>
      <input type="submit" value="送信" class="form-control">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->

<script>
  // jQueryでフォームのバリデーションを実装
  $(document).ready(function() {
    $('#employeeForm').submit(function(event) {
      // エラーメッセージを格納する配列
      let errors = [];

      // 各フィールドの値を取得
      let shainno = $('#shainno').val();
      let name = $('#name').val();
      let gender = $('#gender').val();
      let age = $('#age').val();
      let busho = $('#busho').val();
      let position = $('#position').val();
      let year = $('#year').val();

      // バリデーション: 必須項目チェック
      if (!shainno || shainno.length !== 6) {
        errors.push('社員番号は6桁で入力してください。');
      }
      if (!name) {
        errors.push('名前を入力してください。');
      }
      if (!gender) {
        errors.push('性別を選択してください。');
      }
      if (!age || age < 18 || age > 100) {
        errors.push('年齢は18歳以上100歳以下で入力してください。');
      }
      if (!busho) {
        errors.push('部署を選択してください。');
      }
      if (!position) {
        errors.push('役職を選択してください。');
      }
      if (!year || year.length !== 4) {
        errors.push('入社年は4桁で入力してください。');
      }

      // エラーがあればアラートで表示
      if (errors.length > 0) {
        event.preventDefault(); // フォームの送信を防ぐ
        alert(errors.join('\n')); // エラーメッセージをアラートで表示
      }
    });
  });
</script>

</body>
</html>
