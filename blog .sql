-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 29, 2021 at 12:47 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(20, 'algorithm', 'algorithm'),
(26, 'CSS', 'css'),
(27, 'html', 'html');

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
(134, 73, 1, 'Strategy Pattern', 'strategy-pattern', 0, 'Resources/Views/Uploads/Xiaomi-Redmi-Note-7.jpg', '<p>Strategy&nbsp;pattern defines a family of algorithms, encapsulate each one, and make them interchangeable. Strategy lets the algorithm vary independently from the clients that use it.</p>\r\n\r\n<p>A strategy pattern is used to perform an operation (or set of operations) in a particular manner.</p>\r\n\r\n<p>In other words, the strategy pattern is about using composition over inheritance, behaviors are defined as separate interfaces and concrete classes that implement these interfaces. This allows better decoupling between the behavior and the class that uses the behavior. This is compatible with the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Open/closed_principle\">open/closed principle</a>&nbsp;(OCP-SOLID), which proposes that classes should be open for extension but closed for modification.</p>\r\n\r\n<p>The behavior can be changed without breaking the classes that use it, and the classes can switch between behaviors by changing the specific implementation used without requiring any significant code changes. Behaviors can also be changed at run-time as well as at design-time.&nbsp;</p>\r\n\r\n<p>Note:</p>\r\n\r\n<p>Don&rsquo;t confuse between strategy pattern and factory pattern, a factory might create different types of Objects: Car, Truk, Bike &hellip;, while a strategy pattern would perform particular (behaviors) methods: move, stop, turn &hellip;</p>\r\n\r\n<pre>\r\n<code class=\"language-php\">&lt;?php\r\n\r\n interface StrategyInterface\r\n {\r\n     public function doCalculations($num1, $num2);\r\n }\r\n\r\n class Addition implements StrategyInterface\r\n {\r\n     public function doCalculations($num1, $num2)\r\n     {\r\n         return $num1 + $num2;\r\n     }\r\n }\r\n\r\nclass Subtraction implements StrategyInterface\r\n {\r\n     public function doCalculations($num1, $num2)\r\n     {\r\n         return $num1 - $num2;\r\n     }\r\n }\r\n\r\nclass Context\r\n {\r\n    private $strategy;\r\n\r\n    public function __construct(StrategyInterface $strategy)\r\n    {     \r\n        $this-&gt;strategy = $strategy;\r\n    }\r\n    public function setStrategy(StrategyInterface $strategy)\r\n    { \r\n        $this-&gt;strategy = $strategy;\r\n    }\r\n    public function getResult($num1, $num2)\r\n    {\r\n        $result = $this-&gt;strategy-&gt;doCalculations($num1, $num2);\r\n        echo $result. \"\\n\";\r\n    }\r\n }\r\n /**\r\n The client code\r\n */\r\n $context = new Context(new Addition); \r\n echo \"strategy is set to Addition.\\n\";\r\n $context-&gt;getResult(10, 5);\r\n echo \"strategy is set to Subtraction.\\n\";\r\n $context-&gt;setStrategy(new Subtraction);\r\n $context-&gt;getResult(10, 5);\r\n ?&gt;</code></pre>\r\n\r\n<p>Now if we want to add a new algorithm, we only need to add a new class without modifying any other class.</p>\r\n\r\n<pre>\r\n<code class=\"language-php\">class Multiplication implements StrategyInterface\r\n {\r\n     public function doCalculations($num1, $num2)\r\n     {\r\n         return $num1 * $num2;\r\n     }\r\n }</code></pre>\r\n\r\n<p>Another Example about shapes:</p>\r\n\r\n<pre>\r\n<code class=\"language-php\">&lt;?php\r\n\r\n interface AreaInterface\r\n {\r\n     public function getArea(...$num);\r\n }\r\n\r\n class SquareArea implements AreaInterface\r\n {\r\n     public function getArea(...$num)\r\n     {         \r\n         return pow($num[0],2);\r\n     }\r\n }\r\n\r\n class RectangleArea implements AreaInterface\r\n {\r\n     public function getArea(...$num)\r\n     {\r\n         return $num[0] * $num[1];\r\n     }\r\n }\r\n\r\n class CircleArea implements AreaInterface\r\n {\r\n     public function getArea(...$num)\r\n     {\r\n         return pow($num[0],2)* M_PI;\r\n     }\r\n }\r\n\r\n class Shape\r\n {\r\n    private $areaStrategy;\r\n\r\n    public function __construct(AreaInterface $areaStrategy)\r\n    {     \r\n        $this-&gt;areaStrategy = $areaStrategy;\r\n    }\r\n    public function setAreaStrategy(AreaInterface $areaStrategy)\r\n    { \r\n        $this-&gt;areaStrategy = $areaStrategy;\r\n    }\r\n    public function getArea(...$num)\r\n    {\r\n         $result = $this-&gt;areaStrategy-&gt;getArea(...$num);\r\n         echo $result. \"\\n\";\r\n    }\r\n }\r\n /**\r\n The client code\r\n */\r\n $shape = new Shape(new SquareArea); \r\n echo \"strategy is set to Square.\\n\";\r\n $shape-&gt;getArea(12);\r\n\r\n echo \"strategy is set to Rectangle.\\n\";\r\n $shape-&gt;setAreaStrategy(new RectangleArea);\r\n $shape-&gt;getArea(10, 5);\r\n\r\n echo \"strategy is set to Circle.\\n\";\r\n $shape-&gt;setAreaStrategy(new CircleArea);\r\n $shape-&gt;getArea(10);\r\n ?&gt;</code></pre>\r\n\r\n<p>&nbsp;</p>\r\n', 'published', '2021-03-29 10:44:11', '2021-03-29 10:44:11'),
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
(72, 'fgfdgdfg dfgdfgdf', 'admin@cartito.com', '$2y$10$H4Vjt6eCLerq5iJIhZQ6A.mKD3uhUi6y9NA2ZQ7Nmtg28xZI8EIqu', 0, '2020-12-04 22:33:45'),
(73, 'master', 'micro.83@hotmail.com', '$2y$10$mJPXI0Qz9vFPi7OszHpY9umAeEhMF0U3gIhLqU1WLXeJGRxTv8SBC', 1, '2020-12-07 15:42:37'),
(74, 'adam', 'adam@hotmail.com', '$2y$10$iGDeKBAYPTRViGg130Qqseu1vvPSPm2.0.m9wZs36CNLM4fXFVGKG', 0, '2020-03-05 10:01:07'),
(75, 'adam', 'adam@yaaaaaa.com', '$2y$10$ZSqzhiYyMtKDe4oAg5PuNO9WPFi2deAU0cDQvS5bEm3O2fT9UpJYu', 0, '2021-02-24 21:30:25');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `post_category`
--
ALTER TABLE `post_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

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
