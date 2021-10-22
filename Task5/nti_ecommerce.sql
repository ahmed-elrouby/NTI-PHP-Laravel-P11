-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 22, 2021 at 07:57 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nti_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `street` varchar(256) NOT NULL,
  `buliding` varchar(256) NOT NULL,
  `floor` varchar(256) NOT NULL,
  `flat` varchar(256) NOT NULL,
  `notes` varchar(256) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `region_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `street`, `buliding`, `floor`, `flat`, `notes`, `user_id`, `region_id`) VALUES
(1, 'Ahmed Zewail', 'ELsafa ', '2', '6', NULL, 1, 1),
(2, 'Tahrir', 'Elhekma', '5', '3', NULL, 17, 1),
(3, 'Saad zaglog', 'Elrawda', '9', '17', NULL, 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(30) NOT NULL,
  `name_ar` varchar(30) NOT NULL,
  `status` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '1',
  `image` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'default.jpg',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name_en`, `name_ar`, `status`, `image`) VALUES
(1, 'hp', 'اتش بي', '1', 'default.jpg'),
(2, 'iphone', 'اي فون', '1', 'default.jpg'),
(3, 'oppo', 'اوبو', '1', 'default.jpg'),
(4, 'enovo', 'لينوفو', '1', 'default.jpg'),
(5, 'LG', 'ال جي', '1', 'default.jpg'),
(6, 'Smasung', 'سامسونج', '1', 'default.jpg'),
(7, 'ESRB', 'اي اس ار بي', '1', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(30) NOT NULL,
  `name_ar` varchar(30) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '1=> active, 0=> not active',
  `image` varchar(50) NOT NULL DEFAULT 'default.jpg',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_en`, `name_ar`, `status`, `image`) VALUES
(1, 'Electronics', 'الكترونيات', '1', 'default.jpg'),
(2, 'Makeup', 'ميكب', '1', 'default.jpg'),
(4, 'Clothes', 'ملابس', '1', 'default.jpg'),
(5, 'Gaming', 'العاب', '1', 'default.jpg'),
(6, 'Furniture', 'اثاث', '1', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(50) NOT NULL,
  `name_ar` varchar(50) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0=> not active , 1=> active',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name_en`, `name_ar`, `status`) VALUES
(1, 'Giza', 'الجيزة', '1');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `discount` int(5) NOT NULL,
  `discount_type` enum('1','2','3') DEFAULT '1' COMMENT '1=> no coupons , 2=> percentage coupons, 3=> money coupons',
  `code` varchar(20) NOT NULL,
  `MaxUserUsage` tinyint(1) NOT NULL,
  `maxUsageCount` tinyint(1) NOT NULL,
  `miniOrderPrice` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons_products`
--

CREATE TABLE `coupons_products` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `coupon_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons_users`
--

CREATE TABLE `coupons_users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `coupon_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `most_order_product`
-- (See below for the actual view)
--
CREATE TABLE `most_order_product` (
`id` bigint(20) unsigned
,`name_en` varchar(1000)
,`name_ar` varchar(1000)
,`price` decimal(7,2)
,`image` varchar(100)
,`desc_en` longtext
,`desc_ar` longtext
,`quantity` smallint(3)
,`status` tinyint(1)
,`brand_id` bigint(20) unsigned
,`subcategory_id` bigint(20) unsigned
,`create_at` timestamp
,`updated_at` timestamp
,`order_prodduct_total` decimal(25,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_en` varchar(256) NOT NULL,
  `title_ar` varchar(256) NOT NULL,
  `desc_en` varchar(1000) NOT NULL,
  `desc_ar` varchar(1000) NOT NULL,
  `image` varchar(256) NOT NULL DEFAULT 'default.jpg',
  `discount` decimal(4,0) NOT NULL,
  `discount_type` enum('1','2','3') NOT NULL DEFAULT '1' COMMENT '1=>no discount , 2=>percentage discount, 3=> money discount',
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `title_en`, `title_ar`, `desc_en`, `desc_ar`, `image`, `discount`, `discount_type`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 'TV Samsung + mobile Samsung', 'تلفزيون + محمول سامسونج', 'The 3-Series Full HD Samsung Roku TV puts all your entertainment favorites in one place, allowing seamless access to over 500,000 movies and TV episodes, your cable box, gaming console, and other devices—all from your simple, intuitive interface. The super-simple remote and dual-band Wi-Fi make it fast and easy to access your favorite content in Full HD. Connect all your favorite devices with the three HDMI inputs. The built-in TV tuner makes this the ultimate cord-cutting TV as it also gives you the ability to access free, over-the-air HD content.', 'يضع تلفزيون Samsung Roku من سلسلة 3-Series Full HD TCL Roku جميع مفضلاتك الترفيهية في مكان واحد ، مما يتيح الوصول السلس إلى أكثر من 500000 فيلم وحلقات تلفزيونية وصندوق الكابل ووحدة التحكم في الألعاب والأجهزة الأخرى - كل ذلك من خلال واجهتك البسيطة والبديهية. يعمل جهاز التحكم عن بعد فائق البساطة وشبكة Wi-Fi مزدوجة النطاق على جعل الوصول إلى المحتوى المفضل لديك سريعًا وسهلاً بدقة Full HD. قم بتوصيل جميع أجهزتك المفضلة بمدخلات HDMI الثلاثة. يجعل موالف التليفزيون المدمج هذا التليفزيون النهائي لقطع الأسلاك لأنه يمنحك أيضًا القدرة على الوصول إلى محتوى HD مجاني عبر الهواء.', 'tv-mobile.jpg', '5', '2', '2021-10-22 18:15:00', '2021-10-23 18:00:00', '2021-10-21 22:00:00', '2021-10-22 18:25:51'),
(2, 'Laptop and Table for bed', 'لاب توب و طرابيزة للسرير', '[Large Size Adjustable Laptop DesK]:With 24”*13.8” of size which fits for 17” or larger laptop; Two auto-lock buttons on each side easily enable quick changes in height, legs can be set to 5 different heights (adjustable from 10.6\" - 15.4\") in addition two clamps may be used to adjust the surface angle, surface can be set to 4 different angles (from 0°-36°).\r\n[Useful Bed Desk]: A detachable mouse and notebook slip helps keep your device on the table even when you lie down in your bed, preventing the tablet and mouse from sliding off the table. Ideal gifts choice.\r\n[Multifunction Portable Table]: This multifunctional table will be a perfect addition to your office, home or home office.Use it as a laptop workstation, laptop stand for bed, a children\'s bed table, a mini writing table, laptop couch table,a standing table for office work,it becomes the great balance for relaxing and productivity.\r\n[Foldable Laptop Table]: Light but sturdy, folds flat for space-saving storage and portability', '[مكتب كمبيوتر محمول كبير الحجم قابل للتعديل]: بحجم 24 بوصة * 13.8 بوصة والذي يناسب كمبيوتر محمول مقاس 17 بوصة أو أكبر ؛ يتيح زران للقفل التلقائي على كل جانب تغييرات سريعة في الارتفاع بسهولة ، ويمكن ضبط الأرجل على 5 ارتفاعات مختلفة (قابلة للتعديل من 10.6 \"- 15.4\") بالإضافة إلى ذلك يمكن استخدام مشبكين لضبط زاوية السطح ، ويمكن ضبط السطح على 4 زوايا مختلفة (من 0 درجة إلى 36 درجة).\r\n[مكتب سرير مفيد]: يساعد انزلاق الماوس والكمبيوتر المحمول القابل للفصل على إبقاء جهازك على الطاولة حتى عندما تستلقي على سريرك ، مما يمنع الجهاز اللوحي والماوس من الانزلاق عن الطاولة. اختيار الهدايا المثالي.\r\n[طاولة محمولة متعددة الوظائف]: ستكون هذه الطاولة متعددة الوظائف إضافة مثالية لمكتبك أو منزلك أو مكتبك المنزلي. استخدمها كمحطة عمل للكمبيوتر المحمول ، وحامل كمبيوتر محمول للسرير ، وطاولة سرير للأطفال ، وطاولة كتابة صغيرة ، وطاولة أريكة للكمبيوتر المحمول ، و طاولة الوقوف للعمل المكتبي ، تصبح التوازن الكبير للاسترخاء والإنتاجية.\r\n[طاولة كمبيوتر محمول قابلة للطي]: خفيف ولكن قوي ، يمكن طيه بشكل مسطح لتوفير مساحة ا', 'table_bed.jpg', '50', '3', '2021-10-20 00:00:00', '2021-10-29 18:00:00', '2021-10-22 17:51:52', '2021-10-22 17:51:52');

-- --------------------------------------------------------

--
-- Table structure for table `offers_orders`
--

CREATE TABLE `offers_orders` (
  `offer_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offers_products`
--

CREATE TABLE `offers_products` (
  `offer_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `offers_products`
--

INSERT INTO `offers_products` (`offer_id`, `product_id`, `price`) VALUES
(1, 9, '12350.00'),
(1, 10, '6650.00'),
(2, 3, '4950.00'),
(2, 11, '700.00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deliver_date` datetime DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0=>not active, 1=>active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `addredss_id` bigint(20) UNSIGNED NOT NULL,
  `coupons_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `deliver_date`, `status`, `addredss_id`, `coupons_id`) VALUES
(3, '2021-10-25 00:00:00', '1', 2, NULL),
(4, '2021-10-31 00:00:00', '1', 1, NULL),
(5, '2021-10-27 00:00:00', '1', 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE `orders_products` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `quantity` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders_products`
--

INSERT INTO `orders_products` (`product_id`, `order_id`, `price`, `quantity`) VALUES
(4, 3, '15000.00', 1),
(8, 3, '500.00', 1),
(8, 4, '3500.00', 7),
(10, 3, '21000.00', 3),
(10, 4, '14000.00', 2),
(10, 5, '7000.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(1000) NOT NULL,
  `name_ar` varchar(1000) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `image` varchar(100) DEFAULT 'default.jpg',
  `desc_en` longtext NOT NULL,
  `desc_ar` longtext NOT NULL,
  `quantity` smallint(3) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 => active, 0=> not active',
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name_en`, `name_ar`, `price`, `image`, `desc_en`, `desc_ar`, `quantity`, `status`, `brand_id`, `subcategory_id`) VALUES
(2, 'hp-12', 'اتش بي 12', '3000.00', 'hp12.jpg', 'asfasdgdfdfsdgsfsfsdjfjasdgjnsdfhdfkllfksdlfsdlncsdfksgadfla;ad;fgsd;\'lfsdlfsd;\'f;\'asd;g\'dfjlsdfgjldfglsdlgsd;lflsdflsd;lfs;l', 'يسشببشسيبشسيبسبشب سشيبسيبسيبسيبلنمسيبن مليبنميبنملنيملنمسينبن  سيبنمسنمبنميبس ينمبنمسيبسنيبنمس ينمبسينبسيمبسينمبنم \r\n سيبسينمبنمسنمبنمسيبنمسينمبسينمبسينمنمسنمبسينبلث  قلفقافنتنبنمس شبنمشسنمبسينم', 5, 1, 1, 1),
(3, 'hp2400', 'اتش بي 2400', '5000.00', 'hp24.jpg', 'asfasdgdfdfsdgsfsfsdjfjasdgjnsdfhdfkllfksdlfsdlncsdfksgadfla;ad;fgsd;\'lfsdlfsd;\'f;\'asd;g\'dfjlsdfgjldfglsdlgsd;lflsdflsd;lfs;l', 'يسشببشسيبشسيبسبشب سشيبسيبسيبسيبلنمسيبن مليبنميبنملنيملنمسينبن  سيبنمسنمبنميبس ينمبنمسيبسنيبنمس ينمبسينبسيمبسينمبنم \r\n سيبسينمبنمسنمبنمسيبنمسينمبسينمبسينمنمسنمبسينبلث  قلفقافنتنبنمس شبنمشسنمبسينم', 3, 1, 1, 1),
(4, 'iphone-12', 'اي فون تولف', '15000.00', 'iphone12.jpg', 'DISPLAY\r\nSize: 6.1 inches\r\nResolution: 2532 x 1170 pixels, 457 PPI\r\nTechnology: OLED\r\nScreen-to-body: 87.24 %\r\nPeak brightness: 1200 cd/m2 (nit)\r\nFeatures: HDR video support, Oleophobic coating, Scratch-resistant glass (Ceramic Shield), Ambient light sensor, Proximity sensor\r\nHARDWARE\r\nSystem chip: Apple A14 Bionic\r\nProcessor: Hexa-core, 64-bit, 5 nm', 'عرض\r\nالحجم: 6.1 بوصة\r\nالدقة: 2532 × 1170 بكسل ، 457 نقطة في البوصة\r\nالتكنولوجيا: OLED\r\nالشاشة للجسم: 87.24٪\r\nسطوع الذروة: 1200 شمعة / م 2 (نيت)\r\nالميزات: دعم فيديو HDR ، طلاء مقاوم للزيوت ، زجاج مقاوم للخدش (درع سيراميك) ، مستشعر الإضاءة المحيطة ، مستشعر القرب\r\nالمعدات\r\nشريحة النظام: Apple A14 Bionic\r\nالمعالج: Hexa-core، 64-bit، 5 nm', 1, 1, 2, 2),
(6, 'OPPO Reno 5', 'اوبو رينو 5', '5690.00', 'opporeno5.jpg', 'Brand:OPPOPhone Type:SmartphoneColor:SilverStorage:128 GBRam:8 GBDisplay:Type : AMOLED, 90Hz, 430 nits (typ), 600 nits (peak) Size : 6.43 inches, 99.8 cm2 (~85.6% screen-to-body ratio) Resolution : 1080 x 2400 pixels, 20:9 ratio (~409 ppi density) Protection : Corning Gorilla Glass 3Sim:Dual SIMOS:Android 11, ColorOS 11.1CPU:Octa-coreMain Camera:64 MP + 8 MP + 2 MP + 2 MP', 'العلامة التجارية: OPPOP Phone النوع: هاتف ذكي اللون: فضي التخزين: 128 جيجا بايت رام: 8 جيجا بايت العرض: النوع: AMOLED ، 90 هرتز ، 430 شمعة (النوع) ، 600 شمعة (الذروة) الحجم: 6.43 بوصة ، 99.8 سم 2 (~ 85.6٪ نسبة الشاشة إلى الجسم) الدقة: 1080 × 2400 بكسل ، نسبة 20: 9 (كثافة 409 نقطة في البوصة) الحماية: Corning Gorilla Glass 3Sim: Dual SIMOS: Android 11 ، ColorOS 11.1CPU: Octa-core الكاميرا الرئيسية: 64 ميجابكسل + 8 ميجابكسل + 2 ميجابكسل + 2 ميجابكسل', 5, 1, 3, 2),
(7, 'Oppo A 94', 'اوبو ايه 94', '5500.00', 'oppoa94.jpg', 'Intelligent Battery & 30W VOOC Flash ChargeNothing more frustrating than a low battery alert; OPPO A94 won\'t let you down with it\'s longlasting 4310mAh battery and 30W VOOC Flash Charge. OPPO unique VOOC flash charging technology make it possible to watch videos for another 2.9 hours with just 5 minutes of charging. Say \"No\" to power off, and enjoy your happy moments\r\nMassive StorageBuiltin 128GB large storage capacity offers plenty of space to keep your favorite photos, videos and important working documents even huge communication records close at hand. Adding a MicroSD card is supported, no need worry about low capacity embarrassment.\r\nExcellent PerformanceFeel instant response time thanks to the MediaTek Helio P95 processor, OPPO A94 System Performance Optimizer delivers a smoother, more responsive experience that won\'t slow down even after extended use. Compatiable with GSM, UMTS, TDLTE, LTE FDD etc, both SIM cards 1 and 2 support these frequency bands.\r\nVersatile 48MP AI Color Portrait QuadCameraFeatured multilens and AIpowered camera which support DualView Video, AI Color Portrait Video, Night Flare Portrait, Live Focus etc. You can take vibrant photos even in dark with Night Scene. From macro to ultra wideangle and zoom shots, A94 displays life\'s journey in vibrant, crystalclear detail. Your smartphone is like your own personal film studio.\r\nWhat You GetComes with 1 x OPPO A94 Smartphone, 1 x Charger, 1 x Earphones, 1 x USB Data Cable, 1 x SIM Ejector Tool, 1 x Safety Guide, 1 x Quick Start Guide, 1x Protective Case. If you encounter any quality problems after receiving or using our products, please contact us asap. OPPO A94 mobile phone offers 1 Year Warranty, accessoriees not included in warranty period.\r\nConnector : USB Type C', 'بطارية ذكية وشحن فلاش 30 وات VOOC لا شيء أكثر إحباطًا من تنبيه البطارية المنخفضة ؛ لن يخذلك OPPO A94 مع بطارية طويلة الأمد 4310mAh و 30 W VOOC Flash Charge. تتيح تقنية شحن الفلاش VOOC الفريدة من OPPO مشاهدة مقاطع الفيديو لمدة 2.9 ساعة أخرى مع 5 دقائق فقط من الشحن. قل \"لا\" لإيقاف التشغيل ، واستمتع بلحظاتك السعيدة\r\nمساحة تخزين ضخمة توفر سعة التخزين الكبيرة التي تبلغ 128 جيجا بايت مساحة كبيرة للاحتفاظ بالصور ومقاطع الفيديو المفضلة لديك ووثائق العمل المهمة حتى في متناول اليد. إضافة بطاقة MicroSD مدعومة ، فلا داعي للقلق بشأن إحراج السعة المنخفضة.\r\nأداء ممتاز اشعر بوقت استجابة فوري بفضل معالج MediaTek Helio P95 ، يوفر مُحسِّن أداء النظام OPPO A94 تجربة أكثر سلاسة واستجابة لن تتباطأ حتى بعد الاستخدام المطول. متوافق مع GSM و UMTS و TDLTE و LTE FDD وما إلى ذلك ، تدعم كل من بطاقتي SIM 1 و 2 نطاقات التردد هذه.\r\nكاميرا رباعية متعددة الاستخدامات بدقة 48 ميجابكسل مزودة بتقنية الذكاء الاصطناعي وكاميرا متعددة العدسات مزودة بتقنية الذكاء الاصطناعي والتي تدعم فيديو DualView و AI Color Portrait و Night Flare Portrait و Live Focus وما إلى ذلك ، يمكنك التقاط صور نابضة بالحياة حتى في الظلام مع مشهد ليلي. من اللقطة المقربة إلى اللقطات واسعة الزاوية والتكبير ، تعرض كاميرا A94 رحلة الحياة بتفاصيل نابضة بالحياة وواضحة تمامًا. هاتفك الذكي مثل استوديو الأفلام الخاص بك.\r\nما تحصل عليه يأتي مع 1 x OPPO A94 Smartphone ، 1 x Charger ، 1 x Earphones ، 1 x USB Data Cable ، 1 x SIM Ejector Tool ، 1 x Safety Guide ، 1 x Quick Start Guide ، 1x Protection Case. إذا واجهت أي مشاكل في الجودة بعد استلام منتجاتنا أو استخدامها ، فيرجى الاتصال بنا في أسرع وقت ممكن. يوفر الهاتف المحمول OPPO A94 ضمانًا لمدة عام واحد ، الملحقات غير المدرجة في فترة الضمان.\r\nالموصل: USB Type C', 1, 1, 3, 2),
(8, 'New Super Mario', 'سوبر مريو الجديدة', '500.00', 'mario.jpg', 'A variety of playable characters are available, some with unique attributes that affect gameplay and platforming physics.\r\nYounger and less-experienced players will love playing as Toadette, who is brand new to both games, and Nabbit, who was formerly only playable in New Super Luigi U. Both characters offer extra assistance during play.\r\nMultiplayer sessions are even more fun, frantic, and exciting thanks to entertaining character interactions. Need a boost? Try jumping off a teammate’s head or getting a teammate to throw you!\r\nFeatures a wealth of help features, like a Hints gallery, reference videos**, and a Super Guide in New Super Mario Bros. U that can complete levels for you if they’re giving you trouble.\r\nThree additional modes—Boost Rush, Challenges, and Coin Battle—mix up gameplay and add replayability, while also upping the difficulty for players who want to try something harder. Players can use their Mii characters in these modes!\r\n', 'تتوفر مجموعة متنوعة من الشخصيات القابلة للعب ، بعضها بسمات فريدة تؤثر على أسلوب اللعب وفيزياء المنصات.\r\nسيحب اللاعبون الأصغر سنًا والأقل خبرة اللعب بشخصية Toadette ، وهو جديد تمامًا في كلتا اللعبتين ، و Nabbit ، الذي كان في السابق قابلاً للعب فقط في New Super Luigi U. تقدم كلا الشخصيتين مساعدة إضافية أثناء اللعب.\r\nتعد الجلسات متعددة اللاعبين أكثر متعة ، ومحمومة ، وإثارة بفضل تفاعلات الشخصيات المسلية. تحتاج دفعة؟ حاول القفز من رأس أحد زملائك في الفريق أو جعل زميلك في الفريق يرميك!\r\nتتميز بمجموعة كبيرة من ميزات المساعدة ، مثل معرض النصائح ومقاطع الفيديو المرجعية ** ودليل Super في New Super Mario Bros. U الذي يمكنه إكمال المستويات لك إذا كانت تسبب لك مشكلة.\r\nثلاثة أوضاع إضافية - Boost Rush و Challenges و Coin Battle - تخلط بين طريقة اللعب وتضيف إمكانية إعادة اللعب ، مع زيادة الصعوبة أيضًا للاعبين الذين يرغبون في تجربة شيء أكثر صعوبة. يمكن للاعبين استخدام شخصيات Mii الخاصة بهم في هذه الأوضاع!', 15, 1, 7, 7),
(9, 'Smart TV samsung', 'تلفزيون سامسونج', '13000.00', 'tv.jpg', 'Using this as a monitor and TV. Picked up on my Samsung sound bar immediately. Able to connect (wireless) from my surface book 3 and see it as an external monitor in 4k. Downloaded power toys from windows and set it up with fancy zones so it looks like the equivalent of 6 separate screens and you can lay the grid out however you like. Originally ordered a 65\" curved screen but it arrived with some issues and I had to return it. Really wanted another curved screen but they were out of stock so I settled (so I thought) for the flat 65\". This thing is a third of the weight, about a quarter of the thickness, and the screen is beautiful. Actually glad the other screen had the issues or I would never have ordered this model that I like so much better. Only issue I had was that when the delivery guys opened the door on the truck, the TV was laying over on top of some other boxes in the delivery truck with none of the other items in the truck secured in any way. I was advised that it had just fell over between this stop and the last. The guys were trying to pick it up from one end and there was a very noticeable amount of flex due to the way they were trying to maneuver it. I get it, I\'ve worked delivery. These guys just wanted it off their truck so they could get to the next stop. That being said, when I worked delivery, I would NEVER have let the customer see me handling something they just paid over $850 for in the manner they were. I voiced my concerns and was told, \"it\'s ok, if it\'s damaged you can just return it\". Come on, guys. At least act like you care about the item you\'re delivering.', 'باستخدام هذا كشاشة وتلفزيون. التقطت على مكبر الصوت Samsung الخاص بي على الفور. قادر على الاتصال (لاسلكيًا) من كتاب السطح 3 الخاص بي ورؤيته كشاشة خارجية بدقة 4k. تم تنزيل ألعاب الطاقة من النوافذ وإعدادها بمناطق خيالية بحيث تبدو وكأنها ما يعادل 6 شاشات منفصلة ويمكنك وضع الشبكة بالشكل الذي تريده. طلبت في الأصل شاشة منحنية مقاس 65 بوصة ولكنها وصلت مع بعض المشكلات واضطررت إلى إعادتها. أردت حقًا شاشة منحنية أخرى لكنها كانت غير متوفرة ، لذلك استقرت (لذلك اعتقدت) للشقة 65 المسطحة. هذا الشيء هو ثلث الوزن ، حوالي ربع السماكة ، والشاشة جميلة. في الواقع ، سعيد لأن الشاشة الأخرى واجهت المشكلات أو لم أكن لأطلب هذا النموذج الذي أحبه بشكل أفضل. المشكلة الوحيدة التي واجهتني هي أنه عندما فتح موظفو التوصيل الباب على الشاحنة ، كان التلفزيون مستلقياً فوق بعض الصناديق الأخرى في شاحنة التوصيل ولم يتم تأمين أي من العناصر الأخرى في الشاحنة بأي شكل من الأشكال. تم إخباري أنه قد وقع للتو بين هذه المحطة والأخيرة. كان الرجال يحاولون التقاطه من أحد الأطراف وكان هناك قدر ملحوظ جدًا من الثني بسبب الطريقة التي كانوا يحاولون بها المناورة. لقد فهمت ، لقد عملت التسليم. هؤلاء الرجال فقط أرادوها من شاحنتهم حتى يتمكنوا من الوصول إلى المحطة التالية. ومع ذلك ، عندما كنت أعمل في التوصيل ، لم أكن لأسمح للعميل برؤيتي وأنا أتعامل مع شيء دفعه للتو أكثر من 850 دولارًا بالطريقة التي كان عليها. عبرت عن مخاوفي وقيل لي ، \"لا بأس ، إذا كان تالفًا ، يمكنك فقط إعادته\". كونوا واقعيين يا قوم. على الأقل تصرف وكأنك تهتم بالعنصر الذي تقدمه.', 10, 1, 6, 9),
(10, 'Samsung TracFone Galaxy A21', 'سامسونج ترايس فون جلاكسي', '7000.00', 'A21.jpg', 'ntroducing the new A Series. The Samsung Galaxy A21 combines smartphone essentials with the trusted reliability of Samsung. Take beautifully crisp photos and videos with our powerful quad lens camera. Enjoy cinematic clarity on our 6.5\" edge-to-edge display. Keep going with a long-lasting 4,000 mAh battery that keeps going with you throughout the day.\r\nCharge up. Power through. Spend more time scrolling, texting and sharing, and less time looking for an outlet to charge. This long-lasting 4,000mAh battery has the power to keep up with you.\r\n6.5\" HD-plus Screen; 2.3 GHz plus 1.8 GHz Octa-Core Processor; Android 10.0; Quad 16MP plus 8MP plus 2MP plus 2MP Rear Cameras/13MP Front Facing Camera; Internal Memory 32 GB (device only); Supports microSD Memory Card up to 512GB (NOT INCLUDED)\r\n4G LTE; Wi-Fi Capable; Bluetooth 4.2 wireless technology; GPS Capable\r\nCarrier: This phone is locked to Tracfone which means this Device can only be used on the Tracfone network', 'تقديم سلسلة A الجديدة. يجمع Samsung Galaxy A21 بين أساسيات الهاتف الذكي والموثوقية الموثوقة من Samsung. التقط صورًا ومقاطع فيديو واضحة بشكل جميل باستخدام الكاميرا القوية رباعية العدسات. استمتع بالوضوح السينمائي على شاشة 6.5 بوصة من الحافة إلى الحافة ، واستمر في العمل مع بطارية تدوم طويلاً تبلغ 4000 مللي أمبير في الساعة تستمر معك طوال اليوم.\r\nاشحن. قوة من خلال. اقض وقتًا أطول في التمرير وإرسال الرسائل النصية والمشاركة ووقتًا أقل في البحث عن منفذ لشحنه. تتمتع هذه البطارية التي تدوم طويلاً والتي تبلغ سعتها 4000 مللي أمبير بالقدرة على مواكبة احتياجاتك.\r\nشاشة 6.5 بوصة عالية الدقة ؛ 2.3 جيجاهرتز بالإضافة إلى معالج ثماني النواة بسرعة 1.8 جيجاهرتز ؛ Android 10.0 ؛ رباعي 16 ميجابكسل بالإضافة إلى 8 ميجابكسل وكاميرات خلفية 2 ميجابكسل / كاميرا أمامية بدقة 13 ميجابكسل ؛ ذاكرة داخلية 32 جيجابايت (للجهاز فقط) ؛ يدعم بطاقة ذاكرة microSD حتى إلى 512 جيجابايت (غير متضمن)\r\n4G LTE ؛ واي فاي قادر. تقنية Bluetooth 4.2 اللاسلكية ؛ القدرة على نظام تحديد المواقع العالمي (GPS)\r\nالناقل: هذا الهاتف مغلق على Tracfone مما يعني أنه لا يمكن استخدام هذا الجهاز إلا على شبكة Tracfone', 9, 1, 6, 2),
(11, 'Laptop Table for Bed', 'طرابيزة لاب توب للسرير', '750.00', 'labtop_table.jpg', '[Large Size Adjustable Laptop DesK]:With 24”*13.8” of size which fits for 17” or larger laptop; Two auto-lock buttons on each side easily enable quick changes in height, legs can be set to 5 different heights (adjustable from 10.6\" - 15.4\") in addition two clamps may be used to adjust the surface angle, surface can be set to 4 different angles (from 0°-36°).\r\n[Useful Bed Desk]: A detachable mouse and notebook slip helps keep your device on the table even when you lie down in your bed, preventing the tablet and mouse from sliding off the table. Ideal gifts choice.\r\n[Multifunction Portable Table]: This multifunctional table will be a perfect addition to your office, home or home office.Use it as a laptop workstation, laptop stand for bed, a children\'s bed table, a mini writing table, laptop couch table,a standing table for office work,it becomes the great balance for relaxing and productivity.\r\n[Foldable Laptop Table]: Light but sturdy, folds flat for space-saving storage and portability. Executive office Solutions, set up your lap top or writing work station anywhere in your home or office. Solution for achieving healthier working condition and more convenient lifestyle.\r\n[24 Hours Customer Service]: We have a professional customer service support. Any question about our portable laptop table, please contact us without any hesitation via E-mail, we will provide you with the best after-sell service within 24 hours.', '[مكتب كمبيوتر محمول كبير الحجم قابل للتعديل]: بحجم 24 بوصة * 13.8 بوصة والذي يناسب كمبيوتر محمول مقاس 17 بوصة أو أكبر ؛ يتيح زران للقفل التلقائي على كل جانب تغييرات سريعة في الارتفاع بسهولة ، ويمكن ضبط الأرجل على 5 ارتفاعات مختلفة (قابلة للتعديل من 10.6 \"- 15.4\") بالإضافة إلى ذلك يمكن استخدام مشبكين لضبط زاوية السطح ، ويمكن ضبط السطح على 4 زوايا مختلفة (من 0 درجة إلى 36 درجة).\r\n[مكتب سرير مفيد]: يساعد انزلاق الماوس والكمبيوتر المحمول القابل للفصل على إبقاء جهازك على الطاولة حتى عندما تستلقي على سريرك ، مما يمنع الجهاز اللوحي والماوس من الانزلاق عن الطاولة. اختيار الهدايا المثالي.\r\n[طاولة محمولة متعددة الوظائف]: ستكون هذه الطاولة متعددة الوظائف إضافة مثالية لمكتبك أو منزلك أو مكتبك المنزلي. استخدمها كمحطة عمل للكمبيوتر المحمول ، وحامل كمبيوتر محمول للسرير ، وطاولة سرير للأطفال ، وطاولة كتابة صغيرة ، وطاولة أريكة للكمبيوتر المحمول ، و طاولة الوقوف للعمل المكتبي ، تصبح التوازن الكبير للاسترخاء والإنتاجية.\r\n[طاولة كمبيوتر محمول قابلة للطي]: خفيف ولكن قوي ، يمكن طيه بشكل مسطح لتوفير مساحة التخزين وإمكانية النقل. حلول المكتب التنفيذي ، قم بإعداد اللاب توب الخاص بك أو محطة عمل للكتابة في أي مكان في منزلك أو مكتبك. حل لتحقيق ظروف عمل صحية ونمط حياة أكثر ملاءمة.\r\n[خدمة العملاء على مدار 24 ساعة]: لدينا دعم محترف لخدمة العملاء. إذا كان لديك أي سؤال حول طاولة الكمبيوتر المحمول المحمولة الخاصة بنا ، فيرجى الاتصال بنا دون أي تردد عبر البريد الإلكتروني ، وسوف نقدم لك أفضل خدمة ما بعد البيع في غضون 24 ساعة.', 6, 1, 7, 8);

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(30) NOT NULL,
  `name_ar` varchar(30) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0=>not active , 1=> active',
  `distance` bigint(20) DEFAULT NULL,
  `log` decimal(20,5) NOT NULL,
  `lat` decimal(20,5) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `city_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `name_en`, `name_ar`, `status`, `distance`, `log`, `lat`, `city_id`) VALUES
(1, 'New Cairo', 'القاهرة الجديدة', '1', 5000, '20.66000', '50.55000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` varchar(1000) DEFAULT NULL,
  `value` tinyint(1) DEFAULT '0' COMMENT '0=> not selected ,1=>very bad,2=>very bad 3=> good, 4=>very good, 5=>excellent',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`product_id`, `user_id`, `comment`, `value`) VALUES
(4, 1, 'That is very well', 3),
(4, 17, 'I had some problem with this product', 2),
(4, 18, NULL, 3),
(6, 1, 'that is very good product.', 5),
(6, 17, 'Not good exactly.', 2),
(8, 1, 'That is good Game', 5),
(8, 17, 'I am Very Happy to buy this video game', 4),
(10, 1, 'this mobile very good and It has no issues', 5),
(10, 17, 'no good enough', 1),
(10, 18, 'We have problems with this mobile', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `show_subcategories_product`
-- (See below for the actual view)
--
CREATE TABLE `show_subcategories_product` (
`id` bigint(20) unsigned
,`name_en` varchar(1000)
,`name_ar` varchar(1000)
,`price` decimal(7,2)
,`image` varchar(100)
,`desc_en` longtext
,`desc_ar` longtext
,`quantity` smallint(3)
,`status` tinyint(1)
,`brand_id` bigint(20) unsigned
,`subcategory_id` bigint(20) unsigned
,`create_at` timestamp
,`updated_at` timestamp
);

-- --------------------------------------------------------

--
-- Table structure for table `specs`
--

CREATE TABLE `specs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(50) NOT NULL,
  `name_ar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `specs`
--

INSERT INTO `specs` (`id`, `name_en`, `name_ar`) VALUES
(1, 'Color', 'اللون'),
(2, 'Memory storage capacity', 'السعة التخزينية'),
(3, 'Screen size', 'حجم الشاشة'),
(4, 'OS', 'نظام التشغيل'),
(5, 'RAM', 'ذاكرة الوصول العشوائية');

-- --------------------------------------------------------

--
-- Table structure for table `specs_products`
--

CREATE TABLE `specs_products` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `spec_id` bigint(20) UNSIGNED NOT NULL,
  `spec_value` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `specs_products`
--

INSERT INTO `specs_products` (`product_id`, `spec_id`, `spec_value`) VALUES
(2, 1, 'Blue'),
(2, 2, '320 GB'),
(2, 3, '20 Inches'),
(2, 4, 'Windows'),
(2, 5, '4 GB'),
(3, 1, 'Silver'),
(3, 2, '500 GB'),
(3, 3, '15.6 Inches'),
(3, 4, 'DOS'),
(3, 5, '2 GB'),
(4, 1, 'Black'),
(4, 2, '128GB'),
(4, 3, '6.1 Inches'),
(4, 4, 'IOS'),
(4, 5, '8GB'),
(6, 1, 'Fantasy Silver'),
(6, 2, '128 GB'),
(6, 3, '6.43 Inches'),
(6, 4, '	Android'),
(6, 5, '6GB'),
(7, 1, 'Fantastic Purple'),
(7, 2, '128GB'),
(7, 3, '6.43 Inches'),
(7, 4, 'ColorOS 11.1 based on Android 11'),
(7, 5, '8GB');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(30) NOT NULL,
  `name_ar` varchar(30) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `image` varchar(50) NOT NULL DEFAULT 'default.jpg',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name_en`, `name_ar`, `status`, `image`, `category_id`) VALUES
(1, 'computer', 'كمبيوتر', '1', 'computer.jpg', 1),
(2, 'Mobile', 'محمول', '1', 'mobile.jpg', 1),
(4, 'Ladies Clothing', 'ملابس حريمي', '1', 'lady.jpg', 4),
(6, 'Men Clothing', 'ملابس رجالي', '1', 'man.jpg', 4),
(7, 'video game', 'العاب فديو', '1', 'default.png', 5),
(8, 'Laptop Table', 'طرابيذة لاب توب', '1', 'table.jpg', 6),
(9, 'TV', 'تلفزيون', '1', 'TV.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` enum('f','m') DEFAULT NULL COMMENT 'f=> female, m=> male',
  `status` tinyint(1) DEFAULT '0' COMMENT '0=> user not verified ,1=>user verified',
  `code` int(5) DEFAULT NULL,
  `image` varchar(50) NOT NULL DEFAULT 'default.jpg',
  `verified_at` timestamp NULL DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone`, `password`, `gender`, `status`, `code`, `image`, `verified_at`) VALUES
(1, 'ahmed', 'abas', 'ahmed@gmail.com', '011', '84af52c597e04e0a4c9d4b370de87f2fed8cf535', 'm', 1, 77779, 'default.jpg', '2021-10-10 16:57:14'),
(17, 'medo', 'Elrouby', 'elrouby0257@gmail.com', '01061974386', 'a73720f951a0a5f3b5a7f60f9f97589d1446b57b', 'm', 1, 83718, '1634666940-17.png', '2021-10-19 16:57:14'),
(18, 'saly@#$@#%', 'seco@#$#$@.,\'', 'saly@gmail.com', '654', 'c0c1b5190766f2345330cc9b8425cb1ad7b49f31', 'f', 1, 70649, 'default.jpg', '2021-10-18 14:37:39'),
(19, 'Zaid', 'Sayed', 'zezo@gmail.com', '14123423', '19c6b63c248a80ff2a55cfc48bf851d7f6586d04', 'm', 1, 34560, 'default.jpg', '2021-10-15 10:30:35'),
(20, 'Salma', 'Mohamed', 'saloma@gmail.com', '2342359', '7b1e4e93ea38d7e47a42143f5a4624657db38e2a', 'f', 1, 45645, 'default.jpg', '2021-10-18 10:30:35'),
(21, 'mizo', 'ali', 'asas@gmail.com', '235356457', 'dd2911cf82abd60e610f3b0a2e0b90cf47dc4d8f', 'm', 1, 34254, 'default.jpg', '2021-10-22 17:55:20');

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`user_id`, `product_id`) VALUES
(1, 2),
(17, 2),
(18, 2),
(1, 6),
(17, 6),
(18, 6),
(19, 6),
(20, 6),
(1, 9),
(17, 9),
(1, 10),
(17, 10),
(18, 10),
(19, 10);

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure for view `most_order_product`
--
DROP TABLE IF EXISTS `most_order_product`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `most_order_product`  AS  select `products`.`id` AS `id`,`products`.`name_en` AS `name_en`,`products`.`name_ar` AS `name_ar`,`products`.`price` AS `price`,`products`.`image` AS `image`,`products`.`desc_en` AS `desc_en`,`products`.`desc_ar` AS `desc_ar`,`products`.`quantity` AS `quantity`,`products`.`status` AS `status`,`products`.`brand_id` AS `brand_id`,`products`.`subcategory_id` AS `subcategory_id`,`products`.`create_at` AS `create_at`,`products`.`updated_at` AS `updated_at`,sum(`orders_products`.`quantity`) AS `order_prodduct_total` from (`orders_products` join `products` on((`orders_products`.`product_id` = `products`.`id`))) group by `orders_products`.`product_id` order by `order_prodduct_total` desc limit 2 ;

-- --------------------------------------------------------

--
-- Structure for view `show_subcategories_product`
--
DROP TABLE IF EXISTS `show_subcategories_product`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `show_subcategories_product`  AS  select `products`.`id` AS `id`,`products`.`name_en` AS `name_en`,`products`.`name_ar` AS `name_ar`,`products`.`price` AS `price`,`products`.`image` AS `image`,`products`.`desc_en` AS `desc_en`,`products`.`desc_ar` AS `desc_ar`,`products`.`quantity` AS `quantity`,`products`.`status` AS `status`,`products`.`brand_id` AS `brand_id`,`products`.`subcategory_id` AS `subcategory_id`,`products`.`create_at` AS `create_at`,`products`.`updated_at` AS `updated_at` from `products` where `products`.`subcategory_id` in (select `subcategories`.`id` from `subcategories` where (`subcategories`.`category_id` = (select `subcategories`.`category_id` from `subcategories` where (`subcategories`.`id` = (select `products`.`subcategory_id` from `products` where (`products`.`id` = 2)))))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_users_fk` (`user_id`),
  ADD KEY `addresses_regions_fk` (`region_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`user_id`,`product_id`),
  ADD KEY `carts_products_fk` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons_products`
--
ALTER TABLE `coupons_products`
  ADD PRIMARY KEY (`product_id`,`coupon_id`),
  ADD KEY `coupons_products_coupons` (`coupon_id`);

--
-- Indexes for table `coupons_users`
--
ALTER TABLE `coupons_users`
  ADD PRIMARY KEY (`user_id`,`coupon_id`),
  ADD KEY `coupons_users_coupons` (`coupon_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers_orders`
--
ALTER TABLE `offers_orders`
  ADD PRIMARY KEY (`offer_id`,`order_id`),
  ADD KEY `offers_orders_orders` (`order_id`);

--
-- Indexes for table `offers_products`
--
ALTER TABLE `offers_products`
  ADD PRIMARY KEY (`offer_id`,`product_id`),
  ADD KEY `offers_products_products` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_orders_fk` (`addredss_id`),
  ADD KEY `coupons_orders_fk` (`coupons_id`);

--
-- Indexes for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`product_id`,`order_id`),
  ADD KEY `orders_products_orders` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brands_products_fk` (`brand_id`),
  ADD KEY `products_subcategory_fk` (`subcategory_id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_regions_fk` (`city_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`product_id`,`user_id`),
  ADD KEY `reviews_users_fk` (`user_id`);

--
-- Indexes for table `specs`
--
ALTER TABLE `specs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specs_products`
--
ALTER TABLE `specs_products`
  ADD PRIMARY KEY (`product_id`,`spec_id`),
  ADD KEY `specs_product_specs_fk` (`spec_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_subcategories_fk` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`user_id`,`product_id`),
  ADD KEY `products_views` (`product_id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`product_id`,`user_id`),
  ADD KEY `users_wishlists_fk` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `specs`
--
ALTER TABLE `specs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_regions_fk` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `addresses_users_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_products_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `carts_users_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `coupons_products`
--
ALTER TABLE `coupons_products`
  ADD CONSTRAINT `coupons_products_coupons` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `coupons_products_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `coupons_users`
--
ALTER TABLE `coupons_users`
  ADD CONSTRAINT `coupons_users_coupons` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `coupons_users_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `offers_orders`
--
ALTER TABLE `offers_orders`
  ADD CONSTRAINT `offers_orders_offers` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `offers_orders_orders` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `offers_products`
--
ALTER TABLE `offers_products`
  ADD CONSTRAINT `offers_products_offers` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `offers_products_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `addresses_orders_fk` FOREIGN KEY (`addredss_id`) REFERENCES `addresses` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `coupons_orders_fk` FOREIGN KEY (`coupons_id`) REFERENCES `coupons` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD CONSTRAINT `orders_products_orders` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `orders_products_products_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `brands_products_fk` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `products_subcategory_fk` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `regions`
--
ALTER TABLE `regions`
  ADD CONSTRAINT `cities_regions_fk` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_products_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `reviews_users_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `specs_products`
--
ALTER TABLE `specs_products`
  ADD CONSTRAINT `products_product_specs_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `specs_product_specs_fk` FOREIGN KEY (`spec_id`) REFERENCES `specs` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `categories_subcategories_fk` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `views`
--
ALTER TABLE `views`
  ADD CONSTRAINT `products_views` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `users_views` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `products_wishlists_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `users_wishlists_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
