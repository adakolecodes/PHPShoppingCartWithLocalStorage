-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 11, 2025 at 12:24 PM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpshoppingcart`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_number` bigint NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` double(12,2) NOT NULL,
  `quantity` int NOT NULL,
  `item_cost` double(12,2) NOT NULL,
  `shipping_address` varchar(200) NOT NULL,
  `date_of_order` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `user_id`, `product_id`, `product_name`, `product_price`, `quantity`, `item_cost`, `shipping_address`, `date_of_order`) VALUES
(1, 9501730724841, 2, 30, 'Designer Wallet', 129.99, 1, 129.99, 'Benue', '2024-11-04 13:54:01'),
(2, 7041746965881, 1, 26, 'Outdoor Grill', 399.99, 3, 1199.97, 'Otukpo Benue', '2025-05-11 13:18:01');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) NOT NULL,
  `product_price` double(12,2) NOT NULL,
  `product_category` varchar(50) NOT NULL,
  `product_description` text NOT NULL,
  `product_image` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_price`, `product_category`, `product_description`, `product_image`) VALUES
(1, 'Smartphone X', 799.99, 'Electronics', 'Experience cutting-edge technology with our Smartphone X. This sleek device features a stunning 6.5-inch AMOLED display, a powerful octa-core processor, and a high-resolution camera for capturing all your moments in vivid detail. Stay connected, browse the web, and enjoy your favorite apps with lightning-fast performance. Get the best of innovation in the palm of your hand. Comes with accessories. Limited stock available.', '1.jpg'),
(2, 'Laptop Pro', 1299.99, 'Computers', 'Elevate your productivity with the Laptop Pro. This premium laptop boasts a 15.6-inch 4K Ultra HD display, a lightning-fast SSD, and a high-performance CPU for seamless multitasking and gaming. Whether you\'re a professional or a casual user, this laptop delivers exceptional performance and stunning visuals. Perfect for work and play. Includes a free software bundle. Order now while supplies last.', '2.jpg'),
(3, 'Smartwatch Elite', 299.99, 'Wearables', 'Stay on top of your fitness and notifications with the Smartwatch Elite. With built-in GPS, heart rate monitoring, and a variety of sports modes, it\'s your perfect fitness companion. Stay connected to your smartphone, receive calls, messages, and more, all from your wrist. The stylish design and long battery life make it an excellent choice for your active lifestyle. Available in multiple colors. Get yours today and redefine your daily routine.', '3.jpg'),
(4, 'Coffee Maker Deluxe', 89.99, 'Appliances', 'Indulge in cafe-quality coffee every morning with the Coffee Maker Deluxe. This advanced coffee machine features a programmable timer, adjustable brew strength, and a built-in grinder for freshly ground beans. Whether you prefer espresso, cappuccino, or a classic drip brew, this machine has you covered. Start your day right with a perfect cup of coffee. Compact design fits any kitchen. Limited-time offer includes a coffee bean sampler.', '4.jpg'),
(5, 'Fitness Tracker', 49.99, 'Fitness', 'Take control of your health and fitness with the Fitness Tracker. Monitor your steps, heart rate, sleep quality, and more. Its intuitive app provides detailed insights into your wellness. The waterproof design means you can wear it in any weather. Stay motivated with customizable goals and reminders. It\'s time to reach your fitness goals. Compatible with iOS and Android devices. Order now and start your journey to a healthier you.', '5.jpg'),
(6, 'Designer Handbag', 399.99, 'Fashion', 'Elevate your style with our Designer Handbag. Crafted from premium leather, this handbag exudes elegance and sophistication. With multiple compartments, it offers both fashion and functionality. The timeless design and attention to detail make it a must-have accessory for any occasion. Available in various colors to match your outfit. Limited stock. Get yours and make a fashion statement.', '6.jpg'),
(7, '4K Ultra HD TV', 999.99, 'Electronics', 'Immerse yourself in the world of entertainment with our 4K Ultra HD TV. This stunning television delivers lifelike picture quality with vibrant colors and sharp detail. With Smart TV capabilities, you can access your favorite streaming services and apps. The sleek and slim design complements any living space. Bring cinematic experiences into your home. Limited-time offer includes a complimentary soundbar.', '7.jpg'),
(8, 'Gourmet Cooking Set', 249.99, 'Kitchen', 'Unleash your inner chef with our Gourmet Cooking Set. This comprehensive cookware collection includes everything you need for culinary excellence. From sautéing to baking, our non-stick, durable pans and utensils have you covered. The ergonomic handles ensure comfort during cooking. Elevate your kitchen game with this exquisite set. Great for gifting too. Order now and discover the joy of cooking.', '8.jpg'),
(9, 'Bluetooth Speaker', 69.99, 'Electronics', 'Enjoy music anytime, anywhere with our Bluetooth Speaker. This portable speaker delivers high-quality sound with deep bass and crisp treble. Connect wirelessly to your devices and stream your favorite playlists. With a built-in microphone, it\'s perfect for hands-free calls. The sleek design and long battery life make it an ideal companion for your adventures. Available in multiple colors. Limited stock. Buy now and elevate your audio experience.', '9.jpg'),
(10, 'Sneakers - Limited Edition', 179.99, 'Fashion', 'Step up your style game with our Limited Edition Sneakers. These exclusive kicks combine fashion and comfort. The premium materials and attention to detail ensure durability and style. With a cushioned sole and superior arch support, these sneakers are perfect for all-day wear. Available in limited quantities, so don\'t miss out on this opportunity to own a unique pair. Order now and stand out from the crowd.', '10.jpg'),
(11, 'Digital Camera', 599.99, 'Electronics', 'Capture life\'s moments in stunning detail with our Digital Camera. Featuring a high-resolution sensor and advanced optics, it delivers professional-quality photos and 4K video. With intuitive controls and built-in Wi-Fi, sharing your creations is a breeze. Whether you\'re a photography enthusiast or a beginner, this camera is your perfect companion. Limited stock. Grab yours and start capturing memories.', '11.jpg'),
(12, 'Gaming Console', 399.99, 'Gaming', 'Experience gaming like never before with our Gaming Console. This powerful console delivers breathtaking graphics and immersive gameplay. Play your favorite games, stream content, and connect with friends. With a vast library of titles, you\'ll never run out of adventures. Get ready for hours of entertainment. Includes a controller and a choice of game bundle. Limited quantities available. Level up your gaming experience today.', '12.jpg'),
(13, 'Home Theater System', 799.99, 'Electronics', 'Transform your living room into a cinematic paradise with our Home Theater System. This complete audio and visual package includes a 4K Ultra HD projector, a surround sound system, and a selection of streaming devices. Watch movies, sports, and play games on the big screen. Create an immersive experience at home. Limited-time offer includes installation support. Elevate your entertainment today.', '13.jpg'),
(14, 'Drone Explorer', 299.99, 'Electronics', 'Discover new horizons with our Drone Explorer. This high-performance drone captures breathtaking aerial footage and provides real-time streaming to your smartphone. It\'s perfect for photography, videography, and exploring remote locations. With GPS and obstacle detection, it\'s easy to fly. Take your adventures to the sky. Limited stock available. Order now and redefine your perspective.', '14.jpg'),
(15, 'Luxury Watch', 999.99, 'Fashion', 'Make a statement with our Luxury Watch. Crafted with precision and style, this timepiece combines elegance and functionality. The automatic movement ensures accurate timekeeping. The sapphire crystal and stainless steel case provide durability and a timeless look. Whether it\'s a special occasion or everyday wear, this watch adds a touch of sophistication. Limited stock. Own a piece of luxury today.', '15.jpg'),
(16, 'Electric Scooter', 299.99, 'Transportation', 'Effortless urban commuting is here with our Electric Scooter. With a powerful motor and long-lasting battery, you can effortlessly zip through the city. It\'s eco-friendly and foldable for easy storage. Cruise in style and convenience. Perfect for short trips or daily commutes. Get yours today and redefine your city travels.', '16.jpg'),
(17, 'Fitness Bike', 499.99, 'Fitness', 'Achieve your fitness goals with our Fitness Bike. This stationary exercise bike offers a smooth and quiet ride with adjustable resistance levels. Monitor your heart rate, track your progress, and follow guided workouts on the built-in screen. Stay motivated and fit from the comfort of your home. Limited-time offer includes a free fitness app subscription. Start your fitness journey now.', '17.jpg'),
(18, 'Designer Sunglasses', 199.99, 'Fashion', 'Protect your eyes in style with our Designer Sunglasses. These premium shades offer 100% UV protection and come in various trendy designs. Whether you\'re on the beach or in the city, these sunglasses complete your look. The high-quality materials ensure comfort and durability. Limited stock. Upgrade your eyewear collection today.', '18.jpg'),
(19, 'Home Espresso Machine', 149.99, 'Appliances', 'Bring the cafe to your kitchen with our Home Espresso Machine. Create barista-quality espresso, cappuccinos, and lattes at home. The intuitive controls and steam wand allow you to froth milk like a pro. Enjoy your favorite coffeehouse beverages anytime. Compact and stylish, it fits perfectly in any kitchen. Limited-time offer includes a coffee bean sampler. Brew your happiness today.', '19.jpg'),
(20, 'Wireless Headphones', 129.99, 'Electronics', 'Experience music like never before with our Wireless Headphones. These over-ear headphones deliver stunning sound quality and noise isolation. With a comfortable design and long battery life, you can enjoy your favorite music for hours. The built-in microphone lets you take calls on the go. Limited stock. Elevate your audio experience today.', '20.jpg'),
(21, 'Cookware Set', 179.99, 'Kitchen', 'Elevate your culinary skills with our Cookware Set. This comprehensive collection includes pots, pans, and utensils for every cooking need. The non-stick, durable materials ensure even cooking and easy cleanup. With ergonomic handles and a stylish design, cooking has never been more enjoyable. Perfect for beginners and seasoned chefs alike. Get cooking and create delicious meals with ease.', '21.jpg'),
(22, 'Robot Vacuum Cleaner', 249.99, 'Appliances', 'Say goodbye to tedious cleaning with our Robot Vacuum Cleaner. This smart vacuum cleans your floors while you relax. It navigates obstacles, reaches tight spaces, and has a long-lasting battery. With app control, you can schedule cleanings and track its progress. Keep your home spotless with minimal effort. Limited-time offer includes a charging dock. Let technology do the work.', '22.jpg'),
(23, 'Designer Perfume', 79.99, 'Beauty', 'Elevate your scent game with our Designer Perfume. This luxurious fragrance features a captivating blend of floral and woody notes. The long-lasting scent lingers throughout the day, leaving a lasting impression. The elegant bottle adds a touch of sophistication to your vanity. Limited stock. Indulge in luxury and embrace your uniqueness.', '23.jpg'),
(24, 'Home Security Camera', 119.99, 'Security', 'Keep your home safe and secure with our Home Security Camera. This high-definition camera provides crystal-clear video footage, day or night. With motion detection and two-way audio, you can monitor your home from anywhere. Easy setup and app access make it ideal for homeowners and renters. Protect what matters most. Limited stock. Ensure your peace of mind today.', '24.jpg'),
(25, 'Wireless Mouse', 29.99, 'Computers', 'Enhance your computer experience with our Wireless Mouse. This ergonomic mouse offers precision and comfort during long hours of work or gaming. The wireless design reduces clutter, and the adjustable DPI lets you customize sensitivity. With a sleek look and reliable performance, it\'s the perfect addition to your setup. Limited stock. Upgrade your computing today.', '25.jpg'),
(26, 'Outdoor Grill', 399.99, 'Outdoor', 'Host the ultimate BBQ parties with our Outdoor Grill. This high-performance grill features multiple burners, a side burner, and a spacious cooking area. The stainless steel construction ensures durability and easy cleaning. Whether you\'re a grill master or a beginner, this grill makes outdoor cooking a breeze. Limited stock. Fire up your culinary adventures.', '26.jpg'),
(27, 'Hiking Backpack', 79.99, 'Outdoor', 'Embark on epic adventures with our Hiking Backpack. This rugged backpack is designed for outdoor enthusiasts. With multiple compartments, adjustable straps, and breathable padding, it offers comfort and convenience on the trail. Whether you\'re hiking, camping, or traveling, this backpack has you covered. Limited stock. Gear up for your next adventure.', '27.jpg'),
(28, 'Electric Toothbrush', 49.99, 'Health', 'Achieve optimal oral hygiene with our Electric Toothbrush. This rechargeable toothbrush offers superior cleaning with multiple modes and a built-in timer. The gentle vibrations ensure a thorough clean without harming your gums. Enjoy a fresh and healthy smile every day. Limited stock. Upgrade your dental routine today.', '28.jpg'),
(29, 'Smart Home Hub', 149.99, 'Smart Home', 'Transform your home into a smart haven with our Smart Home Hub. Control your lights, appliances, and security devices with ease. With voice commands and app control, you can create a customized smart ecosystem. Enhance your convenience and security. Limited stock. Start building your smart home today.', '29.jpg'),
(30, 'Designer Wallet', 129.99, 'Fashion', 'Elevate your style and organization with our Designer Wallet. Crafted from premium leather, this wallet combines fashion and functionality. With multiple card slots, a coin pocket, and a billfold, it keeps your essentials organized. The timeless design and attention to detail make it a must-have accessory. Available in various colors. Limited stock. Upgrade your wallet game today.', '30.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `customer_email` varchar(50) NOT NULL,
  `customer_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `customer_email`, `customer_name`) VALUES
(1, 'johndoe@gmail.com', 'John Doe'),
(2, 'janedoe@gmail.com', 'Jane Doe');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
