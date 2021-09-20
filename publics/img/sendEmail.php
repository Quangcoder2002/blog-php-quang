<?php
use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	function send_email($email_recive,$name,$contents,$subject){
		// Khai báo thư viên phpmailer
				require 'models/PHPMailer/src/Exception.php';
				require 'models/PHPMailer/src/PHPMailer.php';
				require 'models/PHPMailer/src/SMTP.php';
				// Khai báo tạo PHPMailer
				$mail = new PHPMailer();
				//Khai báo gửi mail bằng SMTP
				$mail->IsSMTP();
				//Tắt mở kiểm tra lỗi trả về, chấp nhận các giá trị 0 1 2
				// 0 = off không thông báo bất kì gì, tốt nhất nên dùng khi đã hoàn thành.
				// 1 = Thông báo lỗi ở client
				// 2 = Thông báo lỗi cả client và lỗi ở server
				// To load the French version
				$mail->setLanguage('vi', '/optional/path/to/language/directory/');
				$mail->SMTPDebug  = 0;
				$mail->SMTPOptions = array (
						'ssl' => array(
						'verify_peer'  => false,
						'verify_peer_name'  => false,
						'allow_self_signed' => true)
				);
				$mail->CharSet="UTF-8";
				$mail->Debugoutput = "html"; // Lỗi trả về hiển thị với cấu trúc HTML
				$mail->Host       = "smtp.gmail.com"; //host smtp để gửi mail
				$mail->Port       = 587; // cổng để gửi mail
				$mail->SMTPSecure = "tls"; //Phương thức mã hóa thư - ssl hoặc tls
				$mail->SMTPAuth   = true; //Xác thực SMTP
				$mail->Username   = "vntth13@gmail.com"; // Tên đăng nhập tài khoản Gmail
				$mail->Password   = "Q26012002"; //Mật khẩu của gmail
				$mail->SetFrom("vntth13@gmail.com", "QUANG"); // Thông tin người gửi
				$mail->AddReplyTo("vntth13@gmail.com","QUANG");// Ấn định email sẽ nhận khi người dùng reply lại.
				$mail->AddAddress($email_recive, $name);//Email của người nhận
				//$mail->AddCC($email_recive, $name);//Email của người nhận
				$mail->Subject = $subject; //Tiêu đề của thư
				$mail->MsgHTML($contents); //Nội dung của bức thư.
				 //$mail->MsgHTML(file_get_contents("email-template.html"), dirname(__FILE__));
				// Gửi thư với tập tin html
				$mail->Body = "<h3><br>Name: $name  <br>Subject: $subject</h3><h1>Message: $contents</h1>";//Nội dung rút gọn hiển thị bên ngoài thư mục thư.
				//$mail->AddAttachment("images/attact-tui.gif");//Tập tin cần attach

				//Tiến hành gửi email và kiểm tra lỗi
				if(!$mail->Send()) {
					return false;
				} else {
					return true;
				}
				$check = send_email($_POST['email'],$_POST['name'],$_POST['message'],$_POST['subject']);
					if ($check) {
								$this->redirect("?admin=client&mod=home&act=index");
					}else {
							$this->redirect("?admin=client&mod=home&act=contact");
					}
	}
?>
