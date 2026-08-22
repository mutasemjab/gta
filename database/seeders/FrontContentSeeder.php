<?php

namespace Database\Seeders;

use App\Models\AboutPill;
use App\Models\AboutSection;
use App\Models\AboutStat;
use App\Models\CatalogItem;
use App\Models\Client;
use App\Models\ContactInfo;
use App\Models\FooterSetting;
use App\Models\Hero;
use App\Models\HeroStat;
use App\Models\NavbarSetting;
use App\Models\Product;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Database\Seeder;

class FrontContentSeeder extends Seeder
{
    public function run(): void
    {
        NavbarSetting::query()->delete();
        NavbarSetting::create([
            'logo'          => asset('assets/uploads/gta-logo-navbar.png'),
            'brand_name_ar' => 'جي تي إيه للاصقات',
            'brand_name_en' => 'GTA for Adhesive',
        ]);

        FooterSetting::query()->delete();
        FooterSetting::create([
            'about_ar'      => 'لواصق البلاط والروبة وأنظمة العزل المائي المصنّعة وفق معايير التكنولوجيا الألمانية. نربط البيئة العمرانية معًا.',
            'about_en'      => 'Tile adhesives, grout and waterproofing engineered to German technology standards. Bonding the built environment.',
            'copyright_ar'  => '© 2026 جي تي إيه للاصقات — جميع الحقوق محفوظة',
            'copyright_en'  => '© 2026 GTA FOR ADHESIVE · ALL RIGHTS RESERVED',
            'tagline_ar'    => 'لواصق · روبة · عزل',
            'tagline_en'    => 'لواصق · روبة · عزل',
            'facebook_url'  => '#',
            'instagram_url' => '#',
            'linkedin_url'  => '#',
            'whatsapp_url'  => '#',
        ]);

        ContactInfo::query()->delete();
        ContactInfo::create([
            'phone'      => '+962 7 0000 0000',
            'email'      => 'sales@gta-adhesive.com',
            'address_ar' => 'المنطقة الصناعية، عمّان، الأردن',
            'address_en' => 'Industrial Zone, Amman, Jordan',
            'hours_ar'   => 'الأحد – الخميس · 8:00 – 17:00',
            'hours_en'   => 'Sun–Thu · 8:00 – 17:00',
        ]);

        Hero::query()->delete();
        Hero::create([
            'eyebrow_ar'           => 'لواصق · روبة · عزل مائي',
            'eyebrow_en'           => 'Adhesives · Grout · Waterproofing',
            'heading_line1_ar'     => 'قوة تربط',
            'heading_line1_en'     => 'Strength that',
            'heading_highlight_ar' => 'كل التفاصيل',
            'heading_highlight_en' => 'holds it all',
            'heading_line2_ar'     => 'وتدوم معها.',
            'heading_line2_en'     => 'together.',
            'lead_ar'              => 'جي تي إيه للاصقات تصنّع لواصق البلاط والروبة وأنظمة العزل المائي وفق معايير التكنولوجيا الألمانية — مصممة للثبات والاستمرار.',
            'lead_en'              => 'GTA for Adhesive engineers tile adhesives, grout and waterproofing systems to German technology standards — built to bond, built to last.',
            'primary_btn_link'     => '#products',
            'secondary_btn_link'   => '#catalog',
            'strip_text'           => 'لواصق · روبة · عزل مائي — جودة تدوم',
        ]);

        HeroStat::query()->delete();
        foreach ([
            ['label_ar' => 'التركيبات', 'label_en' => 'Formulations', 'value' => 80,   'suffix' => '+', 'order_index' => 1],
            ['label_ar' => 'المشاريع',   'label_en' => 'Projects',     'value' => 1500, 'suffix' => '+', 'order_index' => 2],
            ['label_ar' => 'سنوات الخبرة', 'label_en' => 'Years',      'value' => 12,   'suffix' => '+', 'order_index' => 3],
        ] as $row) {
            HeroStat::create($row);
        }

        AboutSection::query()->delete();
        AboutSection::create([
            'eyebrow_ar'     => 'من نحن',
            'eyebrow_en'     => 'Who we are',
            'title_ar'       => 'مواد بناء مصممة لتلتصق.',
            'title_en'       => 'Building materials, engineered to bond.',
            'lead_ar'        => 'نصنع الطبقة التي لا يراها أحد — تلك التي تقرر ما إذا كان كل ما فوقها سيدوم.',
            'lead_en'        => 'We make the layer nobody sees — the one that decides whether everything above it lasts.',
            'paragraph1_ar'  => 'جي تي إيه للاصقات مُصنّع ومورّد متخصص في منتجات لصق البناء: لواصق البلاط، الروبة الإسمنتية والإيبوكسية، مواد السد وأنظمة العزل المائي. كل تركيبة تُطوَّر لظروف الموقع الحقيقية — قبضة قوية، زمن فتح طويل، ومتانة عبر السيراميك والبورسلين والحجر الطبيعي.',
            'paragraph1_en'  => 'GTA for Adhesive is a specialist manufacturer and supplier of construction bonding products: tile adhesives, cementitious and epoxy grout (roubah), sealants and waterproofing systems. Every formulation is developed for real site conditions — strong grip, long open time, and durability across ceramic, porcelain and natural stone.',
            'paragraph2_ar'  => 'من فيلا واحدة إلى مشاريع البنية التحتية الكبرى، يختار المقاولون جي تي إيه لأن منتجاتنا ثابتة وموثقة فنيًا ومدعومة بدعم ميداني مباشر.',
            'paragraph2_en'  => 'From a single villa to large infrastructure works, contractors choose GTA because our products are consistent, technically documented, and backed by hands-on support.',
            'badge_title'    => 'DE',
            'badge_text_ar'  => 'مُركّبة وفق معايير التكنولوجيا الألمانية',
            'badge_text_en'  => 'Formulated to German technology standards',
        ]);

        AboutPill::query()->delete();
        foreach ([
            ['name_ar' => 'لواصق C1 / C2', 'name_en' => 'C1 / C2 Adhesives', 'order_index' => 1],
            ['name_ar' => 'روبة CG2 / إيبوكسي', 'name_en' => 'CG2 / Epoxy Grout', 'order_index' => 2],
            ['name_ar' => 'العزل المائي', 'name_en' => 'Waterproofing', 'order_index' => 3],
            ['name_ar' => 'الدعم الفني', 'name_en' => 'Technical Support', 'order_index' => 4],
        ] as $row) {
            AboutPill::create($row);
        }

        AboutStat::query()->delete();
        foreach ([
            ['label_ar' => 'منتج',        'label_en' => 'Products',           'value' => 80,   'suffix' => '+', 'order_index' => 1],
            ['label_ar' => 'مشروع منجز',    'label_en' => 'Projects Delivered', 'value' => 1500, 'suffix' => '+', 'order_index' => 2],
            ['label_ar' => 'ولاء العملاء',  'label_en' => 'Client Retention',   'value' => 98,   'suffix' => '%', 'order_index' => 3],
            ['label_ar' => 'دعم الموقع',    'label_en' => 'Site Support',       'value' => 24,   'suffix' => '/7', 'order_index' => 4],
        ] as $row) {
            AboutStat::create($row);
        }

        Service::query()->delete();
        foreach ([
            [
                'title_ar' => 'تصنيع بجودة عالية', 'title_en' => 'Quality Manufacturing',
                'description_ar' => 'إنتاج داخلي مع فحص دفعات لضمان مطابقة ثابتة لمعايير C1/C2 وCG2، بحيث يؤدي كل كيس نفس الأداء.',
                'description_en' => 'In-house production with batch testing to consistent C1/C2 and CG2 standards, so every bag performs the same.',
                'order_index' => 1,
            ],
            [
                'title_ar' => 'استشارات فنية', 'title_en' => 'Technical Consultation',
                'description_ar' => 'تقييم الأسطح واختيار المنتج المناسب للبلاط والحجر والمناطق الرطبة والواجهات — النظام الصحيح لكل حالة.',
                'description_en' => 'Substrate assessment and product selection for tile, stone, wet areas and façades — the right system for each condition.',
                'order_index' => 2,
            ],
            [
                'title_ar' => 'توصيل موثوق', 'title_en' => 'Reliable Delivery',
                'description_ar' => 'خدمات لوجستية وتخطيط مخزون على مستوى الوطن يبقي مشروعك مزوّدًا بالمواد — دون توقف الطواقم بانتظار المواد.',
                'description_en' => 'Nationwide logistics and stock planning that keeps your project supplied — no idle crews waiting on material.',
                'order_index' => 3,
            ],
            [
                'title_ar' => 'تركيبات مخصصة', 'title_en' => 'Custom Formulation',
                'description_ar' => 'ألوان خاصة، إصدارات سريعة التصلب ومزائج مخصصة للمشاريع الكبيرة أو غير التقليدية.',
                'description_en' => 'Special colours, rapid-set variants and project-specific blends developed for large or unusual scopes.',
                'order_index' => 4,
            ],
            [
                'title_ar' => 'تدريب ميداني', 'title_en' => 'On-Site Training',
                'description_ar' => 'ورش عمل تطبيقية للطواقم حول الخلط والفرد والتربيط للحصول على الأداء الكامل من كل منتج.',
                'description_en' => 'Application workshops for crews on mixing, trowelling and grouting to get the full performance out of every product.',
                'order_index' => 5,
            ],
            [
                'title_ar' => 'التوثيق والمواصفات', 'title_en' => 'Documentation & Specs',
                'description_ar' => 'نشرات فنية ووثائق سلامة كاملة للمهندسين المعماريين والاستشاريين وضبط الجودة — جاهزة للاعتماد.',
                'description_en' => 'Full technical data sheets and safety documentation for architects, consultants and QA — specification-ready.',
                'order_index' => 6,
            ],
        ] as $row) {
            Service::create($row);
        }

        Product::query()->delete();
        foreach ([
            [
                'chip_label' => 'C2TE', 'code' => 'GTA-FIX-FLEX',
                'name_ar' => 'جي تي إيه فيكس فلكس', 'name_en' => 'GTA Fix Flex',
                'description_ar' => 'لاصق مرن عالي الأداء للبورسلين والبلاط كبير الحجم.',
                'description_en' => 'High-performance flexible adhesive for porcelain and large-format tiles.',
                'spec_label_ar' => 'التغطية', 'spec_label_en' => 'Coverage', 'spec_value' => '~5 kg/m²',
                'order_index' => 1,
            ],
            [
                'chip_label' => 'C2FT', 'code' => 'GTA-FIX-RAPID',
                'name_ar' => 'جي تي إيه فيكس رابيد', 'name_en' => 'GTA Fix Rapid',
                'description_ar' => 'لاصق سريع التصلب — يتحمل السير عليه خلال 3 ساعات. مثالي للترميم.',
                'description_en' => 'Fast-setting adhesive — foot traffic in 3 hours. Perfect for repairs.',
                'spec_label_ar' => 'زمن التصلب', 'spec_label_en' => 'Set time', 'spec_value' => '3 hours',
                'order_index' => 2,
            ],
            [
                'chip_label' => 'CG2 WA', 'code' => 'GTA-GROUT-FINE',
                'name_ar' => 'جي تي إيه غراوت فاين', 'name_en' => 'GTA Grout Fine',
                'description_ar' => 'روبة إسمنتية طاردة للماء للفواصل حتى 6 مم، بـ24 لونًا.',
                'description_en' => 'Water-repellent cementitious grout for joints up to 6 mm, 24 colours.',
                'spec_label_ar' => 'الفاصل', 'spec_label_en' => 'Joint', 'spec_value' => '1–6 mm',
                'order_index' => 3,
            ],
            [
                'chip_label' => '2K', 'code' => 'GTA-PROOF-2K',
                'name_ar' => 'جي تي إيه بروف 2K', 'name_en' => 'GTA Proof 2K',
                'description_ar' => 'غشاء عزل مائي مرن ثنائي المكوّن للمناطق الرطبة والأسطح.',
                'description_en' => 'Flexible two-component waterproof membrane for wet areas and roofs.',
                'spec_label_ar' => 'الاستطالة', 'spec_label_en' => 'Elongation', 'spec_value' => '>60%',
                'order_index' => 4,
            ],
        ] as $row) {
            Product::create($row);
        }

        CatalogItem::query()->delete();
        foreach ([
            [
                'meta_label_ar' => 'PDF · نظرة عامة', 'meta_label_en' => 'PDF · Overview',
                'title_ar' => 'ملف الشركة', 'title_en' => 'Company Profile',
                'description_ar' => 'من نحن، قدراتنا والعائلة الكاملة من حلول جي تي إيه الإنشائية.',
                'description_en' => 'Who we are, our capabilities and the full family of GTA construction solutions.',
                'order_index' => 1,
            ],
            [
                'meta_label_ar' => 'PDF · منتجات', 'meta_label_en' => 'PDF · Products',
                'title_ar' => 'لواصق البلاط', 'title_en' => 'Tile Adhesives',
                'description_ar' => 'لواصق قياسية ومرنة وسريعة وللحجر، مع الأصناف ومعدلات التغطية وأحجام العبوات.',
                'description_en' => 'Standard, flexible, rapid and stone adhesives with classes, coverage and pack sizes.',
                'order_index' => 2,
            ],
            [
                'meta_label_ar' => 'PDF · منتجات', 'meta_label_en' => 'PDF · Products',
                'title_ar' => 'الروبة والعزل المائي', 'title_en' => 'Grout & Waterproofing',
                'description_ar' => 'روبة إسمنتية وإيبوكسية بالإضافة لأغشية مرنة لحماية شاملة للموقع.',
                'description_en' => 'Cementitious and epoxy grouts plus flexible membranes for full site protection.',
                'order_index' => 3,
            ],
        ] as $row) {
            CatalogItem::create($row);
        }

        Project::query()->delete();
        foreach ([
            [
                'category_ar' => 'سكني', 'category_en' => 'Residential',
                'title_ar' => 'سكاي لاين ريزيدنسز', 'title_en' => 'Skyline Residences',
                'location_ar' => '450 وحدة · تبليط البرج كاملاً', 'location_en' => '450 units · full-tower tiling',
                'size' => 'big', 'order_index' => 1,
            ],
            [
                'category_ar' => 'ضيافة', 'category_en' => 'Hospitality',
                'title_ar' => 'فندق غراند مارينا', 'title_en' => 'Grand Marina Hotel',
                'location_ar' => 'الردهات، المسابح والمناطق الرطبة', 'location_en' => 'Lobbies, pools & wet areas',
                'size' => 'small', 'order_index' => 2,
            ],
            [
                'category_ar' => 'تجاري', 'category_en' => 'Retail',
                'title_ar' => 'المول المركزي', 'title_en' => 'Central Mall',
                'location_ar' => 'أرضيات بورسلين · 18,000 م²', 'location_en' => 'Porcelain floors · 18,000 m²',
                'size' => 'small', 'order_index' => 3,
            ],
            [
                'category_ar' => 'بنية تحتية', 'category_en' => 'Infrastructure',
                'title_ar' => 'تجهيز محطة المترو', 'title_en' => 'Metro Station Fit-out',
                'location_ar' => 'تكسية حجرية عالية الحركة', 'location_en' => 'High-traffic stone cladding',
                'size' => 'big', 'order_index' => 4,
            ],
        ] as $row) {
            Project::create($row);
        }

        Client::query()->delete();
        foreach ([
            'CONSTRUCTA', 'AL-BINAA GROUP', 'SUMMIT DEVELOPERS',
            'CERAMICA PLUS', 'NILE ENGINEERING', 'ORBIT REALTY',
        ] as $i => $name) {
            Client::create(['name' => $name, 'order_index' => $i + 1]);
        }
    }
}
