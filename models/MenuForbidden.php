<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "food_forb".
 *
 * @property int $id
 * @property string $snils
 * @property int $borsh
 * @property int $sup_goroh
 * @property int $sup_faso
 * @property int $sup_chec
 * @property int $sup_rise
 * @property int $sup_lap
 * @property int $sup_hinkal
 * @property int $gulyash
 * @property int $file_kur
 * @property int $kuritca_jar
 * @property int $kotlet_kurin
 * @property int $pechen_jar
 * @property int $riba_jar
 * @property int $pechen_ovosh
 * @property int $plov_gov
 * @property int $ragu_kur
 * @property int $kar_pure
 * @property int $verm_tur
 * @property int $rise_ovosh
 * @property int $kart_derev
 * @property int $makaron
 * @property int $kasha_grech
 * @property int $kasha_pshen
 * @property int $kompot
 * @property int $chay
 * @property int $kakao
 * @property int $kisel
 * @property int $alyen_bol
 * @property int $alyen_mal
 * @property int $baunti
 * @property int $vkusno_sok
 * @property int $voda_gorn
 * @property int $voda_gorn_lim
 * @property int $voda_pill
 * @property int $egurt_mol_kok
 * @property int $keks_tortini
 * @property int $kitkat_4
 * @property int $kitkat_mal
 * @property int $kruasan_pifpaf
 * @property int $kruasan_mini
 * @property int $mendi_banka
 * @property int $mendi_plast
 * @property int $milka_plit_chok
 * @property int $milka_pech
 * @property int $milkyway
 * @property int $neskvik_plit
 * @property int $pechen_oreo_big
 * @property int $pechen_oreo_small
 * @property int $snikers
 * @property int $sok_kebga
 * @property int $sok_sadi_kubtreug
 * @property int $sok_sadi_kub
 * @property int $solomka_sol
 * @property int $chocopie_upac
 * @property int $chocopie_1
 * @property int $nestle_plit
 * @property int $choco_rus
 */
class MenuForbidden extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'food_forb';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
//            [['snils', 'borsh', 'sup_goroh', 'sup_faso', 'sup_chec', 'sup_rise', 'sup_lap', 'sup_hinkal', 'gulyash', 'file_kur', 'kuritca_jar', 'kotlet_kurin', 'pechen_jar', 'riba_jar', 'pechen_ovosh', 'plov_gov', 'ragu_kur', 'kar_pure', 'verm_tur', 'rise_ovosh', 'kart_derev', 'makaron', 'kasha_grech', 'kasha_pshen', 'kompot', 'chay', 'kakao', 'kisel'], 'required'],
            [['snils'], 'required'],
//            [['borsh', 'sup_goroh', 'sup_faso', 'sup_chec', 'sup_rise', 'sup_lap', 'sup_hinkal', 'gulyash', 'file_kur', 'kuritca_jar', 'kotlet_kurin', 'pechen_jar', 'riba_jar', 'pechen_ovosh', 'plov_gov', 'ragu_kur', 'kar_pure', 'verm_tur', 'rise_ovosh', 'kart_derev', 'makaron', 'kasha_grech', 'kasha_pshen', 'kompot', 'chay', 'kakao', 'kisel', 'alyen_bol', 'alyen_mal', 'baunti', 'vkusno_sok', 'voda_gorn', 'voda_gorn_lim', 'voda_pill', 'egurt_mol_kok', 'keks_tortini', 'kitkat_4', 'kitkat_mal', 'kruasan_pifpaf', 'kruasan_mini', 'mendi_banka', 'mendi_plast', 'milka_plit_chok', 'milka_pech', 'milkyway', 'neskvik_plit', 'pechen_oreo_big', 'pechen_oreo_small', 'snikers', 'sok_kebga', 'sok_sadi_kubtreug', 'sok_sadi_kub', 'solomka_sol', 'chocopie_upac', 'chocopie_1', 'nestle_plit', 'choco_rus'], 'integer'],
            [['borsh', 'sup_goroh', 'sup_faso', 'sup_chec', 'sup_rise', 'sup_lap', 'sup_hinkal', 'gulyash', 'file_kur', 'kuritca_jar', 'kotlet_kurin', 'pechen_jar', 'riba_jar', 'pechen_ovosh', 'plov_gov', 'ragu_kur', 'kar_pure', 'verm_tur', 'rise_ovosh', 'kart_derev', 'makaron', 'kasha_grech', 'kasha_pshen', 'kompot', 'chay', 'kakao', 'kisel', 'alyen_bol', 'alyen_mal', 'baunti', 'vkusno_sok', 'voda_gorn', 'voda_gorn_lim', 'voda_pill', 'egurt_mol_kok', 'keks_tortini', 'kitkat_4', 'kitkat_mal', 'kruasan_pifpaf', 'kruasan_mini', 'mendi_banka', 'mendi_plast', 'milka_plit_chok', 'milka_pech', 'milkyway', 'neskvik_plit', 'pechen_oreo_big', 'pechen_oreo_small', 'snikers', 'sok_kebga', 'sok_sadi_kubtreug', 'sok_sadi_kub', 'solomka_sol', 'chocopie_upac', 'chocopie_1', 'nestle_plit', 'choco_rus'], 'safe'],
            [['snils'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'snils' => 'Snils',
            'borsh' => 'Борщ',
            'sup_goroh' => 'Суп гороховый',
            'sup_faso' => 'Суп фасолевый',
            'sup_chec' => 'Суп крем чечевичный',
            'sup_rise' => 'Суп рисовый',
            'sup_lap' => 'Суп лапша домашняя',
            'sup_hinkal' => 'Суп хинкал',
            'gulyash' => 'Гуляш из говядины',
            'file_kur' => 'Филе куриное в соусе',
            'kuritca_jar' => 'Курица жаренная',
            'kotlet_kurin' => 'Котлеты куринные',
            'pechen_jar' => 'Печень жаренная',
            'riba_jar' => 'Рыба жаренная',
            'pechen_ovosh' => 'Печень с овощами',
            'plov_gov' => 'Плов с говядиной',
            'ragu_kur' => 'Овощное рагу с курицей',
            'kar_pure' => 'Картофельное пюре',
            'verm_tur' => 'Вермишель по турецки',
            'rise_ovosh' => 'Рис с овощами',
            'kart_derev' => 'Картофель по деревенски',
            'makaron' => 'Макароны',
            'kasha_grech' => 'Каша гречневая',
            'kasha_pshen' => 'Каша пшеничная',
            'kompot' => 'Компот',
            'chay' => 'Чай',
            'kakao' => 'Какао',
            'kisel' => 'Кисель',
            'alyen_bol' => 'Аленка большая',
            'alyen_mal' => 'Аленка маленькая',
            'baunti' => 'Баунти',
            'vkusno_sok' => 'Вкусно Сок',
            'voda_gorn' => 'Вода "Горная"',
            'voda_gorn_lim' => 'Вода "Горная" Лимонная',
            'voda_pill' => 'Вода "Пилигримм"',
            'egurt_mol_kok' => 'Йогурт молочный коктейль',
            'keks_tortini' => 'Кекс "Тортини"',
            'kitkat_4' => 'Кит-Кат 4 батончика',
            'kitkat_mal' => 'Кит-Кат маленький',
            'kruasan_pifpaf' => 'Круасан "Пиф-паф"',
            'kruasan_mini' => 'Круасаны Мини',
            'mendi_banka' => 'Менди банка',
            'mendi_plast' => 'Менди пластиковая',
            'milka_plit_chok' => 'Милка шоколадная плитка',
            'milka_pech' => 'Милка-Печенье',
            'milkyway' => 'Милки-Вей',
            'neskvik_plit' => 'Несквик шоколадная плитка',
            'pechen_oreo_big' => 'Печенье Орео большое',
            'pechen_oreo_small' => 'Печенье Орео маленькое',
            'snikers' => 'Сникерс',
            'sok_kebga' => 'Сок "Кенга"',
            'sok_sadi_kubtreug' => 'Сок "Сады Кубани треуг"',
            'sok_sadi_kub' => 'Сок "Сады Кубани"',
            'solomka_sol' => 'Соломка соленая',
            'chocopie_upac' => 'Чоко пай упаковка',
            'chocopie_1' => 'Чоко пай штучно',
            'nestle_plit' => 'Нестле шоколадная плитка',
            'choco_rus' => 'Шоколад Российский',
        ];
    }

//    public function attributeLabels()
//    {
//        return [
//            'id' => '',
//            'snils' => '',
//            'borsh' => '',
//            'sup_goroh' => '',
//            'sup_faso' => '',
//            'sup_chec' => '',
//            'sup_rise' => '',
//            'sup_lap' => '',
//            'sup_hinkal' => '',
//            'gulyash' => '',
//            'file_kur' => '',
//            'kuritca_jar' => '',
//            'kotlet_kurin' => '',
//            'pechen_jar' => '',
//            'riba_jar' => '',
//            'pechen_ovosh' => '',
//            'plov_gov' => '',
//            'ragu_kur' => '',
//            'kar_pure' => '',
//            'verm_tur' => '',
//            'rise_ovosh' => '',
//            'kart_derev' => '',
//            'makaron' => '',
//            'kasha_grech' => '',
//            'kasha_pshen' => '',
//            'kompot' => '',
//            'chay' => '',
//            'kakao' => '',
//            'kisel' => '',
//            'alyen_bol' => '',
//            'alyen_mal' => '',
//            'baunti' => '',
//            'vkusno_sok' => '',
//            'voda_gorn' => '',
//            'voda_gorn_lim' => '',
//            'voda_pill' => '',
//            'egurt_mol_kok' => '',
//            'keks_tortini' => '',
//            'kitkat_4' => '',
//            'kitkat_mal' => '',
//            'kruasan_pifpaf' => '',
//            'kruasan_mini' => '',
//            'mendi_banka' => '',
//            'mendi_plast' => '',
//            'milka_plit_chok' => '',
//            'milka_pech' => '',
//            'milkyway' => '',
//            'neskvik_plit' => '',
//            'pechen_oreo_big' => '',
//            'pechen_oreo_small' => '',
//            'snikers' => '',
//            'sok_kebga' => '',
//            'sok_sadi_kubtreug' => '',
//            'sok_sadi_kub' => '',
//            'solomka_sol' => '',
//            'chocopie_upac' => '',
//            'chocopie_1' => '',
//            'nestle_plit' => '',
//            'choco_rus' => '',
//        ];
//    }
}
