-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 30, 2020 at 03:39 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`) VALUES
(1, 'PHP', 'php'),
(2, 'artificial intelligence', 'artificial-intelligence'),
(20, 'algorithm', 'algorithm'),
(23, 'csdsds', 'csdsds'),
(24, 'vdvdfvdf', 'vdvdfvdf'),
(25, 'Art', 'art'),
(26, 'CSS', 'css'),
(27, 'html', 'html'),
(28, 'C++', 'c-+-+');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `body`, `status`, `created_at`, `updated_at`) VALUES
(27, 72, 132, 'sssssssssss', 1, '2020-03-02 21:05:44', '2020-03-02 21:05:44'),
(28, 73, 132, 'dsdsadasdas', 1, '2020-03-02 21:41:28', '2020-03-02 21:41:28'),
(29, 73, 132, 'sdsdsdsds', 1, '2020-03-02 21:41:36', '2020-03-02 21:41:36'),
(30, 73, 132, 'sdsdsdsds', 1, '2020-03-02 21:56:47', '2020-03-02 21:56:47'),
(31, 73, 133, 'dfggdfgdsfs', 1, '2020-03-02 22:22:59', '2020-03-02 22:22:59'),
(32, 74, 133, 'sssssssssssssssss', 1, '2020-03-05 08:01:54', '2020-03-05 08:01:54'),
(33, 72, 134, 'This is really nice :)\r\n', 1, '2020-04-01 20:51:38', '2020-04-01 20:51:38'),
(34, 73, 132, 'sdfdfds', 0, '2020-04-30 22:42:19', '2020-04-30 22:42:19'),
(35, 73, 151, 'hi it\'s really nice\r\n', 1, '2020-05-17 10:00:34', '2020-05-17 10:00:34'),
(36, 73, 154, 'hkjhkhkjjk', 1, '2020-11-28 21:19:52', '2020-11-28 21:19:52'),
(37, 73, 154, 'hjh jhkjhk ', 0, '2020-11-28 21:20:09', '2020-11-28 21:20:09'),
(38, 73, 154, 'fsdfdsfsdfsdfsdf', 0, '2020-11-28 21:21:43', '2020-11-28 21:21:43'),
(39, 73, 132, 'asdsadasdasd', 0, '2020-11-28 21:21:58', '2020-11-28 21:21:58'),
(40, 73, 132, 'asdsadasdasd', 0, '2020-11-28 21:26:33', '2020-11-28 21:26:33'),
(41, 73, 132, 'fdfdfdsfdsfdsfdsfds', 0, '2020-11-28 21:28:12', '2020-11-28 21:28:12'),
(42, 73, 133, 'dsdsds', 0, '2020-11-28 21:31:12', '2020-11-28 21:31:12'),
(43, 73, 154, 'fsdfdsfsdfsdfsdf', 0, '2020-11-28 21:34:04', '2020-11-28 21:34:04'),
(44, 73, 154, 'ddsdsdsds', 0, '2020-11-28 21:34:18', '2020-11-28 21:34:18'),
(45, 73, 154, 'dfddgdfgfg', 0, '2020-11-28 21:36:01', '2020-11-28 21:36:01'),
(46, 73, 153, 'fgfgfgdgffgfgf', 0, '2020-11-28 21:36:30', '2020-11-28 21:36:30'),
(47, 73, 153, 'sdsfdsfdsfdsfdsfdsfdsfd', 0, '2020-11-28 21:38:05', '2020-11-28 21:38:05'),
(48, 73, 153, 'sdsdsadasdsa', 0, '2020-11-28 21:39:52', '2020-11-28 21:39:52'),
(49, 73, 153, 'dsdfdsfdsfdsfdsf', 0, '2020-11-28 21:41:51', '2020-11-28 21:41:51'),
(50, 73, 153, 'dsfdsfdsfdsf', 0, '2020-11-28 21:43:06', '2020-11-28 21:43:06'),
(51, 73, 153, 'dsdsdsdsd', 0, '2020-11-28 21:43:54', '2020-11-28 21:43:54'),
(52, 73, 153, 'sdsdsdssss', 0, '2020-11-28 21:50:55', '2020-11-28 21:50:55'),
(53, 73, 153, 'fdfdsfdsfsdfsdfsdfds', 0, '2020-11-28 21:52:17', '2020-11-28 21:52:17'),
(54, 73, 153, 'sdsfdsfdsfsdfdsfsdfdsfds', 0, '2020-11-28 21:53:07', '2020-11-28 21:53:07'),
(55, 73, 154, 'dds', 1, '2020-11-28 21:55:11', '2020-11-28 21:55:11'),
(56, 73, 154, 'ddssssssssssssxxxxxx', 1, '2020-11-28 21:57:15', '2020-11-28 21:57:15'),
(57, 73, 154, 'sdsdsdsds', 0, '2020-11-28 21:58:33', '2020-11-28 21:58:33'),
(58, 73, 154, 'dsdsdsdsds', 0, '2020-11-28 21:59:18', '2020-11-28 21:59:18'),
(59, 73, 154, 'dsdsdsdsds', 0, '2020-11-28 21:59:48', '2020-11-28 21:59:48'),
(60, 73, 154, 'dsdsdsdsdsdsds', 0, '2020-11-28 22:00:15', '2020-11-28 22:00:15'),
(61, 73, 154, 'dsdsdsdsdsdsdsdsds', 0, '2020-11-28 22:00:39', '2020-11-28 22:00:39'),
(62, 73, 154, 'dsdsdsdsdsdsdsdsdssds', 0, '2020-11-28 22:01:17', '2020-11-28 22:01:17'),
(63, 73, 154, 'dsdsdsdsdsdsdsdsdssdssds', 0, '2020-11-28 22:02:41', '2020-11-28 22:02:41'),
(64, 73, 154, 'cxcxcx', 0, '2020-11-28 22:02:46', '2020-11-28 22:02:46'),
(65, 73, 154, 'cxcxcx', 0, '2020-11-28 22:03:05', '2020-11-28 22:03:05'),
(66, 73, 154, 'edsfdsfdfd', 0, '2020-11-28 22:03:11', '2020-11-28 22:03:11'),
(67, 73, 154, 'edsfdsfdfdsds', 0, '2020-11-28 22:03:56', '2020-11-28 22:03:56'),
(68, 73, 154, 'edsfdsfdfdsdssds', 0, '2020-11-28 22:04:33', '2020-11-28 22:04:33'),
(69, 73, 154, 'edsfdsfdfdsdssds', 0, '2020-11-28 22:05:26', '2020-11-28 22:05:26');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `image` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'published',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `category_id`, `title`, `slug`, `views`, `image`, `body`, `status`, `created_at`, `updated_at`) VALUES
(132, 73, 1, 'PHP v', 'php-v', 0, 'Resources/Views/Uploads/1259dffb-7376-48fa-bda3-6e7cdf941481._CR0,95,1062,328_PT0_SX970__.png', '<p><img alt=\"\" src=\"/ckfinder/userfiles/images/1259dffb-7376-48fa-bda3-6e7cdf941481__CR0%2C95%2C1062%2C328_PT0_SX970__(3).png\" style=\"height:123px; width:500px\" /></p>\r\n\r\n<p><strong>About us:</strong></p>\r\n\r\n<p><em>Phone Number: 0000999909</em></p>\r\n\r\n<p><em>Email: mikjilj@jiojoi.com</em></p>\r\n\r\n<p><em>Address: Sofia - Bulgaria</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em><a href=\"http://localhost/mvc/\" target=\"_self\">Home</a></em></p>\r\n', 'published', '2020-02-29 21:57:34', '2020-02-29 21:57:34'),
(133, 73, 1, 'PHPererwe', 'phpererwe', 0, 'Resources/Views/Uploads/1259dffb-7376-48fa-bda3-6e7cdf941481._CR0,95,1062,328_PT0_SX970__.png', '<pre>\r\n<code class=\"language-php\">&lt;?php\r\n/**\r\n * Created by A Salameh.\r\n */\r\n\r\nnamespace Core;\r\n\r\nclass View implements ViewInterface\r\n{\r\n    const VIEW_FOLDER = \"Resources/Views/\";\r\n    const VIEW_EXTENSION = \".php\";\r\n\r\n    public function render(string $viewName, $data, array $errors = [])\r\n    {\r\n        require_once self::VIEW_FOLDER\r\n            . $viewName\r\n            . self::VIEW_EXTENSION;\r\n\r\n        echo \"hellvfdvfd5o\";\r\n    }\r\n}</code></pre>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/images/1259dffb-7376-48fa-bda3-6e7cdf941481__CR0%2C95%2C1062%2C328_PT0_SX970__(3).png\" style=\"height:134px; width:200px\" />&nbsp;<img alt=\"\" src=\"/ckfinder/userfiles/images/500_F_208660495_2caQkCH6Wg5duZ9cIk3ZtZFWV1olNclF(3).jpg\" style=\"height:134px; width:200px\" /></p>\r\n\r\n<p><strong>About us:</strong></p>\r\n\r\n<hr />\r\n<p><span class=\"marker\">How</span> to <strong>learn</strong> to <em>write</em>:</p>\r\n\r\n<pre>\r\n<code class=\"language-html\">&lt;!DOCTYPE html&gt;\r\n&lt;html&gt;\r\n&lt;title&gt;HTML Tutorial&lt;/title&gt;\r\n&lt;body&gt;\r\n\r\n&lt;h1&gt;This is a heading&lt;/h1&gt;\r\n&lt;p&gt;This is a paragraph.&lt;/p&gt;\r\n\r\n&lt;/body&gt;\r\n&lt;/html&gt;</code></pre>\r\n\r\n<p>&nbsp;</p>\r\n', 'published', '2020-03-05 08:42:50', '2020-03-05 08:42:50'),
(134, 73, 20, 'Strategy Pattern', 'strategy-pattern', 0, 'Resources/Views/Uploads/1259dffb-7376-48fa-bda3-6e7cdf941481._CR0,95,1062,328_PT0_SX970__.png', '<p>Strategy&nbsp;pattern defines a family of algorithms, encapsulate each one, and make them interchangeable. Strategy lets the algorithm vary independently from the clients that use it.</p>\r\n\r\n<p>A strategy pattern is used to perform an operation (or set of operations) in a particular manner.</p>\r\n\r\n<p>In other words, the strategy pattern is about using composition over inheritance, behaviors are defined as separate interfaces and concrete classes that implement these interfaces. This allows better decoupling between the behavior and the class that uses the behavior. This is compatible with the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Open/closed_principle\">open/closed principle</a>&nbsp;(OCP-SOLID), which proposes that classes should be open for extension but closed for modification.</p>\r\n\r\n<p>The behavior can be changed without breaking the classes that use it, and the classes can switch between behaviors by changing the specific implementation used without requiring any significant code changes. Behaviors can also be changed at run-time as well as at design-time.&nbsp;</p>\r\n\r\n<p>Note:</p>\r\n\r\n<p>Don&rsquo;t confuse between strategy pattern and factory pattern, a factory might create different types of Objects: Car, Truk, Bike &hellip;, while a strategy pattern would perform particular (behaviors) methods: move, stop, turn &hellip;</p>\r\n\r\n<pre>\r\n<code class=\"language-php\">&lt;?php\r\n\r\n interface StrategyInterface\r\n {\r\n     public function doCalculations($num1, $num2);\r\n }\r\n\r\n class Addition implements StrategyInterface\r\n {\r\n     public function doCalculations($num1, $num2)\r\n     {\r\n         return $num1 + $num2;\r\n     }\r\n }\r\n\r\nclass Subtraction implements StrategyInterface\r\n {\r\n     public function doCalculations($num1, $num2)\r\n     {\r\n         return $num1 - $num2;\r\n     }\r\n }\r\n\r\nclass Context\r\n {\r\n    private $strategy;\r\n\r\n    public function __construct(StrategyInterface $strategy)\r\n    {     \r\n        $this-&gt;strategy = $strategy;\r\n    }\r\n    public function setStrategy(StrategyInterface $strategy)\r\n    { \r\n        $this-&gt;strategy = $strategy;\r\n    }\r\n    public function getResult($num1, $num2)\r\n    {\r\n        $result = $this-&gt;strategy-&gt;doCalculations($num1, $num2);\r\n        echo $result. \"\\n\";\r\n    }\r\n }\r\n /**\r\n The client code\r\n */\r\n $context = new Context(new Addition); \r\n echo \"strategy is set to Addition.\\n\";\r\n $context-&gt;getResult(10, 5);\r\n echo \"strategy is set to Subtraction.\\n\";\r\n $context-&gt;setStrategy(new Subtraction);\r\n $context-&gt;getResult(10, 5);\r\n ?&gt;</code></pre>\r\n\r\n<p>Now if we want to add a new algorithm, we only need to add a new class without modifying any other class.</p>\r\n\r\n<pre>\r\n<code class=\"language-php\">class Multiplication implements StrategyInterface\r\n {\r\n     public function doCalculations($num1, $num2)\r\n     {\r\n         return $num1 * $num2;\r\n     }\r\n }</code></pre>\r\n\r\n<p>Another Example about shapes:</p>\r\n\r\n<pre>\r\n<code class=\"language-php\">&lt;?php\r\n\r\n interface AreaInterface\r\n {\r\n     public function getArea(...$num);\r\n }\r\n\r\n class SquareArea implements AreaInterface\r\n {\r\n     public function getArea(...$num)\r\n     {         \r\n         return pow($num[0],2);\r\n     }\r\n }\r\n\r\n class RectangleArea implements AreaInterface\r\n {\r\n     public function getArea(...$num)\r\n     {\r\n         return $num[0] * $num[1];\r\n     }\r\n }\r\n\r\n class CircleArea implements AreaInterface\r\n {\r\n     public function getArea(...$num)\r\n     {\r\n         return pow($num[0],2)* M_PI;\r\n     }\r\n }\r\n\r\n class Shape\r\n {\r\n    private $areaStrategy;\r\n\r\n    public function __construct(AreaInterface $areaStrategy)\r\n    {     \r\n        $this-&gt;areaStrategy = $areaStrategy;\r\n    }\r\n    public function setAreaStrategy(AreaInterface $areaStrategy)\r\n    { \r\n        $this-&gt;areaStrategy = $areaStrategy;\r\n    }\r\n    public function getArea(...$num)\r\n    {\r\n         $result = $this-&gt;areaStrategy-&gt;getArea(...$num);\r\n         echo $result. \"\\n\";\r\n    }\r\n }\r\n /**\r\n The client code\r\n */\r\n $shape = new Shape(new SquareArea); \r\n echo \"strategy is set to Square.\\n\";\r\n $shape-&gt;getArea(12);\r\n\r\n echo \"strategy is set to Rectangle.\\n\";\r\n $shape-&gt;setAreaStrategy(new RectangleArea);\r\n $shape-&gt;getArea(10, 5);\r\n\r\n echo \"strategy is set to Circle.\\n\";\r\n $shape-&gt;setAreaStrategy(new CircleArea);\r\n $shape-&gt;getArea(10);\r\n ?&gt;</code></pre>\r\n\r\n<p>&nbsp;</p>\r\n', 'published', '2020-03-14 21:28:12', '2020-03-14 21:28:12'),
(151, 73, 25, 'How to make a drawing', 'how-to-make-a-drawing', 0, 'Resources/Views/Uploads/1259dffb-7376-48fa-bda3-6e7cdf941481._CR0,95,1062,328_PT0_SX970__.png', '<p><em>The best way to make a drawing&nbsp;</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em><img alt=\"\" src=\"/ckfinder/userfiles/images/ss(1).jpg\" style=\"border-style:solid; border-width:1px; height:150px; width:150px\" /></em></p>\r\n', 'published', '2020-05-17 09:59:11', '2020-05-17 09:59:11'),
(152, 73, 1, 'dsdsdsdsds', 'dsdsdsdsds', 0, 'Resources/Views/Uploads/1473679224_2_559x_.jpg', '<p><img alt=\"\" src=\"/ckfinder/userfiles/images/1473679224_2_559x_.jpg\" style=\"height:315px; width:559px\" /></p>\r\n', 'published', '2020-07-17 18:45:28', '2020-07-17 18:45:28'),
(153, 73, 28, 'intro to the c', 'intro-to-the-c', 0, 'Resources/Views/Uploads/1473679224_2_559x_.jpg', '<p>intro to the c++&nbsp;</p>\r\n', 'published', '2020-11-28 21:01:16', '2020-11-28 21:01:16'),
(154, 73, 28, 'pointers', 'pointers', 0, 'Resources/Views/Uploads/1473679224_2_559x_.jpg', '<p>pointers</p>\r\n', 'published', '2020-11-28 21:02:01', '2020-11-28 21:02:01'),
(155, 73, 26, 'Intro to CSS', 'intro-to-css', 0, 'Resources/Views/Uploads/1473679224_2_559x_.jpg', '<h2>What is CSS?</h2>\r\n\r\n<ul>\r\n	<li><strong>CSS</strong>&nbsp;stands for&nbsp;<strong>C</strong>ascading&nbsp;<strong>S</strong>tyle&nbsp;<strong>S</strong>heets.</li>\r\n	<li><strong>CSS is used to control the&nbsp;styles of&nbsp;the web pages, including the design, layout and variations in display for different devices and screen sizes.</strong></li>\r\n	<li><strong>CSS file&#39;s extention is .css.</strong></li>\r\n	<li><strong>Create Stunning Web site.</strong></li>\r\n</ul>\r\n\r\n<p>Example:</p>\r\n\r\n<pre>\r\n<code class=\"language-html\">&lt;!DOCTYPE html&gt;\r\n&lt;html&gt;\r\n&lt;head&gt;\r\n&lt;style&gt;\r\np {\r\n  color: blue;  \r\n} \r\n&lt;/style&gt;\r\n&lt;/head&gt;\r\n\r\n&lt;body&gt;\r\n &lt;p&gt;Free Code Lab&lt;/p&gt;\r\n&lt;/body&gt;\r\n&lt;/html&gt;</code></pre>\r\n\r\n<p>&nbsp;</p>\r\n', 'published', '2020-11-29 22:39:15', '2020-11-29 22:39:15'),
(156, 73, 26, 'CSS Syntax', 'css-syntax', 0, 'Resources/Views/Uploads/1473679224_2_559x_.jpg', '<h2>The syntax is really easy:</h2>\r\n\r\n<pre>\r\n<code class=\"language-css\">selector { property : value;}</code></pre>\r\n\r\n<p>Selector:&nbsp;used to &quot;find&quot; (or select) the HTML elements&nbsp;to style them.</p>\r\n\r\n<p>Property: is the attribute like color.</p>\r\n\r\n<p>Value: is the attribute&#39;s value like blue.</p>\r\n\r\n<p>Each declaration includes a CSS property name and a value, separated by a colon.</p>\r\n\r\n<p>Single CSS property:</p>\r\n\r\n<pre>\r\n<code class=\"language-css\">p {\r\n  color: grey;\r\n}</code></pre>\r\n\r\n<p>Multiple CSS properties&nbsp;example;</p>\r\n\r\n<pre>\r\n<code class=\"language-css\">h1 {\r\n  color: white;\r\n  background-color: black;\r\n}</code></pre>\r\n\r\n<p>p and h1: selectors.</p>\r\n\r\n<p>color and background-color: properities.</p>\r\n\r\n<p>grey, white, and black: values.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'published', '2020-11-29 23:08:45', '2020-11-29 23:08:45');

-- --------------------------------------------------------

--
-- Table structure for table `post_category`
--

CREATE TABLE `post_category` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(72, 'fgfdgdfg dfgdfgdf', 'admin@cartito.com', '$2y$10$H4Vjt6eCLerq5iJIhZQ6A.mKD3uhUi6y9NA2ZQ7Nmtg28xZI8EIqu', 0, '2019-12-04 22:33:45'),
(73, 'master', 'micro.83@hotmail.com', '$2y$10$mJPXI0Qz9vFPi7OszHpY9umAeEhMF0U3gIhLqU1WLXeJGRxTv8SBC', 1, '2019-12-07 15:42:37'),
(74, 'adam', 'adam@hotmail.com', '$2y$10$iGDeKBAYPTRViGg130Qqseu1vvPSPm2.0.m9wZs36CNLM4fXFVGKG', 0, '2020-03-05 10:01:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `post_category`
--
ALTER TABLE `post_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `post_category`
--
ALTER TABLE `post_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
