<?
/**
 * Matrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CMatrixComponent $this
 */
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if(empty($arResult))
    return;

?>

<table class="table">
    <thead class="table-dark">
    <tr>
        <th></th>
        <?if(!in_array("PREVIEW_PICTURE", $arParams["NOT_SWHOW"])):?>
        <th>Картинка</th>
        <?endif?>
        <th>Название</th>
        <th>Описание</th>
    </tr>
    </thead>
    <tbody>

    <?foreach ($arResult["ITEMS"] as $arItem):?>
    <tr>
        <td>
            <a href="edit.php?ID=<?=$arItem["ID"]?>" title="Редактировать"><i class="fa fa-edit"></i></a>
            <a href="delete.php?ID=<?=$arItem["ID"]?>" title="Удалить" class="text-danger">[X]</a>
        </td>
        <?if(!in_array("PREVIEW_PICTURE", $arParams["NOT_SWHOW"])):?>
            <td>
                <?if(is_array($arItem["PREVIEW_PICTURE"])):?>
                    <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
                         class="img-thumbnail" />
                <?endif;?>
            </td>
        <?endif?>
        <td><?=$arItem["NAME"]?></td>
        <td><?=$arItem["PREVIEW_TEXT"]?></td>
    </tr>
    <?endforeach;?>
    </tbody>
</table>