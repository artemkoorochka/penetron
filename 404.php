<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');
/*
CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");
*/
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("404 Not Found");

?>
<div class="panel panel-danger">

	<div class="panel-body h1 padding-30 text-center">
        404
	</div>
</div>
<?

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>