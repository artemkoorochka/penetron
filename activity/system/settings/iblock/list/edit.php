<?
/**
 * @var CMain $APPLICATION
 * @var CUser $USER
 */


use Matrix\Iblock\IblockTable,
    Matrix\Main\Type\Date,
    Matrix\Main\Loader;
require_once($_SERVER["DOCUMENT_ROOT"]."/matrix/header.php");
$APPLICATION->SetTitle("Edit iblock");

if(!Loader::includeModule("iblock"))
    die;

$arParams = array(
    "MAP" => IblockTable::getMap()
);

unset($arParams["MAP"]["ID"]);

$arResult = array(
    "DB" => false,
    "ITEMS" => false
);
?>

    <div class="alert alert-dark">
        <a href="index.php" class="btn btn-dark">Iblock list</a>
    </div>

    <form class="card">
        <div class="card-header bg-primary text-white-50">
            <div class="card-title">Edit Iblock parameters</div>
        </div>
        <div class="card-body">
            <?foreach ($arParams["MAP"] as $arField):?>
                <div class="form-group row">
                    <label for="colFormLabel"
                           class="col-sm-2 col-form-label"><?=$arField["title"]?></label>
                    <div class="col-sm-10">
                        <?d($arField)?>
                    </div>
                </div>
            <?endforeach;?>
        </div>
        <div class="card-footer">
            footer
        </div>


    </form>

<?require_once($_SERVER["DOCUMENT_ROOT"]."/matrix/footer.php");?>