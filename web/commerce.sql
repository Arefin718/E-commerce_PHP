-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2017 at 02:31 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `item_id` varchar(50) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_quantity` int(5) NOT NULL,
  `unit_price` int(15) NOT NULL,
  `order_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `price` int(10) NOT NULL,
  `category` varchar(20) NOT NULL,
  `sold` int(10) NOT NULL DEFAULT '0',
  `quantity` int(10) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `category`, `sold`, `quantity`, `description`, `image`) VALUES
(500, 'Baseball Cap', 250, 'clothing', 4, 4, 'Gender:Unisex Pattern type:Letter Item type:Baseball caps Strap type:Adjustable Style:Casual', 'images/clothing/Baseball Cap.JPG'),
(501, 'Casual Shirt', 1000, 'clothing', 5, 0, '100% Supima Cotton Imported Machine Wash Long-sleeve dress shirt featuring pocket-free front and straight back yoke with no pleat Button-down collar, notched cuffs Unconditional Satisfaction Guarantee: If you are not completely satisfied with your Buttoned Down shirt at any time, we are happy to give you a full refund. Buttoned Down shirts are offered in three fits: Slim, Fitted and Classic. This Fitted shirt is cut 2.5 inches slimmer through the chest and 2 inches slimmer in the waist compared to our Classic Fit. It has a versatile length that looks sharp tucked in or untucked. Available in 72 size combinations for a more precise fit, including Big & Tall sizes. We recommend measuring your sleeve length to order the correct size.', 'images/clothing/Casual Shirt.JPG'),
(502, 'FAPIZI Women Blouse', 1600, 'clothing', 7, 13, 'â€ Gender: Women.Girl â€ Clothing Length:Regular â€ Pattern Type: Solid â€ Sleeve Style: Regular â€ Style:Casual', 'images/clothing/FAPIZI Women Blouse.JPG'),
(503, 'Polo Ralph Lauren Men', 2400, 'clothing', 2, 3, 'Cotton/Suede Imported Synthetic sole Lace-up sneaker with metal eyelets featuring stripe at midsole and embroidered logo at quarterpanel', 'images/clothing/Polo Ralph Lauren Men.JPG'),
(504, 'Clarks Mens Bushacre', 2700, 'clothing', 2, 7, 'Leather Imported Synthetic sole Shaft measures approximately 4.5\" from arch Heel measures approximately 1\"', 'images/clothing/Clarks Mens Bushacre.JPG'),
(505, 'PUMA Mens El Ace Core', 3400, 'clothing', 0, 8, 'Leather Imported Synthetic sole Heel measures approximately 1\" Leather Side overlays with elastic inset Traction toe bumper with PUMA logo', 'images/clothing/PUMA Mens El Ace Core.JPG'),
(506, 'Gordon Rush Men', 3700, 'clothing', 0, 10, 'Leather Imported Rubber sole Twin gore construction Italian leather upper Full leather lining Padded leather footbed Gordon rush signature rubber outsole', 'images/clothing/Gordon Rush Men.JPG'),
(507, 'Nike Mens Futura', 500, 'clothing', 4, 2, 'Synthetic 100% cotton fabric for all-day comfort. Long sleeves offer full coverage. Nike corporate logo is screen printed across the front. Fabric: Dri-FIT 100% Cotton - Machine Wash', 'images/clothing/Nike Mens Futura.JPG'),
(508, 'Vans Classic OTW', 900, 'clothing', 0, 22, 'Every Man\'s Favorite Dress Shirt. Starting at $39.\r\nIntroducing the slim-fit from Buttoned Down. Exclusively available to Prime members', 'images/clothing/Vans Classic OTW.JPG'),
(509, 'Samsung Galaxy J7', 15000, 'smartphone', 0, 25, 'Boost Mobile Service Android 6.0 Marshmallow OS 5.5\" HD Super AMOLED Display 13MP Rear Camera and 5MP Front Facing Camera 16GB ROM/2GB ROM', 'images/smartphone/Samsung Galaxy J7.JPG'),
(510, 'Samsung Galaxy S7', 45000, 'smartphone', 0, 5, 'Samsung Galaxy S7 G930F 32GB International version - Gold 2G bands: GSM 850 / 900 / 1800 / 1900 3G bands: HSDPA 850 / 900 / 1900 / 2100 4G bands: LTE 700 / 800 / 850 / 900 / 1800 / 1900 / 2100 / 2600 Dimensions: 142.4 x 69.6 x 7.9 mm (5.61 x 2.74 x 0.31 in) Weight 152 g (5.36 oz) - IP68 certified - dust proof and water resistant over 1.5 meter and 30 minutes Internal: 32GB, 4 GB RAM', 'images/smartphone/Samsung Galaxy S7.JPG'),
(511, 'Apple iPhone 6 64GB', 65000, 'smartphone', 0, 6, 'This Certified Refurbished product has been tested and certified to work and look like new, with minimal to no signs of wear, by a specialized third-party seller approved by Amazon. The product is backed by a minimum 90-day warranty, and may arrive in a generic brown or white box. Accessories may be generic and not directly from the manufacturer. Factory unlocked iPhones are GSM models and are ONLY compatible with GSM carriers like AT&T and T-Mobile as well as other GSM networks around the world. They WILL NOT WORK with CDMA carriers like Sprint, Verizon and the likes. The phone requires a nano SIM card (not included in the package).', 'images/smartphone/Apple iPhone 6.JPG'),
(512, 'Apple iPhone 7', 85000, 'smartphone', 0, 14, 'Keep everything you love about iPhone up to date, secure, and accessible from any device with iCloud. Multi-Touch display with IPS technology. With just a single press, 3D Touch lets you do more than ever before. The 12-megapixel iSight camera captures sharp, detailed photos. It takes 4K video, up to four times the resolution of 1080p HD video.', 'images/smartphone/Apple iPhone 7.JPG'),
(513, 'HTC 10 32GB', 34500, 'smartphone', 0, 16, '5.2 inches Super LCD5 capacitive touchscreen, 16M colors, Dual-core 2.15 GHz & Dual-core 1.6 GHz, Qualcomm MSM8996 Snapdragon 820 CPU, 32 GB Internal Storage, 4 GB RAM, Camera (Main): 12 MP, f/1.8, 26mm, OIS, laser autofocus, dual-LED (dual tone) flash; Camera (Front): 5 MP. Unlocked cell phones are compatible with GSM carrier such as AT&T and T-Mobile, but are not compatible with CDMA carriers such as Verizon and Sprint. Please check if your GSM cellular carrier supports the bands for this model before purchasing, *** NO LTE IN USA*** as this is the international model: 2G: GSM 850 / 900 / 1800 / 1900, 3G: HSDPA 850 / 900 / 1900 / 2100, LTE: LTE band 1(2100), 3(1800), 5(850), 7(2600), 8(900), 20(800), 28(700), 38(2600), 40(2300), 41(2500).', 'images/smartphone/HTC 10 32GB.JPG'),
(514, 'Huawei Mate 9', 54000, 'smartphone', 0, 16, 'Integrated with Alexa voice service. Just tap and ask Alexa to enjoy thousands of skills on the go, such as hearing the latest news, weather and traffic reports, check sport scores, and much more. Enjoy revolutionary two-day battery life with a large 4000mAh battery and smart power-saving technology. Huawei Supercharge technology safely charges the device for a full dayâ€™s power in 20 minutes. Second-generation Leica Dual Camera with a 12MP RGB sensor and 20MP monochrome sensor renders images in unprecedented detail for exceptional results that take you from mere photography to artistry', 'images/smartphone/Huawei Mate 9.JPG'),
(515, 'Syba OG-AUD63049 NC-1', 1800, 'gaming', 0, 11, 'Internal headphone amplifier helps power the dual driver, 30mm and 40mm driver, within the headset. Controls for both Volume and Bass level. Driver Impedance: 30mm 32 Ohms and 40mm 32 Ohms Gold Plated 3.5mm Jack 4-pole Connector (Compatible with Smartphones, and Tablets) Cable Length of 47-Inch with Twin 3.5mm Adapter for PC and Laptops is included Oblanc Deeper Bass with In-line Microphone white', 'images/gaming/Syba OG-AUD63049 NC-1.JPG'),
(516, 'ASUS GeForce GTX 1070 O8GB', 35000, 'gaming', 0, 18, '1797 MHz boost Clock (OC mode) with 8GB GDDR5 Dual-fan cooling provides double airflow for 3x quieter gameplay 4K and VR ready with dual HDMI 2.0 ports to simultaneously connect headset & monitors GPU TWEAK II makes monitoring performance and streaming easier than ever, featuring game booster and XSplit Gamecaster, all via an intuitive interface Auto-extreme technology delivers premium quality and reliability with aerospace-grade super alloy power II components to run 15% faster and last 2.5 longer than reference', 'images/gaming/ASUS GeForce GTX 1070 O8GB.JPG'),
(517, 'Corsair Gaming K70 RGB', 16000, 'gaming', 0, 16, 'Corsairâ€™s fastest mechanical keyboard, ever 100% anti-ghosting and full key rollover on USB / 100% Cherry MX Speed gaming key switches with ultra-fast 1.2mm actuation and light 45g force Aircraft-grade anodized brushed aluminum frame for superior durability / Advanced lighting control and large font keycaps deliver dynamic, vibrant backlighting CUE support enables advanced macro and lighting programming for virtually unlimited game customization Detachable soft-touch wrist rest and dedicated multimedia controls / USB pass-through port for easy connections / Textured and contoured FPS/MOBA keycap sets', 'images/gaming/Corsair Gaming K70 RGB.JPG'),
(518, 'Acer Predator 34-inch Curved', 150000, 'gaming', 0, 20, '34\" Curved Display (21:9 Aspect Ratio) 3440 x 1440 (native and maximum) Resolution.233mm Pixel Pitch 60Hz (Overclocking up to 100Hz) Signal Inputs: 1 x Display Port and 1 x HDMI 1.4 Port TROUBLESHOOTING:Refer page 18 in the user manual attached.', 'images/gaming/Acer Predator 34-inch Curved UltraWide.JPG'),
(519, 'Microsoft Xbox 360 Wired Controller', 2400, 'gaming', 0, 15, 'Play in comfort - A compact, ergonomic shape lets you play comfortably for hours on your PC or Xbox 360 Vibration feedback gives you a riveting gaming experience Precise thumb sticks, two pressure-point triggers and an 8-way directional pad help you stay in control Connectivity: Powered USB port Flexible cord: The thin, flexible cord was designed to provide the sensation of wireless with all the performance of a wire', 'images/gaming/Microsoft Xbox 360 Wired Controller.JPG'),
(520, 'Corsair Gaming M65 Pro RGB', 4800, 'gaming', 0, 15, '12000 DPI high-accuracy sensor: custom tuned, gaming grade sensor for pixel-precise tracking Aircraft-grade aluminum structure: light weight, durability, and optimal mass distribution Advanced weight tuning system: set the center of gravity to match your play style Surface calibration tuning utility: Optimizes sensor precision and responsiveness for your playing surface', 'images/gaming/Corsair Gaming M65 Pro RGB.JPG'),
(521, 'SanDisk Cruzer Blade 32GB USB 2.0', 1200, 'accesories', 0, 12, 'Provides an extensible design that enables Service prioritization for data Design that delivers high availability, scalability, and for maximum flexibility and price/performance The country of Origin is China Ultra-Compact and Portable USB Flash Drive', 'images/accesories/SanDisk Cruzer Blade 32GB USB 2.0.JPG'),
(522, 'Vanja Memory Card Reader', 1600, 'accesories', 0, 14, '[NOTE: Please make sure your device features Micro USB port and supports USB OTG function before purchase. If unsure, please contact us.] Allows to be used as USB 2.0 SD/microSD card reader for direct data exchange between memory cards and PCs, notebooks, ultrabooks, smartphones and tablets.', 'images/accesories/Vanja Memory Card Reader.JPG'),
(523, 'Samsung 850 EVO 250GB 2.5-Inch', 14000, 'accesories', 0, 13, 'Powered by Samsung V-NAND Technology; Optimized Performance for Everyday Computing. Incredible Sequential Read/Write Performance : Up to 540MB/s and 520MB/s Respectively, and Random Read/Write IOPS Performance : Up to 97K and 88K Respectively Endurance, Reliability, Energy Efficiency, and a 5-Year Limited Warranty', 'images/accesories/Samsung 850 EVO 250GB 2.5-Inch SATA.JPG'),
(524, 'Hybrid Crystal iPhone 7 Plus', 1600, 'accesories', 0, 15, 'Two-piece case consists of a clear flexible TPU shell and a hard PC bumper Outer frame is reinforced at cutouts for sturdier durability Raised lip and camera cutout offer lens & screen protection Inner dot pattern prevents bubbled smudges on back of phone iPhone 7 Plus Case Compatible with iPhone 7 Plus (2016)', 'images/accesories/Spigen Neo Hybrid Crystal iPhone 7.JPG'),
(525, 'Gitanjoli', 250, 'book', 0, 20, 'Gender:Unisex Pattern type:Letter Item type:Baseball caps Strap type:Adjustable Style:Casual', 'images/book/Gitanjoli.JPG'),
(526, 'Adhunik Ranna', 200, 'book', 0, 2, 'Product Type: Book Author: Kamrun Nahar Brand: Janata Prakash Number of Page: 112 Year of Publication: 2006', 'images/book/Janata Prakash.JPG'),
(527, 'Asus E7', 60000, 'electronics', 0, 11, 'New Generation IntelÂ® XeonÂ® Ivy Bridge CPUs Up to 21% faster performance and 16% better output/watt compared with previous generation processors ASUS proprietary CPU heat pipes deliver superior cooling for more stable computing without blocking or restricting expansion slots', 'images/electronics/Asus e7.jpg'),
(528, 'Canon 600d', 32000, 'electronics', 0, 5, 'With class-leading 18-megapixel resolution, user-friendly design, and the entire EOS family of lenses and accessories at your disposal, the EOS 600D lets nothing stand in the way of your photography.  18-megapixel CMOS sensor Scene Intelligent Auto mode Full-HD EOS Movie On-screen Feature Guide Up to 3.7fps continuous shooting Wide-area 9-point AF 1,040k-dot vari-angle 7.7cm (3.0â€) screen Basic+ and Creative Filters Built-in wireless flash control', 'images/electronics/Canon 600d.jpg'),
(529, 'HP Probook 440', 42500, 'electronics', 0, 5, 'The HP ProBook 440 G3 is considered a cheap entry-level notebook of the business class. It is suitable for everyday business tasks and also for office work. The models are priced far below 1000 Euros (~$1096). The most powerful variant is available for about 900 Euros (~$986). Currently, our test model costs about 620 Euros (~$679) and features the brand new Intel Skylake architecture. In addition, it comes with 4 GB of RAM and a 500 GB hard drive.', 'images/electronics/Hp Probook 450.jpg'),
(530, 'Printer hp3340', 9800, 'electronics', 0, 8, 'Up to 35 black pages per minute; print your first page as fast as 6.5 seconds Two-line All Points Addressable (APA)monochrome LCD display Network-ready; Duplex standard 128 MB of memory; 800 MHz dual-core processor, 10/100 Ethernet Kindly refer the user manual given below troubleshooting steps.', 'images/electronics/Printer hp3340.jpg'),
(531, 'Intel 7th Gen Core i7', 25800, 'electronics', 0, 8, 'Processor Base Frequency	3.60 GHz Max Turbo Frequency	4.20 GHz Cache	8 MB Bus Speed	8 GT/s DMI3 Max Memory Size (dependent on memory type)	64 GB Memory Types	DDR4-2133/2400, DDR3L-1333/1600 @ 1.35V Max # of Memory Channels	2 Processor Graphics â€¡	IntelÂ® HD Graphics 630 Graphics Base Frequency	350.00 MHz Graphics Max Dynamic Frequency	1.15 GHz Graphics Video Max Memory	64 GB 4K Support	Yes, at 60Hz Max Resolution (HDMI 1.4)â€¡	4096x2304@24Hz Max Resolution (DP)â€¡	4096x2304@60Hz Max Resolution (eDP - Integrated Flat Panel)â€¡	4096x2304@60Hz DirectX* Support	12 OpenGL* Support	4.4', 'images/electronics/Intel 7th Gen Core i7.jpg'),
(532, 'CPU Watercooler', 4500, 'electronics', 0, 4, 'PWM 120 mm Blue LED Fan operates quietly, while filling your rig with blue light High-performance 240 mm Radiator with a complex structure of 0.28 mm thick heat fins maximize heat dissipation High Quality FEP Tubes with minimal moisture absorption and high thermal and kinetic tolerances for a prolonged life Large Copper Plate effectively dissipates heat', 'images/electronics/CPU Watercooler.jpg'),
(533, 'IMAC 21.5\" (MK142ZP/A)', 109000, 'electronics', 0, 3, 'Processor: Intel 1.6GHz dual core Intel Core i5 (Turbo Boost up to 2.7GHz) Memory: 8GB of 1867MHz LPDDR3 onboard memory Storage: 1TB (5400-rpm) hard drive Graphics: INTEL HD GRAPHICS 6000 Display: 21.5-inch (diagonal) LED-backlit display with IPS technology; 1920 by 1080 resolution with support for millions of colours Audio: Stereo speakers,Dual microphones, 3.5 mm headphone jack Wireless: 802.11ac Wi-Fi wireless networking,IEEE 802.11a/b/g/n compatible, Bluetooth 4.0 wireless technology Size and Weight: Height: 17.7 inches (45.0 cm), Width: 20.8 inches (52.8 cm), Stand depth: 6.9 inches (17.5 cm), Weight: 12.5 pounds (5.68 kg)2 Operating System: OS X El Capitan', 'images/electronics/MAC MK142ZPA.jpg'),
(600, 'Spigen Neo Hybrid Crystal iPhone 7 Plus', 1700, 'accesories', 0, 15, 'Two-piece case consists of a clear flexible TPU shell and a hard PC bumper Outer frame is reinforced at cutouts for sturdier durability Raised lip and camera cutout offer lens & screen protection Inner dot pattern prevents bubbled smudges on back of phone iPhone 7 Plus Case Compatible with iPhone 7 Plus (2016)', 'images/accesories/Spigen Neo Hybrid Crystal iPhone 7.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `address` varchar(70) NOT NULL,
  `pass` varchar(15) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `type` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `address`, `pass`, `gender`, `type`) VALUES
(9, 'Jack Ricard', 'jack@gmail.com', 'Banani', '123', 'Male', 'user'),
(10, 'Arefin Alam', 'arefin@gmail.com', 'Faridpur', '123', 'Male', 'user'),
(11, 'Haider Ali', 'haider@gmail.com', 'Uttara', '123', 'Male', 'user'),
(12, 'Amit Hasan', 'amit@gamil.com', 'Savar', '123', 'Male', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
