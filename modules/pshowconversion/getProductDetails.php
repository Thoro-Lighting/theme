<?php

require_once dirname(__FILE__) . '/../../config/config.inc.php';

if (isset($_SERVER['HTTP_SEC_FETCH_SITE']) && $_SERVER['HTTP_SEC_FETCH_SITE'] != 'same-origin') {
    http_response_code(404);
    die();
}

$ids = (array)@json_decode(Tools::getValue('id'));
if (!$ids) {
    http_response_code(404);
    exit;
}

$context = Context::getContext();
$context->cart = new Cart();

$controller = new FrontController();
$controller->init();

function getProductData(int $id_product, int $id_product_attribute, int $id_lang): array
{
    $query = new DbQuery();

    $query->select('p.`id_product` AS id');
    $query->select('pl.`name` AS name');
    $query->select(
        'IFNULL(GROUP_CONCAT(DISTINCT agl.`name`, \': \', al.name SEPARATOR \', \'), \'\') AS variant'
    );
    $query->select('IFNULL(m.`name`, \'\') AS brand');
    $query->select('IFNULL(cl.`name`, \'\') AS category');

    $query->from('product', 'p');

    $query->leftJoin(
        'product_lang',
        'pl',
        'p.id_product = pl.id_product'
    );
    $query->leftJoin(
        'category_lang',
        'cl',
        'p.`id_category_default` = cl.`id_category` AND cl.`id_lang` = pl.`id_lang`'
    );
    $query->leftJoin(
        'manufacturer',
        'm',
        'm.id_manufacturer = p.id_manufacturer'
    );
    $query->leftJoin(
        'product_attribute',
        'pa',
        'pa.id_product = p.id_product AND pa.id_product_attribute = ' . $id_product_attribute
    );
    $query->leftJoin(
        'product_attribute_combination',
        'pac',
        'pac.id_product_attribute = pa.id_product_attribute'
    );
    $query->leftJoin(
        'attribute',
        'atr',
        'atr.id_attribute = pac.id_attribute'
    );
    $query->leftJoin(
        'attribute_lang',
        'al',
        'al.id_attribute = atr.id_attribute AND al.id_lang = pl.id_lang'
    );
    $query->leftJoin(
        'attribute_group_lang',
        'agl',
        'agl.id_attribute_group = atr.id_attribute_group AND agl.id_lang = pl.id_lang'
    );

    $query->where(
        'p.id_product = ' . $id_product . ' AND pl.id_lang = ' . $id_lang
    );

    return (array)Db::getInstance()->getRow($query);
}

$result = [];
$limit = 50;
foreach ($ids as $id) {
    if (--$limit < 0) {
        break;
    }

    if (is_array($id)) {
        list($id_product, $id_product_attribute) = $id;
    } else {
        $id_product = $id;
        $id_product_attribute = 0;
    }

    $productData = getProductData(
        (int)$id_product,
        (int)$id_product_attribute,
        $context->language->id
    );
    $productData['price'] = Product::getPriceStatic($id_product, true, $id_product_attribute, 2);
    $result[$id_product . ((int)$id_product_attribute ? ('-' . (int)$id_product_attribute) : null)] = $productData;
}
echo json_encode($result);
exit;