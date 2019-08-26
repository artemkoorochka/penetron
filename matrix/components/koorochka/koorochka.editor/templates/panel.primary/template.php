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
<div class="koorochka-editor">

    <?
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
                <button onclick="<?=$arResult["EDITOR_VAR"]?>.click(this, '<?=$button["CODE"]?>')"><?=$button["NAME"]?></button>
                <?
        }
    }
    ?>

    <div contenteditable="true"
         id="<?=$arParams["ID"]?>"
         class="koorochka-editor-wrapper"><?=$arParams["~VALUE"]?></div>

    <textarea id="<?=$arParams["ID"]?>-input"
              rows="5"
              class="<?=$arParams["SHOW_TEXTAREA"] == "Y" ? "form-control" : "form-control d-none"?>"
              name="<?=$arParams["ID"]?>-input"><?=$arParams["VALUE"]?></textarea>




    <input type="button"
           onclick="<?=$arResult["EDITOR_VAR"]?>.valueConvert()"
           class="btn btn-danger"
           value="valueToInput">

</div>