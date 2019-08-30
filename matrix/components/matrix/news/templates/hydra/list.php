<?
$APPLICATION->IncludeComponent("matrix:news.list", "preview.text", array(
    "IBLOCK_ID" => $arParams["IBLOCK_ID"],
    "select" => array(
        "ID",
        "NAME",
        //"DETAIL_PAGE_URL",
        "PREVIEW_PICTURE",
        "PREVIEW_TEXT",
    )
))?>