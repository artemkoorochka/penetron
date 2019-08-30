<?
use Matrix\Main\Localization\Loc;
Loc::loadLanguageFile(__FILE__);

$APPLICATION->IncludeComponent("matrix:iblock.element", "news.detail", array(
    "ID" => $arResult["ID"],
    "select" => array(
        "ID",
        "NAME",
        "PREVIEW_TEXT",
        "PREVIEW_PICTURE",
        "DETAIL_TEXT",
    )
));
?>
<div class="alert alert-primary">
    <a href="<?=$arParams["SEF_BASE_URL"]?>" class="btn btn-primary"><?=Loc::getMessage("NEWS_DETAIL_BACK_LINK")?></a>
</div>