<?php

			$name = $_POST['your-name'];
			$email = $_POST['your-email'];
			$phone = $_POST['your-phone'];
			$message = $_POST['your-message'];

			if(filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($name) && !empty($message)){
				$mailAddress = 'info@tddstands.com.ar';
				$subject = 'Consulta desde la web Taller de Diseño';
				$headers = "From: " . $name . " <" . $email . ">\r\n" .
					"Reply-To: " . $email . "\r\n" .
					'X-Mailer: PHP/' . phpversion();

				$msg = <<<END
				De: {$name} <{$email}>
				Teléfono: {$phone}

				Mensaje:
				{$message}
END;
				$resp['into'] = $_POST['_wpcf7_unit_tag'];
				$resp['captcha'] = null;
				
				if(mail($mailAddress, $subject, $msg, $headers)){
					$resp['mailSent'] = true;
					$resp['message'] = 'Su mensaje ha sido enviado, muchas gracias.';
				}
				else {
					$resp['mailSent'] = false;
					$resp['message'] = 'Su mensaje no pudo ser enviado: Por favor inténtelo nuevamente en unos momentos.';
				}
			}
			else {
				$resp['mailSent'] = false;
				$resp['message'] = 'Por favor, revise que todos los campos estén correctos e inténtelo nuevamente.';
			}
		echo json_encode($resp);


?>