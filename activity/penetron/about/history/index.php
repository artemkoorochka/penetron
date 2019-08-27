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

$ID = 43;
$arParams = array(
    "IBLOCK_ID" => 3
);

$arResult = array(
    "DB" => null,
    "MASSAGE" => null,
    "MAP" => null
);

// <editor-fold defaultstate="collapsed" desc=" # Update element by user fields">
if($request->isPost())
{
    $arParams["NAME"] = $request->getPost("element-name");
    $arParams["DETAIL_TEXT"] = $request->getPost("element-detail-text-input");
    $arParams["DETAIL_TEXT_TYPE"] = "html";

    $arResult["DB"] = ElementTable::update($ID, $arParams);
    if($arResult["DB"]->isSuccess()){
        $arResult["MASSAGE"] = array(
            "TYPE" => "success",
            "TEXT" => "Элемент успешно изменён!"
        );
    }else{
        $arResult["MASSAGE"] = array(
            "TYPE" => "danger",
            "TEXT" => $arResult["DB"]->getErrorMessages()
        );
    }

}
// </editor-fold>

// <editor-fold defaultstate="collapsed" desc=" # Get element data from iblock">
if($ID > 0){
    $arResult["MAP"] = ElementTable::getList(array(
        "filter" => array("ID" => $ID),
        "select" => array(
            "ID",
            "NAME",
            "DETAIL_TEXT"
        )
    ));
    $arResult["MAP"] = $arResult["MAP"]->fetch();
}
// </editor-fold>
?>

    <form class="mb-5 card"
          method="post"
          action="<?=$currentUrl?>">
        <div class="card-header bg-primary text-white-50">
            <div class="card-title">Форма редактирования</div>
        </div>
        <div class="card-body">

            <?if(!empty($arResult["MASSAGE"])):?>
                <div class="alert alert-<?=$arResult["MASSAGE"]["TYPE"]?>">
                    <?
                    if(is_array($arResult["MASSAGE"]["TEXT"]))
                        echo implode("<br>", $arResult["MASSAGE"]["TEXT"]);
                    else
                        echo $arResult["MASSAGE"]["TEXT"];
                    ?>
                </div>
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