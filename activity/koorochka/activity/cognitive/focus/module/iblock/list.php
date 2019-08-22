<?
use \Matrix\Main\Loader,
    Matrix\Iblock\IblockTable;

require($_SERVER['DOCUMENT_ROOT'] . "/matrix/header.php");


$arParams = array(
    "MODULE" => "iblock"
);

$arResult = array(
    "DB",
    "ITEMS"
);


Loader::includeModule($arParams["MODULE"]);

$arResult["DB"] = IblockTable::getList(array(

));

while ($item = $arResult["DB"]->fetch())
{
    $arResult["ITEMS"][] = $item;
}

d($arResult["ITEMS"]);
?>