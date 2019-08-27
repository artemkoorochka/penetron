<?
/**
 * @var CMain $APPLICATION
 * @var CUser $USER
 */


use Matrix\Iblock\TypeTable,
    Matrix\Main\Type\Date,
    Matrix\Main\Loader;
require_once($_SERVER["DOCUMENT_ROOT"]."/matrix/header.php");
$APPLICATION->SetTitle("Edit iblock");

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
    $arResult["MAP"] = TypeTable::getList(array(
        "filter" => array(
            "ID" => $arResult["ID"]
        )
    ));
    if($arResult["MAP"] = $arResult["MAP"]->fetch()){
        if($request->getPost("type-confirm") == "Y"){
            TypeTable::delete($arResult["MAP"]["ID"]);
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
            Do you want to delete <?=$arResult["MAP"]["ID"]?> type?
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