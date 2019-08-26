<?
/**
 * @global CMain $APPLICATION
 */
require($_SERVER['DOCUMENT_ROOT'].'/matrix/header.php');
?>

.
..
overview

.
..
Editor

.
..

<?if(COption::GetOptionString('fileman', "use_code_editor", "Y") == "Y")
{
    $codeEditorId = CCodeEditor::Show(
        array(
            'textareaId' => 'bxed_CONTENT',
            'height' => 500
        ));
}?>

<textarea rows="28" cols="60" style="width:100%" id="bxed_CONTENT" name="CONTENT" wrap="off"><?echo htmlspecialcharsbx(htmlspecialcharsback($str_CONTENT))?></textarea>


.
..
$Editor = new CHTMLEditor;
$Editor->Show(array(
'name' => $editor_name,
'id' => $editor_name,
'width' => '100%',
'height' => '490',
'content' => $filesrc,
'bAllowPhp' => $USER->CanDoOperation('edit_php'),
"limitPhpAccess" => $limit_php_access,
"site" => $site,
"relPath" => $relPath,
"templateId" => $_REQUEST['templateID'],
));
.
..
// to delete
C:\Users\Koorochka\Documents\Projects\Koorochka\penetron\public_html\local\js\main
local/js/main
C:\Users\Koorochka\Documents\Projects\Koorochka\penetron\public_html\koorochka\local\js\main\core
koorochka/local/js/main/core


.
..
Pack to Bitrix-Framework

<?$APPLICATION->IncludeComponent("koorochka:koorochka.editor", ".default", array(
    "ID" => "detail-text",
    "VALUE" => "<h1>Test H1</h1><h4>Test h4</h4>some ",
    // "NOT_INIT" => "Y",
));?>


<?
require($_SERVER['DOCUMENT_ROOT'].'/matrix/footer.php');
?>


