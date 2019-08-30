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
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
if(empty($arResult["ITEMS"]))
    return;
?>

<?
foreach ($arResult["ITEMS"] as $arItem):
    $arItem["DETAIL_PAGE_URL"] = $arParams["SEF_BASE_URL"] . $arItem["ID"] . "/";
?>

    <div class="row margin-bottom-20">
        <?if(is_array($arItem["PREVIEW_PICTURE"])):?>
            <div class="col-xs-12 col-md-4 col-lg-3">
                <a href="#">
                <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
                     class="img-thumbnail img-responsive">
                </a>
            </div>
            <div class="col-xs-12 col-md-8 col-lg-9">
                <div class="headline"><a href="#" class="h2 text-danger"><?=$arItem["NAME"]?></a></div>
                <?=$arItem["PREVIEW_TEXT"]?>
            </div>
        <?else:?>
            <div class="col-xs-12">
                <div class="headline"><a href="#" class="h2 text-danger"><?=$arItem["NAME"]?></a></div>
                <?=$arItem["PREVIEW_TEXT"]?>
            </div>
        <?endif;?>
    </div>

<?endforeach;?>