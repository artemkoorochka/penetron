<?
use \Matrix\Main\Loader,
    \Matrix\Iblock\IblockTable,
    \Matrix\Iblock\ElementTable;

require($_SERVER['DOCUMENT_ROOT'] . "/matrix/header.php");

/**
 * Register Module
 * https://vh82.timeweb.ru/pma/sql.php?db=aksoft_penetron&table=b_module&pos=0
 */

$arParams = array(
    "MODULE" => "iblock"
);

$arResult = array(
    "DB",
    "ITEMS"
);


Loader::includeModule($arParams["MODULE"]);

$arResult["DB"] = IblockTable::getMap();

d($arResult);




?>