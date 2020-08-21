<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$link = 'https://vnexpress.net/rss/the-gioi.rss';

$xml = simplexml_load_file($link, 'SimpleXMLElement', LIBXML_NOCDATA);
$xmlJson    = json_encode($xml);
$xmlArr     = json_decode($xmlJson, 1);
$items = $xmlArr['channel']['item'];

$result = [];
foreach ($items as $item) {
    $tmp1 = [];
    $tmp2 = [];

    // echo '<pre>';
    // print_r($item);
    // echo '</pre>';

    preg_match('/src="([^"]*)"/i', $item['description'], $tmp1);
    $pattern = '.*br>(.*)';
    preg_match('/' . $pattern . '/', $item['description'], $tmp2);

    $image = (isset($tmp1[1])) ? $tmp1[1] : '';
    $description = (isset($tmp2[1])) ? $tmp2[1] : $item['description'];

    $result[] = [
        'title' => $item['title'],
        'description' => $description,
        'pubDate' => date('d/m/Y H:i:s', strtotime($item['pubDate'])),
        'link' => $item['link'],
        'image' => $image
    ];
}

$xhtml = '';
foreach ($result as $item) {
    $title = $item['title'];
    $image = $item['image'];
    $date = $item['pubDate'];
    $description = $item['description'];
    $link = $item['link'];
    $xhtml .= '
    <div class="col-md-6 p-3">
        <div class="entry mb-1 clearfix">
            <div class="entry-image mb-3">
                <a href="' . $image . '" data-lightbox="image" style="background: url(' . $image . ') no-repeat center center; background-size: cover; height: 278px;"></a>
            </div>
            <div class="entry-title">
                <h3><a href="' . $link . '">' . $title . '</a></h3>
            </div>
            <div class="entry-content">
                ' . $description . '
            </div>
            <div class="entry-meta no-separator nohover">
                <ul class="justify-content-between mx-0">
                    <li><i class="icon-calendar2"></i> ' . $date . '</li>
                    <li>vnexpress.net</li>
                </ul>
            </div>
            <div class="entry-meta no-separator hover">
                <ul class="mx-0">
                    <li><a href="' . $link . '">Xem &rarr;</a></li>
                </ul>
            </div>
        </div>
    </div>
    ';
}

$lines = file("./data/rss.txt");

         
echo '<pre>';
print_r($lines);
echo '</pre>';

$link2 = $lines[0];
$link3 = $lines[1];

$link3 = rtrim($link3);


$xml2 = simplexml_load_file($link2, 'SimpleXMLElement', LIBXML_NOCDATA);
$xmlJson2    = json_encode($xml2);
$xmlArr2     = json_decode($xmlJson2, 1);
$list2       = $xmlArr2['channel']['item'];




foreach ($list2 as $item2 => $key2) {

    // echo '<pre>';
    // print_r($key2);
    // echo '</pre>';

    $tmp1 = [];
    $tmp2 = [];

    // echo '<pre>';
    // print_r($item);
    // echo '</pre>';

    // preg_match('/src="([^"]*)"/i', $item['description'], $tmp1);
    // $pattern = '.*br>(.*)';
    // preg_match('/' . $pattern . '/', $item['description'], $tmp2);

    // $image = (isset($tmp1[1])) ? $tmp1[1] : '';
    // $description = (isset($tmp2[1])) ? $tmp2[1] : $item['description'];

    $result2[] = [
        'title' => $key2['title'],
        'description' => $key2['description'],
        'pubDate' => date('d/m/Y H:i:s', strtotime($item2['pubDate'])),
        'link' => $key2['link'],
        // 'image' => $image
    ];
}
$xhtml2 = '';
$xhtml2 .= 'Vietnamnet ne';

foreach ($result2 as $item ) {
    $title = $item['title'];
    // $image = $item['image'];
    $date = $item['pubDate'];
    $description = $item['description'];
    $link = $item['link'];
    $image = '';
    $xhtml2 .= '
    <div class="col-md-6 p-3">
        <div class="entry mb-1 clearfix">
            <div class="entry-image mb-3">
                <a href="' . $image . '" data-lightbox="image" style="background: url(' . $image . ') no-repeat center center; background-size: cover; height: 278px;"></a>
            </div>
            <div class="entry-title">
                <h3><a href="' . $link . '">' . $title . '</a></h3>
            </div>
            <div class="entry-content">
                ' . $description . '
            </div>
            <div class="entry-meta no-separator nohover">
                <ul class="justify-content-between mx-0">
                    <li><i class="icon-calendar2"></i> ' . $date . '</li>
                    <li>Vietnamnet</li>
                </ul>
            </div>
            <div class="entry-meta no-separator hover">
                <ul class="mx-0">
                    <li><a href="' . $link . '">Xem &rarr;</a></li>
                </ul>
            </div>
        </div>
    </div>
    ';
}

$xml3 = simplexml_load_file($link3, 'SimpleXMLElement', LIBXML_NOCDATA);
$xmlJson3    = json_encode($xml3);
$xmlArr3     = json_decode($xmlJson3, 1);
$list3       = $xmlArr3['channel']['item'];

echo '<pre>';
print_r($list3);
echo '</pre>';

foreach ($list3 as $item) {
    $tmp1 = [];
    $tmp2 = [];

    // echo '<pre>';
    // print_r($item);
    // echo '</pre>';

    preg_match('/src="([^"]*)"/i', $item['description'], $tmp1);
    $pattern = '.*br>(.*)';
    preg_match('/' . $pattern . '/', $item['description'], $tmp2);

    $image = (isset($tmp1[1])) ? $tmp1[1] : '';
    $description = (isset($tmp2[1])) ? $tmp2[1] : $item['description'];

    $result3[] = [
        'title' => $item['title'],
        'description' => $description,
        'pubDate' => date('d/m/Y H:i:s', strtotime($item['pubDate'])),
        'link' => $item['link'],
        'image' => $image
    ];
}

$xhtml3 = '';
$xhtml3 .= 'Vietnamnet ne';

foreach ($result3 as $item ) {
    $title = $item['title'];
    // $image = $item['image'];
    $date = $item['pubDate'];
    $description = $item['description'];
    $link = $item['link'];
    $image = '';
    $xhtml3 .= '
    <div class="col-md-6 p-3">
        <div class="entry mb-1 clearfix">
            <div class="entry-image mb-3">
                <a href="' . $image . '" data-lightbox="image" style="background: url(' . $image . ') no-repeat center center; background-size: cover; height: 278px;"></a>
            </div>
            <div class="entry-title">
                <h3><a href="' . $link . '">' . $title . '</a></h3>
            </div>
            <div class="entry-content">
                ' . $description . '
            </div>
            <div class="entry-meta no-separator nohover">
                <ul class="justify-content-between mx-0">
                    <li><i class="icon-calendar2"></i> ' . $date . '</li>
                    <li>nld.com.vn</li>
                </ul>
            </div>
            <div class="entry-meta no-separator hover">
                <ul class="mx-0">
                    <li><a href="' . $link . '">Xem &rarr;</a></li>
                </ul>
            </div>
        </div>
    </div>
    ';
}


?>

<section id="content" class="bg-light">
    <div class="content-wrap pt-lg-0 pt-xl-0 pb-0">
        <div class="container clearfix">
            <div class="heading-block border-bottom-0 center pt-4 mb-3">
                <h3>Tin tức</h3>
            </div>
            <!-- Posts -->
            <div class="row grid-container infinity-wrapper clearfix">
                <?= $xhtml ?>

                <?= $xhtml2 ?>

                <?= $xhtml3 ?>
            </div>

            <!-- Infinity Scroll Loader
					============================================= -->
            <div class="text-center">
                <div class="page-load-status hovering-load-status">
                    <div class="css3-spinner infinite-scroll-request">
                        <div class="css3-spinner-ball-pulse-sync">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                    <div class="alert alert-warning center infinite-scroll-last mx-auto" style="max-width: 20rem;">End of content</div>
                    <div class="alert alert-warning center infinite-scroll-error mx-auto" style="max-width: 20rem;">No more pages to load</div>
                </div>
            </div>
            <div class="center d-none">
                <a href="demo-modern-blog-2.html" class="load-next-posts"></a>
            </div>

        </div>

    </div>
</section>