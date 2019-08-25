<?
/**
 * @var CMain $APPLICATION
 */
use Matrix\Main\Page\Asset;
require($_SERVER['DOCUMENT_ROOT'].'/matrix/header.php');
// BX test libruaries
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/local/js/main/core/core.js");
// Koorochka test scripts
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/koorochka/local/js/main/core/script.js");
?>

    <div id="BX"></div>

<?
require($_SERVER['DOCUMENT_ROOT'].'/matrix/footer.php');
?>