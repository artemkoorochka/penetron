<?
/**
 * Matrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CMatrixComponentTemplate $this
 */

$this->addExternalJs($this->GetFolder() . "/js/" . "koorochka.editor.js");
$this->addExternalJs($this->GetFolder() . "/js/" . "koorochka.editor.using.js");
?>
<div class="card">
    <div class="card-header bg-primary text-white">
        <?if(!empty($arParams["TITLE"])):?>
            <h3 class="card-title"><?=$arParams["TITLE"]?></h3>
        <?
        endif;
        foreach ($arResult["BUTTONS"] as $button){
            switch ($button["CODE"]){
                case "color":
                case "bg":
                    ?>
                    <label><?=$button["NAME"]?></label>
                    <input type="color" onchange="testEditor.click(this, '<?=$button["CODE"]?>')">
                <?
                default:
                    ?>
                    <span class="btn btn-sm btn-primary"
                          onclick="<?=$arResult["EDITOR_VAR"]?>.click(this, '<?=$button["CODE"]?>')"><?=$button["NAME"]?></span>
                <?
            }
        }
        ?>
    </div>
    <div contenteditable="true"
         id="<?=$arParams["ID"]?>"
         onblur="<?=$arResult["EDITOR_VAR"]?>.valueConvert()"
         class="card-body koorochka-editor-wrapper"><?=$arParams["~VALUE"]?></div>
    <div class="<?=$arParams["SHOW_TEXTAREA"] == "Y" ? "card-footer" : "card-footer d-none"?>">
        <textarea id="<?=$arParams["ID"]?>-input"
                  rows="5"
                  class="form-control"
                  name="<?=$arParams["ID"]?>-input"><?=$arParams["VALUE"]?></textarea>
    </div>
</div>