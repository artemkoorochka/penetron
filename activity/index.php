<?
/**
 * @var CMain $APPLICATION
 * @var CUser $USER
 */
require_once($_SERVER["DOCUMENT_ROOT"]."/matrix/header.php");
$APPLICATION->SetTitle("The main ativity");
$APPLICATION->IncludeComponent("matrix:admin.header", null, null);
$APPLICATION->IncludeComponent("matrix:activity", null, null);
require_once($_SERVER["DOCUMENT_ROOT"]."/matrix/footer.php");
?>