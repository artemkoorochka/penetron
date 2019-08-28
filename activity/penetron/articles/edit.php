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

$ID = $request->get("ID");
$arParams = array(
    "IBLOCK_ID" => 5
);

$arResult = array(
    "DB" => null,
    "MASSAGE" => null,
    "MAP" => null
);

// <editor-fold defaultstate="collapsed" desc=" # Update element by user fields">
if($request->isPost())
{
    $arParams["NAME"] = $request->getPost("element-NAME");
    $arParams["ACTIVE"] = $request->getPost("element-ACTIVE") == "Y" ? "Y" : "N" ;
    $arParams["SORT"] = $request->getPost("element-SORT");
    $arParams["PREVIEW_TEXT"] = $request->getPost("element-PREVIEW_TEXT-input");
    $arParams["PREVIEW_TEXT_TYPE"] = "html";

    if($ID > 0){
        $arResult["DB"] = ElementTable::update($ID, $arParams);
    }else{
        $arResult["DB"] = ElementTable::add($arParams);
        $ID = $arResult["DB"]->getId();
    }

    if($arResult["DB"]->isSuccess()){
        $arResult["MASSAGE"]["TYPE"] = "success";
        if($ID > 0){
            $arResult["MASSAGE"]["TEXT"] = "Элемент успешно изменён!";
        }else{
            $arResult["MASSAGE"]["TEXT"] = "Элемент успешно добавлен!";
        }
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
        "filter" => array("ID" => $ID)
    ));
    if($arResult["MAP"] = $arResult["MAP"]->fetch()){
        if($request->isPost()){
            if($arResult["MAP"]["PREVIEW_PICTURE"] > 0){
                CFile::Delete($arResult["MAP"]["PREVIEW_PICTURE"]);
            }

            /**
             * Add new file
             */
            $arResult["MAP"]["PREVIEW_PICTURE"] = $request->getFile("element-PREVIEW_PICTURE");

            if(is_array($arResult["MAP"]["PREVIEW_PICTURE"])){
                $arResult["MAP"]["PREVIEW_PICTURE"] = CFile::SaveFile($arResult["MAP"]["PREVIEW_PICTURE"], "iblock");
            }
            ElementTable::update($ID, array("PREVIEW_PICTURE" => $arResult["MAP"]["PREVIEW_PICTURE"]));
        }

        if($arResult["MAP"]["PREVIEW_PICTURE"] > 0){
            $arResult["MAP"]["PREVIEW_PICTURE"] = CFile::GetFileArray($arResult["MAP"]["PREVIEW_PICTURE"]);
        }

    }
}



// </editor-fold>
?>

    <div class="alert alert-dark">
        <a href="index.php" class="btn btn-dark">К списку акций</a>
    </div>


    <form class="mb-5 card"
          method="post"
          enctype="multipart/form-data"
          action="<?=$currentUrl?>">
        <div class="card-header bg-primary text-white-50">
            <div class="card-title">Форма редактирования</div>
        </div>
        <div class="card-body">

            <?if($ID > 0):?>
                <input type="hidden"
                       name="ID"
                       value="<?=$ID?>" />
            <?endif;?>

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
                       class="col-sm-2 col-form-label">Активность</label>
                <div class="col-sm-10">
                    <input type="checkbox"
                        <?if($arResult["MAP"]["ACTIVE"] == "Y"):?>
                            checked="checked"
                        <?endif;?>
                           name="element-ACTIVE"
                           value="Y" />
                </div>
            </div>

            <div class="form-group row">
                <label for="colFormLabel"
                       class="col-sm-2 col-form-label">Заголовок *</label>
                <div class="col-sm-10">
                    <input type="text"
                           class="form-control"
                           name="element-NAME"
                           value="<?=$arResult["MAP"]["NAME"]?>" />
                </div>
            </div>

            <div class="form-group row">
                <label for="colFormLabel"
                       class="col-sm-2 col-form-label">Вес сортировки</label>
                <div class="col-sm-10">
                    <input type="text"
                           class="form-control"
                           name="element-SORT"
                           value="<?=$arResult["MAP"]["SORT"]?>" />
                </div>
            </div>

            <div class="form-group row">
                <label for="colFormLabel"
                       class="col-sm-2 col-form-label">Картинка анонса</label>
                <div class="col-sm-10">

                    <?if(is_array($arResult["MAP"]["PREVIEW_PICTURE"])):?>
                        <img src="<?=$arResult["MAP"]["PREVIEW_PICTURE"]["SRC"]?>"
                             class="img-thumbnail img-responsive">
                    <?endif;?>
                    <hr />
                    <input type="file"
                           name="element-PREVIEW_PICTURE" />
                </div>
            </div>

            <div class="form-group row">
                <label for="colFormLabel"
                       class="col-sm-2 col-form-label">Текст</label>
                <div class="col-sm-10">
                    <?$APPLICATION->IncludeComponent("koorochka:koorochka.editor", "panel.primary", array(
                        "ID" => "element-PREVIEW_TEXT",
                        "VALUE" => $arResult["MAP"]["PREVIEW_TEXT"],
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
            <a href="index.php" class="btn btn-dark">К списку акций</a>
        </div>
    </form>


<?require_once($_SERVER["DOCUMENT_ROOT"]."/matrix/footer.php");?>