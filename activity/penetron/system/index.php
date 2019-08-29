<?
/**
 * @var CMain $APPLICATION
 * @var CUser $USER
 */


use Matrix\Main;
require_once($_SERVER["DOCUMENT_ROOT"]."/matrix/header.php");
$APPLICATION->SetTitle("The main ativity");
?>

<?$APPLICATION->IncludeComponent("matrix:iblock.element.line", "", array(
    "IBLOCK_ID" => 5,
    "NOT_SWHOW" => array(
        //"PREVIEW_PICTURE"
    )
))?>

<?
require_once($_SERVER["DOCUMENT_ROOT"]."/matrix/footer.php");
?>