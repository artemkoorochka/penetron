<?
/**
 * @var CMain $APPLICATION
 */
require($_SERVER['DOCUMENT_ROOT'].'/matrix/header.php');
$APPLICATION->SetTitle("Купить гидроизоляцию Пенетрон");
?>
<?$APPLICATION->IncludeComponent("matrix:iblock.element", "detail.text", array(
    "ID" => 43,
    "select" => array(
        "NAME",
        "DETAIL_TEXT"
    )
))?>
<?require($_SERVER['DOCUMENT_ROOT'].'/matrix/footer.php');?>