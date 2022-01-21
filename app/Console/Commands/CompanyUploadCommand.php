<?php

namespace App\Console\Commands;

use App\Parafesor\Youtube\YoutubeCrawler;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Request;
use Intervention\Image\Facades\Image;
use Modules\Admin\Entities\ArticleType;
use Modules\Admin\Entities\Company;

class CompanyUploadCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'company:upload';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $array = ['a1-capital',
                  'aciselsan-acipayam',
                  'adel-kalemcilik',
                  'adese-gayrimenkul',
                  'afyon-cimento',
                  'agesa-emeklilik',
                  'agtlas-menkul-kiymetler',
                  'agvrasya-petrol-ve-turistik',
                  'ak-yatirim',
                  'akbank',
                  'akcansa-cimento',
                  'akdeniz-factoring',
                  'akdeniz-yatirim-holding',
                  'akenerji-elektrik',
                  'akfen-gayrimenkul',
                  'akfen-holding',
                  'akin-tekstil',
                  'akis-gayrimenkul',
                  'akmerkez-gayrimenkul',
                  'aksa-akrilik',
                  'aksa-enerji',
                  'aksfa-ak-faktoring',
                  'aksigorta',
                  'aksu-enerji',
                  'aktif-bank-sukuk',
                  'aktif-yatirim-bankasi',
                  'alarko-carrier',
                  'alarko-gayrimenkul',
                  'alarko-holding',
                  'albaraka-turk-katilim-bankasi',
                  'alcatel-lucent-teletas',
                  'alj-finansman',
                  'alkim-alkali-kimya',
                  'alkim-kagit-sanayi',
                  'alnus-yatirim-menkul',
                  'alternatif-bank',
                  'altinyag-madencilik',
                  'altinyunus-cesme',
                  'anadolu-anonim-turk-sigorta',
                  'anadolu-efes-biracilik',
                  'anadolu-grubu',
                  'anadolu-hayat-emeklilik',
                  'anatolia-tani-biyoteknoloji',
                  'anel-elektrik-proje',
                  'apple',
                  'arcelik-as',
                  'ard-grup-bilisim',
                  'arena-bilgisayar-sanayi',
                  'arena-finans-faktoring',
                  'armada-bilgisayar-sistemlari',
                  'arsan-tekstil-ticaret',
                  'arzum-elektrikli-ev-aletleri',
                  'aselsan-elektronik-sanayi',
                  'ata-gayrimenkul',
                  'atakule-gayrimenkul',
                  'atilim-faktoring',
                  'atlantis-yatirim-holding',
                  'atp-ticari-bilgisayar-agi-ve-elektrik',
                  'avod-gida-tarim',
                  'avrasya-gayrimenkul-yatirim',
                  'avrupa-yatirim-holding',
                  'aydem-yenilenebilir-enerji',
                  'ayen-enerji-as',
                  'ayes-celik-hasir-ve-cit-sanayi',
                  'aygaz-as',
                  'bagfas-bandirma-gubre',
                  'bak-ambalaj-sanayi',
                  'balatacilar-balatacilik',
                  'bandirma-vitaminli-yem-sanayi',
                  'bantas-bandirma-ambalaj',
                  'baskent-dogalgaz-dagitim',
                  'bastas-baskent-cimento-sanayi',
                  'baticim-bati-anadolu-cimento',
                  'batisoke-cimento-sanayi',
                  'bayrak-abt-taban-sanayi',
                  'bera-holdin-as',
                  'bereket-varlik-kiralama',
                  'berkosan-yalitim-ve-tecrit',
                  'besiktas-futbol-yatirimlari',
                  'beyaz-filo-oto-kiralama',
                  'bilici-yatirim-sanayi',
                  'bim-birlesik-magazalar-as',
                  'biotrend-cevre-ve-enerji',
                  'birikim-varlik-yonetim',
                  'birko-birlesik-koyunlular-mensucat',
                  'birlesim-muhendislik-isitma-sogutma',
                  'birlik-mensucat-ticaret',
                  'bizim-toptan-satis',
                  'bms-celik-hasir-sanayi',
                  'bogaz-varlik-yonetim',
                  'bogazici-beton-sanayi',
                  'borusan-mannesmann-boru-sanayi',
                  'borusan-yatirim-pazarlaama',
                  'bosch-fren-sistemleri',
                  'bossa-ticaret-sanayi',
                  'brisa-bridgestone-sabanci',
                  'burcelik-bursa-celik-dokum',
                  'burcelik-vana-sanayi',
                  'bursa-cimento-fabrikasi',
                  'cagdas-faktoring',
                  'calik-denim-tekstil',
                  'calik-enerji-sanayi',
                  'can2-termik-as',
                  'carrefoursa-sabanci',
                  'casa-emtia-petrol',
                  'celebi-hava-servisi',
                  'celik-halat-tel-sanayi',
                  'cemas-dokum-as',
                  'cemtas-celik-makina',
                  'ceo-event-medya',
                  'cimbeton-hazirbeton',
                  'cimentas-izmir',
                  'cimsa-cimento-sanayi',
                  'coca-cola-icecek',
                  'cosmos-yatirim-holding',
                  'creditwest-faktoring',
                  'cuhadaroglu-metal-sanayi',
                  'd-yatirim-bankasi',
                  'dagi-giyim-sanayi',
                  'dagi-yatirim-holding',
                  'dardanel-onentas-gida',
                  'datagate-bilgisayar-malzemeleri',
                  'demisas-dokum',
                  'denge-holding',
                  'deniz-bank',
                  'deniz-faktoring',
                  'deniz-finansal-kiralama',
                  'deniz-gayrimenkul-yatirim',
                  'deniz-yatirim-menkul-kiymetler',
                  'derimod-konfeksiyon',
                  'derluks-yatirim-holding',
                  'desa-deri-sanayi',
                  'despec-bilgisayar',
                  'deva-holding',
                  'dinamik-isi-makina-yalitim',
                  'diriteks-dirilis-tekstil',
                  'ditas-dogan-yedek-parca',
                  'doco-aktiengeselleschaft',
                  'dogan-burda-dergi',
                  'dogan-sirketler-grubu-holding',
                  'doganlar-mobilya-grubu',
                  'dogu-aras-enerji',
                  'dogus-gayrimenkul-yatirim',
                  'dogus-otomotiv-servis',
                  'dogusan-boru-sanayi-ticaret',
                  'doktas-dokumculuk',
                  'doruk-faktoring',
                  'dunya-varlik-yonetim',
                  'duran-dogan-basim-ambalaj',
                  'dyo-boya-fabrikalari',
                  'eczacibasi-yatirim-holding',
                  'edata-teknoloji-pazarlama',
                  'edip-gayrimenkul-yatirim-sanayi',
                  'ege-endustri-ticaret',
                  'ege-gubre-sanayi',
                  'ege-profil-ticaret',
                  'ege-seramik-sanayi',
                  'egeplast-ege-plastik',
                  'eis-eczacibasi-ilac-sinai-finansal',
                  'ekiz-kimya-sanayi-ticaret',
                  'eko-faktoring',
                  'elite-naturel-organik-gida',
                  'emek-elektrik-endustri',
                  'eminis-ambalaj-sanayi',
                  'emlak-katilim-varlik',
                  'emlak-konut-gayrimenkul',
                  'emlak-varlik-kiralama',
                  'enerjisa-enerji',
                  'enka-insaat-sanayi',
                  'erbosan-erciyas--boru-sanayi',
                  'erciyas-celik-boru',
                  'eregli-demir-celik',
                  'eregli-tekstil-turizm',
                  'eroglu-yapi-insaat-gayrimenkuk',
                  'ersan-alisveris-gida',
                  'ersu-meyve-gida',
                  'erve-film-produksyon',
                  'escar-turizm-tasimacilik',
                  'escort-teknoloji-yatirim',
                  'esenboga-elektrik-uretim',
                  'etiler-gida-ticari-yatirimlar',
                  'euro-kapital-yatirim',
                  'euro-menkul-kiymet-yatirim',
                  'euro-trend-yatirim',
                  'euro-yatirim-holding',
                  'europap-tezol-kagit-sanayi',
                  'fade-food-yatirim',
                  'federal-mogul-izmit-piston',
                  'fenerbahce-futbol',
                  'fiba-faktoring',
                  'fibabanka-as',
                  'flap-kongre-toplanti',
                  'fonet-bilgi-teknolojileri',
                  'ford-otomotiv-sanayi',
                  'formet-metal-cam-sanayi',
                  'frigo-pak-gida',
                  'galata-wind-enerji',
                  'galatasaray-sportif-as',
                  'gap-insaat-yatirim',
                  'garanti-faktoring',
                  'garanti-filo-yonetim',
                  'garanti-yatirim-ortakligi',
                  'gds-denizcilik-gayrimenkul',
                  'gedik-yatirim-menkul-degerler',
                  'gediz-ambalaj-sanayi-ticaret',
                  'gelecek-varlik-yonetimi-as',
                  'gen-ilac-saglik-urunleri',
                  'gentas-dekoratif-yuzeyler',
                  'gersan-elekrik',
                  'gimat-magazacilik-sanayi',
                  'girisim-elekrik-sanayi-taahut',
                  'global-menkul-degerler',
                  'global-yatirim-holding',
                  'goldman-sachs-international',
                  'goltas-goller-bolgesi-cimento',
                  'google',
                  'goodyear-lastikleri',
                  'gozde-girisim-sermayesi',
                  'gsd-holding',
                  'gubre-fabrikalari',
                  'guler-yatirim-holding',
                  'haci-omer-sabanci-holding',
                  'halk-finansal-kiralama',
                  'halk-gayrimenkul-yatirim',
                  'halk-varlik-kiralama',
                  'hateks-hatay-tekstil',
                  'hedef-girisim-sermayesi',
                  'hedef-holding',
                  'hektas-ticaret',
                  'hsbc-bank',
                  'hub-girisim-sermayesi',
                  'hurriyet-gazetecilik',
                  'huzur-faktoring',
                  'icbc-turkey-bank',
                  'ideal-finansal-teknolojiler',
                  'idealist-gayrimenkul-yatirim',
                  'ihlas-ev-aletleri-imalat',
                  'ihlas-gayrimenkul-proje',
                  'ihlas-gazetecilik',
                  'ihlas-haber-ajansi',
                  'ihlas-holding',
                  'ihlas-yayin-holding',
                  'inallar-otomotiv-ticaret',
                  'index-bilgisayar',
                  'info-yatirim-menkul-degerler',
                  'intema-insaat-tesisat',
                  'inveo-yatirim',
                  'ipek-dogal-enerji',
                  'is-faktoring',
                  'is-gayrimenkul-yatirim',
                  'is-girisim-sermayesi',
                  'is-leasing',
                  'is-yatirim-menkul-degerler',
                  'is-yatirim-ortakligi',
                  'isbir-holding',
                  'isbir-sentetik',
                  'isik-menkul',
                  'isik-plastik-sanayi',
                  'isiklar-enerji-holding',
                  'iskenderun-demir-celik',
                  'istanbul-varlik-yonetim-as',
                  'ittifak-holding',
                  'iz-hayvancilik-tarim-gida',
                  'izmir-demir-celik',
                  'izmir-firca-sanayi',
                  'jantsa-jant-sanayi-ticaret',
                  'kafein-yazilim-hizmetleri',
                  'kalekim-kimyevi-maddeler-sanayi',
                  'kalkinma-yatirim-varlik-kiralama',
                  'kap-test-as',
                  'kaplamin-ambalaj-sanayi-ticaret',
                  'kardemir-karabuk-demir-celik-sanayi',
                  'karel-elektronik-sanayi-ticaret',
                  'karsan-otomotiv-sanayii-ticaret',
                  'karsu-tekstil-sanayii-ticaret',
                  'kartal-yenilenebilir-enerji-uretim',
                  'kartonsan-karton-sanayi-ticaret',
                  'katmerciler-arac-ustu-ekipman-sanayi',
                  'kent-faktoring',
                  'kent-gida-maddeleri-sanayii',
                  'kerevitas-gida-sanayi',
                  'kervan-gida-sanayi',
                  'kervansaray-yatirim-holding',
                  'kiler-gayrimenkul-yatirim-ortakligi',
                  'kira-sertifikalari-varlik-kiralama',
                  'kizilbuk-yatirimortakligi',
                  'klimasan-klima-sanayi-ticaret',
                  'koc-fiat-kredi-finansman',
                  'koc-finans-as',
                  'koc-holding-as',
                  'konfrut-gida-sanayi-ticaret',
                  'kontrolmatik-teknoloji-enerji-muhendislik',
                  'konya-cimento-sanayii-as',
                  'konya-kagit-sanayi-ticaret',
                  'koray-gayrimenkul-yatirim',
                  'kordsa-teknik-tekstil',
                  'korfez-gayrimenkul-yatirim-ortakligi',
                  'korteks-mensucat-sanayi-ticaret',
                  'koza-altin-isletmeleri',
                  'koza-anadolu-metal-madencilik',
                  'kristal-cola-mesrubat-sanayi',
                  'kron-telekominikasyon-hizmetleri',
                  'kustur-kusadasi-turizm-endustri',
                  'kutahya-porselen-sanayi',
                  'kutahya-seker-fabrikasi',
                  'kuyas-yatirim',
                  'lider-faktoring',
                  'link-bilgisayar-sistemleri-yazılım-donanim',
                  'logo-yazilim-sanayi-ticaret',
                  'lokman-hekim-engürüsag-saglik-turizm',
                  'luks-kadife-ticaret',
                  'makina-takim-endustrisi',
                  'manas-enerji-yonetimi',
                  'margun-enerji-uretim-sanayi',
                  'marka-yatirim-holding',
                  'marmaris-altinyunus-turistik-tesisler',
                  'marshall-boya-vernik-sanayii',
                  'marti-gayrimenkul-yatirim',
                  'marti-otel-isletmeleri',
                  'matriks-bilgi-dagitim-hizmetleri',
                  'mavi-giyim-sanayi-ticaret',
                  'mazhar-zorlu-holding',
                  'meditera-tibbi-malzeme-sanayi',
                  'mega-polietilen-kopuk-ticaret',
                  'menderes-tekstil-sanayi-ticaret',
                  'mepet-metro-petrol-tesisler-sanayi-ticaret',
                  'mercan-kimya-sanayi-ticaret',
                  'mercedes-benz-finansman-turk-as',
                  'merit-turizm-yatirim-isletme',
                  'merko-gida-sanayi-ticaret',
                  'metemtur-yatirim-enerji-turizm',
                  'metro-ticari-mali-yatirimlar-holding',
                  'metro-yatirim-ortakligi',
                  'mia-teknoloji',
                  'migros',
                  'milpa-ticari-sinai-urunler-pazarlama-sanayi',
                  'mistral-gayrimenkul-yatirim-ortakligi',
                  'mlp-saglik-hizmetleri',
                  'mmc-sanayi-ticari-yatirimlar',
                  'mobiltel-iletisim-hizmetleri-sanayi',
                  'mondi-olmuksan-kagit-ambalaj-sanayi',
                  'mondi-tire-kutsan-ambalaj',
                  'nasmed-ozel-saglik',
                  'naturel-sanayi-ticaret-as',
                  'naturel-yenilenebilir-enerji-ticaret',
                  'net-holding-as',
                  'netas-telekomunikasyon-as',
                  'nibas-nigde-beton-sanayi',
                  'nuh-cimento-sanayi-as',
                  'nurol-gayrimenkul-yatirim-ortakligi',
                  'nurol-holding',
                  'nurol-insaat-ticaret',
                  'nurol-varlik-kiralama',
                  'nurol-yatirim-bankasi',
                  'odas-elektrik-uretim-sanayi',
                  'odea-bank',
                  'opet-petrolculuk',
                  'orcay-ortakoy-cay-sanayi',
                  'orfin-finansman',
                  'orge-enerji-elektrik-taahut',
                  'orma-orman-mahsulleri-integre-sanayi',
                  'osmanli-yatirim-menkul-degerler',
                  'ostim-endustriyel-yatirimlar',
                  'otokar-otomotiv-savunma-sanayi',
                  'otto-holding',
                  'oyak-cimento-fabrikalari',
                  'oyak-yatirim-menkul-degerler',
                  'oyak-yatirim-ortakligi',
                  'oylum-sinai-yatirimlar',
                  'ozak-gayrimenkul-yatirim-ortakligi',
                  'ozderici-gayrimenkul-yatirim-ortakligi',
                  'ozerden-plastik-sanayi-ticaret',
                  'palen-enerji-dogalgaz-dagitim-endustri',
                  'palgaz-dogalgaz',
                  'pamel-yenilenebilir-elektrik',
                  'panora-gayrimenkul-yatirim-ortakligi',
                  'papilon-savunma-teknoloji',
                  'park-elektrik-uretim-madencilik-sanayi',
                  'parsan-makina-parcalari-sanayi',
                  'pasha-yatirim-bankasi',
                  'pasifik-gayrimenkul-yatirim-ortakligi',
                  'pc-iletisim-medya-hizmetleri-sanayi',
                  'pegasus-hava-tasimaciligi',
                  'peker-gayrimenkul-yatirim-ortakligi',
                  'penguen-gida-sanayi',
                  'penta-teknoloji-urunleri-dagitim-ticaret',
                  'pera-gayrimenkul-yatirim-ortakligi',
                  'pergamon-status',
                  'petkim-petrokimya-holding',
                  'petrokent-turizm-as',
                  'phillipcapital-menkul-degerler',
                  'pinar-entegre-et-un-sanayii',
                  'pinar-su-icecek-sanayi-ticaret',
                  'pinar-sut-mamulleri-sanayii',
                  'plastikkart-akilli-kart-iletisim-sistemleri-sanayi-ticaret',
                  'polisan-holding',
                  'politeknik-metal-sanayi-ticaret',
                  'prizma-pres-matbaacilik-yayincilik-sanayi',
                  'qnb-finans-faktoring',
                  'qnb-finans-finansal-kiralama',
                  'qnb-finans-yatirim-menkul-degerler',
                  'qnb-finansbank',
                  'qua-granite-hayal-yapi-urunleri-sanayi',
                  'rainbow-polikarbonat-sanayi-ticaret',
                  'ral-yatirim-holding',
                  'ray-sigorta',
                  'reysas-gayrimenkul-yatirim-ortakligi',
                  'reysas-tasimacilik-lojistik-ticaret',
                  'rhea-girisim-sermayesi-yatirim-ortakligi',
                  'rodrigo-tekstil',
                  'royal-hali-iplik-tekstil-mobilya-sanayi-ticaret',
                  'rta-laboratuvarlari-biyolojik-urunleri-ilac-makine-sanayi-ticaret',
                  'safkar-ege-sogutmacilik-klima',
                  'sanel-muhendislik',
                  'sanifoam-sunger-sanayi',
                  'sanko-pazarlama-ithalat',
                  'saray-matbaacilik-kagitcilik',
                  'sarkusyan-elektrolit-bakir-sanayi',
                  'sarten-ambalaj-sanayi',
                  'sasa-polyester-sanayi',
                  'say-yenilenebilir-enerji-ekipmanlari-sanayi',
                  'seker-faktoring',
                  'seker-finansal-kiralama',
                  'seker-yatirim-menkul-degerler',
                  'sekerbank',
                  'sekuro-plastik-ambalaj-sanayi',
                  'selcuk-ecza-deposu-ticaret-sanayi',
                  'selcuk-gida-endustri',
                  'selva-gida-sanayi',
                  'senkron-guvenlik-iletisim-sistemleri',
                  'servet-gayrimenkul-yatirim-ortakligi',
                  'seyitler-kimya-sanayi',
                  'silverline-endustri-ticaret',
                  'sinpas-gayrimenkul-yatirim-ortakligi',
                  'smartiks-yazilim',
                  'sodas-sodyum-sanayii',
                  'sok-marketler-ticaret',
                  'soktas-tekstil-sanayi-ticaret',
                  'sonmez-holding',
                  'sonmez-pamuklu-sanayii',
                  'sumer-faktoring',
                  'sumer-varlik-yonetim',
                  'suzuki-motorlu-araclar-pazarlama',
                  'tacirler-yatirim-menkul-degerler',
                  'tam-finans-faktoring',
                  'tat-gida-sanayi',
                  'tav-havalimanlari-holding',
                  'tc-ziraat-bankasi',
                  'teb-finansman',
                  'tek-art-insaat-ticaret-turizm-sanayi',
                  'tekfen-holding',
                  'teknosa-ic-dis-ticaret',
                  'temapol-polimer-plastik-insaat-sanayi',
                  'tera-yatirim-menkul-degerler',
                  'tetamat-gida-yatirimlari',
                  'tf-varlik-kiralama',
                  'tgs-dis-ticaret',
                  'tofas-turk-otomobil-fabrikasi',
                  'toplu-konut-idaresi-baskanligi',
                  'torunlar-gayrimenkul-yatirim-ortakligi',
                  'trabzon-liman-isletmeciligi',
                  'trabzonspor-sportif-yatirim',
                  'trend-gayrimenkul-yatirim-ortakligi',
                  'tskb-gayrimenkul-yatirim-ortakligi',
                  'tugcelik-aluminyum-metal-mamulleri-sanayi-ticaret',
                  'tukas-gida-sanayi',
                  'tumpsan-motor-traktor',
                  'tupras-turkiye-petrol-rafinerileri',
                  'turcas-petrol',
                  'turex-turizm-tasimacilik',
                  'turk-ekonomi-bankasi',
                  'turk-hava-yollari',
                  'turk-ilac-serum-sanayi',
                  'turk-prysmian-kablo-sistemleri',
                  'turk-telekomunikasyon',
                  'turk-traktor',
                  'turk-tuborg-bira-malt-sanayi',
                  'turkcell-iletisim-hizmetleri',
                  'turker-proje-gayrimenkul-yatirim',
                  'turkish-bank',
                  'turkiye-garanti-bankasi',
                  'turkiye-halk-bankasi',
                  'turkiye-ihracat-kredi-bankasi',
                  'turkiye-is-bankasi',
                  'turkiye-kalkinma-yatirim-bankasi',
                  'turkiye-sigorta',
                  'turkiye-sinai-kalkinma-bankasi',
                  'turkiye-sisecam-fabrikalari',
                  'turkiye-vakiflar-bankasi',
                  'ufuk-yatirim-yonetim-gayrimenkul',
                  'ulaslar-turizm-yatirimlari',
                  'ulker-biskuvi-sanayi',
                  'ulusal-faktoring',
                  'ulusoy-elektrik-imalat',
                  'ulusoy-un-sanayi-ticaret',
                  'umpas-holding',
                  'unlu-menkul-degerler',
                  'unlu-yatirim-holding',
                  'usak-seramik-sanayi',
                  'utopya-turizm-insaat',
                  'uzertas-boya-sanayi-ticaret',
                  'vakif-faktoring',
                  'vakif-finansal-kiralama',
                  'vakif-gayrimenkul-yatirim-ortakligi',
                  'vakif-mankul-kiymet-yatirim-ortakligi',
                  'vakif-varlik-kiralama',
                  'vakifbank',
                  'vakko-tekstil-hazir-giyim',
                  'vanet-gida-sanayi',
                  'vbt-yazilim',
                  'verusa-girisim-sermayesi-yatirim-ortakligi',
                  'verusa-holding',
                  'vestel-beyaz-esya-sanayi-ticaret',
                  'vestel-elektronik-sanayi-ticaret',
                  'viking-kagit-seluloz',
                  'volkswagen-dogus-finansman',
                  'yapi-kredi-bankasi',
                  'yapi-kredi-faktoring',
                  'yapi-kredi-yatirim-menkul-degerler',
                  'yaprak-sut-besi-ciftlikleri-sanayi',
                  'yatas-yatak-yorgan-sanayi',
                  'yatirim-finansman-menkul-degerler',
                  'yatirim-varlik-kiralama',
                  'yayla-enerji-uretim-turizm-insaat',
                  'yda-insaat-sanay',
                  'yeni-gimat-gayrimenkul-yatirim-ortakligi',
                  'yeo-teknoloji-enerji-endustri',
                  'yesil-gayrimenkul-yatirim-ortakligi',
                  'yesil-yapi-endustri',
                  'yesil-yatirim-holding',
                  'yibitas-yozgat-isci-birligi-insaat-malzemeleri-ticaret',
                  'yonga-mobilya-sanayi-ticaret',
                  'yukselen-celik',
                  'yunsa-yunlu-sanayi-ticaret',
                  'ziraat-gayrimenkul-yatirim-ortakligi',
                  'ziraat-katilim-varlik-kiralama',
                  'zkb-varlik-kiralama',
                  'zorlu-enerji-elektrik-uretimi',
                  'zorlu-faktoring'
        ];
        $articleType = ArticleType::find(2);
        $imageDimensions = json_decode($articleType->image_dimensions, true);

        foreach ($array as $companyString) {
            $company = new Company();
            $path = '/var/www/sirket-logolar/' . $companyString . '.jpg';
            $content = file_get_contents($path);
            $file = "images/companies/" . $companyString . '.webp';
            Image::make($content)->encode('webp', 90)->resize($imageDimensions['Normal']['width'], $imageDimensions['Normal']['height'])->save(public_path($file));
            $title = str_replace('-',' ',$companyString);
            $title = ucwords($title);
            $company->title = $title;
            $company->image_path = $file;
            $company->save();
            echo $title . " saved." . PHP_EOL;
        }
    }
}
