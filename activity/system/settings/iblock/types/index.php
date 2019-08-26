<?
/**
 * @var CMain $APPLICATION
 * @var CUser $USER
 */


use Matrix\Iblock\TypeTable,
    Matrix\Main\Loader;
require_once($_SERVER["DOCUMENT_ROOT"]."/matrix/header.php");
$APPLICATION->SetTitle("The System iblock types");

if(!Loader::includeModule("iblock"))
    die;

$arResult = array(
    "DB" => false,
    "ITEMS" => false
);

$arResult["DB"] = TypeTable::getList();
while ($iblock = $arResult["DB"]->fetch())
{
    $arResult["ITEMS"][] = $iblock;
}

if(empty($arResult["ITEMS"])):
?>
    <div class="alert alert-danger">There is no iblock types on this system. Ferstebal insert a new iblocks/</div>
<?else:?>

    <div class="alert alert-dark">
        <a href="edit.php" class="btn btn-dark">New iblock type</a>
    </div>


    <div class="card">
        <div class="card-header bg-primary text-white-50">
            <div class="card-title"><?=$APPLICATION->GetTitle()?></div>
        </div>
        <div class="card-body">
            <?foreach ($arResult["ITEMS"] as $arItem):?>
                <div class="row alert alert-success">
                    <div class="col col-auto border-right border-success">actions</div>
                    <div class="col col-auto border-right border-success"><?=$arItem["SORT"]?></div>
                    <div class="col"><?=$arItem["ID"]?></div>
                </div>
            <?endforeach;?>
        </div>
    </div>


<?
d($arResult["ITEMS"]);

endif;
?>
<?require_once($_SERVER["DOCUMENT_ROOT"]."/matrix/footer.php");?>