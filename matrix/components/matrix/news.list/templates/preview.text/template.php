<?
/**
 * Matrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CMatrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */

use Matrix\Main\Localization\Loc;
Loc::loadLanguageFile(__FILE__);
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
if(empty($arResult["ITEMS"]))
    return;
?>



<?
foreach ($arResult["ITEMS"] as $arItem):
    $arItem["DATAIL_PAGE_URL"] = $arParams["SEF_BASE_URL"] . $arItem["ID"] . "/";
?>
    <div class="headline"><a href="<?=$arItem["DATAIL_PAGE_URL"]?>" class="h2 text-danger"><?=$arItem["NAME"]?></a></div>
    <p><?=$arResult["PREVIEW_TEXT"]?></p>
    <p>
        <a href="<?=$arItem["DATAIL_PAGE_URL"]?>" class="btn btn-primary"><?=Loc::getMessage("NEWS_LIST_DETAIL_LINK")?></a>
    </p>
<?endforeach;?>