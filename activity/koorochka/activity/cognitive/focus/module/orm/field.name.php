<?
use \Matrix\Main\Loader,
    \Matrix\Iblock\IblockTable,
    \Matrix\Iblock\ElementTable;

require($_SERVER['DOCUMENT_ROOT'] . "/matrix/header.php");


$MESS["IBLOCK_ENTITY_ID_FIELD"] = "";
$MESS["IBLOCK_ENTITY_TIMESTAMP_X_FIELD"] = "";
$MESS["IBLOCK_ENTITY_IBLOCK_TYPE_ID_FIELD"] = "";
$MESS["IBLOCK_ENTITY_LID_FIELD"] = "";
$MESS["IBLOCK_ENTITY_CODE_FIELD"] = "";
$MESS["IBLOCK_ENTITY_NAME_FIELD"] = "";
$MESS["IBLOCK_ENTITY_ACTIVE_FIELD"] = "";
$MESS["IBLOCK_ENTITY_SORT_FIELD"] = "";
$MESS["IBLOCK_ENTITY_LIST_PAGE_URL_FIELD"] = "";
$MESS["IBLOCK_ENTITY_DETAIL_PAGE_URL_FIELD"] = "";
$MESS["IBLOCK_ENTITY_SECTION_PAGE_URL_FIELD"] = "";
$MESS["IBLOCK_ENTITY_CANONICAL_PAGE_URL_FIELD"] = "";
$MESS["IBLOCK_ENTITY_PICTURE_FIELD"] = "";
$MESS["IBLOCK_ENTITY_DESCRIPTION_FIELD"] = "";
$MESS["IBLOCK_ENTITY_DESCRIPTION_TYPE_FIELD"] = "";
$MESS["IBLOCK_ENTITY_RSS_TTL_FIELD"] = "";
$MESS["IBLOCK_ENTITY_RSS_ACTIVE_FIELD"] = "";
$MESS["IBLOCK_ENTITY_RSS_FILE_ACTIVE_FIELD"] = "";
$MESS["IBLOCK_ENTITY_RSS_FILE_LIMIT_FIELD"] = "";
$MESS["IBLOCK_ENTITY_RSS_FILE_DAYS_FIELD"] = "";
$MESS["IBLOCK_ENTITY_RSS_YANDEX_ACTIVE_FIELD"] = "";
$MESS["IBLOCK_ENTITY_XML_ID_FIELD"] = "";
$MESS["IBLOCK_ENTITY_TMP_ID_FIELD"] = "";
$MESS["IBLOCK_ENTITY_INDEX_ELEMENT_FIELD"] = "";
$MESS["IBLOCK_ENTITY_INDEX_SECTION_FIELD"] = "";
$MESS["IBLOCK_ENTITY_WORKFLOW_FIELD"] = "";
$MESS["IBLOCK_ENTITY_BIZPROC_FIELD"] = "";
$MESS["IBLOCK_ENTITY_SECTION_CHOOSER_FIELD"] = "";
$MESS["IBLOCK_ENTITY_LIST_MODE_FIELD"] = "";
$MESS["IBLOCK_ENTITY_RIGHTS_MODE_FIELD"] = "";
$MESS["IBLOCK_ENTITY_SECTION_PROPERTY_FIELD"] = "";
$MESS["IBLOCK_ENTITY_PROPERTY_INDEX_FIELD"] = "";
$MESS["IBLOCK_ENTITY_VERSION_FIELD"] = "";
$MESS["IBLOCK_ENTITY_LAST_CONV_ELEMENT_FIELD"] = "";
$MESS["IBLOCK_ENTITY_SOCNET_GROUP_ID_FIELD"] = "";
$MESS["IBLOCK_ENTITY_EDIT_FILE_BEFORE_FIELD"] = "";
$MESS["IBLOCK_ENTITY_EDIT_FILE_AFTER_FIELD"] = "";
$MESS["IBLOCK_ENTITY_SECTIONS_NAME_FIELD"] = "";
$MESS["IBLOCK_ENTITY_SECTION_NAME_FIELD"] = "";
$MESS["IBLOCK_ENTITY_ELEMENTS_NAME_FIELD"] = "";
$MESS["IBLOCK_ENTITY_ELEMENT_NAME_FIELD"] = "";
?>
$MESS = array(<br />
<?
foreach ($MESS as $k=>$value):
    $value = str_replace("IBLOCK_ENTITY_", "", $k);
    $value = str_replace("_FIELD", "", $value);
    $value = str_replace("_", " ", $value);
?>
&nbsp;&nbsp;&nbsp;&nbsp;"<?=$k?>" => "<?=$value?>",<br />
<?endforeach;?>
);<br />