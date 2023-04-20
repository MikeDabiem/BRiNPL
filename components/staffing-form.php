<?php add_action('wp_ajax_staffingFormFunc', 'staffingFormFunc');
add_action('wp_ajax_nopriv_staffingFormFunc', 'staffingFormFunc');
function staffingFormFunc()
{
    $params = [];
    parse_str($_POST['contactFormInfo'], $params);
    $falseCounter = 0;
    $json = [];

    $formName = ($params['staffing-name'] == "") ? false : true;
    if ($formName == false) $falseCounter++;
    $json['staffing-name'] = $formName;

    $formEmail = (preg_match('/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/', $params['staffing-email']) == false) ? false : true;
    if ($formEmail == false) $falseCounter++;
    $json['staffing-email'] = $formEmail;

    $formMessage = ($params['staffing-message'] == "") ? false : true;
    if ($formMessage == false) $falseCounter++;
    $json['staffing-message'] = $formMessage;

    if ($falseCounter == 0) {
        $nameLetter = "Name";
        $emailLetter = "E-Mail";
        $messageLetter = "Message";
        $servicesLetter = "Service";
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
        if ($params["staffing-name"]) $message .= "<strong>" . $nameLetter . ": </strong>" . $params["staffing-name"] . "<br>";
        if ($params["staffing-email"]) $message .= "<strong>" . $emailLetter . ": </strong>" . $params["staffing-email"] . "<br>";
        if ($params["staffing-message"]) $message .= "<strong>" . $messageLetter . ": </strong>" . nl2br(htmlspecialchars($params["staffing-message"])) . "<br>";
        if ($params["staffing-label"]) $message .= "<strong>" . $servicesLetter . ": </strong>" . strtoupper($params["staffing-label"]) . "<br>";
        wp_mail($email_to, $subject, $message, $headers);
    }
    wp_send_json($json);
    wp_die();
}