<?
/**
 * @var CMain $APPLICATION
 * @var CUser $USER
 */


use Matrix\Main;
require_once($_SERVER["DOCUMENT_ROOT"]."/matrix/header.php");
$APPLICATION->SetTitle("The main ativity");

$APPLICATION->IncludeComponent("matrix:activity", null, null);
$APPLICATION->IncludeComponent("matrix:admin.header", null, null);


require_once($_SERVER["DOCUMENT_ROOT"]."/matrix/footer.php");
?>