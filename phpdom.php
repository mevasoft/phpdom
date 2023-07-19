<?php 
function manipulateDOMElements($html) {
    // Yeni DOM belgesi oluştur
    $dom = new DOMDocument();
    
    // Hata raporlamayı devre dışı bırak (istenilen durumda)
    libxml_use_internal_errors(true);

    // HTML içeriğini yükle
    $dom->loadHTML($html);

    // XPath sorgularını kullanmak için DOMXPath nesnesini oluştur
    $xpath = new DOMXPath($dom);

    // Örnek: <h1> etiketlerini al ve içeriklerini değiştir
    $h1Elements = $xpath->query("//h1");
    foreach ($h1Elements as $element) {
        // Örnek olarak, içeriği büyük harf yapalım
        $element->nodeValue = strtoupper($element->nodeValue);
    }

    // Örnek: <a> etiketlerinin özelliklerini değiştir
    $aElements = $xpath->query("//a");
    foreach ($aElements as $element) {
        // Örnek olarak, tüm bağlantıları yeni bir pencerede açalım
        $element->setAttribute("target", "_blank");
    }

    // Değiştirilmiş içeriği döndür
    return $dom->saveHTML();
}

// Kullanım örneği
$html = '<html><body><h1>Hello, World!</h1><p>This is a sample <a href="https://example.com">link</a>.</p></body></html>';
$manipulatedHTML = manipulateDOMElements($html);

echo $manipulatedHTML;
