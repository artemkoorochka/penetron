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



<?foreach ($arResult["ITEMS"] as $arItem):?>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <a href="<?=$arParams["SEF_BASE_URL"]?><?=$arItem["ID"]?>/" class="panel-title"><?=$arItem["NAME"]?></a>
        </div>
        <div class="panel-body">
            <?=$arItem["PREVIEW_TEXT"]?>
        </div>
        <div class="panel-footer">
            <a href="#" class="btn btn-primary"><?=Loc::getMessage("NEWS_LIST_DETAIL_LINK")?></a>
        </div>
    </div>
<?endforeach;?>

