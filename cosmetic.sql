-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2025 at 02:29 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cosmetic`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `home` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `hm_number` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `pincode` mediumint(9) NOT NULL,
  `home_office` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'MTIzNDU2');

-- --------------------------------------------------------

--
-- Table structure for table `api_users`
--

CREATE TABLE `api_users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `uname` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bank_accounts`
--

CREATE TABLE `bank_accounts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `iban` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `bic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bank_detail`
--

CREATE TABLE `bank_detail` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `holder_name` varchar(255) DEFAULT NULL,
  `ac_number` int(11) DEFAULT NULL,
  `ifsc_number` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`, `url`, `image`) VALUES
(1, 'Kwality', 'kwality', '');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `selected_size` varchar(100) DEFAULT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `discount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `tax` decimal(8,2) NOT NULL DEFAULT 0.00,
  `session_id` varchar(255) DEFAULT NULL,
  `size_name` varchar(255) DEFAULT NULL,
  `write_up` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `product_title`, `selected_size`, `product_price`, `qty`, `customer_id`, `product_image`, `discount`, `tax`, `session_id`, `size_name`, `write_up`) VALUES
(15, 1, 'PCC-31', NULL, 170.00, 1, 0, 'product_2025-04-0310-42-5287.jpg', 0.00, 0.00, 'gl7aaoerh3jv9ekaq61s73torncm0v0h', 'S', ''),
(16, 3, 'PCC-22', NULL, 120.00, 1, 0, 'product_2025-04-0308-12-1543.jpg', 0.00, 0.00, 'gl7aaoerh3jv9ekaq61s73torncm0v0h', 'S', '');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `icon_image` varchar(200) DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `tax` decimal(8,2) NOT NULL DEFAULT 0.00,
  `created_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `url`, `image`, `icon_image`, `parent_id`, `tax`, `created_by`) VALUES
(1, 'Trophy', 'trophy', '', NULL, 0, 0.00, 0),
(10, 'Cups', 'cups', 'category_2025-01-2514-07-182509.jpg', NULL, 1, 0.00, 0),
(11, 'Wooden', 'wooden', 'category_2025-01-2514-08-295561.jpg', NULL, 1, 0.00, 0),
(12, 'Medals', 'medals', 'category_2025-01-2514-07-504913.jpg', NULL, 1, 0.00, 0),
(13, 'Accessories', 'accessories', 'category_2025-01-2514-09-542892.jpg', NULL, 1, 0.00, 0),
(14, 'Fiber Cups', 'fiber-cups', 'category_2025-04-0312-32-374539.jpg', NULL, 10, 0.00, 0),
(15, 'Iron Cups', 'iron-cups', '', NULL, 10, 0.00, 0),
(16, 'Wooden Trophy', 'wooden-trophy', '', NULL, 11, 0.00, 0),
(17, 'Plastic Wooden', 'plastic-wooden', '', NULL, 11, 0.00, 0),
(18, 'Plastic Cups', 'plastic-cups', '', NULL, 10, 0.00, 0),
(19, 'Plastic Base', 'plastic-base', '', NULL, 13, 0.00, 0),
(20, 'Metal Cups', 'metal-cups', '', NULL, 10, 0.00, 0),
(21, 'Corporate Awards', 'corporate-awards', '', NULL, 11, 0.00, 0),
(22, 'Plastic Medals', 'plastic-medals', '', NULL, 12, 0.00, 0),
(23, 'Golden Medals', 'golden-medals', '', NULL, 12, 0.00, 0),
(24, 'Sliver Medals', 'sliver-medals', '', NULL, 12, 0.00, 0),
(25, 'Broze Medals', 'broze-medals', '', NULL, 12, 0.00, 0),
(26, 'Figures', 'figures', '', NULL, 13, 0.00, 0),
(27, 'Badges', 'badges', '', NULL, 13, 0.00, 0),
(28, 'Badges and Lapel Pin', 'badges-and-lapel-pin', '', NULL, 13, 0.00, 0),
(29, 'Plastic Fitted', 'plastic-fitted', '', NULL, 10, 0.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `col_id` int(11) DEFAULT 1,
  `row_id` int(11) DEFAULT 1,
  `custom_url` varchar(200) NOT NULL,
  `target` varchar(150) DEFAULT NULL,
  `heading` varchar(250) DEFAULT NULL,
  `introtext` longtext CHARACTER SET utf8 COLLATE utf8_swedish_ci DEFAULT NULL,
  `seo_data` longtext DEFAULT NULL,
  `created` date DEFAULT NULL,
  `top_cover_image` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `col_id`, `row_id`, `custom_url`, `target`, `heading`, `introtext`, `seo_data`, `created`, `top_cover_image`) VALUES
(1, 1, 1, 'about-us', '_self', 'About Us', '<p>about us</p>\r\n', '', NULL, NULL),
(2, 2, 1, 'terms-and-conditions', '_self', 'Terms and Conditions', '<p>We respect the trust you place on&nbsp;Rimpy Synthetics (&lsquo;<a href=\"http://beaversportswear.in\">Beaversportswear.in</a>&rsquo;)&nbsp;We are committed to protect all information that you share with us. We insist upon the highest standards for secure transactions and customer information privacy. We follow stringent procedures to help protect the confidentiality, security, and integrity of data stored on our systems. Please go through our following privacy policy. Please note that our privacy policy is subject to change at any time without notice and by updating this page. To make sure you are aware of any changes, please review this policy periodically. &nbsp;&nbsp;</p>\r\n\r\n<p>Throughout this privacy policy references to &lsquo;website&rsquo; mean&nbsp;&lsquo;<a href=\"http://beaversportswear.in\">Beaversportswear.in</a>&rsquo;&nbsp;and references to &ldquo;you&rdquo; mean any person submitting any data to us or our agent or this website.</p>\r\n\r\n<p><strong>1. Collection of Personally Identifiable and other Information:</strong></p>\r\n\r\n<p>If you do nothing during your visit to our website but browse through the website, read pages, or download information, We automatically collect and store the following information about your visit. Your web browser software transmits most of this information to us.</p>\r\n\r\n<p><em>This information does not identify you personally:</em></p>\r\n\r\n<p>(I) The numeric IP address from which you access the Site;</p>\r\n\r\n<p>(ii) The type of browser and operating system used to access the Site;</p>\r\n\r\n<p>(iii) The date and time you access the Site;</p>\r\n\r\n<p>(iv)The pages you visit, including graphics loaded from each page and other documents you download, such as PDF files and word processing documents; and</p>\r\n\r\n<p>(v) If you linked to the Site from another web site, the address of that web site.</p>\r\n\r\n<p>We use the above information to help us make our website more useful to you and visitors like you.</p>\r\n\r\n<p>We need to use &lsquo;cookies&rsquo; on the website to enhance the user shopping experience and avoid multiple logins or password authentication requests. A &quot;cookie&quot; is a tiny text file that a web site can place on your computer&#39;s hard drive in order to collect information about your activities on the site. Cookies help us provide you with a better website, by enabling us to monitor which pages you find useful and which you do not. A cookie in no way gives us access to your computer or any information about you, other than the data you choose to share with us. You can choose to accept or decline cookies. Most web browsers automatically accept cookies, but you can usually modify your browser setting to decline cookies if you prefer. However, this may prevent you from taking full advantage of the website. Please note that the cookies we use for our website or email campaigns do not store personally identifiable information about you.</p>\r\n\r\n<p>In addition to the information specified above, you may choose to provide certain information for online shopping on this website, including the following.</p>\r\n\r\n<ul>\r\n	<li>When you register (log in), you supply your email address and a password. This allows us to provide you access to your account every time you visit our Website.</li>\r\n	<li>Before completing your first purchase, we also ask you for your name, phone number/ mobile number, email, billing and shipping addresses. This information, along with details pertaining to your bank account or credit card or debit card or other payment instruments is necessary to fulfill your order.</li>\r\n	<li>Other content and data that you provide while using the website, for example, blogs, discussion boards, chat messages, membership of mailing lists and other data, documents and images stored on our servers.</li>\r\n</ul>\r\n\r\n<p>In addition, from time to time, we may ask you for additional information.</p>\r\n\r\n<p>We only collect your Personal Information to conduct our business and to enable us to deliver and improve our Services. We do not sell your Personal Information to any third party or otherwise trade on it.</p>\r\n\r\n<p><strong>2. Use of information:</strong></p>\r\n\r\n<p>We use personal information to provide the services you request.&nbsp;We use your personal information to resolve disputes; troubleshoot problems; help promote a safe service; collect fees owed; measure consumer interest in our products and services, inform you about online and offline offers, products, services, and updates; customize your experience; detect and protect us against error, fraud and other criminal activity; enforce our terms and conditions; and as otherwise described to you at the time of collection. In our efforts to continually improve our product and service offerings, we collect and analyze data about our users&#39; activity on our website.&nbsp;We identify and use your IP address to help diagnose problems with our server, and to administer our website. Your IP address is also used to help identify you and to gather broad demographic information.&nbsp; We use this data to tailor your experience at our site, providing you with content that we think you might be interested in and to display content according to your preferences.</p>\r\n\r\n<p>We may disclose personal information if required to do so by law or in the good faith belief that such disclosure is reasonably necessary to respond to subpoenas, court orders, or other legal process.</p>\r\n\r\n<p>We may disclose personal information to law enforcement offices, third party rights owners, or others in the good faith belief that such disclosure is reasonably necessary to: enforce our Terms or Privacy Policy; respond to claims that an advertisement, posting or other content violates the rights of a third party; or protect the rights, property or personal safety of our users or the general public</p>\r\n\r\n<p><strong>3. Use of services</strong></p>\r\n\r\n<p>Your use of all services on the website and your provision of information in connection with these services are purely voluntary. You will always have the option of whether to perform the transaction and provide this information. However, in order to open an online service account or perform a service transaction, you will be required to provide some personal information. Whether to perform the transaction is up to you.</p>\r\n\r\n<p>If you choose to provide us with personal information, we will use that information to respond to your message and to help us get you the product or information you have requested. You may choose to subscribe to our online newsletter describing new services and updates on the site. You may unsubscribe at any time.</p>\r\n\r\n<p>We may transfer our databases containing your personal information if we sell our business or part of it.</p>\r\n\r\n<p><strong>4. Security</strong></p>\r\n\r\n<p>We take the integrity of the information and systems that we maintain very seriously. As such, we have instituted security measures for all information systems under our control so that information will not be lost, misused or altered.</p>\r\n\r\n<p>For website security purposes and to ensure that our Services remain available to all users, we employ software programs to monitor traffic to identify unauthorized attempts to upload or change information or otherwise cause damage. Notwithstanding anything stated above, we reserve the right to use information from these sources to help identify an individual or prosecute malicious use or misuse of the website.</p>\r\n\r\n<p>Your account information is password-protected for your privacy and security. In certain areas, as with credit card transactions, our Site uses industry-standard secure socket layer (SSL) encryption to protect data transmissions.Any of your information which you provide when you use certain Services and are to an open, public environment or forum including (without limitation) any blog, community or discussion board, is not confidential, does not constitute Personal Information, and is not subject to protection under Privacy Policy. Since such public environments are accessible by third parties, it is possible that third parties may collect and collate and use such information for their own purposes. You should accordingly be careful when deciding to share any of your Personal Information in such public environments.</p>\r\n\r\n<p>Beaversportswear&nbsp;may use various outside agencies (third party service providers) to make our Website operate. For example, we may use third parties to host our Website, operate various features made available on our Website, send emails, SMS, analyze data, provide search results and links, and assist in fulfilling your orders. We may exchange information with third parties for the purposes of fraud protection and credit risk reduction. Some of these third parties may need access to your information in order to make the services provided through our Website work. Information will only be disclosed to these service providers on a need-to-know basis, and they will only be permitted to use such information for the purpose of providing the particular services provided by such entities in connection with our Website. We seek to protect your rights of privacy on systems and this website (beaversportswear.in) controlled by us, but we are not liable for any unauthorized or unlawful disclosures of your personal and confidential information made by third parties who are not subject to our control. You should take note that the information and privacy policies of our business partners, advertisers, sponsors or other sites to which we provide hyperlinks, may be different from ours.</p>\r\n\r\n<p><strong>5. Grievances and Redressal:</strong></p>\r\n\r\n<p>We are committed to promptly address any grievances that you might have in connection with our use of any information that you provide us. Accordingly, you may communicate any grievances that you might have by e-mailing, phoning, us at contact numbers provided here.</p>\r\n', '', NULL, NULL),
(6, 2, 4, 'shipping-policy', '_self', 'Shipping Policy', '<p><strong>Our Reach</strong></p>\r\n\r\n<p>We deliver our products to all parts of the India via various third party courier services like Bluedart, FedEx and Delhivery depending upon availability.</p>\r\n\r\n<p><strong>Shipping Cost</strong></p>\r\n\r\n<p>Shipping is free across India</p>\r\n\r\n<p><strong>Time to Deliver</strong></p>\r\n\r\n<p>The products ordered will be dispatched in 1-2 days. Exceptions can be there on Sunday and various public holidays. The delivery can be expected within 4-7&nbsp;days in major metro cities and can take anywhere between 7-8 days for other locations in India,</p>\r\n\r\n<p><strong>Delays in Delivery</strong></p>\r\n\r\n<p>These are indicative &amp; approx. values only and items can be shipped earlier or later also on case to case basis depending on availability of item and other factors.&nbsp;</p>\r\n\r\n<p>Delivery time is subject to factors beyond our control including unexpected travel delays from our courier partners and transporters due to weather conditions and strikes. We will keep you informed on the status of your order including delays if any.&nbsp;</p>\r\n\r\n<p>No refund, returns, replacement &amp; exchange will be entertained for this reason.&nbsp;</p>\r\n\r\n<p><strong>Tracking</strong></p>\r\n\r\n<p>You will be able to track your order on the courier company website through the code in your shipping confirmation email.&nbsp;&nbsp;</p>\r\n\r\n<p><strong>Cancellations</strong></p>\r\n\r\n<p>Unfortunately, we cannot cancel orders once they are processed.</p>\r\n\r\n<p><strong>Lost In transit</strong></p>\r\n\r\n<p>We send our parcels fully insured to our customers. If Courier Company fails to deliver, you do not suffer any loss. We will not responsible for lost/stolen packages or any full or partial damages to the package after being left at customer&#39;s address by postal / courier agency.</p>\r\n\r\n<p>If a shipment is lost in transit, we wait for 15 days and then reprocess the same order. In case a replacement is not available of the same design we may ask you to either take a refund or select alternate product.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>INTERNATIONAL</strong></p>\r\n\r\n<ul>\r\n	<li>We deliver our products acros the world via the major and the most trusted courier services DHL &amp; ARAMEX</li>\r\n	<li>A flat shipping will be charged on the cart which will be calculated at the end depending upon the country.</li>\r\n	<li><strong>If the cart value goes above $50, the shipping charges will be waived off</strong>.</li>\r\n	<li>The products ordered will be dispatched in 1-2 days. The delivery can be expected within 10-15&nbsp;days in major countries.</li>\r\n	<li>You will be able to track your order on the courier company website through tracking code.</li>\r\n	<li>We send our parcels fully insured to our customers. If Courier Company fails to deliver, you do not suffer any loss. We will not responsible for lost/stolen packages or any full or partial damages to the package after being left at customer&#39;s address by postal / courier agency.</li>\r\n	<li>If a shipment is lost in transit, we wait for 15 days and then reprocess the same order. In case a replacement is not available of the same design we may ask you to either take a refund or select alternate product.</li>\r\n</ul>\r\n', '', NULL, NULL),
(7, 2, 6, 'return-policy', '_self', 'Return Policy', '<p><strong>NATIONAL(INDIA)</strong></p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>In case of return kindly contact us at beaversportswear@gmail.com, within 5&nbsp;days of receipt of product.</p>\r\n	</li>\r\n	<li>\r\n	<p>In case the customer complains after 5&nbsp;days of receiving the product, Beaver Sports Wear wont be able to entertain the same.</p>\r\n	</li>\r\n	<li>\r\n	<p>The email should contain comprehensive details of the defects/complaints of the single order/package delivery. Please note that&nbsp;Fuaark&nbsp;shall examine the returned products for all such defects/variations, on the basis of the customer&rsquo;s emails.</p>\r\n	</li>\r\n	<li>\r\n	<p>Kindly wait for the instructions from Beaver Sports Wear regarding the same</p>\r\n	</li>\r\n	<li>\r\n	<p>DO NOT return any product, before receiving confirmation from Team Beaver. In case any product is returned without such confirmation, Beaver does not guarantee any credit or replacement of the product.</p>\r\n	</li>\r\n	<li>\r\n	<p>All the shipping cost for return and exchange will be born by the customer&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<p>In case of a defective product received by the customer, the team will get in touch and try to solve by either sending replacement or returning money&nbsp;after the return shipment is received.</p>\r\n	</li>\r\n	<li>\r\n	<p>In case of size issue, the customer should mention the proper size he wants in the mail. If the particular product is available we will initiate the delivery once we receive the wrong size product.</p>\r\n	</li>\r\n	<li>\r\n	<p>If the particular size is not available with us then the customer need to choose some other product.</p>\r\n	</li>\r\n	<li>\r\n	<p>Item must be returned within 5&nbsp;days from the day you&#39;ve received the confirmation mail from Fuaark, transit times are not included within this time</p>\r\n	</li>\r\n	<li>\r\n	<p>Item must be sent back with the copy of invoice and tags.</p>\r\n	</li>\r\n	<li>\r\n	<p>We do not accept any return/exchange for the products sold in sale.</p>\r\n	</li>\r\n	<li>\r\n	<p>Item must be unworn &amp; unwashed (no distinct odours, blemishes, signs of wear etc.) - if the returns item fails this test, they will be returned back to you</p>\r\n	</li>\r\n	<li>\r\n	<p>Items covered in animal/human hair will not be accepted</p>\r\n	</li>\r\n	<li>\r\n	<p>If you&#39;ve asked for an item which is more expensive than your return, the item will be refunded and after you place a new order online</p>\r\n	</li>\r\n	<li>\r\n	<p>All items are thoroughly inspected before any action is taken</p>\r\n	</li>\r\n	<li>\r\n	<p>Returns can take up to 7 days to process, so don&#39;t be alarmed if you&#39;ve tracked your return as delivered but haven&#39;t heard from us yet</p>\r\n	</li>\r\n	<li>\r\n	<p>All exchanges are sent out on a standard service</p>\r\n	</li>\r\n	<li>Our returns address:​</li>\r\n</ul>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 1307/465, Block, 7, Prem Nagar, Model Town, Ambala, Haryana 134003</p>\r\n', '', NULL, NULL),
(9, 2, 10, 'privacy-policy', '_self', 'Privacy Policy', '<p>&nbsp;</p>\r\n\r\n<h2><strong>PRIVACY POLICY</strong></h2>\r\n\r\n<p>Effective date:&nbsp;2021-08-19</p>\r\n\r\n<p>1.&nbsp;<strong>Introduction</strong></p>\r\n\r\n<p>Welcome to&nbsp;<strong>Beaver The Sports Wear</strong>.</p>\r\n\r\n<p><strong>Beaver The Sports Wear</strong>&nbsp;(&ldquo;us&rdquo;, &ldquo;we&rdquo;, or &ldquo;our&rdquo;) operates&nbsp;<strong>http://beaversportswear.in</strong>&nbsp;(hereinafter referred to as&nbsp;<strong>&ldquo;Service&rdquo;</strong>).</p>\r\n\r\n<p>Our Privacy Policy governs your visit to&nbsp;<strong>http://beaversportswear.in</strong>, and explains how we collect, safeguard and disclose information that results from your use of our Service.</p>\r\n\r\n<p>We use your data to provide and improve Service. By using Service, you agree to the collection and use of information in accordance with this policy. Unless otherwise defined in this Privacy Policy, the terms used in this Privacy Policy have the same meanings as in our Terms and Conditions.</p>\r\n\r\n<p>Our Terms and Conditions (<strong>&ldquo;Terms&rdquo;</strong>) govern all use of our Service and together with the Privacy Policy constitutes your agreement with us (<strong>&ldquo;agreement&rdquo;</strong>).</p>\r\n\r\n<p>2.&nbsp;<strong>Definitions</strong></p>\r\n\r\n<p><strong>SERVICE</strong>&nbsp;means the&nbsp;http://beaversportswear.in&nbsp;website operated by&nbsp;Beaver The Sports Wear.</p>\r\n\r\n<p><strong>PERSONAL DATA</strong>&nbsp;means data about a living individual who can be identified from those data (or from those and other information either in our possession or likely to come into our possession).</p>\r\n\r\n<p><strong>USAGE DATA</strong>&nbsp;is data collected automatically either generated by the use of Service or from Service infrastructure itself (for example, the duration of a page visit).</p>\r\n\r\n<p><strong>COOKIES</strong>&nbsp;are small files stored on your device (computer or mobile device).</p>\r\n\r\n<p><strong>DATA CONTROLLER</strong>&nbsp;means a natural or legal person who (either alone or jointly or in common with other persons) determines the purposes for which and the manner in which any personal data are, or are to be, processed. For the purpose of this Privacy Policy, we are a Data Controller of your data.</p>\r\n\r\n<p><strong>DATA PROCESSORS (OR SERVICE PROVIDERS)</strong>&nbsp;means any natural or legal person who processes the data on behalf of the Data Controller. We may use the services of various Service Providers in order to process your data more effectively.</p>\r\n\r\n<p><strong>DATA SUBJECT</strong>&nbsp;is any living individual who is the subject of Personal Data.</p>\r\n\r\n<p><strong>THE USER</strong>&nbsp;is the individual using our Service. The User corresponds to the Data Subject, who is the subject of Personal Data.</p>\r\n\r\n<p>3.&nbsp;<strong>Information Collection and Use</strong></p>\r\n\r\n<p>We collect several different types of information for various purposes to provide and improve our Service to you.</p>\r\n\r\n<p>4.&nbsp;<strong>Types of Data Collected</strong></p>\r\n\r\n<p><strong>Personal Data</strong></p>\r\n\r\n<p>While using our Service, we may ask you to provide us with certain personally identifiable information that can be used to contact or identify you (<strong>&ldquo;Personal Data&rdquo;</strong>). Personally identifiable information may include, but is not limited to:</p>\r\n\r\n<p>0.1. Email address</p>\r\n\r\n<p>0.2. First name and last name</p>\r\n\r\n<p>0.3. Phone number</p>\r\n\r\n<p>0.4. Address, Country, State, Province, ZIP/Postal code, City</p>\r\n\r\n<p>0.5. Cookies and Usage Data</p>\r\n\r\n<p>We may use your Personal Data to contact you with newsletters, marketing or promotional materials and other information that may be of interest to you. You may opt out of receiving any, or all, of these communications from us by following the unsubscribe link.</p>\r\n\r\n<p><strong>Usage Data</strong></p>\r\n\r\n<p>We may also collect information that your browser sends whenever you visit our Service or when you access Service by or through any device (<strong>&ldquo;Usage Data&rdquo;</strong>).</p>\r\n\r\n<p>This Usage Data may include information such as your computer&rsquo;s Internet Protocol address (e.g. IP address), browser type, browser version, the pages of our Service that you visit, the time and date of your visit, the time spent on those pages, unique device identifiers and other diagnostic data.</p>\r\n\r\n<p>When you access Service with a device, this Usage Data may include information such as the type of device you use, your device unique ID, the IP address of your device, your device operating system, the type of Internet browser you use, unique device identifiers and other diagnostic data.</p>\r\n\r\n<p><strong>Location Data</strong></p>\r\n\r\n<p>We may use and store information about your location if you give us permission to do so (<strong>&ldquo;Location Data&rdquo;</strong>). We use this data to provide features of our Service, to improve and customize our Service.</p>\r\n\r\n<p>You can enable or disable location services when you use our Service at any time by way of your device settings.</p>\r\n\r\n<p><strong>Tracking Cookies Data</strong></p>\r\n\r\n<p>We use cookies and similar tracking technologies to track the activity on our Service and we hold certain information.</p>\r\n\r\n<p>Cookies are files with a small amount of data which may include an anonymous unique identifier. Cookies are sent to your browser from a website and stored on your device. Other tracking technologies are also used such as beacons, tags and scripts to collect and track information and to improve and analyze our Service.</p>\r\n\r\n<p>You can instruct your browser to refuse all cookies or to indicate when a cookie is being sent. However, if you do not accept cookies, you may not be able to use some portions of our Service.</p>\r\n\r\n<p>Examples of Cookies we use:</p>\r\n\r\n<p>0.1.&nbsp;<strong>Session Cookies:</strong>&nbsp;We use Session Cookies to operate our Service.</p>\r\n\r\n<p>0.2.&nbsp;<strong>Preference Cookies:</strong>&nbsp;We use Preference Cookies to remember your preferences and various settings.</p>\r\n\r\n<p>0.3.&nbsp;<strong>Security Cookies:</strong>&nbsp;We use Security Cookies for security purposes.</p>\r\n\r\n<p>0.4.&nbsp;<strong>Advertising Cookies:</strong>&nbsp;Advertising Cookies are used to serve you with advertisements that may be relevant to you and your interests.</p>\r\n\r\n<p><strong>Other Data</strong></p>\r\n\r\n<p>While using our Service, we may also collect the following information: sex, age, date of birth, place of birth, passport details, citizenship, registration at place of residence and actual address, telephone number (work, mobile), details of documents on education, qualification, professional training, employment agreements,&nbsp;<a href=\"https://policymaker.io/non-disclosure-agreement/\">NDA agreements</a>, information on bonuses and compensation, information on marital status, family members, social security (or other taxpayer identification) number, office location and other data.</p>\r\n\r\n<p>5.&nbsp;<strong>Use of Data</strong></p>\r\n\r\n<p>Beaver The Sports Wear&nbsp;uses the collected data for various purposes:</p>\r\n\r\n<p>0.1. to provide and maintain our Service;</p>\r\n\r\n<p>0.2. to notify you about changes to our Service;</p>\r\n\r\n<p>0.3. to allow you to participate in interactive features of our Service when you choose to do so;</p>\r\n\r\n<p>0.4. to provide customer support;</p>\r\n\r\n<p>0.5. to gather analysis or valuable information so that we can improve our Service;</p>\r\n\r\n<p>0.6. to monitor the usage of our Service;</p>\r\n\r\n<p>0.7. to detect, prevent and address technical issues;</p>\r\n\r\n<p>0.8. to fulfil any other purpose for which you provide it;</p>\r\n\r\n<p>0.9. to carry out our obligations and enforce our rights arising from any contracts entered into between you and us, including for billing and collection;</p>\r\n\r\n<p>0.10. to provide you with notices about your account and/or subscription, including expiration and renewal notices, email-instructions, etc.;</p>\r\n\r\n<p>0.11. to provide you with news, special offers and general information about other goods, services and events which we offer that are similar to those that you have already purchased or enquired about unless you have opted not to receive such information;</p>\r\n\r\n<p>0.12. in any other way we may describe when you provide the information;</p>\r\n\r\n<p>0.13. for any other purpose with your consent.</p>\r\n\r\n<p>6.&nbsp;<strong>Retention of Data</strong></p>\r\n\r\n<p>We will retain your Personal Data only for as long as is necessary for the purposes set out in this Privacy Policy. We will retain and use your Personal Data to the extent necessary to comply with our legal obligations (for example, if we are required to retain your data to comply with applicable laws), resolve disputes, and enforce our legal agreements and policies.</p>\r\n\r\n<p>We will also retain Usage Data for internal analysis purposes. Usage Data is generally retained for a shorter period, except when this data is used to strengthen the security or to improve the functionality of our Service, or we are legally obligated to retain this data for longer time periods.</p>\r\n\r\n<p>7.&nbsp;<strong>Transfer of Data</strong></p>\r\n\r\n<p>Your information, including Personal Data, may be transferred to &ndash; and maintained on &ndash; computers located outside of your state, province, country or other governmental jurisdiction where the data protection laws may differ from those of your jurisdiction.</p>\r\n\r\n<p>If you are located outside&nbsp;India&nbsp;and choose to provide information to us, please note that we transfer the data, including Personal Data, to&nbsp;India&nbsp;and process it there.</p>\r\n\r\n<p>Your consent to this Privacy Policy followed by your submission of such information represents your agreement to that transfer.</p>\r\n\r\n<p>Beaver The Sports Wear&nbsp;will take all the steps reasonably necessary to ensure that your data is treated securely and in accordance with this Privacy Policy and no transfer of your Personal Data will take place to an organisation or a country unless there are adequate controls in place including the security of your data and other personal information.</p>\r\n\r\n<p>8.&nbsp;<strong>Disclosure of Data</strong></p>\r\n\r\n<p>We may disclose personal information that we collect, or you provide:</p>\r\n\r\n<p>0.1.&nbsp;<strong>Business Transaction.</strong></p>\r\n\r\n<p>If we or our subsidiaries are involved in a merger, acquisition or asset sale, your Personal Data may be transferred.</p>\r\n\r\n<p>0.2.&nbsp;<strong>Other cases. We may disclose your information also:</strong></p>\r\n\r\n<p>0.2.1. to our subsidiaries and affiliates;</p>\r\n\r\n<p>0.2.2. to contractors, service providers, and other third parties we use to support our business;</p>\r\n\r\n<p>0.2.3. to fulfill the purpose for which you provide it;</p>\r\n\r\n<p>0.2.4. for the purpose of including your company&rsquo;s logo on our website;</p>\r\n\r\n<p>0.2.5. for any other purpose disclosed by us when you provide the information;</p>\r\n\r\n<p>0.2.6. with your consent in any other cases;</p>\r\n\r\n<p>0.2.7. if we believe disclosure is necessary or appropriate to protect the rights, property, or safety of the Company, our customers, or others.</p>\r\n\r\n<p>9.&nbsp;<strong>Security of Data</strong></p>\r\n\r\n<p>The security of your data is important to us but remember that no method of transmission over the Internet or method of electronic storage is 100% secure. While we strive to use commercially acceptable means to protect your Personal Data, we cannot guarantee its absolute security.</p>\r\n\r\n<p>10.&nbsp;<strong>Your Data Protection Rights Under General Data Protection Regulation (GDPR)</strong></p>\r\n\r\n<p>If you are a resident of the European Union (EU) and European Economic Area (EEA), you have certain data protection rights, covered by GDPR.</p>\r\n\r\n<p>We aim to take reasonable steps to allow you to correct, amend, delete, or limit the use of your Personal Data.</p>\r\n\r\n<p>If you wish to be informed what Personal Data we hold about you and if you want it to be removed from our systems, please email us at&nbsp;<strong>beaversportswear@gmail.com</strong>.</p>\r\n\r\n<p>In certain circumstances, you have the following data protection rights:</p>\r\n\r\n<p>0.1. the right to access, update or to delete the information we have on you;</p>\r\n\r\n<p>0.2. the right of rectification. You have the right to have your information rectified if that information is inaccurate or incomplete;</p>\r\n\r\n<p>0.3. the right to object. You have the right to object to our processing of your Personal Data;</p>\r\n\r\n<p>0.4. the right of restriction. You have the right to request that we restrict the processing of your personal information;</p>\r\n\r\n<p>0.5. the right to data portability. You have the right to be provided with a copy of your Personal Data in a structured, machine-readable and commonly used format;</p>\r\n\r\n<p>0.6. the right to withdraw consent. You also have the right to withdraw your consent at any time where we rely on your consent to process your personal information;</p>\r\n\r\n<p>Please note that we may ask you to verify your identity before responding to such requests. Please note, we may not able to provide Service without some necessary data.</p>\r\n\r\n<p>You have the right to complain to a Data Protection Authority about our collection and use of your Personal Data. For more information, please contact your local data protection authority in the European Economic Area (EEA).</p>\r\n\r\n<p>11.&nbsp;<strong>Your Data Protection Rights under the California Privacy Protection Act (CalOPPA)</strong></p>\r\n\r\n<p>CalOPPA is the first state law in the nation to require commercial websites and online services to post a privacy policy. The law&rsquo;s reach stretches well beyond California to require a person or company in the United States (and conceivable the world) that operates websites collecting personally identifiable information from California consumers to post a conspicuous privacy policy on its website stating exactly the information being collected and those individuals with whom it is being shared, and to comply with this policy.</p>\r\n\r\n<p>According to CalOPPA we agree to the following:</p>\r\n\r\n<p>0.1. users can visit our site anonymously;</p>\r\n\r\n<p>0.2. our Privacy Policy link includes the word &ldquo;Privacy&rdquo;, and can easily be found on the home page of our website;</p>\r\n\r\n<p>0.3. users will be notified of any privacy policy changes on our Privacy Policy Page;</p>\r\n\r\n<p>0.4. users are able to change their personal information by emailing us at&nbsp;<strong>beaversportswear@gmail.com</strong>.</p>\r\n\r\n<p>Our Policy on &ldquo;Do Not Track&rdquo; Signals:</p>\r\n\r\n<p>We honor Do Not Track signals and do not track, plant cookies, or use advertising when a Do Not Track browser mechanism is in place. Do Not Track is a preference you can set in your web browser to inform websites that you do not want to be tracked.</p>\r\n\r\n<p>You can enable or disable Do Not Track by visiting the Preferences or Settings page of your web browser.</p>\r\n\r\n<p>12.&nbsp;<strong>Your Data Protection Rights under the California Consumer Privacy Act (CCPA)</strong></p>\r\n\r\n<p>If you are a California resident, you are entitled to learn what data we collect about you, ask to delete your data and not to sell (share) it. To exercise your data protection rights, you can make certain requests and ask us:</p>\r\n\r\n<p><strong>0.1. What personal information we have about you. If you make this request, we will return to you:</strong></p>\r\n\r\n<p>0.0.1. The categories of personal information we have collected about you.</p>\r\n\r\n<p>0.0.2. The categories of sources from which we collect your personal information.</p>\r\n\r\n<p>0.0.3. The business or commercial purpose for collecting or selling your personal information.</p>\r\n\r\n<p>0.0.4. The categories of third parties with whom we share personal information.</p>\r\n\r\n<p>0.0.5. The specific pieces of personal information we have collected about you.</p>\r\n\r\n<p>0.0.6. A list of categories of personal information that we have sold, along with the category of any other company we sold it to. If we have not sold your personal information, we will inform you of that fact.</p>\r\n\r\n<p>0.0.7. A list of categories of personal information that we have disclosed for a business purpose, along with the category of any other company we shared it with.</p>\r\n\r\n<p>Please note, you are entitled to ask us to provide you with this information up to two times in a rolling twelve-month period. When you make this request, the information provided may be limited to the personal information we collected about you in the previous 12 months.</p>\r\n\r\n<p><strong>0.2. To delete your personal information. If you make this request, we will delete the personal information we hold about you as of the date of your request from our records and direct any service providers to do the same. In some cases, deletion may be accomplished through de-identification of the information. If you choose to delete your personal information, you may not be able to use certain functions that require your personal information to operate.</strong></p>\r\n\r\n<p><strong>0.3. To stop selling your personal information. We don&rsquo;t sell or rent your personal information to any third parties for any purpose. We do not sell your personal information for monetary consideration. However, under some circumstances, a transfer of personal information to a third party, or within our family of companies, without monetary consideration may be considered a &ldquo;sale&rdquo; under California law. You are the only owner of your Personal Data and can request disclosure or deletion at any time.</strong></p>\r\n\r\n<p>If you submit a request to stop selling your personal information, we will stop making such transfers.</p>\r\n\r\n<p>Please note, if you ask us to delete or stop selling your data, it may impact your experience with us, and you may not be able to participate in certain programs or membership services which require the usage of your personal information to function. But in no circumstances, we will discriminate against you for exercising your rights.</p>\r\n\r\n<p>To exercise your California data protection rights described above, please send your request(s) by email:&nbsp;<strong>beaversportswear@gmail.com</strong>.</p>\r\n\r\n<p>Your data protection rights, described above, are covered by the CCPA, short for the California Consumer Privacy Act. To find out more, visit the official California Legislative Information website. The CCPA took effect on 01/01/2020.</p>\r\n\r\n<p>13.&nbsp;<strong>Service Providers</strong></p>\r\n\r\n<p>We may employ third party companies and individuals to facilitate our Service (<strong>&ldquo;Service Providers&rdquo;</strong>), provide Service on our behalf, perform Service-related services or assist us in analysing how our Service is used.</p>\r\n\r\n<p>These third parties have access to your Personal Data only to perform these tasks on our behalf and are obligated not to disclose or use it for any other purpose.</p>\r\n\r\n<p>14.&nbsp;<strong>Analytics</strong></p>\r\n\r\n<p>We may use third-party Service Providers to monitor and analyze the use of our Service.</p>\r\n\r\n<p>15.&nbsp;<strong>CI/CD tools</strong></p>\r\n\r\n<p>We may use third-party Service Providers to automate the development process of our Service.</p>\r\n\r\n<p>16.&nbsp;<strong>Behavioral Remarketing</strong></p>\r\n\r\n<p>We may use remarketing services to advertise on third party websites to you after you visited our Service. We and our third-party vendors use cookies to inform, optimise and serve ads based on your past visits to our Service.</p>\r\n\r\n<p>17.&nbsp;<strong>Payments</strong></p>\r\n\r\n<p>We may provide paid products and/or services within Service. In that case, we use third-party services for payment processing (e.g. payment processors).</p>\r\n\r\n<p>We will not store or collect your payment card details. That information is provided directly to our third-party payment processors whose use of your personal information is governed by their Privacy Policy. These payment processors adhere to the standards set by PCI-DSS as managed by the PCI Security Standards Council, which is a joint effort of brands like Visa, Mastercard, American Express and Discover. PCI-DSS requirements help ensure the secure handling of payment information.</p>\r\n\r\n<p>18.&nbsp;<strong>Links to Other Sites</strong></p>\r\n\r\n<p>Our Service may contain links to other sites that are not operated by us. If you click a third party link, you will be directed to that third party&rsquo;s site. We strongly advise you to review the Privacy Policy of every site you visit.</p>\r\n\r\n<p>We have no control over and assume no responsibility for the content, privacy policies or practices of any third party sites or services.</p>\r\n\r\n<p>For example, the outlined&nbsp;<a href=\"https://policymaker.io/privacy-policy/\">privacy policy</a>&nbsp;has been made using&nbsp;<a href=\"https://policymaker.io/\">PolicyMaker.io</a>, a free tool that helps create high-quality legal documents. PolicyMaker&rsquo;s&nbsp;<a href=\"https://policymaker.io/privacy-policy/\">privacy policy generator</a>&nbsp;is an easy-to-use tool for creating a&nbsp;<a href=\"https://policymaker.io/blog-privacy-policy/\">privacy policy for blog</a>, website, e-commerce store or mobile app.</p>\r\n\r\n<p>19.&nbsp;<strong><strong>Children&rsquo;s Privacy</strong></strong></p>\r\n\r\n<p>Our Services are not intended for use by children under the age of 18 (<strong>&ldquo;Child&rdquo;</strong>&nbsp;or&nbsp;<strong>&ldquo;Children&rdquo;</strong>).</p>\r\n\r\n<p>We do not knowingly collect personally identifiable information from Children under 18. If you become aware that a Child has provided us with Personal Data, please contact us. If we become aware that we have collected Personal Data from Children without verification of parental consent, we take steps to remove that information from our servers.</p>\r\n\r\n<p>20.&nbsp;<strong>Changes to This Privacy Policy</strong></p>\r\n\r\n<p>We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page.</p>\r\n\r\n<p>We will let you know via email and/or a prominent notice on our Service, prior to the change becoming effective and update &ldquo;effective date&rdquo; at the top of this Privacy Policy.</p>\r\n\r\n<p>You are advised to review this Privacy Policy periodically for any changes. Changes to this Privacy Policy are effective when they are posted on this page.</p>\r\n\r\n<p>21.&nbsp;<strong>Contact Us</strong></p>\r\n\r\n<p>If you have any questions about this Privacy Policy, please contact us by email:&nbsp;<strong>beaversportswear@gmail.com</strong>.</p>\r\n', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `discount_codes`
--

CREATE TABLE `discount_codes` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(10) NOT NULL,
  `code` varchar(10) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `valid_from_date` int(10) UNSIGNED NOT NULL,
  `valid_to_date` int(10) UNSIGNED NOT NULL,
  `cart_value` decimal(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1-enabled, 0-disabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `discount_codes`
--

INSERT INTO `discount_codes` (`id`, `type`, `code`, `amount`, `valid_from_date`, `valid_to_date`, `cart_value`, `status`) VALUES
(2, 'float', 'SPNF2T', '100', 1704067200, 1706659200, 1500.00, 1),
(3, 'float', 'ZELTA1EAX', '', 0, 0, 0.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(10) UNSIGNED NOT NULL,
  `activity` varchar(255) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `time` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_slider`
--

CREATE TABLE `home_slider` (
  `id` int(11) NOT NULL,
  `img` text DEFAULT NULL,
  `platform` tinyint(4) NOT NULL DEFAULT 1,
  `name` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `home_slider`
--

INSERT INTO `home_slider` (`id`, `img`, `platform`, `name`, `created_at`, `updated_at`) VALUES
(26, 'slider_2025-04-0509-28-444037.jpg', 2, 'testing', NULL, NULL),
(27, 'slider_2025-04-0509-29-028948.jpg', 1, 'testing', NULL, NULL),
(28, 'slider_2025-04-0509-29-533526.jpg', 1, 'customer2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `abbr` varchar(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `currencyKey` varchar(5) NOT NULL,
  `flag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `abbr`, `name`, `currency`, `currencyKey`, `flag`) VALUES
(1, 'bg', 'bulgarian', 'лв', 'BGN', 'bg.jpg'),
(2, 'en', 'english', '$', 'USD', 'en.jpg'),
(3, 'gr', 'greece', 'EUR', 'EUR', 'gr.png');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_no` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tx_id` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `sub_total` decimal(8,2) NOT NULL DEFAULT 0.00,
  `total_tax` decimal(8,2) NOT NULL DEFAULT 0.00,
  `total_discount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 = pending, 1 = active',
  `merchant_status` longtext DEFAULT NULL,
  `courier_name` text DEFAULT NULL,
  `tracking_id` longtext DEFAULT NULL,
  `updatedAt` datetime NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_no`, `user_id`, `tx_id`, `price`, `sub_total`, `total_tax`, `total_discount`, `status`, `merchant_status`, `courier_name`, `tracking_id`, `updatedAt`, `createdAt`) VALUES
(2, 'order-250127115333', 30, '250127115333', 300.00, 300.00, 0.00, 0.00, 1, NULL, NULL, NULL, '2025-01-27 11:53:33', '2025-01-27 11:53:33'),
(3, 'order-250127115617', 30, '250127115617', 300.00, 300.00, 0.00, 0.00, 1, NULL, NULL, NULL, '2025-01-27 11:56:17', '2025-01-27 11:56:17'),
(4, 'order-250127115905', 30, '250127115905', 200.00, 200.00, 0.00, 0.00, 1, NULL, NULL, NULL, '2025-01-27 11:59:05', '2025-01-27 11:59:05'),
(5, 'order-250407082745', 30, '250407082745', 8427.00, 8427.00, 0.00, 0.00, 1, NULL, NULL, NULL, '2025-04-07 08:27:45', '2025-04-07 08:27:45'),
(6, 'order-250407105206', 30, '250407105206', 492.00, 492.00, 0.00, 0.00, 0, NULL, NULL, NULL, '2025-04-07 10:52:06', '2025-04-07 10:52:06'),
(7, 'order-250407105444', 30, '250407105444', 12.00, 12.00, 0.00, 0.00, 0, NULL, NULL, NULL, '2025-04-07 10:54:44', '2025-04-07 10:54:44'),
(8, 'order-250407105535', 30, '250407105535', 1111.00, 1111.00, 0.00, 0.00, 0, NULL, NULL, NULL, '2025-04-07 10:55:35', '2025-04-07 10:55:35'),
(9, 'order-250407105730', 30, '250407105730', 123.00, 123.00, 0.00, 0.00, 0, NULL, NULL, NULL, '2025-04-07 10:57:30', '2025-04-07 10:57:30'),
(10, 'order-250407105810', 30, '250407105810', 1000.00, 1000.00, 0.00, 0.00, 0, NULL, NULL, NULL, '2025-04-07 10:58:10', '2025-04-07 10:58:10'),
(11, 'order-250407105939', 30, '250407105939', 1000.00, 1000.00, 0.00, 0.00, 1, NULL, NULL, NULL, '2025-04-07 10:59:39', '2025-04-07 10:59:39'),
(12, 'order-250407110003', 30, '250407110003', 3000.00, 3000.00, 0.00, 0.00, 1, NULL, NULL, NULL, '2025-04-07 11:00:03', '2025-04-07 11:00:03'),
(13, 'order-250407111211', 30, '250407111211', 123.00, 123.00, 0.00, 0.00, 0, NULL, NULL, NULL, '2025-04-07 11:12:11', '2025-04-07 11:12:11'),
(14, 'order-250407113723', 30, '250407113723', 1111.00, 1111.00, 0.00, 0.00, 0, NULL, NULL, NULL, '2025-04-07 11:37:23', '2025-04-07 11:37:23'),
(15, 'order-250407113753', 30, '250407113753', 123.00, 123.00, 0.00, 0.00, 0, NULL, NULL, NULL, '2025-04-07 11:37:53', '2025-04-07 11:37:53'),
(16, 'order-250407114037', 30, '250407114037', 170.00, 170.00, 0.00, 0.00, 0, NULL, NULL, NULL, '2025-04-07 11:40:37', '2025-04-07 11:40:37'),
(17, 'order-250407114116', 30, '250407114116', 123.00, 123.00, 0.00, 0.00, 1, NULL, NULL, NULL, '2025-04-07 11:41:16', '2025-04-07 11:41:16'),
(18, 'order-250407114132', 30, '250407114132', 123.00, 123.00, 0.00, 0.00, 0, NULL, NULL, NULL, '2025-04-07 11:41:32', '2025-04-07 11:41:32'),
(19, 'order-250407114242', 30, '250407114242', 123.00, 123.00, 0.00, 0.00, 1, NULL, NULL, NULL, '2025-04-07 11:42:42', '2025-04-07 11:42:42'),
(20, 'order-250407114428', 30, '250407114428', 123.00, 123.00, 0.00, 0.00, 0, NULL, NULL, NULL, '2025-04-07 11:44:28', '2025-04-07 11:44:28');

-- --------------------------------------------------------

--
-- Table structure for table `orders_clients`
--

CREATE TABLE `orders_clients` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(20) NOT NULL,
  `post_code` varchar(10) NOT NULL,
  `notes` text NOT NULL,
  `for_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `order_no` varchar(200) NOT NULL,
  `order_item_no` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `selected_size` varchar(100) DEFAULT NULL,
  `name` varchar(500) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(8,2) NOT NULL DEFAULT 0.00,
  `price` decimal(10,2) NOT NULL,
  `discount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `discount_per` int(11) NOT NULL DEFAULT 0,
  `tax` decimal(8,2) NOT NULL DEFAULT 0.00,
  `img` varchar(200) NOT NULL,
  `ship_method` text DEFAULT NULL,
  `tracking` varchar(255) DEFAULT NULL,
  `package_weight` text DEFAULT NULL,
  `stock_less` int(11) NOT NULL DEFAULT 0,
  `write_up` text DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `order_no`, `order_item_no`, `product_id`, `selected_size`, `name`, `quantity`, `total`, `price`, `discount`, `discount_per`, `tax`, `img`, `ship_method`, `tracking`, `package_weight`, `stock_less`, `write_up`, `user_id`, `vendor_id`) VALUES
(7, 'order-250127115617', 'order-250127115617-7888', 5, 'XL', 'gdf', 1, 300.00, 300.00, 0.00, 0, 0.00, 'product_2025-01-2707-41-217664.jpg', NULL, NULL, NULL, 0, 'my name is vikas saini', 30, 1),
(6, 'order-250127115333', 'order-250127115333-2200', 5, 'XL', 'gdf', 1, 300.00, 300.00, 0.00, 0, 0.00, 'product_2025-01-2707-41-217664.jpg', NULL, NULL, NULL, 0, 'asss sss fffd', 30, 1),
(5, 'order-250127115152', 'order-250127115152-7171', 5, 'XL', 'gdf', 4, 1200.00, 300.00, 0.00, 0, 0.00, 'product_2025-01-2707-41-217664.jpg', NULL, NULL, NULL, 0, 'bvvvv', 30, 1),
(8, 'order-250127115905', 'order-250127115905-3575', 5, 'S', 'gdf', 1, 200.00, 200.00, 0.00, 0, 0.00, 'product_2025-01-2707-41-217664.jpg', NULL, NULL, NULL, 0, 'hi no don', 30, 1),
(9, 'order-250407081950', 'order-250407081950-5341', 5, NULL, 'gdf', 7, 7777.00, 1111.00, 0.00, 0, 0.00, 'product_2025-04-0308-12-581.jpg', NULL, NULL, NULL, 0, NULL, 0, 1),
(10, 'order-250407082659', 'order-250407082659-6465', 2, 'S', 'PCC-73', 1, 650.00, 650.00, 0.00, 0, 0.00, 'product_2025-04-0308-12-0084.jpg', NULL, NULL, NULL, 0, '', 0, 1),
(11, 'order-250407082659', 'order-250407082659-8935', 5, NULL, 'gdf', 7, 7777.00, 1111.00, 0.00, 0, 0.00, 'product_2025-04-0308-12-581.jpg', NULL, NULL, NULL, 0, NULL, 0, 1),
(12, 'order-250407082745', 'order-250407082745-7200', 2, 'S', 'PCC-73', 1, 650.00, 650.00, 0.00, 0, 0.00, 'product_2025-04-0308-12-0084.jpg', NULL, NULL, NULL, 0, '', 30, 1),
(13, 'order-250407082745', 'order-250407082745-8399', 5, NULL, 'gdf', 7, 7777.00, 1111.00, 0.00, 0, 0.00, 'product_2025-04-0308-12-581.jpg', NULL, NULL, NULL, 0, NULL, 30, 1),
(14, 'order-250407105206', 'order-250407105206-8820', 9, NULL, 'gdfss', 4, 492.00, 123.00, 0.00, 0, 0.00, 'product_2025-04-0509-49-466988.jpg', NULL, NULL, NULL, 0, NULL, 30, 1),
(15, 'order-250407105444', 'order-250407105444-7846', 8, NULL, 'saini', 1, 12.00, 12.00, 0.00, 0, 0.00, 'product_2025-04-0509-49-121737.jpg', NULL, NULL, NULL, 0, NULL, 30, 1),
(16, 'order-250407105535', 'order-250407105535-8447', 5, NULL, 'gdf', 1, 1111.00, 1111.00, 0.00, 0, 0.00, 'product_2025-04-0308-12-581.jpg', NULL, NULL, NULL, 0, NULL, 30, 1),
(17, 'order-250407105730', 'order-250407105730-6008', 9, NULL, 'gdfss', 1, 123.00, 123.00, 0.00, 0, 0.00, 'product_2025-04-0509-49-466988.jpg', NULL, NULL, NULL, 0, NULL, 30, 1),
(18, 'order-250407105810', 'order-250407105810-9746', 7, NULL, 'iron', 1, 1000.00, 1000.00, 0.00, 0, 0.00, 'product_2025-04-0507-07-201826.jpeg', NULL, NULL, NULL, 0, NULL, 30, 1),
(19, 'order-250407105939', 'order-250407105939-2171', 7, NULL, 'iron', 1, 1000.00, 1000.00, 0.00, 0, 0.00, 'product_2025-04-0507-07-201826.jpeg', NULL, NULL, NULL, 0, NULL, 30, 1),
(20, 'order-250407110003', 'order-250407110003-8664', 7, NULL, 'iron', 3, 3000.00, 1000.00, 0.00, 0, 0.00, 'product_2025-04-0507-07-201826.jpeg', NULL, NULL, NULL, 0, NULL, 30, 1),
(21, 'order-250407110546', 'order-250407110546-8690', 9, NULL, 'gdfss', 1, 123.00, 123.00, 0.00, 0, 0.00, 'product_2025-04-0509-49-466988.jpg', NULL, NULL, NULL, 0, NULL, 0, 1),
(22, 'order-250407111137', 'order-250407111137-8472', 9, NULL, 'gdfss', 1, 123.00, 123.00, 0.00, 0, 0.00, 'product_2025-04-0509-49-466988.jpg', NULL, NULL, NULL, 0, NULL, 0, 1),
(23, 'order-250407111211', 'order-250407111211-6501', 9, NULL, 'gdfss', 1, 123.00, 123.00, 0.00, 0, 0.00, 'product_2025-04-0509-49-466988.jpg', NULL, NULL, NULL, 0, NULL, 30, 1),
(24, 'order-250407113723', 'order-250407113723-2727', 5, NULL, 'gdf', 1, 1111.00, 1111.00, 0.00, 0, 0.00, 'product_2025-04-0308-12-581.jpg', NULL, NULL, NULL, 0, NULL, 30, 1),
(25, 'order-250407113753', 'order-250407113753-5703', 9, NULL, 'gdfss', 1, 123.00, 123.00, 0.00, 0, 0.00, 'product_2025-04-0509-49-466988.jpg', NULL, NULL, NULL, 0, NULL, 30, 1),
(26, 'order-250407114037', 'order-250407114037-9402', 1, NULL, 'PCC-31', 1, 170.00, 170.00, 0.00, 0, 0.00, 'product_2025-04-0310-42-5287.jpg', NULL, NULL, NULL, 0, NULL, 30, 1),
(27, 'order-250407114116', 'order-250407114116-1260', 9, NULL, 'gdfss', 1, 123.00, 123.00, 0.00, 0, 0.00, 'product_2025-04-0509-49-466988.jpg', NULL, NULL, NULL, 0, NULL, 30, 1),
(28, 'order-250407114132', 'order-250407114132-4294', 9, NULL, 'gdfss', 1, 123.00, 123.00, 0.00, 0, 0.00, 'product_2025-04-0509-49-466988.jpg', NULL, NULL, NULL, 0, NULL, 30, 1),
(29, 'order-250407114242', 'order-250407114242-5426', 9, NULL, 'gdfss', 1, 123.00, 123.00, 0.00, 0, 0.00, 'product_2025-04-0509-49-466988.jpg', NULL, NULL, NULL, 0, NULL, 30, 1),
(30, 'order-250407114428', 'order-250407114428-3392', 9, NULL, 'gdfss', 1, 123.00, 123.00, 0.00, 0, 0.00, 'product_2025-04-0509-49-466988.jpg', NULL, NULL, NULL, 0, NULL, 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` int(11) NOT NULL,
  `partner_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_history`
--

CREATE TABLE `payment_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ORDERID` text DEFAULT NULL,
  `MID` text DEFAULT NULL,
  `TXNID` text DEFAULT NULL,
  `TXNAMOUNT` text DEFAULT NULL,
  `PAYMENTMODE` text DEFAULT NULL,
  `CURRENCY` text DEFAULT NULL,
  `TXNDATE` text DEFAULT NULL,
  `STATUS` text DEFAULT NULL,
  `RESPCODE` text DEFAULT NULL,
  `RESPMSG` text DEFAULT NULL,
  `GATEWAYNAME` text DEFAULT NULL,
  `BANKTXNID` text DEFAULT NULL,
  `BANKNAME` text DEFAULT NULL,
  `CHECKSUMHASH` text DEFAULT NULL,
  `created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payment_history`
--

INSERT INTO `payment_history` (`id`, `user_id`, `ORDERID`, `MID`, `TXNID`, `TXNAMOUNT`, `PAYMENTMODE`, `CURRENCY`, `TXNDATE`, `STATUS`, `RESPCODE`, `RESPMSG`, `GATEWAYNAME`, `BANKTXNID`, `BANKNAME`, `CHECKSUMHASH`, `created`) VALUES
(1, 30, '250127115152', NULL, NULL, '1200', 'CashOnDelivery', 'INR', NULL, 'TXN_STATUS', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00'),
(2, 30, '250127115333', NULL, NULL, '300', 'CashOnDelivery', 'INR', NULL, 'TXN_STATUS', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00'),
(3, 30, '250127115617', NULL, NULL, '300', 'CashOnDelivery', 'INR', NULL, 'TXN_STATUS', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00'),
(4, 30, '250127115905', NULL, NULL, '200', 'CashOnDelivery', 'INR', NULL, 'TXN_STATUS', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00'),
(5, 30, '250407082745', NULL, NULL, '8427', 'CashOnDelivery', 'INR', NULL, 'TXN_STATUS', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00'),
(6, 30, '250407105939', NULL, NULL, '1000', 'CashOnDelivery', 'INR', NULL, 'TXN_STATUS', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00'),
(7, 30, '250407110003', NULL, NULL, '3000', 'CashOnDelivery', 'INR', NULL, 'TXN_STATUS', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00'),
(8, 30, '250407114116', NULL, NULL, '123', 'CashOnDelivery', 'INR', NULL, 'TXN_STATUS', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00'),
(9, 30, '250407114242', NULL, NULL, '123', 'CashOnDelivery', 'INR', NULL, 'TXN_STATUS', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pickup_address`
--

CREATE TABLE `pickup_address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hm_number` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `district` text DEFAULT NULL,
  `state` text DEFAULT NULL,
  `pincode` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `product_image`) VALUES
(1, 5, 'product_2025-04-0510-27-3732.jpg'),
(2, 5, 'product_2025-04-0510-27-4733.jpg'),
(3, 9, 'product_2025-04-0510-48-1545.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_comment` text NOT NULL,
  `user_rating` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` int(11) NOT NULL,
  `size_name` varchar(250) NOT NULL,
  `price` varchar(255) DEFAULT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `size_name`, `price`, `product_id`) VALUES
(1, 'S', '120', 3),
(2, 'M', '140', 3),
(3, 'L', '160', 3),
(4, 'S', '170', 1),
(5, 'M', '190', 1),
(6, 'L', '230', 1),
(7, 'XL', '260', 1),
(8, 'XS', '500', 2),
(9, 'S', '650', 2),
(10, 'M', '850', 2),
(11, 'L', '1250', 2),
(12, 'S', '150', 4),
(13, 'M', '180', 4),
(14, 'L', '220', 4),
(15, 'S', '200', 5),
(16, 'XL', '300', 5);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `google-plus` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `pinterest` varchar(255) DEFAULT NULL,
  `home_banner1` varchar(255) DEFAULT NULL,
  `home_banner2` varchar(255) DEFAULT NULL,
  `discount_cart_limit` decimal(8,2) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `facebook`, `twitter`, `google-plus`, `instagram`, `pinterest`, `home_banner1`, `home_banner2`, `discount_cart_limit`, `created`) VALUES
(1, 'https://www.facebook.com', 'https://www.twitter.com', '#', 'https://www.instagram.com/', '#', 'banner1_202401081019241687.jpg', 'banner2_202109070720469631.jpeg', 0.00, '2025-01-25 12:03:28');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_address`
--

CREATE TABLE `shipping_address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `address1` text DEFAULT NULL,
  `district` text DEFAULT NULL,
  `state` text DEFAULT NULL,
  `pincode` int(11) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `billing_first_name` varchar(255) DEFAULT NULL,
  `billing_last_name` varchar(255) DEFAULT NULL,
  `billing_address` text DEFAULT NULL,
  `billing_address1` text DEFAULT NULL,
  `billing_district` varchar(255) DEFAULT NULL,
  `billing_state` varchar(255) DEFAULT NULL,
  `billing_pincode` varchar(255) DEFAULT NULL,
  `same_data` tinyint(4) DEFAULT 0,
  `size_name` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `shipping_address`
--

INSERT INTO `shipping_address` (`id`, `user_id`, `first_name`, `last_name`, `address`, `address1`, `district`, `state`, `pincode`, `company`, `phone`, `billing_first_name`, `billing_last_name`, `billing_address`, `billing_address1`, `billing_district`, `billing_state`, `billing_pincode`, `same_data`, `size_name`) VALUES
(16, 30, '22talakaurvikas', 'sainivikas', 'malikpur', NULL, 'ambala', 'haryana', 133104, 'hitechvikas', '8295333824', 'talakaurvikas', 'sainivikas', 'malikpur', NULL, 'ambala', 'haryana', '133103', NULL, NULL),
(18, NULL, 'hello', 'sir', 'malikpur', NULL, 'dfvc', 'km', 133103, 'dzfvxc', '09876543210', '', '', '', NULL, '', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(6, 'yes', 'slider_2025-04-0508-04-507093.jpg', '2025-04-05 08:04:50', '2025-04-05 13:34:50'),
(7, 'sregrf', 'slider_2025-04-0508-29-024173.jpg', '2025-04-05 08:29:02', '2025-04-05 13:59:02'),
(8, 'eraw', 'slider_2025-04-0509-22-33489.png', '2025-04-05 09:22:33', '2025-04-05 14:52:33'),
(9, 'erasfd', 'slider_2025-04-0509-23-134582.png', '2025-04-05 09:23:13', '2025-04-05 14:53:13'),
(10, 'erfw', 'slider_2025-04-0509-23-249572.jpg', '2025-04-05 09:23:24', '2025-04-05 14:53:24'),
(11, 'uvu', '', '2025-04-05 09:36:18', '2025-04-05 15:06:18');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `tag_name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `tag_name`, `url`) VALUES
(3, 'Kwality', 'kwality');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_short_des` text CHARACTER SET utf8 COLLATE utf8_swedish_ci DEFAULT NULL,
  `product_description` text CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` decimal(8,2) NOT NULL DEFAULT 0.00,
  `product_mrp` decimal(8,2) NOT NULL DEFAULT 0.00,
  `product_quantity` int(11) NOT NULL,
  `product_category` int(11) NOT NULL,
  `product_brand` int(11) NOT NULL,
  `product_tags` text DEFAULT NULL,
  `product_url` varchar(500) DEFAULT NULL,
  `published_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `vendor_id` int(11) NOT NULL,
  `in_trending` int(11) NOT NULL DEFAULT 0 COMMENT '1=product is in trending',
  `reviews` int(11) DEFAULT 0,
  `rating` int(11) DEFAULT 0,
  `discount` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `size_name` varchar(255) DEFAULT NULL,
  `tax_included` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_title`, `product_short_des`, `product_description`, `product_image`, `product_price`, `product_mrp`, `product_quantity`, `product_category`, `product_brand`, `product_tags`, `product_url`, `published_date`, `vendor_id`, `in_trending`, `reviews`, `rating`, `discount`, `status`, `size_name`, `tax_included`, `created_by`) VALUES
(1, 'PCC-31', '<p>PCC-31</p>\r\n', '<p>PCC-31</p>\r\n', 'product_2025-04-0310-42-5287.jpg', 170.00, 0.00, 1000, 18, 1, '[\"3\"]', 'pcc-31', '2025-01-25 14:16:04', 1, 1, 0, 0, 0, 1, NULL, 0, 0),
(2, 'PCC-73', '<p>PCC-73</p>\r\n', '<p>PCC-73</p>\r\n', 'product_2025-04-0308-12-0084.jpg', 500.00, 0.00, 1000, 18, 1, '[\"3\"]', 'pcc-73', '2025-01-25 14:18:24', 1, 1, 0, 0, 0, 1, NULL, 0, 0),
(3, 'PCC-22', '<p>PCC-22</p>\r\n', '<p>PCC-22</p>\r\n', 'product_2025-04-0308-12-1543.jpg', 120.00, 0.00, 1000, 18, 1, '[\"3\"]', 'pcc-22', '2025-01-25 14:19:37', 1, 1, 0, 0, 0, 1, NULL, 0, 0),
(4, 'PC-24', '<p>PC-24</p>\r\n', '<p>PC-24</p>\r\n', 'product_2025-04-0308-12-3199.jpg', 150.00, 0.00, 1000, 18, 1, '[\"3\"]', 'pc-24', '2025-01-25 14:46:44', 1, 1, 0, 0, 0, 1, NULL, 0, 0),
(5, 'gdf', '<p>hello</p>\r\n', '<p>helllo</p>\r\n', 'product_2025-04-0308-12-581.jpg', 1111.00, 0.00, 111, 14, 1, '[\"3\"]', 'gdf', '2025-01-27 02:11:21', 1, 1, 0, 0, 0, 1, NULL, 1, 0),
(6, 'gdf', '<p>good</p>\r\n', '<p>bad</p>\r\n', 'product_2025-04-0507-05-208151.jpg', 100.00, 120.00, 0, 27, 1, '[\"3\"]', 'gdf', '2025-04-05 01:35:20', 1, 0, 0, 0, 0, 1, NULL, 0, 0),
(7, 'iron', '<p>yes</p>\r\n', '<p>no</p>\r\n', 'product_2025-04-0507-07-201826.jpeg', 1000.00, 1200.00, 1, 15, 1, '[\"3\"]', 'iron', '2025-04-05 01:37:20', 1, 0, 0, 0, 0, 1, NULL, 1, 0),
(8, 'saini', '<p>wfse</p>\r\n', '<p>ds</p>\r\n', 'product_2025-04-0509-49-121737.jpg', 12.00, 14.00, 0, 14, 1, '[\"3\"]', 'saini', '2025-04-05 04:19:12', 1, 0, 0, 0, 0, 1, NULL, 1, 0),
(9, 'gdfss', '<p>122</p>\r\n', '<p>my name is vikas saini</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'product_2025-04-0509-49-466988.jpg', 123.00, 0.00, 0, 16, 1, '[\"3\"]', 'gdfss', '2025-04-05 04:19:46', 1, 0, 0, 0, 0, 1, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(11) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `pdf` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `image`, `pdf`) VALUES
(1, 'super.png', 'grocerylistsDOTorg_Deluxe_v3_3.pdf'),
(2, 'aldi.png', 'grocerylistsDOTorg_Deluxe_v3_3.pdf'),
(3, 'carre.png', 'grocerylistsDOTorg_Deluxe_v3_3.pdf'),
(8, 'app_logo.png', 'grocerylistsDOTorg_Deluxe_v3_3.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `store_name` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `gstin` varchar(255) DEFAULT NULL,
  `pick_address` varchar(255) DEFAULT NULL,
  `user_type` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 for user, 1 for seller, 2 for professional',
  `reg_id` varchar(255) DEFAULT NULL,
  `designation` text DEFAULT NULL,
  `firm` text DEFAULT NULL,
  `qualification` text DEFAULT NULL,
  `google_location` text DEFAULT NULL,
  `latitude` decimal(9,6) NOT NULL DEFAULT 0.000000,
  `longitude` decimal(9,6) NOT NULL DEFAULT 0.000000,
  `activation` tinyint(4) NOT NULL DEFAULT 0,
  `seller_activation` tinyint(4) NOT NULL DEFAULT 0,
  `professional_activation` tinyint(4) DEFAULT 0,
  `categories` text DEFAULT NULL,
  `partners` text DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `store_name`, `name`, `email`, `password`, `phone`, `profile_pic`, `gstin`, `pick_address`, `user_type`, `reg_id`, `designation`, `firm`, `qualification`, `google_location`, `latitude`, `longitude`, `activation`, `seller_activation`, `professional_activation`, `categories`, `partners`, `created_date`, `updated_at`) VALUES
(30, 'vikas_store', 'vikas saini', 'saini391@gmail.com', 'Vikas@391', '8295333824', NULL, NULL, NULL, 0, NULL, 'develop', 'xyz', 'mca', NULL, 0.000000, 0.000000, 1, 1, 0, NULL, NULL, '2021-07-21 16:19:36', '0000-00-00 00:00:00'),
(1, 'XYZ', 'Owner Name', 'admin@gmail.com', 'admin@123', '1234567890', NULL, '06AZCPS7082D1ZA', NULL, 1, '', NULL, NULL, NULL, 'Ambala, Haryana, India', 30.375201, 76.782122, 1, 1, 0, '[\"31\",\"32\"]', '[\"5\"]', '2021-07-24 03:18:13', '0000-00-00 00:00:00'),
(50, NULL, 'Vinish Makkar', 'vinish.makkar@gmail.com', '1234', '9541033000', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 'Ambala, Haryana, India', 30.375201, 76.782122, 1, 0, 0, NULL, NULL, '2021-07-27 07:31:40', '0000-00-00 00:00:00'),
(137, NULL, 'vikas saini', 'admin123@gmail.com', '123456', '08295333824', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '', 0.000000, 0.000000, 0, 0, 0, NULL, NULL, '2025-04-07 09:32:44', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(10) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(10) UNSIGNED NOT NULL,
  `last_login` int(10) UNSIGNED DEFAULT NULL,
  `active` tinyint(3) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', 'e10adc3949ba59abbe56e057f20f883e', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1554284311, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_leads`
--

CREATE TABLE `user_leads` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `professional_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `message` text NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_leads`
--

INSERT INTO `user_leads` (`id`, `user_id`, `professional_id`, `status`, `message`, `createdAt`, `updatedAt`) VALUES
(1, 41, 48, 1, 'Message hello', '2019-06-22 00:00:00', '2019-06-22 00:00:00'),
(3, 47, 48, 1, 'He is not interested', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `value_store`
--

CREATE TABLE `value_store` (
  `id` int(10) UNSIGNED NOT NULL,
  `thekey` varchar(50) NOT NULL,
  `value` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `value_store`
--

INSERT INTO `value_store` (`id`, `thekey`, `value`) VALUES
(1, 'sitelogo', 'NewLogo.jpg'),
(2, 'navitext', ''),
(3, 'footercopyright', 'Powered by ECC FZE © All right reserved. '),
(4, 'contactspage', 'Hello dear client'),
(5, 'footerContactAddr', ''),
(6, 'footerContactEmail', 'support@shop.dev'),
(7, 'footerContactPhone', ''),
(8, 'googleMaps', '42.671840, 83.279163'),
(9, 'footerAboutUs', ''),
(10, 'footerSocialFacebook', ''),
(11, 'footerSocialTwitter', ''),
(12, 'footerSocialGooglePlus', ''),
(13, 'footerSocialPinterest', ''),
(14, 'footerSocialYoutube', ''),
(16, 'contactsEmailTo', 'contacts@shop.dev'),
(17, 'shippingOrder', '1'),
(18, 'addJs', ''),
(19, 'publicQuantity', '0'),
(20, 'paypal_email', ''),
(21, 'paypal_sandbox', '1'),
(22, 'publicDateAdded', '0'),
(23, 'googleApi', ''),
(24, 'template', 'redlabel'),
(25, 'cashondelivery_visibility', '1'),
(26, 'showBrands', '1'),
(27, 'showInSlider', '0'),
(28, 'codeDiscounts', '1'),
(29, 'virtualProducts', '0'),
(30, 'multiVendor', '1');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `tax` decimal(8,2) NOT NULL DEFAULT 0.00,
  `customer_id` int(11) NOT NULL,
  `product_image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `api_users`
--
ALTER TABLE `api_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_detail`
--
ALTER TABLE `bank_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD UNIQUE KEY `ID` (`id`);

--
-- Indexes for table `discount_codes`
--
ALTER TABLE `discount_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_slider`
--
ALTER TABLE `home_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `orders_clients`
--
ALTER TABLE `orders_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_history`
--
ALTER TABLE `payment_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pickup_address`
--
ALTER TABLE `pickup_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_address`
--
ALTER TABLE `shipping_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `user_leads`
--
ALTER TABLE `user_leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `value_store`
--
ALTER TABLE `value_store`
  ADD PRIMARY KEY (`id`),
  ADD KEY `key` (`thekey`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `api_users`
--
ALTER TABLE `api_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank_detail`
--
ALTER TABLE `bank_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `discount_codes`
--
ALTER TABLE `discount_codes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_slider`
--
ALTER TABLE `home_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders_clients`
--
ALTER TABLE `orders_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_history`
--
ALTER TABLE `payment_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pickup_address`
--
ALTER TABLE `pickup_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shipping_address`
--
ALTER TABLE `shipping_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_leads`
--
ALTER TABLE `user_leads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `value_store`
--
ALTER TABLE `value_store`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
