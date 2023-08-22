<?php

namespace App\Enum\Plan;

use App\Enum\Traits\EnumToArray;

enum LocaleEnum: string
{
    use EnumToArray;

    case ar_SA = 'ar-SA';
    case bn_BD = 'bn-BD';
    case bn_IN = 'bn-IN';
    case cs_CZ = 'cs-CZ';
    case da_DK = 'da-DK';
    case de_AT = 'de-AT';
    case de_CH = 'de-CH';
    case de_DE = 'de-DE';
    case el_GR = 'el-GR';
    case en_AU = 'en-AU';
    case en_CA = 'en-CA';
    case en_GB = 'en-GB';
    case en_IE = 'en-IE';
    case en_IN = 'en-IN';
    case en_NZ = 'en-NZ';
    case en_US = 'en-US';
    case en_ZA = 'en-ZA';
    case es_AR = 'es-AR';
    case es_CL = 'es-CL';
    case es_CO = 'es-CO';
    case es_ES = 'es-ES';
    case es_MX = 'es-MX';
    case es_US = 'es-US';
    case fi_FI = 'fi-FI';
    case fr_BE = 'fr-BE';
    case fr_CA = 'fr-CA';
    case fr_CH = 'fr-CH';
    case fr_FR = 'fr-FR';
    case he_IL = 'he-IL';
    case hi_IN = 'hi-IN';
    case hu_HU = 'hu-HU';
    case id_ID = 'id-ID';
    case it_CH = 'it-CH';
    case it_IT = 'it-IT';
    case ja_JP = 'ja-JP';
    case ko_KR = 'ko-KR';
    case nl_BE = 'nl-BE';
    case nl_NL = 'nl-NL';
    case no_NO = 'no-NO';
    case pl_PL = 'pl-PL';
    case pt_BR = 'pt-BR';
    case pt_PT = 'pt-PT';
    case ro_RO = 'ro-RO';
    case ru_RU = 'ru-RU';
    case sk_SK = 'sk-SK';
    case sv_SE = 'sv-SE';
    case ta_IN = 'ta-IN';
    case ta_LK = 'ta-LK';
    case th_TH = 'th-TH';
    case tr_TR = 'tr-TR';
    case zh_CN = 'zh-CN';
    case zh_HK = 'zh-HK';
    case zh_TW = 'zh-TW';
}
