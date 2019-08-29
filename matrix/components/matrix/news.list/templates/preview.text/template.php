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


<ul>
<?foreach ($arResult["ITEMS"] as $arItem):?>
    <li><a href="#"><?=$arItem["NAME"]?></a></li>
<?endforeach;?>
</ul>
