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

$arResult["DB"] = $DB->Query("select ID, NAME FROM b_user");

while ($user = $arResult["DB"]->Fetch())
{
    $arResult["ITEMS"][] = $user;
}

d($arResult["ITEMS"]);

require($_SERVER['DOCUMENT_ROOT'] . "/matrix/footer.php");
?>