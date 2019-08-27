<?
/**
 * @var CMain $APPLICATION
 * @var CUser $USER
 */


use Matrix\Iblock\ElementTable,
    Matrix\Main\Loader;
require_once($_SERVER["DOCUMENT_ROOT"]."/matrix/header.php");
if(!Loader::includeModule("iblock"))
    die;

$APPLICATION->SetTitle("The main ativity");
global $currentUrl, $request;

$arParams = array(
    "IBLOCK_ID" => 3
);

if($request->isPost())
{
    $arParams["NAME"] = $request->getPost("element-name");
    $arParams["DETAIL_TEXT"] = $request->getPost("element-detail-text-input");
    $arParams["DETAIL_TEXT_TYPE"] = "html";


    $arResult = ElementTable::add($arParams);

    if($arResult->isSuccess()){
        d("Success " . $arResult->getId());
    }
    else{
        d($arResult->getErrorMessages());
    }

}



?>

    <form class="mb-5 card"
          method="post"
          action="<?=$currentUrl?>">
        <div class="card-header bg-primary text-white-50">
            <div class="card-title">Форма редактирования</div>
        </div>
        <div class="card-body">

            <?if(!empty($arResult["MASSAGE"])):?>
                <div class="alert alert-<?=$arResult["MASSAGE"]["TYPE"]?>"><?=$arResult["MASSAGE"]["TEXT"]?></div>
            <?endif;?>

            <div class="form-group row">
                <label for="colFormLabel"
                       class="col-sm-2 col-form-label">Заголовок *</label>
                <div class="col-sm-10">
                    <input type="text"
                           class="form-control"
                           name="element-name"
                           value="<?=$arResult["MAP"]["NAME"]?>" />
                </div>
            </div>

            <div class="form-group row">
                <label for="colFormLabel"
                       class="col-sm-2 col-form-label">Текст</label>
                <div class="col-sm-10">
                    <?$APPLICATION->IncludeComponent("koorochka:koorochka.editor", "panel.primary", array(
                        "ID" => "element-detail-text",
                        "VALUE" => $arResult["MAP"]["DETAIL_TEXT"],
                        "SHOW_TEXTAREA" => "N",
                        // "NOT_INIT" => "Y",
                    ));?>
                </div>
            </div>

        </div>
        <div class="card-footer">
            <input type="submit"
                   class="btn btn-success"
                   value="Сохранить">
        </div>
    </form>


<?require_once($_SERVER["DOCUMENT_ROOT"]."/matrix/footer.php");?>