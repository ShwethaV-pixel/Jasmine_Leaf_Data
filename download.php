<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // E-posta adresini kaydedebilir veya başka bir işlem yapabilirsiniz
    // Örneğin, veritabanına kaydedilebilir veya bir e-posta listesine eklenebilir

    // İndirilecek dosyanın yolu
    $file = 'path/to/your/file.zip';  // Burada dosyanızın gerçek yolunu belirtin

    if (file_exists($file)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($file).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        readfile($file);
        exit;
    } else {
        echo "Dosya bulunamadı.";
    }
}
?>
