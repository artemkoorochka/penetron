<?
/**
 * @var CMain $APPLICATION
 */
use Matrix\Main\Page\Asset;
require($_SERVER['DOCUMENT_ROOT'].'/matrix/header.php');
// BX test libruaries
Asset::getInstance()->addJs("/local/js/main/core/core.js");
// Koorochka test scripts
Asset::getInstance()->addJs("/koorochka/local/js/main/core/script.js");
?>

    <div id="BX">BX</div>

<?
require($_SERVER['DOCUMENT_ROOT'].'/matrix/footer.php');
?>