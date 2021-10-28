-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 28, 2021 at 01:26 PM
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
-- Database: `laravel`
--

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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(30) NOT NULL,
  `name_ar` varchar(30) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '1=> active, 0=> not active',
  `image` varchar(50) NOT NULL DEFAULT 'default.jpg',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_en`, `name_ar`, `status`, `image`, `created_at`) VALUES
(1, 'Electronics', 'الكترونيات', '1', 'default.jpg', '2021-10-25 09:21:31'),
(2, 'Makeup', 'ميكب', '1', 'default.jpg', '2021-10-25 09:21:31'),
(4, 'Clothes', 'ملابس', '1', 'default.jpg', '2021-10-25 09:21:31'),
(5, 'Gaming', 'العاب', '1', 'default.jpg', '2021-10-25 09:21:31'),
(6, 'Furniture', 'اثاث', '1', 'default.jpg', '2021-10-25 09:21:31');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(25, '2014_10_12_000000_create_users_table', 1),
(26, '2014_10_12_100000_create_password_resets_table', 1),
(27, '2019_08_19_000000_create_failed_jobs_table', 1),
(28, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(14, 'App\\Models\\User', 9, 'elrouby0257@ahmed.com', '1009e6b9c1a95e8306fac316208cc98c13e0ba6486c7e56ee9e8443be7e8dd85', '[\"*\"]', '2021-10-27 19:23:52', '2021-10-27 18:13:15', '2021-10-27 19:23:52'),
(31, 'App\\Models\\User', 10, 'elrouby0257@gmail.com', 'fafca7a58f519685ed89c22aefc8fcf1423768cc8b98261ad649626b976fe002', '[\"*\"]', '2021-10-28 13:24:51', '2021-10-28 13:13:06', '2021-10-28 13:24:51');

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
  `quantity` smallint(3) DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 => active, 0=> not active',
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name_en`, `name_ar`, `price`, `image`, `desc_en`, `desc_ar`, `quantity`, `status`, `brand_id`, `subcategory_id`, `created_at`, `updated_at`) VALUES
(2, 'hp-12', 'اتش بي 12', '3000.00', 'hp12.jpg', 'asfasdgdfdfsdgsfsfsdjfjasdgjnsdfhdfkllfksdlfsdlncsdfksgadfla;ad;fgsd;\'lfsdlfsd;\'f;\'asd;g\'dfjlsdfgjldfglsdlgsd;lflsdflsd;lfs;l', 'يسشببشسيبشسيبسبشب سشيبسيبسيبسيبلنمسيبن مليبنميبنملنيملنمسينبن  سيبنمسنمبنميبس ينمبنمسيبسنيبنمس ينمبسينبسيمبسينمبنم \r\n سيبسينمبنمسنمبنمسيبنمسينمبسينمبسينمنمسنمبسينبلث  قلفقافنتنبنمس شبنمشسنمبسينم', 5, 1, 1, 1, '2021-10-25 09:21:00', '2021-10-25 09:21:00'),
(3, 'hp2400', 'اتش بي 2400', '5000.00', 'hp24.jpg', 'asfasdgdfdfsdgsfsfsdjfjasdgjnsdfhdfkllfksdlfsdlncsdfksgadfla;ad;fgsd;\'lfsdlfsd;\'f;\'asd;g\'dfjlsdfgjldfglsdlgsd;lflsdflsd;lfs;l', 'يسشببشسيبشسيبسبشب سشيبسيبسيبسيبلنمسيبن مليبنميبنملنيملنمسينبن  سيبنمسنمبنميبس ينمبنمسيبسنيبنمس ينمبسينبسيمبسينمبنم \r\n سيبسينمبنمسنمبنمسيبنمسينمبسينمبسينمنمسنمبسينبلث  قلفقافنتنبنمس شبنمشسنمبسينم', 3, 1, 1, 1, '2021-10-25 09:21:00', '2021-10-25 09:21:00'),
(4, 'iphone-12', 'اي فون تولف', '15000.00', 'iphone12.jpg', 'DISPLAY\r\nSize: 6.1 inches\r\nResolution: 2532 x 1170 pixels, 457 PPI\r\nTechnology: OLED\r\nScreen-to-body: 87.24 %\r\nPeak brightness: 1200 cd/m2 (nit)\r\nFeatures: HDR video support, Oleophobic coating, Scratch-resistant glass (Ceramic Shield), Ambient light sensor, Proximity sensor\r\nHARDWARE\r\nSystem chip: Apple A14 Bionic\r\nProcessor: Hexa-core, 64-bit, 5 nm', 'عرض\r\nالحجم: 6.1 بوصة\r\nالدقة: 2532 × 1170 بكسل ، 457 نقطة في البوصة\r\nالتكنولوجيا: OLED\r\nالشاشة للجسم: 87.24٪\r\nسطوع الذروة: 1200 شمعة / م 2 (نيت)\r\nالميزات: دعم فيديو HDR ، طلاء مقاوم للزيوت ، زجاج مقاوم للخدش (درع سيراميك) ، مستشعر الإضاءة المحيطة ، مستشعر القرب\r\nالمعدات\r\nشريحة النظام: Apple A14 Bionic\r\nالمعالج: Hexa-core، 64-bit، 5 nm', 0, 1, 2, 2, '2021-10-25 09:21:00', '2021-10-25 09:21:00'),
(6, 'OPPO Reno 5', 'اوبو رينو 5', '5690.00', 'opporeno5.jpg', 'Brand:OPPOPhone Type:SmartphoneColor:SilverStorage:128 GBRam:8 GBDisplay:Type : AMOLED, 90Hz, 430 nits (typ), 600 nits (peak) Size : 6.43 inches, 99.8 cm2 (~85.6% screen-to-body ratio) Resolution : 1080 x 2400 pixels, 20:9 ratio (~409 ppi density) Protection : Corning Gorilla Glass 3Sim:Dual SIMOS:Android 11, ColorOS 11.1CPU:Octa-coreMain Camera:64 MP + 8 MP + 2 MP + 2 MP', 'العلامة التجارية: OPPOP Phone النوع: هاتف ذكي اللون: فضي التخزين: 128 جيجا بايت رام: 8 جيجا بايت العرض: النوع: AMOLED ، 90 هرتز ، 430 شمعة (النوع) ، 600 شمعة (الذروة) الحجم: 6.43 بوصة ، 99.8 سم 2 (~ 85.6٪ نسبة الشاشة إلى الجسم) الدقة: 1080 × 2400 بكسل ، نسبة 20: 9 (كثافة 409 نقطة في البوصة) الحماية: Corning Gorilla Glass 3Sim: Dual SIMOS: Android 11 ، ColorOS 11.1CPU: Octa-core الكاميرا الرئيسية: 64 ميجابكسل + 8 ميجابكسل + 2 ميجابكسل + 2 ميجابكسل', 5, 1, 3, 2, '2021-10-25 09:21:00', '2021-10-25 09:21:00'),
(7, 'Oppo A 94', 'اوبو ايه 94', '5500.00', 'oppoa94.jpg', 'Intelligent Battery & 30W VOOC Flash ChargeNothing more frustrating than a low battery alert; OPPO A94 won\'t let you down with it\'s longlasting 4310mAh battery and 30W VOOC Flash Charge. OPPO unique VOOC flash charging technology make it possible to watch videos for another 2.9 hours with just 5 minutes of charging. Say \"No\" to power off, and enjoy your happy moments\r\nMassive StorageBuiltin 128GB large storage capacity offers plenty of space to keep your favorite photos, videos and important working documents even huge communication records close at hand. Adding a MicroSD card is supported, no need worry about low capacity embarrassment.\r\nExcellent PerformanceFeel instant response time thanks to the MediaTek Helio P95 processor, OPPO A94 System Performance Optimizer delivers a smoother, more responsive experience that won\'t slow down even after extended use. Compatiable with GSM, UMTS, TDLTE, LTE FDD etc, both SIM cards 1 and 2 support these frequency bands.\r\nVersatile 48MP AI Color Portrait QuadCameraFeatured multilens and AIpowered camera which support DualView Video, AI Color Portrait Video, Night Flare Portrait, Live Focus etc. You can take vibrant photos even in dark with Night Scene. From macro to ultra wideangle and zoom shots, A94 displays life\'s journey in vibrant, crystalclear detail. Your smartphone is like your own personal film studio.\r\nWhat You GetComes with 1 x OPPO A94 Smartphone, 1 x Charger, 1 x Earphones, 1 x USB Data Cable, 1 x SIM Ejector Tool, 1 x Safety Guide, 1 x Quick Start Guide, 1x Protective Case. If you encounter any quality problems after receiving or using our products, please contact us asap. OPPO A94 mobile phone offers 1 Year Warranty, accessoriees not included in warranty period.\r\nConnector : USB Type C', 'بطارية ذكية وشحن فلاش 30 وات VOOC لا شيء أكثر إحباطًا من تنبيه البطارية المنخفضة ؛ لن يخذلك OPPO A94 مع بطارية طويلة الأمد 4310mAh و 30 W VOOC Flash Charge. تتيح تقنية شحن الفلاش VOOC الفريدة من OPPO مشاهدة مقاطع الفيديو لمدة 2.9 ساعة أخرى مع 5 دقائق فقط من الشحن. قل \"لا\" لإيقاف التشغيل ، واستمتع بلحظاتك السعيدة\r\nمساحة تخزين ضخمة توفر سعة التخزين الكبيرة التي تبلغ 128 جيجا بايت مساحة كبيرة للاحتفاظ بالصور ومقاطع الفيديو المفضلة لديك ووثائق العمل المهمة حتى في متناول اليد. إضافة بطاقة MicroSD مدعومة ، فلا داعي للقلق بشأن إحراج السعة المنخفضة.\r\nأداء ممتاز اشعر بوقت استجابة فوري بفضل معالج MediaTek Helio P95 ، يوفر مُحسِّن أداء النظام OPPO A94 تجربة أكثر سلاسة واستجابة لن تتباطأ حتى بعد الاستخدام المطول. متوافق مع GSM و UMTS و TDLTE و LTE FDD وما إلى ذلك ، تدعم كل من بطاقتي SIM 1 و 2 نطاقات التردد هذه.\r\nكاميرا رباعية متعددة الاستخدامات بدقة 48 ميجابكسل مزودة بتقنية الذكاء الاصطناعي وكاميرا متعددة العدسات مزودة بتقنية الذكاء الاصطناعي والتي تدعم فيديو DualView و AI Color Portrait و Night Flare Portrait و Live Focus وما إلى ذلك ، يمكنك التقاط صور نابضة بالحياة حتى في الظلام مع مشهد ليلي. من اللقطة المقربة إلى اللقطات واسعة الزاوية والتكبير ، تعرض كاميرا A94 رحلة الحياة بتفاصيل نابضة بالحياة وواضحة تمامًا. هاتفك الذكي مثل استوديو الأفلام الخاص بك.\r\nما تحصل عليه يأتي مع 1 x OPPO A94 Smartphone ، 1 x Charger ، 1 x Earphones ، 1 x USB Data Cable ، 1 x SIM Ejector Tool ، 1 x Safety Guide ، 1 x Quick Start Guide ، 1x Protection Case. إذا واجهت أي مشاكل في الجودة بعد استلام منتجاتنا أو استخدامها ، فيرجى الاتصال بنا في أسرع وقت ممكن. يوفر الهاتف المحمول OPPO A94 ضمانًا لمدة عام واحد ، الملحقات غير المدرجة في فترة الضمان.\r\nالموصل: USB Type C', 1, 1, 3, 2, '2021-10-25 09:21:00', '2021-10-25 09:21:00'),
(8, 'New Super Mario', 'سوبر مريو الجديدة', '500.00', 'mario.jpg', 'A variety of playable characters are available, some with unique attributes that affect gameplay and platforming physics.\r\nYounger and less-experienced players will love playing as Toadette, who is brand new to both games, and Nabbit, who was formerly only playable in New Super Luigi U. Both characters offer extra assistance during play.\r\nMultiplayer sessions are even more fun, frantic, and exciting thanks to entertaining character interactions. Need a boost? Try jumping off a teammate’s head or getting a teammate to throw you!\r\nFeatures a wealth of help features, like a Hints gallery, reference videos**, and a Super Guide in New Super Mario Bros. U that can complete levels for you if they’re giving you trouble.\r\nThree additional modes—Boost Rush, Challenges, and Coin Battle—mix up gameplay and add replayability, while also upping the difficulty for players who want to try something harder. Players can use their Mii characters in these modes!\r\n', 'تتوفر مجموعة متنوعة من الشخصيات القابلة للعب ، بعضها بسمات فريدة تؤثر على أسلوب اللعب وفيزياء المنصات.\r\nسيحب اللاعبون الأصغر سنًا والأقل خبرة اللعب بشخصية Toadette ، وهو جديد تمامًا في كلتا اللعبتين ، و Nabbit ، الذي كان في السابق قابلاً للعب فقط في New Super Luigi U. تقدم كلا الشخصيتين مساعدة إضافية أثناء اللعب.\r\nتعد الجلسات متعددة اللاعبين أكثر متعة ، ومحمومة ، وإثارة بفضل تفاعلات الشخصيات المسلية. تحتاج دفعة؟ حاول القفز من رأس أحد زملائك في الفريق أو جعل زميلك في الفريق يرميك!\r\nتتميز بمجموعة كبيرة من ميزات المساعدة ، مثل معرض النصائح ومقاطع الفيديو المرجعية ** ودليل Super في New Super Mario Bros. U الذي يمكنه إكمال المستويات لك إذا كانت تسبب لك مشكلة.\r\nثلاثة أوضاع إضافية - Boost Rush و Challenges و Coin Battle - تخلط بين طريقة اللعب وتضيف إمكانية إعادة اللعب ، مع زيادة الصعوبة أيضًا للاعبين الذين يرغبون في تجربة شيء أكثر صعوبة. يمكن للاعبين استخدام شخصيات Mii الخاصة بهم في هذه الأوضاع!', 15, 1, 7, 7, '2021-10-25 09:21:00', '2021-10-25 09:21:00'),
(9, 'Smart TV samsung', 'تلفزيون سامسونج', '13000.00', 'tv.jpg', 'Using this as a monitor and TV. Picked up on my Samsung sound bar immediately. Able to connect (wireless) from my surface book 3 and see it as an external monitor in 4k. Downloaded power toys from windows and set it up with fancy zones so it looks like the equivalent of 6 separate screens and you can lay the grid out however you like. Originally ordered a 65\" curved screen but it arrived with some issues and I had to return it. Really wanted another curved screen but they were out of stock so I settled (so I thought) for the flat 65\". This thing is a third of the weight, about a quarter of the thickness, and the screen is beautiful. Actually glad the other screen had the issues or I would never have ordered this model that I like so much better. Only issue I had was that when the delivery guys opened the door on the truck, the TV was laying over on top of some other boxes in the delivery truck with none of the other items in the truck secured in any way. I was advised that it had just fell over between this stop and the last. The guys were trying to pick it up from one end and there was a very noticeable amount of flex due to the way they were trying to maneuver it. I get it, I\'ve worked delivery. These guys just wanted it off their truck so they could get to the next stop. That being said, when I worked delivery, I would NEVER have let the customer see me handling something they just paid over $850 for in the manner they were. I voiced my concerns and was told, \"it\'s ok, if it\'s damaged you can just return it\". Come on, guys. At least act like you care about the item you\'re delivering.', 'باستخدام هذا كشاشة وتلفزيون. التقطت على مكبر الصوت Samsung الخاص بي على الفور. قادر على الاتصال (لاسلكيًا) من كتاب السطح 3 الخاص بي ورؤيته كشاشة خارجية بدقة 4k. تم تنزيل ألعاب الطاقة من النوافذ وإعدادها بمناطق خيالية بحيث تبدو وكأنها ما يعادل 6 شاشات منفصلة ويمكنك وضع الشبكة بالشكل الذي تريده. طلبت في الأصل شاشة منحنية مقاس 65 بوصة ولكنها وصلت مع بعض المشكلات واضطررت إلى إعادتها. أردت حقًا شاشة منحنية أخرى لكنها كانت غير متوفرة ، لذلك استقرت (لذلك اعتقدت) للشقة 65 المسطحة. هذا الشيء هو ثلث الوزن ، حوالي ربع السماكة ، والشاشة جميلة. في الواقع ، سعيد لأن الشاشة الأخرى واجهت المشكلات أو لم أكن لأطلب هذا النموذج الذي أحبه بشكل أفضل. المشكلة الوحيدة التي واجهتني هي أنه عندما فتح موظفو التوصيل الباب على الشاحنة ، كان التلفزيون مستلقياً فوق بعض الصناديق الأخرى في شاحنة التوصيل ولم يتم تأمين أي من العناصر الأخرى في الشاحنة بأي شكل من الأشكال. تم إخباري أنه قد وقع للتو بين هذه المحطة والأخيرة. كان الرجال يحاولون التقاطه من أحد الأطراف وكان هناك قدر ملحوظ جدًا من الثني بسبب الطريقة التي كانوا يحاولون بها المناورة. لقد فهمت ، لقد عملت التسليم. هؤلاء الرجال فقط أرادوها من شاحنتهم حتى يتمكنوا من الوصول إلى المحطة التالية. ومع ذلك ، عندما كنت أعمل في التوصيل ، لم أكن لأسمح للعميل برؤيتي وأنا أتعامل مع شيء دفعه للتو أكثر من 850 دولارًا بالطريقة التي كان عليها. عبرت عن مخاوفي وقيل لي ، \"لا بأس ، إذا كان تالفًا ، يمكنك فقط إعادته\". كونوا واقعيين يا قوم. على الأقل تصرف وكأنك تهتم بالعنصر الذي تقدمه.', 10, 1, 6, 9, '2021-10-25 09:21:00', '2021-10-25 09:21:00'),
(10, 'Samsung TracFone Galaxy A21', 'سامسونج ترايس فون جلاكسي', '7000.00', 'A21.jpg', 'ntroducing the new A Series. The Samsung Galaxy A21 combines smartphone essentials with the trusted reliability of Samsung. Take beautifully crisp photos and videos with our powerful quad lens camera. Enjoy cinematic clarity on our 6.5\" edge-to-edge display. Keep going with a long-lasting 4,000 mAh battery that keeps going with you throughout the day.\r\nCharge up. Power through. Spend more time scrolling, texting and sharing, and less time looking for an outlet to charge. This long-lasting 4,000mAh battery has the power to keep up with you.\r\n6.5\" HD-plus Screen; 2.3 GHz plus 1.8 GHz Octa-Core Processor; Android 10.0; Quad 16MP plus 8MP plus 2MP plus 2MP Rear Cameras/13MP Front Facing Camera; Internal Memory 32 GB (device only); Supports microSD Memory Card up to 512GB (NOT INCLUDED)\r\n4G LTE; Wi-Fi Capable; Bluetooth 4.2 wireless technology; GPS Capable\r\nCarrier: This phone is locked to Tracfone which means this Device can only be used on the Tracfone network', 'تقديم سلسلة A الجديدة. يجمع Samsung Galaxy A21 بين أساسيات الهاتف الذكي والموثوقية الموثوقة من Samsung. التقط صورًا ومقاطع فيديو واضحة بشكل جميل باستخدام الكاميرا القوية رباعية العدسات. استمتع بالوضوح السينمائي على شاشة 6.5 بوصة من الحافة إلى الحافة ، واستمر في العمل مع بطارية تدوم طويلاً تبلغ 4000 مللي أمبير في الساعة تستمر معك طوال اليوم.\r\nاشحن. قوة من خلال. اقض وقتًا أطول في التمرير وإرسال الرسائل النصية والمشاركة ووقتًا أقل في البحث عن منفذ لشحنه. تتمتع هذه البطارية التي تدوم طويلاً والتي تبلغ سعتها 4000 مللي أمبير بالقدرة على مواكبة احتياجاتك.\r\nشاشة 6.5 بوصة عالية الدقة ؛ 2.3 جيجاهرتز بالإضافة إلى معالج ثماني النواة بسرعة 1.8 جيجاهرتز ؛ Android 10.0 ؛ رباعي 16 ميجابكسل بالإضافة إلى 8 ميجابكسل وكاميرات خلفية 2 ميجابكسل / كاميرا أمامية بدقة 13 ميجابكسل ؛ ذاكرة داخلية 32 جيجابايت (للجهاز فقط) ؛ يدعم بطاقة ذاكرة microSD حتى إلى 512 جيجابايت (غير متضمن)\r\n4G LTE ؛ واي فاي قادر. تقنية Bluetooth 4.2 اللاسلكية ؛ القدرة على نظام تحديد المواقع العالمي (GPS)\r\nالناقل: هذا الهاتف مغلق على Tracfone مما يعني أنه لا يمكن استخدام هذا الجهاز إلا على شبكة Tracfone', 9, 1, 6, 2, '2021-10-25 09:21:00', '2021-10-25 09:21:00'),
(11, 'Laptop Table for Bed', 'طرابيزة لاب توب للسرير', '750.00', 'labtop_table.jpg', '[Large Size Adjustable Laptop DesK]:With 24”*13.8” of size which fits for 17” or larger laptop; Two auto-lock buttons on each side easily enable quick changes in height, legs can be set to 5 different heights (adjustable from 10.6\" - 15.4\") in addition two clamps may be used to adjust the surface angle, surface can be set to 4 different angles (from 0°-36°).\r\n[Useful Bed Desk]: A detachable mouse and notebook slip helps keep your device on the table even when you lie down in your bed, preventing the tablet and mouse from sliding off the table. Ideal gifts choice.\r\n[Multifunction Portable Table]: This multifunctional table will be a perfect addition to your office, home or home office.Use it as a laptop workstation, laptop stand for bed, a children\'s bed table, a mini writing table, laptop couch table,a standing table for office work,it becomes the great balance for relaxing and productivity.\r\n[Foldable Laptop Table]: Light but sturdy, folds flat for space-saving storage and portability. Executive office Solutions, set up your lap top or writing work station anywhere in your home or office. Solution for achieving healthier working condition and more convenient lifestyle.\r\n[24 Hours Customer Service]: We have a professional customer service support. Any question about our portable laptop table, please contact us without any hesitation via E-mail, we will provide you with the best after-sell service within 24 hours.', '[مكتب كمبيوتر محمول كبير الحجم قابل للتعديل]: بحجم 24 بوصة * 13.8 بوصة والذي يناسب كمبيوتر محمول مقاس 17 بوصة أو أكبر ؛ يتيح زران للقفل التلقائي على كل جانب تغييرات سريعة في الارتفاع بسهولة ، ويمكن ضبط الأرجل على 5 ارتفاعات مختلفة (قابلة للتعديل من 10.6 \"- 15.4\") بالإضافة إلى ذلك يمكن استخدام مشبكين لضبط زاوية السطح ، ويمكن ضبط السطح على 4 زوايا مختلفة (من 0 درجة إلى 36 درجة).\r\n[مكتب سرير مفيد]: يساعد انزلاق الماوس والكمبيوتر المحمول القابل للفصل على إبقاء جهازك على الطاولة حتى عندما تستلقي على سريرك ، مما يمنع الجهاز اللوحي والماوس من الانزلاق عن الطاولة. اختيار الهدايا المثالي.\r\n[طاولة محمولة متعددة الوظائف]: ستكون هذه الطاولة متعددة الوظائف إضافة مثالية لمكتبك أو منزلك أو مكتبك المنزلي. استخدمها كمحطة عمل للكمبيوتر المحمول ، وحامل كمبيوتر محمول للسرير ، وطاولة سرير للأطفال ، وطاولة كتابة صغيرة ، وطاولة أريكة للكمبيوتر المحمول ، و طاولة الوقوف للعمل المكتبي ، تصبح التوازن الكبير للاسترخاء والإنتاجية.\r\n[طاولة كمبيوتر محمول قابلة للطي]: خفيف ولكن قوي ، يمكن طيه بشكل مسطح لتوفير مساحة التخزين وإمكانية النقل. حلول المكتب التنفيذي ، قم بإعداد اللاب توب الخاص بك أو محطة عمل للكتابة في أي مكان في منزلك أو مكتبك. حل لتحقيق ظروف عمل صحية ونمط حياة أكثر ملاءمة.\r\n[خدمة العملاء على مدار 24 ساعة]: لدينا دعم محترف لخدمة العملاء. إذا كان لديك أي سؤال حول طاولة الكمبيوتر المحمول المحمولة الخاصة بنا ، فيرجى الاتصال بنا دون أي تردد عبر البريد الإلكتروني ، وسوف نقدم لك أفضل خدمة ما بعد البيع في غضون 24 ساعة.', 6, 1, 7, 8, '2021-10-25 09:21:00', '2021-10-25 09:21:00'),
(12, 'samsung300', 'سامسونج 300', '4500.00', '1635099447.jpg', 'sdfasdgdgdfg', 'صثبثقسليبلي', 20, 1, 6, 2, '2021-10-25 09:21:00', '2021-10-25 09:21:00'),
(13, 'hp3030', 'اتش بي 3030', '3450.00', '1635099588.png', 'safsdfvsdfsdfsafafafa', 'يسبشسيبسيبسي', 20, 0, 1, 1, '2021-10-25 09:21:00', '2021-10-25 09:21:00'),
(19, 'oppo7070', 'اوبو 7070', '4860.00', '1635100121.jpg', 'dasfsdfdgsdfgsdfsdfsf', 'ءؤئؤيببيبيبسير', 6, 1, 3, 2, '2021-10-25 09:21:00', '2021-10-25 09:21:00'),
(20, 'enovo2010', 'لينوفو 2010', '5607.00', '1635100212.png', 'SDafsdgdgdfjkgdfjknfn bf', 'يبلسييبتنيتىنيىؤئءىةؤسلاىريلااعه', 15, 1, 4, 2, '2021-10-25 09:21:00', '2021-10-25 09:21:00'),
(22, 'agfgd', 'شسيي', '234.00', '1635174529.jpg', 'asfsfasdfdfdfadsf', 'بشسيبسيبيىنبنميىن', 4, 0, 5, 7, '2021-10-25 15:08:49', '2021-10-25 15:08:49');

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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name_en`, `name_ar`, `status`, `image`, `created_at`, `category_id`) VALUES
(1, 'computer', 'كمبيوتر', '1', 'computer.jpg', '2021-10-25 09:21:14', 1),
(2, 'Mobile', 'محمول', '1', 'mobile.jpg', '2021-10-25 09:21:14', 1),
(4, 'Ladies Clothing', 'ملابس حريمي', '1', 'lady.jpg', '2021-10-25 09:21:14', 4),
(6, 'Men Clothing', 'ملابس رجالي', '1', 'man.jpg', '2021-10-25 09:21:14', 4),
(7, 'video game', 'العاب فديو', '1', 'default.png', '2021-10-25 09:21:14', 5),
(8, 'Laptop Table', 'طرابيذة لاب توب', '1', 'table.jpg', '2021-10-25 09:21:14', 6),
(9, 'TV', 'تلفزيون', '1', 'TV.jpg', '2021-10-25 09:21:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthDate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` mediumint(5) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `birthDate`, `code`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(9, 'Ahmed', 'elrouby0257@ahmed.com', '01061974386', '1998-07-25', 77344, '2021-10-27 18:09:10', '$2y$10$gNZl7855iy8eKdcHDp0OO.fjaGmS6VBEOk/w8QvBL8WtGumrtwvZa', NULL, '2021-10-27 13:15:08', '2021-10-27 18:10:07'),
(10, 'Ahmed', 'elrouby0257@gmail.com', '01061974385', '1998-07-25', 86701, NULL, '$2y$10$UgUdtkJtYsurUPMFlfRRQOqNcYdvPPMdHfOIAv91pazw7tJ3aE7m2', NULL, '2021-10-27 19:28:10', '2021-10-28 13:24:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brands_products_fk` (`brand_id`),
  ADD KEY `products_subcategory_fk` (`subcategory_id`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
