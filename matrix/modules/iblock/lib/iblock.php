<?php
namespace Matrix\Iblock;

use Matrix\Main,
    Matrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

/**
 * Class IblockTable
 *
 * Fields:
 * <ul>
 * <li> ID int mandatory
 * <li> TIMESTAMP_X datetime mandatory default 'CURRENT_TIMESTAMP'
 * <li> IBLOCK_TYPE_ID string(50) mandatory
 * <li> LID string(2) mandatory
 * <li> CODE string(50) optional
 * <li> NAME string(255) mandatory
 * <li> ACTIVE bool optional default 'Y'
 * <li> SORT int optional default 500
 * <li> LIST_PAGE_URL string(255) optional
 * <li> DETAIL_PAGE_URL string(255) optional
 * <li> SECTION_PAGE_URL string(255) optional
 * <li> CANONICAL_PAGE_URL string(255) optional
 * <li> PICTURE int optional
 * <li> DESCRIPTION string optional
 * <li> DESCRIPTION_TYPE enum ('text', 'html') optional default 'text'
 * <li> RSS_TTL int optional default 24
 * <li> RSS_ACTIVE bool optional default 'Y'
 * <li> RSS_FILE_ACTIVE bool optional default 'N'
 * <li> RSS_FILE_LIMIT int optional
 * <li> RSS_FILE_DAYS int optional
 * <li> RSS_YANDEX_ACTIVE bool optional default 'N'
 * <li> XML_ID string(255) optional
 * <li> TMP_ID string(40) optional
 * <li> INDEX_ELEMENT bool optional default 'Y'
 * <li> INDEX_SECTION bool optional default 'N'
 * <li> WORKFLOW bool optional default 'Y'
 * <li> BIZPROC bool optional default 'N'
 * <li> SECTION_CHOOSER string(1) optional
 * <li> LIST_MODE string(1) optional
 * <li> RIGHTS_MODE string(1) optional
 * <li> SECTION_PROPERTY string(1) optional
 * <li> PROPERTY_INDEX string(1) optional
 * <li> VERSION int optional default 1
 * <li> LAST_CONV_ELEMENT int mandatory
 * <li> SOCNET_GROUP_ID int optional
 * <li> EDIT_FILE_BEFORE string(255) optional
 * <li> EDIT_FILE_AFTER string(255) optional
 * <li> SECTIONS_NAME string(100) optional
 * <li> SECTION_NAME string(100) optional
 * <li> ELEMENTS_NAME string(100) optional
 * <li> ELEMENT_NAME string(100) optional
 * <li> PICTURE reference to {@link \Matrix\File\FileTable}
 * <li> IBLOCK_TYPE reference to {@link \Matrix\Iblock\IblockTypeTable}
 * <li> LID reference to {@link \Matrix\Lang\LangTable}
 * <li> SOCNET_GROUP reference to {@link \Matrix\Sonet\SonetGroupTable}
 * </ul>
 *
 * @package Matrix\Iblock
 **/

class IblockTable extends Main\Entity\DataManager
{
    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName()
    {
        return 'b_iblock';
    }

    /**
     * Returns entity map definition.
     *
     * @return array
     */
    public static function getMap()
    {
        return array(
            'ID' => array(
                'data_type' => 'integer',
                'primary' => true,
                'autocomplete' => true,
                'title' => Loc::getMessage('IBLOCK_ENTITY_ID_FIELD'),
            ),
            'TIMESTAMP_X' => array(
                'data_type' => 'datetime',
                'required' => true,
                'title' => Loc::getMessage('IBLOCK_ENTITY_TIMESTAMP_X_FIELD'),
            ),
            'IBLOCK_TYPE_ID' => array(
                'data_type' => 'string',
                'required' => true,
                'validation' => array(__CLASS__, 'validateIblockTypeId'),
                'title' => Loc::getMessage('IBLOCK_ENTITY_IBLOCK_TYPE_ID_FIELD'),
            ),
            'LID' => array(
                'data_type' => 'string',
                'required' => true,
                'validation' => array(__CLASS__, 'validateLid'),
                'title' => Loc::getMessage('IBLOCK_ENTITY_LID_FIELD'),
            ),
            'CODE' => array(
                'data_type' => 'string',
                'validation' => array(__CLASS__, 'validateCode'),
                'title' => Loc::getMessage('IBLOCK_ENTITY_CODE_FIELD'),
            ),
            'NAME' => array(
                'data_type' => 'string',
                'required' => true,
                'validation' => array(__CLASS__, 'validateName'),
                'title' => Loc::getMessage('IBLOCK_ENTITY_NAME_FIELD'),
            ),
            'ACTIVE' => array(
                'data_type' => 'boolean',
                'values' => array('N', 'Y'),
                'title' => Loc::getMessage('IBLOCK_ENTITY_ACTIVE_FIELD'),
            ),
            'SORT' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('IBLOCK_ENTITY_SORT_FIELD'),
            ),
            'LIST_PAGE_URL' => array(
                'data_type' => 'string',
                'validation' => array(__CLASS__, 'validateListPageUrl'),
                'title' => Loc::getMessage('IBLOCK_ENTITY_LIST_PAGE_URL_FIELD'),
            ),
            'DETAIL_PAGE_URL' => array(
                'data_type' => 'string',
                'validation' => array(__CLASS__, 'validateDetailPageUrl'),
                'title' => Loc::getMessage('IBLOCK_ENTITY_DETAIL_PAGE_URL_FIELD'),
            ),
            'SECTION_PAGE_URL' => array(
                'data_type' => 'string',
                'validation' => array(__CLASS__, 'validateSectionPageUrl'),
                'title' => Loc::getMessage('IBLOCK_ENTITY_SECTION_PAGE_URL_FIELD'),
            ),
            'CANONICAL_PAGE_URL' => array(
                'data_type' => 'string',
                'validation' => array(__CLASS__, 'validateCanonicalPageUrl'),
                'title' => Loc::getMessage('IBLOCK_ENTITY_CANONICAL_PAGE_URL_FIELD'),
            ),
            'PICTURE' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('IBLOCK_ENTITY_PICTURE_FIELD'),
            ),
            'DESCRIPTION' => array(
                'data_type' => 'text',
                'title' => Loc::getMessage('IBLOCK_ENTITY_DESCRIPTION_FIELD'),
            ),
            'DESCRIPTION_TYPE' => array(
                'data_type' => 'enum',
                'values' => array('text', 'html'),
                'title' => Loc::getMessage('IBLOCK_ENTITY_DESCRIPTION_TYPE_FIELD'),
            ),
            'RSS_TTL' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('IBLOCK_ENTITY_RSS_TTL_FIELD'),
            ),
            'RSS_ACTIVE' => array(
                'data_type' => 'boolean',
                'values' => array('N', 'Y'),
                'title' => Loc::getMessage('IBLOCK_ENTITY_RSS_ACTIVE_FIELD'),
            ),
            'RSS_FILE_ACTIVE' => array(
                'data_type' => 'boolean',
                'values' => array('N', 'Y'),
                'title' => Loc::getMessage('IBLOCK_ENTITY_RSS_FILE_ACTIVE_FIELD'),
            ),
            'RSS_FILE_LIMIT' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('IBLOCK_ENTITY_RSS_FILE_LIMIT_FIELD'),
            ),
            'RSS_FILE_DAYS' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('IBLOCK_ENTITY_RSS_FILE_DAYS_FIELD'),
            ),
            'RSS_YANDEX_ACTIVE' => array(
                'data_type' => 'boolean',
                'values' => array('N', 'Y'),
                'title' => Loc::getMessage('IBLOCK_ENTITY_RSS_YANDEX_ACTIVE_FIELD'),
            ),
            'XML_ID' => array(
                'data_type' => 'string',
                'validation' => array(__CLASS__, 'validateXmlId'),
                'title' => Loc::getMessage('IBLOCK_ENTITY_XML_ID_FIELD'),
            ),
            'TMP_ID' => array(
                'data_type' => 'string',
                'validation' => array(__CLASS__, 'validateTmpId'),
                'title' => Loc::getMessage('IBLOCK_ENTITY_TMP_ID_FIELD'),
            ),
            'INDEX_ELEMENT' => array(
                'data_type' => 'boolean',
                'values' => array('N', 'Y'),
                'title' => Loc::getMessage('IBLOCK_ENTITY_INDEX_ELEMENT_FIELD'),
            ),
            'INDEX_SECTION' => array(
                'data_type' => 'boolean',
                'values' => array('N', 'Y'),
                'title' => Loc::getMessage('IBLOCK_ENTITY_INDEX_SECTION_FIELD'),
            ),
            'WORKFLOW' => array(
                'data_type' => 'boolean',
                'values' => array('N', 'Y'),
                'title' => Loc::getMessage('IBLOCK_ENTITY_WORKFLOW_FIELD'),
            ),
            'BIZPROC' => array(
                'data_type' => 'boolean',
                'values' => array('N', 'Y'),
                'title' => Loc::getMessage('IBLOCK_ENTITY_BIZPROC_FIELD'),
            ),
            'SECTION_CHOOSER' => array(
                'data_type' => 'string',
                'validation' => array(__CLASS__, 'validateSectionChooser'),
                'title' => Loc::getMessage('IBLOCK_ENTITY_SECTION_CHOOSER_FIELD'),
            ),
            'LIST_MODE' => array(
                'data_type' => 'string',
                'validation' => array(__CLASS__, 'validateListMode'),
                'title' => Loc::getMessage('IBLOCK_ENTITY_LIST_MODE_FIELD'),
            ),
            'RIGHTS_MODE' => array(
                'data_type' => 'string',
                'validation' => array(__CLASS__, 'validateRightsMode'),
                'title' => Loc::getMessage('IBLOCK_ENTITY_RIGHTS_MODE_FIELD'),
            ),
            'SECTION_PROPERTY' => array(
                'data_type' => 'string',
                'validation' => array(__CLASS__, 'validateSectionProperty'),
                'title' => Loc::getMessage('IBLOCK_ENTITY_SECTION_PROPERTY_FIELD'),
            ),
            'PROPERTY_INDEX' => array(
                'data_type' => 'string',
                'validation' => array(__CLASS__, 'validatePropertyIndex'),
                'title' => Loc::getMessage('IBLOCK_ENTITY_PROPERTY_INDEX_FIELD'),
            ),
            'VERSION' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('IBLOCK_ENTITY_VERSION_FIELD'),
            ),
            'LAST_CONV_ELEMENT' => array(
                'data_type' => 'integer',
                'required' => true,
                'title' => Loc::getMessage('IBLOCK_ENTITY_LAST_CONV_ELEMENT_FIELD'),
            ),
            'SOCNET_GROUP_ID' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('IBLOCK_ENTITY_SOCNET_GROUP_ID_FIELD'),
            ),
            'EDIT_FILE_BEFORE' => array(
                'data_type' => 'string',
                'validation' => array(__CLASS__, 'validateEditFileBefore'),
                'title' => Loc::getMessage('IBLOCK_ENTITY_EDIT_FILE_BEFORE_FIELD'),
            ),
            'EDIT_FILE_AFTER' => array(
                'data_type' => 'string',
                'validation' => array(__CLASS__, 'validateEditFileAfter'),
                'title' => Loc::getMessage('IBLOCK_ENTITY_EDIT_FILE_AFTER_FIELD'),
            ),
            'SECTIONS_NAME' => array(
                'data_type' => 'string',
                'validation' => array(__CLASS__, 'validateSectionsName'),
                'title' => Loc::getMessage('IBLOCK_ENTITY_SECTIONS_NAME_FIELD'),
            ),
            'SECTION_NAME' => array(
                'data_type' => 'string',
                'validation' => array(__CLASS__, 'validateSectionName'),
                'title' => Loc::getMessage('IBLOCK_ENTITY_SECTION_NAME_FIELD'),
            ),
            'ELEMENTS_NAME' => array(
                'data_type' => 'string',
                'validation' => array(__CLASS__, 'validateElementsName'),
                'title' => Loc::getMessage('IBLOCK_ENTITY_ELEMENTS_NAME_FIELD'),
            ),
            'ELEMENT_NAME' => array(
                'data_type' => 'string',
                'validation' => array(__CLASS__, 'validateElementName'),
                'title' => Loc::getMessage('IBLOCK_ENTITY_ELEMENT_NAME_FIELD'),
            ),
            'PICTURE' => array(
                'data_type' => 'Matrix\File\File',
                'reference' => array('=this.PICTURE' => 'ref.ID'),
            ),
            'IBLOCK_TYPE' => array(
                'data_type' => 'Matrix\Iblock\IblockType',
                'reference' => array('=this.IBLOCK_TYPE_ID' => 'ref.ID'),
            ),
            'LID' => array(
                'data_type' => 'Matrix\Lang\Lang',
                'reference' => array('=this.LID' => 'ref.LID'),
            ),
            'SOCNET_GROUP' => array(
                'data_type' => 'Matrix\Sonet\SonetGroup',
                'reference' => array('=this.SOCNET_GROUP_ID' => 'ref.ID'),
            ),
        );
    }
    /**
     * Returns validators for IBLOCK_TYPE_ID field.
     *
     * @return array
     */
    public static function validateIblockTypeId()
    {
        return array(
            new Main\Entity\Validator\Length(null, 50),
        );
    }
    /**
     * Returns validators for LID field.
     *
     * @return array
     */
    public static function validateLid()
    {
        return array(
            new Main\Entity\Validator\Length(null, 2),
        );
    }
    /**
     * Returns validators for CODE field.
     *
     * @return array
     */
    public static function validateCode()
    {
        return array(
            new Main\Entity\Validator\Length(null, 50),
        );
    }
    /**
     * Returns validators for NAME field.
     *
     * @return array
     */
    public static function validateName()
    {
        return array(
            new Main\Entity\Validator\Length(null, 255),
        );
    }
    /**
     * Returns validators for LIST_PAGE_URL field.
     *
     * @return array
     */
    public static function validateListPageUrl()
    {
        return array(
            new Main\Entity\Validator\Length(null, 255),
        );
    }
    /**
     * Returns validators for DETAIL_PAGE_URL field.
     *
     * @return array
     */
    public static function validateDetailPageUrl()
    {
        return array(
            new Main\Entity\Validator\Length(null, 255),
        );
    }
    /**
     * Returns validators for SECTION_PAGE_URL field.
     *
     * @return array
     */
    public static function validateSectionPageUrl()
    {
        return array(
            new Main\Entity\Validator\Length(null, 255),
        );
    }
    /**
     * Returns validators for CANONICAL_PAGE_URL field.
     *
     * @return array
     */
    public static function validateCanonicalPageUrl()
    {
        return array(
            new Main\Entity\Validator\Length(null, 255),
        );
    }
    /**
     * Returns validators for XML_ID field.
     *
     * @return array
     */
    public static function validateXmlId()
    {
        return array(
            new Main\Entity\Validator\Length(null, 255),
        );
    }
    /**
     * Returns validators for TMP_ID field.
     *
     * @return array
     */
    public static function validateTmpId()
    {
        return array(
            new Main\Entity\Validator\Length(null, 40),
        );
    }
    /**
     * Returns validators for SECTION_CHOOSER field.
     *
     * @return array
     */
    public static function validateSectionChooser()
    {
        return array(
            new Main\Entity\Validator\Length(null, 1),
        );
    }
    /**
     * Returns validators for LIST_MODE field.
     *
     * @return array
     */
    public static function validateListMode()
    {
        return array(
            new Main\Entity\Validator\Length(null, 1),
        );
    }
    /**
     * Returns validators for RIGHTS_MODE field.
     *
     * @return array
     */
    public static function validateRightsMode()
    {
        return array(
            new Main\Entity\Validator\Length(null, 1),
        );
    }
    /**
     * Returns validators for SECTION_PROPERTY field.
     *
     * @return array
     */
    public static function validateSectionProperty()
    {
        return array(
            new Main\Entity\Validator\Length(null, 1),
        );
    }
    /**
     * Returns validators for PROPERTY_INDEX field.
     *
     * @return array
     */
    public static function validatePropertyIndex()
    {
        return array(
            new Main\Entity\Validator\Length(null, 1),
        );
    }
    /**
     * Returns validators for EDIT_FILE_BEFORE field.
     *
     * @return array
     */
    public static function validateEditFileBefore()
    {
        return array(
            new Main\Entity\Validator\Length(null, 255),
        );
    }
    /**
     * Returns validators for EDIT_FILE_AFTER field.
     *
     * @return array
     */
    public static function validateEditFileAfter()
    {
        return array(
            new Main\Entity\Validator\Length(null, 255),
        );
    }
    /**
     * Returns validators for SECTIONS_NAME field.
     *
     * @return array
     */
    public static function validateSectionsName()
    {
        return array(
            new Main\Entity\Validator\Length(null, 100),
        );
    }
    /**
     * Returns validators for SECTION_NAME field.
     *
     * @return array
     */
    public static function validateSectionName()
    {
        return array(
            new Main\Entity\Validator\Length(null, 100),
        );
    }
    /**
     * Returns validators for ELEMENTS_NAME field.
     *
     * @return array
     */
    public static function validateElementsName()
    {
        return array(
            new Main\Entity\Validator\Length(null, 100),
        );
    }
    /**
     * Returns validators for ELEMENT_NAME field.
     *
     * @return array
     */
    public static function validateElementName()
    {
        return array(
            new Main\Entity\Validator\Length(null, 100),
        );
    }
}