<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt Lại Mật Khẩu</title>
</head>
<body>
    <p>Xin chào,</p>
    <p>Bạn vừa yêu cầu đặt lại mật khẩu cho tài khoản của mình. Để hoàn tất quá trình đặt lại mật khẩu, vui lòng click vào đường dẫn dưới đây:</p>
    <a href="{{ url('/reset-password?token='.$token.'&email='.$email)}}">Đặt Lại Mật Khẩu</a>
    <p>Nếu bạn không yêu cầu đặt lại mật khẩu, vui lòng bỏ qua email này.</p>
    <p>Trân trọng,</p>
    <p>Đội ngũ hỗ trợ</p>
</body>
</html>
