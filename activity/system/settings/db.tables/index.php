<?
require($_SERVER['DOCUMENT_ROOT'] . "/matrix/header.php");
global $DB;


$arParams = array(
    "MODULE" => "iblock"
);


$arResult = array(
    "DB" => false,
    "NEO" => false,
    "ITEMS" => false
);

$arResult["DB"] = $DB->Query("SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_TYPE = 'BASE TABLE' AND TABLE_SCHEMA='dbName'");

while ($user = $arResult["DB"]->Fetch())
{
    $arResult["ITEMS"][] = $user;
}

d($arResult["ITEMS"]);

require($_SERVER['DOCUMENT_ROOT'] . "/matrix/footer.php");
?>