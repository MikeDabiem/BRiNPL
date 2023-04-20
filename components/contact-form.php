<?php add_action('wp_ajax_contactFormFunc', 'contactFormFunc');
add_action('wp_ajax_nopriv_contactFormFunc', 'contactFormFunc');
function contactFormFunc()
{
    $params = [];
    parse_str($_POST['contactFormInfo'], $params);
    $falseCounter = 0;
    $attachment = [];
    $json = [];

    $formName = ($params['form-name'] == "") ? false : true;
    if ($formName == false) $falseCounter++;
    $json['form-name'] = $formName;

    $formEmail = (preg_match('/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/', $params['form-email']) == false) ? false : true;
    if ($formEmail == false) $falseCounter++;
    $json['form-email'] = $formEmail;

    $formMessage = ($params['form-message'] == "") ? false : true;
    if ($formMessage == false) $falseCounter++;
    $json['form-message'] = $formMessage;

    $formServices = [];
    foreach ($params["form-service"] as $serv) {
        $formServices[] = get_the_title($serv);
    }

    if (!empty($_FILES)) {
        $uploadOk = 1;

        // Format valid
        $fileType = strtolower(pathinfo($_FILES["contact-form-file"]["name"], PATHINFO_EXTENSION));
        $json['form-file-format'] = true;
        if ($fileType != "pdf" && $fileType != "docx" && $fileType != "doc" && $fileType != "jpg" && $fileType != "jpeg" && $fileType != "png" && $fileType != "rar" && $fileType != "zip") {
            $json['form-file-format'] = false;
            $uploadOk = 0;
            $falseCounter++;
        }
        // END Format valid

        // Size valid
        $json['form-file-size'] = true;
        if ($_FILES["contact-form-file"]["size"] > 25000000) {
            $json['form-file-size'] = false;
            $uploadOk = 0;
            $falseCounter++;
        }
        // END Size valid

        // Try to upload
        if ($uploadOk != 0) {
            $today = date("U");
            $fileTmpName = $_SERVER["DOCUMENT_ROOT"] . "/uploads/" . $today . "." . $fileType;
            if (move_uploaded_file($_FILES["contact-form-file"]["tmp_name"], $fileTmpName) != false) {
                array_push($attachment, $fileTmpName);
                $json['form-file-valid'] = true;
            } else {
                // File was not uploaded
                $json['form-file-valid'] = false;
                $falseCounter++;
            }
        } else {
            // File was not sent
            $json['form-file-valid'] = false;
            $falseCounter++;
        }
        // END Try to upload
    }

    if ($falseCounter == 0) {
        $nameLetter = "Name";
        $emailLetter = "E-Mail";
        $messageLetter = "Message";
        $servicesLetter = "Labels";
        $subject = get_field("contact_form_email_subject", "options");
        $subject = str_replace(["{name}", "{email}"], [$params["form-name"], $params["form-email"]], $subject);
        $email_to = get_field("contact_form_email_recipient", "options");
        $email_to = html_entity_decode($email_to);
        $headers = [
            'content-type: text/html',
            'From: ' . $_SERVER['HTTP_HOST'] . ' <noreply@' . $_SERVER['HTTP_HOST'] . '>',
            'Reply-To: ' . $params["form-email"] . ''
        ];
        $message = "";
        if ($params["form-name"]) $message .= "<strong>" . $nameLetter . ": </strong>" . $params["form-name"] . "<br>";
        if ($params["form-email"]) $message .= "<strong>" . $emailLetter . ": </strong>" . $params["form-email"] . "<br>";
        if ($params["form-message"]) $message .= "<strong>" . $messageLetter . ": </strong>" . nl2br(htmlspecialchars($params["form-message"])) . "<br>";
        if ($params["form-service"]) $message .= "<strong>" . $servicesLetter . ": </strong>" . implode(', ', $formServices) . "<br>";
        wp_mail($email_to, $subject, $message, $headers, $attachment);
    }
    unlink($attachment[0]);
    wp_send_json($json);
    wp_die();
}