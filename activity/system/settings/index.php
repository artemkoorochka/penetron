<?
/**
 * @var CMain $APPLICATION
 * @var CUser $USER
 */


use Matrix\Main;
require_once($_SERVER["DOCUMENT_ROOT"]."/matrix/header.php");
$APPLICATION->SetTitle("The main ativity");

d($APPLICATION->GetTitle());

require_once($_SERVER["DOCUMENT_ROOT"]."/matrix/footer.php");
?>