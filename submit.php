<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // フォームからのデータを取得
    $name = $_POST['name'];
    $email = $_POST['email'];
    $email2= $_POST['email2'];
    $menu = $_POST['menu'];
    $question = $_POST['question'];

    // 確認メールを送信する
    $to = $email ;  // 送信先のメールアドレス（フォームで入力されたメールアドレス）
    $to2= $email2 ;
    $subject = "登録内容の確認メール";
    $message = "
        $name 様\n\n
        以下の内容で登録を受け付けました。\n\n
        【制限行為能力者の部類】\n
        ";
        
    switch ($menu) {
        case 's':
            $message .= "成年被後見人\n";
            break;
        case 'a':
            $message .= "被保佐人\n";
            break;
        case 'b':
            $message .= "被補助人\n";
            break;
        default:
            $message .= "選択なし\n";
            break;
    }

    $message .= "【ご質問】\n" . $question . "\n\nありがとうございます。\n";

    // メールヘッダーの設定
    $headers = "From: no-reply@example.com";  // 送信元のメールアドレスを指定

    // メール送信
    if (mail($to and $to2, $subject, $message, $headers)) {
        echo "確認メールを送信しました。";
    } else {
        echo "メールの送信に失敗しました。";
    }
}
?>
