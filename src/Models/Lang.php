<?php

namespace LaravelCMS\Models;

use LaravelCMS\Models\LaravelCMSModel as Model;

class Lang extends Model
{
    protected $table = 'langs';

    protected $fillable = [
        'name',
        'locale',
        'position',
    ];

    const FR = 'fr';
    const EN = 'en';
    const ES = 'es';
    const DE = 'de';
    const IT = 'it';
    const PT = 'pt';
    const NL = 'nl';
    const RU = 'ru';
    const ZH = 'zh';
    const JA = 'ja';
    const AR = 'ar';
    const HI = 'hi';
    const BN = 'bn';
    const UR = 'ur';
    const FA = 'fa';
    const TR = 'tr';
    const VI = 'vi';
    const KO = 'ko';
    const TH = 'th';
    const ID = 'id';
    const MS = 'ms';
    const TL = 'tl';
    const MY = 'my';
    const KM = 'km';
    const LO = 'lo';
    const NE = 'ne';
    const SI = 'si';
    const MN = 'mn';
    const UZ = 'uz';
    const KK = 'kk';
    const KY = 'ky';
    const TK = 'tk';
    const TG = 'tg';
    const PS = 'ps';
    const SD = 'sd';
    const MR = 'mr';
    const GU = 'gu';
    const OR = 'or';
    const KN = 'kn';
    const TA = 'ta';
    const TE = 'te';
    const ML = 'ml';

    public static function findByLocale(string $locale): ?self
    {
        return self::where('locale', $locale)->first();
    }
}
