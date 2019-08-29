<?
/**
 * @var CMain $APPLICATION
 * @var CUser $USER
 */


use Matrix\Iblock\ElementTable,
    Matrix\Main\Loader;
require_once($_SERVER["DOCUMENT_ROOT"]."/matrix/header.php");
$APPLICATION->SetTitle("Delete iblock element");

if(!Loader::includeModule("iblock"))
    die;

global $currentUrl, $request;

$arResult = array(
    "ID" => $request->get("ID"),
    "MAP" => null
);

/**
 * Get entity data if it is an edit action
 */
if(!empty($arResult["ID"]))
{
    $arResult["MAP"] = ElementTable::getList(array(
        "filter" => array(
            "ID" => $arResult["ID"]
        )
    ));
    if($arResult["MAP"] = $arResult["MAP"]->fetch()){

        if($request->getPost("type-confirm") == "Y"){

            if($arResult["MAP"]["PREVIEW_PICTURE"] > 0)
            {
                CFile::Delete($arResult["MAP"]["PREVIEW_PICTURE"]);
            }
            if($arResult["MAP"]["DETAIL_PICTURE"] > 0)
            {
                CFile::Delete($arResult["MAP"]["DETAIL_PICTURE"]);
            }

            ElementTable::delete($arResult["MAP"]["ID"]);
            LocalRedirect("index.php");
        }
    }
}
?>

    <form class="card"
          action="delete.php"
          method="post">
        <div class="card-header bg-primary text-white-50">
            <div class="card-title">Confirm delete action</div>
        </div>
        <?if(!empty($arResult["MAP"]["ID"])):?>
        <div class="card-body">
            Do you want to delete <span class="text-danger"><?=$arResult["MAP"]["NAME"]?></span> element?
            <input type="hidden"
                   name="ID"
                   value="<?=$arResult["MAP"]["ID"]?>" />
            <input type="hidden"
                   name="type-confirm"
                   value="Y" />
        </div>
        <?endif;?>
        <div class="card-footer">
            <input type="submit" class="btn btn-danger" value="Yes Delete!">
            <a href="index.php" class="btn btn-dark">Cancel</a>
            <a href="index.php" class="btn btn-dark">Back to list</a>
        </div>
    </form>

<?require_once($_SERVER["DOCUMENT_ROOT"]."/matrix/footer.php");?>