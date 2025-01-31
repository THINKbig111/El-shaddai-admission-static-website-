<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $targetDir = "uploads/";
    $fileName = basename($_FILES["pdfFile"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    if ($fileType == "pdf") {
        if (move_uploaded_file($_FILES["pdfFile"]["tmp_name"], $targetFilePath)) {
            // Email settings
            $to = "elshadaiacademy9@gmail.com";
            $subject = "New Registration Form Uploaded";
            $body = "A new PDF registration form has been uploaded.";
            $headers = "From: noreply@yourdomain.com";

            // Attach the uploaded file
            $attachment = chunk_split(base64_encode(file_get_contents($targetFilePath)));
            $separator = md5(time());
            $eol = "\r\n";

            $headers .= "MIME-Version: 1.0" . $eol;
            $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol;
            $headers .= "Content-Transfer-Encoding: 7bit" . $eol;
            $headers .= "This is a MIME encoded message." . $eol;

            $body .= "--" . $separator . $eol;
            $body .= "Content-Type: application/octet-stream; name=\"" . $fileName . "\"" . $eol;
            $body .= "Content-Transfer-Encoding: base64" . $eol;
            $body .= "Content-Disposition: attachment" . $eol;
            $body .= $attachment . $eol;
            $body .= "--" . $separator . "--";

            if (mail($to, $subject, $body, $headers)) {
                echo "The file " . $fileName . " has been uploaded and emailed successfully.";
            } else {
                echo "Failed to send email.";
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Only PDF files are allowed.";
    }
} else {
    echo "Invalid request.";
}
?>
