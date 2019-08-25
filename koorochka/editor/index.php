<?
/**
 * @global CMain $APPLICATION
 */

use Bitrix\Main\Page\Asset;
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
Asset::getInstance()->addJs("/koorochka/editor/septic.editor.js");
Asset::getInstance()->addCss("/koorochka/editor/septic.editor.css");
?>
	<div class="text-page">
		<!-- begin container_center-->
		<div class="container_center">
			<?$APPLICATION->IncludeComponent(
				"bitrix:breadcrumb",
				"",
				Array()
			);?>
			<div class="text-page__wrapper">

				<div class="septic-editor">
                    <button onclick="septicEditor.click(this, 'b')"><b>B</b></button>
                    <button onclick="septicEditor.click(this, 'i')"><i>I</i></button>
                    <button onclick="septicEditor.click(this, 's')"><s>S</s></button>
                    <button onclick="septicEditor.click(this, 'underline')">_</button>

                    <label>Цвет текста</label>
                    <input type="color" onchange="septicEditor.click(this, 'color')">
                    <label>Заливка</label>
                    <input type="color" onchange="septicEditor.click(this, 'bg')">

                    <button onclick="septicEditor.click(this, 'ul')">ul</button>
                    <button onclick="septicEditor.click(this, 'ol')">ol</button>
                    <button onclick="septicEditor.click(this, 'div')">div</button>
                    <button onclick="septicEditor.click(this, 'hr')">hr</button>

                    <div contenteditable="true"
                         id="septic-editor"
                         class="septic-editor-wrapper"></div>
                </div>

			</div>
		</div>
	</div>
<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>