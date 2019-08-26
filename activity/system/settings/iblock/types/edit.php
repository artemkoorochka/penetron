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
    "ORM" => null,
    "MAP" => null,
    "MASSAGE" => null
);

/**
 * Get ORM map of entity
 */
$arParams = array(
    "MAP" => TypeTable::getMap()
);

/**
 * Add or update
 */
if($request->isPost())
{
    if(empty($arResult["ID"])){
        $arResult["ORM"] = TypeTable::add(array(
            "ID" => $request->getPost("edit-ID"),
            "SECTIONS" => $request->getPost("edit-SECTIONS"),
            "SORT" => $request->getPost("edit-SORT")
        ));
        $arResult["ID"] = $arResult["ORM"]->getId();
    }else{
        $arResult["ORM"] = TypeTable::update($arResult["ID"], array(
            "SECTIONS" => $request->getPost("edit-SECTIONS"),
            "SORT" => $request->getPost("edit-SORT")
        ));
    }

    if($arResult["ORM"]->isSuccess()){
        $arResult["MASSAGE"] = array("TYPE" => "success");
        if(empty($request->get("ID"))){
            $arResult["MASSAGE"]["TEXT"] = "The iblock type " . $arResult["ID"] .  " is successessfull created";
        }else{
            $arResult["MASSAGE"]["TEXT"] = "The iblock type " . $arResult["ID"] .  " is successessfull updated";
        }
    }else{
        $arResult["MASSAGE"] = array(
            "TEXT" => $arResult["ORM"]->getErrorMessages(),
            "TYPE" => "danger"
        );

    }

}

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
    $arResult["MAP"] = $arResult["MAP"]->fetch();
}
?>

    <div class="alert alert-dark">
        <a href="index.php" class="btn btn-dark">Iblock list</a>
    </div>

    <form class="card"
          method="post"
          action="<?=$currentUrl?>">
        <div class="card-header bg-primary text-white-50">
            <div class="card-title">Edit Iblock parameters</div>
        </div>
        <div class="card-body">

            <?if(!empty($arResult["MASSAGE"])):?>
                <div class="alert alert-<?=$arResult["MASSAGE"]["TYPE"]?>"><?=$arResult["MASSAGE"]["TEXT"]?></div>
            <?endif;?>

            <?if(!empty($arResult["ID"])):?>
                <input type="hidden"
                       name="ID"
                       value="<?=$arResult["ID"]?>">
            <?
            endif;
            foreach ($arParams["MAP"] as $code=>$arField){
                switch ($code){
                    // not need to administrate
                    case "EDIT_FILE_BEFORE":
                    case "EDIT_FILE_AFTER":
                    case "IN_RSS":
                        break;
                    case "SECTIONS":
                    ?>
                        <div class="form-group row">
                            <label for="colFormLabel"
                                   class="col-sm-2 col-form-label"><?=$arField["title"]?></label>
                            <div class="col-sm-10">
                                <input type="checkbox"
                                       <?
                                       if($arResult["MAP"]["SECTIONS"] == "Y")
                                           echo " checked";
                                       ?>
                                       name="edit-<?=$code?>"
                                       value="Y" />
                            </div>
                        </div>
                    <?
                        break;
                    default:
                    ?>
                        <div class="form-group row">
                            <label for="colFormLabel"
                                   class="col-sm-2 col-form-label"><?=$arField["title"]?></label>
                            <div class="col-sm-10">
                                <input type="text"
                                       class="form-control"
                                       name="edit-<?=$code?>"
                                       value="<?=$arResult["MAP"][$code]?>" />
                            </div>
                        </div>
                <?
                }
            }
            ?>
        </div>
        <div class="card-footer">
            <input type="submit"
                   class="btn btn-success"
                   value="submit">
        </div>


    </form>

<?require_once($_SERVER["DOCUMENT_ROOT"]."/matrix/footer.php");?>