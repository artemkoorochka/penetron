<?
/**
 * @var CMain $APPLICATION
 * @var CUser $USER
 */


use Matrix\Iblock\IblockTable,
    Matrix\Main\Loader;
require_once($_SERVER["DOCUMENT_ROOT"]."/matrix/header.php");
$APPLICATION->SetTitle("The System iblocks");

if(!Loader::includeModule("iblock"))
    die;

$arResult = array(
    "DB" => false,
    "ITEMS" => false
);

$arResult["DB"] = IblockTable::getList();
while ($iblock = $arResult["DB"]->fetch())
{
    $arResult["ITEMS"][] = $iblock;
}

if(empty($arResult["ITEMS"])):
?>
    <div class="alert alert-danger">There is no iblocks on this system. Ferstebal insert a new iblocks/</div>
<?else:?>

    <div class="alert alert-dark">
        <a href="edit.php" class="btn btn-dark">New iblock</a>
    </div>

    <table class="table">
        <thead class="table-dark">
        <tr>
            <th>NAME</th>
            <th>CODE</th>
            <th>LIST_PAGE_URL</th>
            <th>DETAIL_PAGE_URL</th>
            <th>SECTION_PAGE_URL</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <?foreach ($arResult["ITEMS"] as $iblock):?>
                <tr>
                    <td><?=$iblock["NAME"]?></td>
                    <td><?=$iblock["CODE"]?></td>
                    <td><?=$iblock["LIST_PAGE_URL"]?></td>
                    <td><?=$iblock["DETAIL_PAGE_URL"]?></td>
                    <td><?=$iblock["SECTION_PAGE_URL"]?></td>
                </tr>
            <?endforeach;?>
        </tr>
        </tbody>
    </table>



<?
d($arResult["ITEMS"]);

endif;
?>
<?require_once($_SERVER["DOCUMENT_ROOT"]."/matrix/footer.php");?>