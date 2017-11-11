<?php
/*
    WEBlife CMS
    Developed by http://weblife.ua/
*/
defined('WEBlife') or die( 'Restricted access' ); // no direct access

// ����� ������ � ���� �����, ������ ������������ �� ��
// ���� �� ������� �������� ������� setlocale
setlocale(LC_ALL, array ('ua_UA.CP1251', "uk_UA", "ua_UA", "ua"));

define('ADMIN_ADD_NEW', '�������� ���� ������ �� ����� ����');
define('ADMIN_ADD_NEW_PAGE', '������ �������');
define('ADMIN_ADD_NEW_PRODUCT', '�����');
define('ADMIN_ADD_NEW_NEWS', '������ ������');
define('ADMIN_ADD_NEW_STOCK', '������ ���i�');
define('ADMIN_ADD_NEW_BANNER', '������ ������');
define('ADMIN_ADD_NEW_SLIDE', '������ �����');
define('ADMIN_ADD_NEW_IMAGE', '������ ����������');
define('ADMIN_ADD_NEW_VIDEO', '������ ����');
define('ADMIN_ADD_NEW_CURRENCY', '������ ������');
define('ADMIN_ADD_NEW_BRAND', '������ �����');
define('ADMIN_ADD_NEW_ATTR_GROUP', '������ �����');
define('ADMIN_ADD_NEW_ATTR', '������ �������');
define('ADMIN_ADD_NEW_FILTER', '������ ������');
define('ADMIN_ADD_NEW_OPTION', '������ �����');
define('ADMIN_ADD_NEW_USER', '������ �����������');

define('ADMIN_CREATING_NEW_PAGE', '��������� ���� �������');
define('ADMIN_CREATING_NEW_PRODUCT', '������� ��������� ������ ������');
define('ADMIN_CREATING_NEW_NEWS', '������� ��������� ���� ������');
define('ADMIN_CREATING_NEW_STOCK', '������� ��������� ���� �����');
define('ADMIN_CREATING_NEW_BANNER', '������� ��������� ������ �������');
define('ADMIN_CREATING_NEW_SLIDE', '������� ��������� ������ ������');
define('ADMIN_CREATING_NEW_IMAGE', '������� ��������� ������ ����������');
define('ADMIN_CREATING_NEW_VIDEO', '������� ��������� ������ �����');
define('ADMIN_CREATING_NEW_CURRENCY', '������� ��������� ���� ������');
define('ADMIN_CREATING_NEW_BRAND', '������� ��������� ������ ������');
define('ADMIN_CREATING_NEW_ATTR_GROUP', '������� ��������� ���� ����� ��������');
define('ADMIN_CREATING_NEW_ATTR', '������� ��������� ������ ��������');
define('ADMIN_CREATING_NEW_FILTER', '������� ��������� ������ �������');
define('ADMIN_CREATING_NEW_OPTION', '������� ��������� ���� ����� ������');
define('ADMIN_CREATING_NEW_USER', '�������� �������� ������ ������������');

define('ADMIN_EDIT_CATEGORY_PAGE', '����������� ��������');
define('ADMIN_EDIT_PRODUCT', '������� ����������� ������');
define('ADMIN_EDIT_NEWS', '������� ����������� ������');
define('ADMIN_EDIT_STOCK', '������� ����������� �����');
define('ADMIN_EDIT_BANNER', '������� ����������� �������');
define('ADMIN_EDIT_SLIDE', '������� ����������� ������');
define('ADMIN_EDIT_IMAGE', '������� ����������� ����������');
define('ADMIN_EDIT_VIDEO', '������� ����������� ����');
define('ADMIN_EDIT_CURRENCY', '������� ����������� ������');
define('ADMIN_EDIT_BRAND', '������� ����������� ������');
define('ADMIN_EDIT_ATTR_GROUP', '������� ����������� ����� ��������');
define('ADMIN_EDIT_ATTR', '������� ����������� ��������');
define('ADMIN_EDIT_FILTER', '������� ����������� �������');
define('ADMIN_EDIT_OPTION', '������� ����������� �����');
define('ADMIN_EDIT_USER', '������� ����������� �����������');

define('ADMIN_TOGGLE_FIELDS', '�i��������� ��i ����');
define('ADMIN_COPYRIGHT', 'WEBlife Content Management System');
define('ADMIN_AJAX_MODE', 'AJAX Mode!');
define('ADMIN_EDIT_PAGE', '����������� ������� �������');
define('ADMIN_MAIN_ROOT', '������');
define('ADMIN_MAIN_TITLE', '�������');
define('ADMIN_PATH', '����: ');
define('ADMIN_HELLO', '������������');
define('ADMIN_LIST_ITEMS', '������');
define('ADMIN_MODULE_ID_ERROR', '������ "%s" [%s] �� ������� �� � ����� ������� �� ���������� ������. ��� ��������� ������ ������ ��������� �������� ������ ���� � �������� �����. <a href="/admin/?module=main">������� &gt;</a>!');
define('ADMIN_MODULE_TABLE_ERROR', '������� ����� ������ "%s" [%s] �� ���� � ��� �����. ��� ��������� ������ ������ ��������� �������� �������� ���� ("%s") �������!');

define('PRODUCT_OPTIONS', '����� ������');
define('BANNERS', '������ �����');
define('BANNERS_TITLE', '�������� ������ �����');
define('BANNERS_PATH_TITLE', '������');
define('BY_LANG', '���������� ���������� �����');

define('CMS_TITLE', 'WEBlife CMS');
define('CMS_NAME', 'WEBlife Content Management System');

define('ADMINISTRATORS', '�������������');
define('USERS', '�����������');
define('CUSTOMERS', '�볺���');
define('CURRENCY', '������');
define('CURRENCY_CHANGE_ERROR', '������ �� ������� ������!');
define('COEFFICIENT', '����������');
define('CURRENCY_NAME_EXAMPLE', '(�����)');
define('CURRENCY_TITLE_EXAMPLE', '(������������ �����)');
define('CURRENCY_VIEW_DATA', '���� ��� �����������');
define('CURRENCY_CHANGE_DISABLE1', '������� ������, ������');
define('CURRENCY_CHANGE_DISABLE2', '��� ���������!');
define('CURRENCY_ONLY_ONE', 'ҳ���� ���� ������ ���� ���� �������� ���� 1!');
define('CURRENCY_DENY_SELECT', '���� ������ ���������, ���� �� �� ����� �������� "�� �������������"!');
define('CURRENCY_DENY_TURNOFF', '���� ������ ������� "�� �������������", ���� �� �� ����� ���������!');
define('CURRENCY_ONLY_ONE_EMPTY', '������� ���� ���� � ���� ������ � ������ 1');
define('CURRENCY_EMPTY_DEFAULT', '������� ������� ���� ������ � ������ 1 "�� �������������" ��� �����������');
define('CURRENCY_SELECT_DEFAULT', '������� ������� ���� � ���� ������ "�� �������������" ��� ����������� �� ����');
define('CURRENCY_EMPTY_PUBLISH', '��������� ����������� ���� � 1 ������!');
define('CURRENCY_UNPUBLISHED_DEFAULT_SELECT', '�� ����� ������������� ������ �������');
define('CURRENCY_SETTINGS', '������������');
define('RELATED_PRODUCTS', '����i ������');
define('PRODUCT_KITS', '���������');
define('PRODUCT_KIT_PREFIX', '��������');

define('FAQ_HEAD', '�������/³�����');
define('FAQ_TITLE', '������� �� ³�����');
define('FAQ_LIST_TITLE', '������ ��������/³�������');
define('FAQ_QUESTIONS', '�������');
define('FAQ_ANSWERS', '³�����');
define('FAQ_QUESTION_TITLE', '�������');
define('FAQ_ANSWER_TITLE', '³������');

define('ASK_QUESTION_TITLE', '��������� �������');
define('ASK_QUESTION_BY', '������� ����');

define('LABLE_SHOW_DIFFERENT', '�������� ������ �������');
define('LABLE_SHOW_ALL', '�������� ���');
define('LABEL_YOUR_DATA', '���� ����');
define('LABEL_YOUR_NAME', '���� ��\'�');
define('LABEL_YOUR_EMAIL', '��� E-mail');
define('LABEL_YOUR_QUESTION', '���� �������');
define('LABEL_YOUR_ANSWER', '���� �������');
define('LABEL_YOUR_AGE', '��� ��');
define('LABEL_CHILDREN', '������');
define('LABEL_CHILDREN_ABBV', 'ϲ� ������');
define('LABEL_CHILDREN_AGE', '³� ������');
define('LABEL_CHILDREN_GENDER', '����� ������');
define('LABEL_ENTER_ACCESS_CODE', '������ ��� �������');
define('LABEL_REQUIRE_INFO_TEXT', '���� ����\'����� ��� ����������');
define('LABEL_SHOW_INFO', '����������');
define('LABEL_HIDE_INFO', '�� ����������');
define('LABEL_SITE_LOCATION', '�� ����');
define('LABEL_SUBSCRIBE_TITLE', '%s �� ��������');
define('LABEL_SUBSCRIBE', 'ϳ��������');
define('LABEL_UNSUBSCRIBE', '�� ���������');
define('LABEL_SMSNOTIFY', '���������� ����������� �� SMS');
define('LABEL_HIDDEN_INFO_TITLE', '������� ����������');
define('LABEL_RESET', '��������');
define('LABEL_EXAMPLE', '���������');
define('LABEL_TODAY', '��������');
define('LABEL_YESTERDAY', '�����');
define('LABEL_PURCHASE', '������');
define('LABEL_SALES', '������');
define('LABEL_SEARCH_EXAMPLE', '��������� ����������������');
define('LABEL_CONTACTS_INFO', '��������� ����������');
define('LABEL_SELECT_CATEGORY', '������� ��������');
define('LABEL_SELECT_CURRENCY', '������� ������');
define('LABEL_SELECT_REGION', '������� �������');
define('LABEL_SELECT_SETTLEMENT', '������� �����');
define('LABEL_SELECTED_REGION', '������ �������');
define('LABEL_SELECTED_SETTLEMENT', '������ ����');
define('LABEL_AND_UNION', ' � ');
define('LABEL_OR_UNION', ' ��� ');
define('LABEL_FILTER', 'Գ����');
define('LABEL_INSTITUTION', '��������');
define('LABEL_SPECIALTY', '�������������');
define('LABEL_ADDRESS', '������');
define('LABEL_SELECT_DOCTOR', '������� �����');
define('LABEL_SELECT_GENDER', '������� �����');
define('LABEL_COMPANY_LIST', '�������� ������ ��������');
define('LABEL_STATIC', '��������');
define('LABEL_SPECIAL', '����������');
define('LABEL_CONTACTS', '��������');
define('LABEL_PORTFOLIO', '��������');
define('LABEL_GALLERY', '�������');
define('LABEL_VIDEO', '³���');
define('LABEL_WELCOME', '���������');
define('LABEL_CATALOG', '�������');
define('LABEL_PRODUCT_CATALOG', '������� ���������');
define('LABEL_PRICE', '�����');
define('LABEL_SERVICE', '�������');
define('LABEL_FLASH_VERSION', 'Flash-�����');
define('LABEL_HTML_VERSION', 'HTML-�����');
define('LABEL_CLEAR_TEMPLATES', '�������� �������');
define('LABEL_CLEAR_CASHING', '�������� ���');
define('LABEL_EXTRA_SYSTEM_SETTINGS', '�������� ������������ �������');
define('LABEL_QUESTION_TO_DO', '�� ��������');
define('LABEL_REPAIR_DB_TABLES', '³������� ���������� �������');
define('LABEL_OPTIMIZE_DB_TABLES', '����������� �������');
define('LABEL_SITE_CURRENCY', '������ �� ����');
define('LABEL_FILE_CURRENCY', '������ �����');
define('LABEL_ACTION', 'ĳ�');
define('LABEL_ACTIONS', 'ĳ�');
define('LABEL_DOWNLOAD_FORM', '����� ������������');
define('LABEL_DOWNLOADED_FILES', '������������ �����');
define('LABEL_UNSAVE_CHANGES', '�� ������ �������� ����');
define('LABEL_DELETE_FILE', '�� �������� �� ������ �������� ����');
define('LABEL_PRODUCTION', '���������');
define('LABEL_ARTICLE', '�������');
define('LABEL_BRAND', '��������');
define('LABEL_ATTRIBUTE', '�������');
define('LABEL_ATTRIBUTES', '��������');
define('LABEL_RANGE', 'ĳ������');
define('LABEL_MEASUREMENT_UNITS', '��.���.');
define('LABEL_GROUP', '�����');
define('LABEL_TYPE', '���');
define('LABEL_SECTION', '�����');
define('LABEL_FROM', '�');
define('LABEL_TO', '��');
define('LABEL_SELECT', '�������');
define('LABEL_ALL', '��');
define('LABEL_BY_KEYWORD', '�� �������� ������');
define('LABEL_BY_KEY_PHRASE', '�� �������� ������');
define('LABEL_FOUND', '��������');
define('LABEL_PRODUCT_S', '�����(��)');
define('LABEL_EXPORT', '�������');
define('LABEL_IMPORT', '������');
define('LABEL_IMPORT_FILES', '������ �����');
define('LABEL_DOWNLOAD_EXAMPLE_FILE', '����������� ������� �����');
define('LABEL_COUNT_RECORDS', '������');
define('LABEL_ITEM_UNACTIVE', '�� ��������');
define('LABEL_COPY', '��������');
define('LABEL_POPULAR', '���������');
define('LABEL_NEWEST', '���');
define('LABEL_EDIT', '����������');
define('LABEL_DELETE', '��������');
define('LABEL_UPGRADE_FLASH', '�� ������� ������� Flash ����!');
define('LABEL_SELECTIONS', '������');
define('LABEL_EMPTY_SELECTIONS', '���� ������. ��� ������ �����, ������������� �������!');
define('LABEL_FILTERS_MAIN_LIST', 'Գ����� (��������� ������)');
define('LABEL_FILTERS_SHORT_LIST', '������������ SEO ��� �������');
define('LABEL_FILTERS_THIRD_LEVEL_LIST', 'Գ����� (3-� ����� ����)');
define('LABEL_HIT', 'ճ� �������');

define('SITE_LANGUAGE', '����');
define('SITE_FOUND', '������');
define('CATALOG_SEARCH', '����� �� ��������');
define('SITE_SEARCH', '����� �� �����');
define('SITE_SEARCH_ENTER', '������ ������� �����');
define('SITE_SEARCH_RESULTS', '���������� ������');
define('SITE_CONTACTS', '���� ��������');
define('SITE_COUNT_RECORDS', '������ = ');
define('SITE_PAGE', '�������');
define('SITE_PAGES', '�������');
define('SITE_PAGER_ALL', '�������� ��');
define('SITE_PAGER_FIRST', '�����');
define('SITE_PAGER_LAST', '�������');
define('SITE_PAGER_PREV', '���������');
define('SITE_PAGER_NEXT', '��������');
define('SITE_PREV', '����������');
define('SITE_NEXT', '���������');
define('SITE_BACK', '�����');
define('SITE_FORWARD', '������');
define('NO_CONTENT', '���� ��������');

define('FEEDBACK', '��������� ��\'����');
define('COMMENTS', '��������');
define('POLLS', '����������');
define('QUOTES', '�����������');
define('ADD_COMMENT', '�������� ��������');
define('NO_COMMENTS', '�������� �������');

define('NO_RESULTS', 'ͳ���� �� ��������');
define('FOUND', '�������� �������');
define('FOUND_ERROR', '����������� ������� ��� ������! �������� ����� ������� ������ 3 � ����� �������!');

define('ACCESS_CODE', '��� �������');
define('ANNOUNCEMENTS', '������');
define('ARTICLES', '�����');
define('AUCTIONS', '������');
define('CATALOG', '������� ������');
define('CATALOGS', '��������');
define('CLIENTS', '�볺���');
define('PAGES', '�������');
define('MAIN_PAGE', '�������');
define('HOMESLIDER', '�������');
define('BRANDS', '���������');
define('ATTRIBUTES', 'A�������');
define('ATTRIBUTE_GROUPS', '����� �������i�');
define('FILTERS', '�i�����');
define('NEWS', '������');
define('VIDEOS', '³���');
define('ORDERS', '����������');
define('STOCKS', '�����');
define('BLOGNEWS', '�����');
define('PATIENTS', '��������');
define('PORTFOLIO', '��������');
define('PRICES', '������');
define('PRODUCTS', '������');
define('PRODUCTS_COMPARE', '��������');
define('SELECT_PRODUCTS_TO_COMPARE', '������� ������ ��� ���������');
define('TAGS_MENU', '���������� ������');
define('STATIC_BLOCKS', '�������� �����');
define('CATALOG_IMPORT', '������ ��������');
define('CATALOG_EXPORT', '������� ��������');
define('CATALOG_IMPORT_EXPORT', '������/������� ��������');
define('CATALOG_ADD_ATTRIBUTES', '������ ��������');
define('CATALOG_ATTRIBUTES_SELECT_GROUP', '������� ����� ��������');

define('COMM_NAME', '��\'�');
define('COMM_MSG', '�����������');
define('COMM_CODE', '��� ������������');
define('COMM_SEND', '³��������');
define('COMM_WRONG', '����-�����, ���������� ����� ����');
define('COMM_OK', '������. ���� ����������� �������� �� ���� �������� ���� �������� ��������������');
define('COMM_TIME', '���');

define('GALLERY', '�������');
define('GALLERIES', '������');

define('MEMBERS_MESSAGES', '����������� ������������');
define('MEMBERS_MESSAGES_ADD', '������ ���� �����������');
define('MEMBERS_MESSAGES_BODY', '����� �����');
define('MEMBERS_MESSAGES_UNSENDER', '³�������� �� �������');
define('MEMBERS_MESSAGES_UNRECEIVER', '��������� �� �������');
define('MEMBERS_MESSAGES_EMPTY', '� ������ ����� ���������� ����!');

define('MODULE_NOT_INIT_ERROR', '����� ������ �� �� �������� �� ��� ������ ������� � ��������� �����. ������ ���� ��������� �� ���������!');

define('MENU_TYPE_NOTDEFINED', '���� �� �������');
define('MENU_TYPE_MAIN', '������� ����');
define('MENU_TYPE_TOP', '������ ����');
define('MENU_TYPE_LEFT', '˳�� ����');
define('MENU_TYPE_BOTTOM', '����� ����');
define('MENU_TYPE_RIGHT', '����� ����');
define('MENU_TYPE_CATALOG', '������� ����');
define('MENU_TYPE_USER', '����������� ����');
define('MENU_TYPE_SYSTEM', '�������� ����');
define('MENU_TYPE_OTHER', '���� ����');

define('TOPLINK_PREVIEW_SITE', '��������');
define('TOPLINK_LOGOUT', '�����');
define('NOT_FOUND', '������� �� ��������');

define('TITLE_SETTINGS', '�������� ����������� �����');
define('TITLE_TAGS_MENU', '�������� ���� ����');
define('TITLE_STATIC_BLOCKS', '�������� ��������� �����');
define('TITLE_EDIT_PRIVATE_INFO', '����������� ��������� �����');
define('TITLE_EDIT_PAGE', '�����������');

define('ERROR_CURRENT_PASSWORD', '�� ����� �� ���������� �������� ������. <br/> ������ ���������� �������� ������ ��� ���������� �����!');
define('ERROR_CONFIRMED_PASSWORD', '����� ������������ ������ �� ������� ��������� ������! <br/> ���� �����, ������ ��������� � �������� ������!');
define('ERROR_SAVE_DATA', '���� ������ ���� �� ���� ���������. <br/> ��������� ������ ��� ��\'������ � �������������� ������ �����!');
define('ERROR_SAVE_DETAILS_DATA', '���� �������� ������ ���� �� ���� ���������. <br/> ��������� ������ ��� ��\'������ � �������������� ������ �����!');
define('ERROR_LIST_FIELDS_EMPTY', ' - �������');
define('ERROR_LIST_FIELDS_REQUIRED', '����� ���� ���� �� ���� ����������!');

define('TOPLINK_CURRENCY', '������');
define('TOPLINK_BANNERS', '������');
define('TOPLINK_SETTINGS', '������������');
define('TOPLINK_MYSQLDUMPER', '���� ��');
define('TOPLINK_USERS', '�����������');
define('TOPLINK_COMMENTUSERS', '�����������');
define('TOPLINK_MYCOMMENTUSERS', '�� �����������');
define('TOPLINK_USER', '̳� �������');

define('SETTINGS_WEBSITE', '����');
define('SETTINGS_OWNER', '�������');
define('SETTINGS_TITLE', '��������� �����');
define('SETTINGS_WEBSITE_NAME', 'Title �����');
define('SETTINGS_WEBSITE_SLOGAN', 'Slogan �����');
define('SETTINGS_WEBSITE_LOGO', '�������');
define('SETTINGS_COPYRIGHT', 'Copyright');
define('SETTINGS_WEBSITE_URL', 'Url �����');
define('SETTINGS_FIRST_NAME', '��\'�');
define('SETTINGS_LAST_NAME', '�������');
define('SETTINGS_EMAIL', 'E-mail');
define('SETTINGS_PHONE', 'Phone');
define('SETTINGS_ADDRESS', '������ �����');
define('SETTINGS_MENU', '��� ������ (������ ����� ����� ���� � ������ �����. ��� ��������� �����)');
define('SETTINGS_SITE_EMAIL', '������� email ������ ����� (��������������� �� ������� ������/�, ����� ����)');
define('SETTINGS_NOTIFY_EMAIL', 'Email ��� �������� ���������� (�� ���� ������� ������ ������������ �����������, ����� ����)');

define('USER_EXIT', '�����');
define('USER_HELLO', '³����');
define('USER_REGISTER_TITLE', '��������� �����������');
define('USER_LOGIN_TITLE', '����������� �����������');
define('USER_LOGOUT_TITLE', '������� ������� �����������');
define('USER_RECOVERY_TITLE', '³��������� ������ �����������');
define('USER_PROFILE', '̳� �������');
define('USER_PROFILE_EDIT', '���������� �������');
define('USER_PROFILE_TITLE', '������� �����������');
define('USER_ACCESS_CODE', '��� ������� �����������');
define('USER_REGISTER_ACCESS_CODE', '��� ������� ��� ���������');
define('USER_SHOW_DATA', '��������');
define('USER_TO_ACTIVATE_LIST', '������ ������������ ��� ���������');

define('USERS_TITLE', '�����������');
define('USERS_MAIN', '�������');
define('USERS_CREATE', '�������� �����������');
define('USERS_ADDNEW_TITLE', '��������� ������ �����������');
define('USERS_EDIT_TITLE', '����������� �����������');
define('USERS_ACTIVATION_VIEW', '�������� ��� ���������');

define('USERS_ENABLED', '��������');
define('USERS_EDIT', '������-<br/>����');
define('USERS_DELETE', '��������');
define('USERS_DENIED', '����������');
define('USERS_COUNT', '������ ������������');
define('USERS_LIST', '��������� ������ ������������');
define('USERS_OLD_PASS', '������ ������');
define('USERS_AUTO_PASS', '������������� ������');
define('USERS_COPY_PASS_BEFORE_SAVE', '����� ������������� �������� ������, �������� �������� ����!!!');
define('USERS_PASS_SET', '�����������');
define('USERS_PASS_NOT_SET', '�� �����������');

define('USERS_ACCESS', '������');
define('USERS_ACCESS_ADMINISTRATOR', '�������������');
define('USERS_ACCESS_MODERATOR', '���������');
define('USERS_ACCESS_USER', '�����������');

define('USERS_ID', 'id');
define('USERS_NAME', '�����');
define('USERS_SNAME', '�������');
define('USERS_FNAME', '��\'�');
define('USERS_MNAME', '�� �������');
define('USERS_MAIL', 'E-mail');
define('USERS_NETWORK', '���.������');
define('USERS_PHONE', '�������');
define('USERS_LOGIN', '����');
define('USERS_PASS', '������');
define('USERS_CONFPASS', '�������� ������');
define('USERS_PHOTO', '����');
define('USERS_REGION', '�������');
define('USERS_CITY', '̳���');
define('USERS_CURRENT_PASS', '�������� ������');
define('USERS_NEW_PASS', '����� ������');
define('USERS_MORE_INFO', '��������� ����������');
define('USERS_SUBSCRIBE', 'ϳ��������� �� ��������');
define('USERS_FULL_NAME', 'Բ�');
define('USERS_DESCR', '�������� ����');
define('USERS_CONFIRM_MAIL', 'E-mail �����������');
define('USERS_EMPTY_FILES', '���� �����');

define('USERS_ACTIVE', '�����-<br/>���');
define('USERS_NOACTIVE', '�� ��������');

define('USERS_ERROR_UPDATE_ENABLED', '�� ������� ������������ �����');
define('USERS_ERROR_DELETE', '�� ������� �������� �����');
define('USERS_ERROR_PASSWORDS', '������ ���� ����� ������ � ϳ����������� ������!');
define('USERS_ERROR_PASSWORDS_CONFIRM', '��� ����� ������ � ϳ����������� ������ ������ �� ���������!');
define('USERS_ERROR_NOCONFPASS', '��� ������ �� �����������. <br/> ���� �����, ������ ������ �� ��������� �� ���.');
define('USERS_ERROR_INSERT', '���� �����, ������');
define('USERS_ERROR_UPDATE', '������� ����������');
define('USERS_ERROR_INPUT_LOGIN', '������ ���� ����� ����. ���� �� ���� ����� 3 ������� ��������� [a-zA-Z0-9_-]!');
define('USERS_ERROR_LOGIN', '������ ����������! ������� ������� � ������� ����� ����� ��� ������!');
define('USERS_ERROR_MAX_WRONG_PASS', '�� ����� ������������ ������� ����������� ������!');
define('USERS_CHANGE_CURR_PASS', '��� ������ ����, ������ ���� ����� �������� ������!');
define('USERS_EMPTY_FIELDS', '��������� �� ����\'����� ����!');
define('USERS_CONFIRM_CHANGE_PASS', '�� ��������� ������ � ����� ������ ������ ����?');
define('USERS_COPY_PASS_FIRST', '�������� ��������� ����������� ����� ������ � ��������� ���� � ����� �����!');
define('USERS_GENERATE_PASS_ERROR', '������� ������� ��� ��������� ������!');

define('USERS_ADD_SUCCESS', '����� ���������� ��� ������� � ���� �����');
define('USERS_EDIT_SUCCESS', '������� ���� ������');

define('DATABASE_SUCCESS', '���� ������ ���������!');
define('DATABASE_UPDATE_SUCCESS', '���� ������ ��������!');
define('DATABASE_UPDATE_ERROR', '���� �� ���� ��������!');
define('ERROR_PLEASE_INSERT', '�� ��������� �������� ����:');
define('CONFIRM_USER_ACTIVATION', '�� ������ ������ ���������� ������ �����������? ����������� ������� �������� ������� �����!');
define('ACTIVATE', '����������');
define('CONFIRM_CLOSE_VIEW', '������� ��������� ��������?');
define('CLOSE_VIEW', '������� ��������');

define('BUTTON_SAVE', '��������');
define('BUTTON_CANCEL', '���������');
define('BUTTON_CHECK', '���������');
define('BUTTON_CONFIRM', 'ϳ���������');
define('BUTTON_CLEAR', '��������');
define('BUTTON_CLOSE', '�������');
define('BUTTON_EDIT', '����������');
define('BUTTON_EXIT', '�����');
define('BUTTON_RELOAD', '���������������');
define('BUTTON_UPDATE', '�������');
define('BUTTON_CREATE', '��������');
define('BUTTON_ADD', '������');
define('BUTTON_MORE', '����������');
define('BUTTON_SEARCH', '�����');
define('BUTTON_SELECT', '������');
define('BUTTON_DOWNLOAD', '�����������');
define('BUTTON_SEND', '��������');
define('BUTTON_FEEDBACK', '��������� ��\'����');
define('BUTTON_REGISTER', '��������������');
define('BUTTON_DETAIL', '�������� ����������');
define('BUTTON_ENTER', '����');
define('BUTTON_COPY', '��������');
define('BUTTON_SAVE_ADD', '�������� � ������');
define('BUTTON_APPLY', '�����������');
define('BUTTON_DELETE', '��������');

define('HEAD_SHOW_IN_CART', '�������� � ������');
define('HEAD_SHORT_TITLE', '������� �����');
define('HEAD_LINK_ADD_ITEM', '������ ���� �������');
define('HEAD_LINK_ADD_NEWS', '������ ������');
define('HEAD_LINK_AJAX_MANAGERS', 'Ajax ���������');
define('HEAD_LINK_SORTBY', '³���������� ��');
define('HEAD_LINK_SORT_NAME', '������');
define('HEAD_LINK_SORT_CODE', '��������');
define('HEAD_LINK_SORT_TITLE', '���������');
define('HEAD_LINK_SORTDATEADD', '�����');
define('HEAD_LINK_SORT_PRICE', '�����');
define('HEAD_LINK_SORT_TYPE', '�����');
define('HEAD_LINK_SORT_DEFAULT', '�������������');
define('HEAD_LINK_RECEIVED_LETTERS', '�������� �������� �����');
define('HEAD_LINK_SENT_LETTERS', '�������� ���������� �����');

define('HEAD_GROUP', '�����');
define('HEAD_ID', 'ID');
define('HEAD_NAME', '�����');
define('HEAD_COMPLETED', '���������');
define('HEAD_EMAIL', 'Email');
define('HEAD_PRODUCT', '�����');
define('HEAD_SORT', '����-<br/>���');
define('HEAD_CATEGORY', '��������');
define('HEAD_CREATED', '������');
define('HEAD_CODE', '�������');
define('HEAD_CURRENCY_CODE', '���');
define('HEAD_PRICE', 'ֳ��');
define('HEAD_PRICES', 'ֳ��');
define('HEAD_POPULAR', '����-<br/>�����');
define('HEAD_STOCK', '����-<br/>���');
define('HEAD_NEWEST', '���');
define('HEAD_DOCTOR', '˳���');
define('HEAD_PATIENT', '�������');
define('HEAD_CLIENT', '�볺��');
define('HEAD_CONTACTS', '��������');
define('HEAD_TIME', '���');
define('HEAD_DATE', '����');
define('HEAD_CREATED_DATE', '���� ���������<br/>(yyyy-mm-dd)');
define('HEAD_CREATED_TIME', '��� ���������<br/>(hh:mm:ss)');
define('HEAD_DATE_ADDED', '��������� <br/>(�.�.�&nbsp;�:�:�)');
define('HEAD_DATE_CHANGED', '������� <br/>(�.�.�&nbsp;�:�:�)');
define('HEAD_DATE_ADDED_SQL', '��������� <br/>(�.�.�&nbsp;�:�:�)');
define('HEAD_DATE_CHANGED_SQL', '������� <br/>(�.�.�&nbsp;�:�:�)');
define('HEAD_ONFRONTPAGE', '�� ����-<br/>����');
define('HEAD_PUBLICATION', '�����-<br/>�����');
define('HEAD_ARCHIVE', '�����');
define('HEAD_EDIT', '���-<br/>����');
define('HEAD_DELETE', '����-<br/>����');
define('HEAD_USERNAME', '����������');
define('HEAD_TITLE', '�����');
define('HEAD_OWNER', '�������');
define('HEAD_SENDER', '³��������');
define('HEAD_RECEIVER', '���������');
define('HEAD_LIMIT', '˳��');
define('HEAD_POSITION', '�������');
define('HEAD_MODULE', '������');
define('HEAD_QUANTITY', 'ʳ������');
define('HEAD_UNITS', '�������');
define('HEAD_NOTE', '�������');
define('HEAD_TARGET', '��������� ���������');
define('HEAD_HITS', 'ʳ��. ������');
define('HEAD_COUNT_HITS', 'Գ������� ������');
define('HEAD_MAX_HITS', '����������� ��. ������');
define('HEAD_CLICKS', 'ʳ��. ����');
define('HEAD_COUNT_CLICKS', 'Գ������� ����');
define('HEAD_MAX_CLICKS', '����������� ��. ����');
define('HEAD_XPOS', '������� �� ���������� (px)');
define('HEAD_YPOS', '������� �� �������� (px)');
define('HEAD_DEFAULT', '�� �������������');
define('HEAD_DEFAULT_4_CALC', '�� �������������<br/>��� �����������');
define('HEAD_DEFAULT_4_SHOW', '�� �������������<br/>��� �����������');
define('HEAD_COEFFICIENT', '����������');
define('HEAD_NOMINAL', '������');
define('HEAD_SIGN', '����');
define('HEAD_RATE', '����');
define('HEAD_DECIMALS', '���������� �����');
define('HEAD_DECIMALS_POINT', '��������� �����');
define('HEAD_THOUSAND_SEPARATOR', '��������� �����');
define('HEAD_TEMPLATE', '������');
define('HEAD_EXAMPLE', '�������');
define('HEAD_URL', '���������');
define('HEAD_IMAGE', '����������');
define('HEAD_SHOW', '��������');
define('HEAD_FILENAME', '����');
define('HEAD_TYPE', '���');
define('HEAD_GENDER', '�����');
define('HEAD_WEIGHT', '����');
define('HEAD_PRIORITY', '��������');
define('HEAD_SIGNIFICANCE', '���������');
define('HEAD_MORE_OPTIONS', '�������� ���������');
define('HEAD_AVAILABLE_ON_PAGES', '��������� �� ��������');

define('HEAD_FILES_MANAGER', '��������� �������');
define('HEAD_ATTRIBUTE_MANAGER', '��������� ����������');
define('HEAD_FILTERS_MANAGER', '��������� ���������');
define('HEAD_META_TEMPLATES', '������� ���������');
define('HEAD_PAGE_TYPE', '��� �������');
define('HEAD_MENU_TYPES', '��� ����');
define('HEAD_PUBLISH_PAGE', '������������');
define('HEAD_REDIRECT_LINK', '������� ������� ��� �������������');
define('HEAD_SWITCH', '�����������');
define('HEAD_EXTERNAL_LINK', '������ URL ��� �������������');
define('HEAD_CONTENT', '������ �����');
define('HEAD_PARENT', '������');
define('HEAD_PAGE_ACCESS', '������ �� �������');
define('HEAD_PAGE_IMAGE', '���������� �� �������');
define('HEAD_WIDTH', '������');
define('HEAD_HEIGHT', '������');
define('HEAD_META_NAME', 'META ��\'�');
define('HEAD_META_CONTENT', 'META �������');
define('HEAD_SEO_NAME', 'SEO ��\'�');
define('HEAD_SEO_CONTENT', 'SEO �������');
define('HEAD_KEYWORDS', '������ �����');
define('HEAD_DESCRIPTION', '����');
define('HEAD_ROBOTS', 'Robots');
define('HEAD_SEO_TITLE', 'SEO ���������');
define('HEAD_SEO_PATH', 'SEO ����');
define('HEAD_SEO_TEXT', 'SEO �����');
define('HEAD_LAST_UPDATE', '������� ���������');
define('HEAD_REDIRECT', '��������-<br/>�����');
define('HEAD_SUB_PAGES', '������� �������');
define('HEAD_APPLY_REORDER', '����������� ����������');
define('HEAD_DENIED', '--');
define('HEAD_SELECT_REDIRECT_LINK', '������� ��������� ��� �������������');
define('HEAD_SWITCH_TEXT_EDITOR', '��������/��������� ��������� ��������');
define('HEAD_SHOW_HIDE', '��������/����������');
define('HEAD_ROOT_LEVEL', '�����');
define('HEAD_INACTIVE', '�����');
define('HEAD_MODULE_NOT_SELECT', '������ �� �������');
define('HEAD_ALL_CHILD', '�� �������');
define('HEAD_APPLY_TO_ALL_CHILD', '���������� �� ��� �������� ��������!');
define('HEAD_FILE', '����');
define('HEAD_NOT_SELECT', '�� �������');
define('HEAD_GENERATE', '����������');
define('HEAD_COPY', '��������');
define('HEAD_NO_PUBLISH', '�� �����������');
define('HEAD_PUBLISH', '�����������');
define('HEAD_ADD_VIEW_SUB_PAGES', '������/����������� ������� �������');
define('HEAD_CLEAR', '��������');
define('HEAD_BANNER_IMAGE', '���������� �������');
define('HEAD_BANNER_TEXT', '����� �������');
define('HEAD_SELECT_FROM_LIST', '������� � ������');
define('HEAD_META_DATA', 'META ����');
define('HEAD_SEO_DATA', 'SEO ����');
define('HEAD_PAGE_IMAGE_PREVIEW', '����\'�');
define('HEAD_TITLE_REDIRECT', '�������������');
define('HEAD_SHORT_CONTENT', '�������� ����');
define('HEAD_ATTACH_FILE', '������ ����');
define('HEAD_ATTACH_FILES', '������ �����');
define('HEAD_ITEMS', '��-���');
define('HEAD_PRODUCT_CODE', '������� ������');
define('HEAD_PRODUCT_PRICE', 'ֳ��');
define('HEAD_PRODUCT_CPRICE', 'ֳ�� �� ��������');
define('HEAD_PRODUCT_DISCOUNT', '������ (%)');
define('HEAD_OPEN_MANAGER', '³������ ��������');
define('HEAD_FILES_MANAGER_ACCESS', '<b>"�������� �����"</b> �������� ����� ���� ��������� �����������');
define('HEAD_IMAGE_PARAMS', '��������� ����������');
define('HEAD_PAGE_SETTINGS', '������������ �������');

define('ALERT_EMPTY_PAGE_TITLE', '�� �� ����� ����� �������!');
define('STATUS_SEND', '³�������...');

define('OPTION_YES', '���');
define('OPTION_NO', 'ͳ');

define('TOTAL_PAGES', '������');
define('PAGER_PAGE', '�������');

// Forms
define('FEEDBACK_FIRST_NAME', "��'�");
define('FEEDBACK_LAST_NAME', '�������');
define('FEEDBACK_COUNTRY', '�����');
define('FEEDBACK_CITY', '̳���');
define('FEEDBACK_STREET', '������');
define('FEEDBACK_HOUSE', 'ĳ�');
define('FEEDBACK_APARTMENT', '��������');
define('FEEDBACK_APT', '��');
define('FEEDBACK_STATE', '�����');
define('FEEDBACK_TEL', '�������');
define('FEEDBACK_FAX', '����');
define('FEEDBACK_EMAIL', 'E-mail');
define('FEEDBACK_ADDRESS', '������');
define('FEEDBACK_CODE', '���');
define('FEEDBACK_CODE_CASE', '������� ��������� �������');
define('FEEDBACK_CONFIRMATION_CODE', '��� ������������');
define('FEEDBACK_STRING_TEXT', '����� �����');
define('FEEDBACK_FILLING', "����'������ �� ����������");
define('FEEDBACK_STRING_SEND', '³��������');
define('FEEDBACK_ALERT_ERROR', '���������, ���� �����, �� ����\'����� ����!');
define('FEEDBACK_STRING_SEND_ERROR', '��� ����� ��������� �� �������!');
define('FEEDBACK_MESSAGE_SEND_ERROR', '���� ����������� ��������� �� �������');
define('FEEDBACK_ERROR_INPUT_STRING', '���� �����, ������:');
define('FEEDBACK_ERROR_INPUT_EMAIL', '���� �����, ������ ��������� e-mail');
define('FEEDBACK_STRING_SEND_EMAIL', '������, ���� ����������� ����������');
define('FEEDBACK_HEADER_SEND_LINK', '³������� ����');
define('FEEDBACK_RECIPIENT_NAME', '��\'� ����������');
define('FEEDBACK_EMAIL_ERROR', '������, ���� �����, ��������� ���������� ������!');
define('FEEDBACK_EMAIL_MULTI_ERROR', '�� ����� ������� ���� ������ ������ email. ��� �� ����� ����������� email ������!');
define('FEEDBACK_EMAIL_RESEND_ERROR', '�������. �� �������� ���������� ��������� � � ����!');

define('ORDER_FIRST_NAME', "��\'�");
define('ORDER_COMMENT', '��������� �� ����������');
define('ORDER_COUNTRY', '�����');
define('ORDER_CITY', '̳���');
define('ORDER_STREET', '������');
define('ORDER_HOUSE', '�������');
define('ORDER_APARTMENT', '��������');
define('ORDER_APT', '��');
define('ORDER_STATE', '�����');
define('ORDER_TEL', '�������');
define('ORDER_FAX', '����');
define('ORDER_EMAIL', 'E-mail');
define('ORDER_ADDRESS', '������');
define('ORDER_CODE', '���');
define('ORDER_CODE_CASE', '���i���o��������� �������');
define('ORDER_CONFIRMATION_CODE', '��� ������������');
define('ORDER_STRING_TEXT', '����� �����');
define('ORDER_FILLING', "���������� �� ����������");
define('ORDER_STRING_SEND', '���i�����');
define('ORDER_ALERT_ERROR', '���������, ����-�����, �� ��������� ����!');
define('ORDER_STRING_SEND_ERROR', '��� ����� �� ������� ���������');
define('ORDER_MESSAGE_SEND_ERROR', '���� ����������� �� ������� ���������');
define('ORDER_ERROR_INPUT_STRING', '����-�����, ������:');
define('ORDER_ERROR_INPUT_EMAIL', '����-�����, ������ ��������� e-mail');
define('ORDER_STRING_COMPLETE', '���� ���������� ��������!');
define('ORDER_HEADER_SEND_LINK', '³������� ���������');
define('ORDER_EMAIL_ERROR', '������, ����-�����, ��������� ���������� ������!');
define('ORDER_EMAIL_MULTI_ERROR', '������� ������� ���� ��� ���� email. ��� �� ����� ������������ email!');
define('ORDER_EMAIL_RESEND_ERROR', '�������. �� �������� ���������� ��������� � � ��� ����!');
define('ORDER_FILL_REQUIRED_FIELD', '��������� ��������� ���� "%s"');
define('NEW_ORDER_COMPLETED', '���� ���������� �%s ��������');
define('NEW_ORDER_NUMBER', '���� ���������� �%s');
define('ORDER_CONFIRM_LETTER_NOT_SEND', '�� ����������');
define('ORDER_CONFIRM_LETTER_SEND', '����������');
define('ORDER_CONFIRM_LETTER_ERROR', '<font color="red">���������� ���������, ��� ��� ����� �� ��������</font>');
define('ORDER_STATUS_CHANGED', '������� ������ ��');
define('ORDER_PAYMENT_CHANGED', '������� ������ ������ ��');
define('ORDER_SEND_CONFIRM', '�������� �����������');
define('ORDER_CONFIRMATION_SUBJECT', '������������ ����������');

define('FEEDBACK_MESSAGE_FROM', '����������� � "%s" �����');
define('FEEDBACK_CONFIRM_REQUIRED_FIELD', 'ϳ�������� ���� "%s"!');
define('FEEDBACK_FILL_REQUIRED_FIELD', '��������� ���� "% s "!');
define('FEEDBACK_FILL_REQUIRED_FIELD_CORRECT', '��������� �������� ���� "% s "!');
define('FEEDBACK_FILL_OUT_FORM', '��������� ������ �����������');
define('FEEDBACK_SEND_FORM', '³�������� ������');
define('FEEDBACK_PERSONAL_DATA', '����������� ����');
define('FEEDBACK_SKYPE', 'Skype');
define('FEEDBACK_YEAR', 'г�');
define('FEEDBACK_MONTH', '̳����');
define('FEEDBACK_DAY', '����');
define('FEEDBACK_COMPANY_NAME', '����� ��������');
define('FEEDBACK_COMPANY_ADD_MORE', '������ �� ���� ��������');
define('FEEDBACK_MORE_INFO', '��������� ����������');
define('FEEDBACK_SELECT_EMPTY', '---');
define('FEEDBACK_GENDER', '�����');
define('FEEDBACK_AGE', '³�');

define('COMPILE_SYSTEM_ERROR', '������� ������� ��� ��������� "%s"!');
define('ACCESS_SYSTEM_ERROR', '������� �������');
define('ACCESS_PAGE_ERROR', '������ �� ���� ������� ��������.');
define('ENTER_SYSTEM_ERROR', '������� ������� � ������');
define('ENTER_INPUT_ERROR', '�������� "%s" �������!');
define('TRY_AGAIN_ACTION', '���������� �� ���');
define('TRY_AGAIN_TITLE', '��������� �� ���');
define('TRY_AGAIN_AFTER_TITLE', '��������� �� ��� �����');
define('GENDER_NO_METTER', '���������');
define('GENDER_FEMALE', 'Ƴ�����');
define('GENDER_MALE', '�������');
define('AGE_FROM', '�');
define('AGE_TO', '��');

define('FILES_UPLOAD', '������������ ����� � 䳺�');
define('FILES_UPLOAD_ERROR_JAVASCRIPT', '� ��� �������� � ����� javascript!');
define('FILES_UPLOAD_FILE_TITLE', '������� ����');
define('FILES_UPLOAD_MULTIPLE_SELECT_FILES', '���� �����');
define('FILES_UPLOADIFY_ADDED', '������ �����');
define('FILES_UPLOADIFY_CLEAR', '��������');
define('FILES_UPLOADIFY_DOWNLOAD', '�����������');

define('WEBLIFE_CREATED_BY', '��������� ���-����� ���');
define('WEBLIFE_COPYRIGHT', '��������� web ����� WebLife&trade;');
define('WEBLIFE_PROJECT_COPYRIGHT', '��������� ��������-������� WebLife&trade;');
define('WEBLIFE_COPYRIGHT_SIMPLE', '��������� ����� ³�����');
define('WEBLIFE_DEVELOPED', 'C��� �����������');

define('WORK_AREA', '������ ����');
define('WORK_AREA_NO_CONTENT', '������� � ���䳿 ����������!');
define('URL_GALLERY_BACK', '����������� � �������');
define('URL_NEWS_BACK', '����������� �� ������ �����');
define('URL_BACK_TO_LIST', '����������� �� ������');
define('URL_TO_SITE', '������� �� �����');
define('URL_TO_SECTION', '������� � �����');
define('URL_TO_EXIT', '�����');
define('URL_LINK_FULL_SCREEN', '������ �����');
define('URL_LINK_NORMAL_SCREEN', '���������� �����');
define('URL_LINK_HTML_VERSION', 'HTML �����');
define('SORT_BY', '����������');
define('SORT_BY_DATE', '����');
define('SORT_BY_EXT', '���');
define('SORT_BY_NAME', '��\'�');
define('SORT_BY_SIZE', '�����');
define('STR_FILE_SIZE_KB', '��');
define('STR_FILE_SIZE_MB', '��');

define('CATALOG_REPRICE', '����� ���');
define('CATALOG_REPRICE_TITLE', '��������� ����� ���');
define('CATALOG_REPRICE_FROM', '������� �');
define('CATALOG_REPRICE_TO', '������� ��');
define('CATALOG_REPRICE_UPDATED', '���� �������� ��\'����: <u>%s</u>!');
define('CATALOG_REPRICE_CHANGES', '��������� ���� <u>%s</u> �� ���� <u>%s</u> !');
define('CATALOG_REPRICE_WARNING', '�� �������� ��������� ������ ���� ������. ���������� �� ������! ������ ��������!');

define('RECOVERY_TITLE', '³������� ������');
define('RECOVERY_CODE', '���');
define('RECOVERY_SUBJECT_CODE', '³��������� ������ �����������, ������������');
define('RECOVERY_SUBJECT_PASS', '³��������� ������ �����������, ������');
define('RECOVERY_SEND_CODE', '��� �� e-mail �������� ����������� � ����� ������������� ������. ������������ ���������� �������� � �����!');
define('RECOVERY_SEND_PASS', '��� �� e-mail ���������� ����������� � ����� �������. ������������ ���������� �������� � �����!');
define('RECOVERY_SEARCH_ERROR', '����������� �� ������� ������ �� ���������� ���� ������! �������� �� �����������.');
define('RECOVERY_ENTER_CODE', '������, ���� �����, ��� ������������, ����������� �� ��� E-mail');
define('RECOVERY_ENTER_CODE_ERROR', '������� ���, ��� ����� 䳿 ���� ������������!');

define('REGISTER_STEP_NUMBER', '���� �');
define('REGISTER_CODE', '���');
define('REGISTER_FILL_FIELD', '���������, ���� �����, ���� �����');
define('REGISTER_LOGIN_UNIQUE_ERROR', '�������� ���� ���� %s ��� ������ ��������, ���������� ����� ����');
define('REGISTER_EMAIL_UNIQUE_ERROR', '�������� ���� e-mail %s ��� �������������. ������������� ����������� ������.');
define('REGISTER_SUBJECT_CONFIRM', 'ϳ����������� ��������� �����������');
define('REGISTER_SUBJECT_SUCCSESS', '������ ���������');
define('REGISTER_SEND_CONFIRMCODE', '��� �� e-mail ����������� ��� ��� ������������ ���������. ������������ ���������� �������� � �����!');
define('REGISTER_ENTER_CONFIRMCODE', '������, ���� �����, ��� ������������ ��������� ����������� �� ��� E-mail');
define('REGISTER_CONFIRM_ERROR_DATA', '��� �� ��� ����� ���� ���� � �������. ���������� �� ������������� ����� ��� � ����� ���������� ���� ���������!');
define('REGISTER_ENTER_CODE_ERROR', '������� ��� ������������ ���������!');
define('REGISTER_SEND_SUCCSESS', '���� ���� ������ ��������� � ����������!');
define('REGISTER_SUCCSESS_TEXT', '��������� ������� ������. <br/>��� �������� ������ ��� ��������� ��������������');

define('BANNER_TITLE_EMPTY', '�� �� ����� �����!');
define('BANNER_POSITION_EMPTY', '�� �� ������� �������!');
define('BANNER_MODULE_EMPTY', '�� �� ������� ������!');
define('WELCOME_TO_ADMIN', '������� ������� �� ���� ����!');

define('CONFIRM_COPY', '��������� ���� �������?');
define('CONFIRM_EMPTY', '������ ��������?');
define('CONFIRM_NOT_SAVE', '�� ������ �������� ����?');
define('CONFIRM_DELETE', '�� ��������? ������� � ��� ����������, �� �� ���������, ���� �������� �������� � ��� ���!');
define('CONFIRM_CHANGE_MENU_TYPE', '������ ��� ����?');
define('CONFIRM_CHANGE_PAGE_TYPE', '������ ��� �������?');
define('CONFIRM_DELETE_CAT', '�� ��������? �������, ��� ����������, �� �� ���������, �� �� ������� ������� ���enm �������� �������� � ��� ���!');

define('SELECTIONS', '������');
define('COMPARE_LIST', '������ ���������');
define('SHOPPING_LIST', '������ �������');
define('ADD_TO_WISHLIST', '� ������ �������');
define('IN_WISHLIST', '� ������ �������');
define('WISHLIST_REMOVE_ALL', '������� ������ �������');

define('ADD_TO_COMPARE', '� ������ ���������');
define('IN_COMPARE', '� ������ ���������');
define('SITE_CURRENCY', '���');
define('BUY', '������');
define('IN_CART', '��� � ������');

define('LABEL_ON', '��������');
define('SELECTED_FILTERS', '������ �������');
define('REMOVE_ALL_FILTERS', '�������� �� �������');