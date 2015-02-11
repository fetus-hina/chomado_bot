<?php
/**
 * @author chomado <chomado@gmail.com>
 * @copyright 2015 by chomado <chomado@gmail.com>
 * @license https://github.com/chomado/chomado_bot/blob/master/LICENSE MIT
 */

namespace bot\weather;

/**
 * 天気辞書クラス
 */
class Dictionary {
    /**
     * 天気コード→天気表記マップ
     *
     * @var array
     * @link https://developer.yahoo.com/weather/documentation.html
     */
	private static $dictionary = [
        "竜巻",                     // 0   tornado
        "台風",                     // 1   tropical storm
        "ハリケーン",               // 2   hurricane
        "激しい雷雨",               // 3   severe thunderstorms
        "雷雨",                     // 4   thunderstorms
        "雪混じりの雨",             // 5   mixed rain and snow
        "みぞれ混じりの雨",         // 6   mixed rain and sleet
        "みぞれ混じりの雪",         // 7   mixed snow and sleet
        "着氷性の霧雨",             // 8   freezing drizzle
        "霧雨",                     // 9   drizzle
        "着氷性の雨",               // 10  freezing rain
        "にわか雨",                 // 11  showers
        "にわか雨",                 // 12  showers
        "雪の突風",                 // 13  snow flurries
        "時々雪",                   // 14  light snow showers
        "吹雪",                     // 15  blowing snow
        "雪",                       // 16  snow
        "雹",                       // 17  hail
        "みぞれ",                   // 18  sleet
        "ほこり",                   // 19  dust
        "霧",                       // 20  foggy
        "靄",                       // 21  haze
        "埃っぽい",                 // 22  smoky
        "荒れ模様",                 // 23  blustery
        "強風",                     // 24  windy
        "寒い",                     // 25  cold
        "曇り",                     // 26  cloudy
        "おおむね曇り(夜)",         // 27  mostly cloudy (night)
        "おおむね曇り(昼)",         // 28  mostly cloudy (day)
        "ところにより曇り(夜)",     // 29  partly cloudy (night)
        "ところにより曇り(昼)",     // 30  partly cloudy (day)
        "快晴(夜)",                 // 31  clear (night)
        "陽気な晴れ",               // 32  sunny
        "晴れ(夜)",                 // 33  fair (night)
        "晴れ(昼)",                 // 34  fair (day)
        "雨と雹",                   // 35  mixed rain and hail
        "暑い",                     // 36  hot
        "局地的に雷雨",             // 37  isolated thunderstorms
        "ところにより雷雨",         // 38  scattered thunderstorms
        "ところにより雷雨",         // 39  scattered thunderstorms
        "ところによりにわか雨",     // 40  scattered showers
        "大雪",                     // 41  heavy snow
        "吹雪",                     // 42  scattered snow showers
        "大雪",                     // 43  heavy snow
        "ところにより曇り",         // 44  partly cloudy
        "雷雨",                     // 45  thundershowers
        "吹雪",                     // 46  snow showers
        "ところにより雷雨",         // 47  isolated thundershowers
        3200 => "(サービス停止中)"  // 3200    not available
    ];
    
    /**
     * 天気コード・英語表記から日本語表記された天気を返す
     *
     * コードに存在すれば対応する日本語を、存在しなければ英語ベースの表記を返す
     *
     * @param   int     $code       天気コード
     * @param   string  $english    英語表記された天気
     * @return  string
     * @link    https://developer.yahoo.com/weather/documentation.html
     */
    public static function GetJapanese($code, $english)
    {
        return isset(self::$dictionary[$code])
            ? self::$dictionary[$code]
            : sprintf('%2$s (?%1$d?)', $code, $english);
    }
}
