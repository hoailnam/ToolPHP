<?php
function alertM($smg, $link)
{
    echo '<script language="javascript">';
    echo 'alert("' . $smg . '")';
    echo '</script>';
    echo '<script type="text/javascript">
            window.location = "' . $link . '" </script>';
}


include './link.php';
$url = $_POST["name"];

if (!$url || !is_string($url) || !preg_match('/^http(s)?:\/\/[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(\/.*)?$/i', $url)) {
    alertM("Vui Lòng Nhập Đủ Đường Link", "test.php");
}

$html = file_get_contents($url);

$dom = new DOMDocument;

@$dom->loadHTML($html);


$styles = $dom->getElementsByTagName('link');

$links = $dom->getElementsByTagName('a');
$urls = array();

foreach ($styles as $style) {

    if ($style->getAttribute('href') != "#") {
        echo $urls = $style->getAttribute('href');
        echo '&ensp;&ensp;';
        $ch = curl_init($urls);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        $output = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        echo 'HTTP code: ' . $httpcode;
        echo '<br>';
        linkDAO::insertOrder($url,$urls, $httpcode);
    }
}


// foreach ($links as $link) {
//     if ($link->getAttribute('href') != "#") {
//         echo $data=$link->getAttribute('href');
//         echo '&ensp;&ensp;';
//         $ch = curl_init($data);
//         curl_setopt($ch, CURLOPT_HEADER, true);
//         curl_setopt($ch, CURLOPT_NOBODY, true);
//         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//         curl_setopt($ch, CURLOPT_TIMEOUT, 10);
//         $output = curl_exec($ch);
//         $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//         curl_close($ch);

//         echo 'HTTP code: ' . $httpcode;
//         echo '<br>';
//         linkDAO::insertOrder($url, $urls, $httpcode);
//     }
// }


