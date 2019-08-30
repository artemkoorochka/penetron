<?
/**
 * @var CMain $APPLICATION
 */
require($_SERVER['DOCUMENT_ROOT'].'/matrix/header.php');
$APPLICATION->SetTitle("Система Пенетрон");
?>
<?$APPLICATION->IncludeComponent("matrix:news", "hydra", array(
    "IBLOCK_ID" => 7,
    "SEF_BASE_URL" => "/about/system/",
))?>
<?require($_SERVER['DOCUMENT_ROOT'].'/matrix/footer.php');?>