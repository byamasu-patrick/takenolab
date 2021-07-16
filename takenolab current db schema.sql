-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2021 at 05:10 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `takenolab`
--

-- --------------------------------------------------------

--
-- Table structure for table `additional_course_materials`
--

CREATE TABLE `additional_course_materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `week_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_lecture` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `powerpoint_presentation` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `reference_link_one` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `reference_link_two` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `reference_link_three` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `reference_link_four` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `other_reference` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assessment_books`
--

CREATE TABLE `assessment_books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `second_answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `third_answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fourth_answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `correct_answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved_state` int(11) NOT NULL DEFAULT 0,
  `published_state` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assessment_books`
--

INSERT INTO `assessment_books` (`id`, `course_id`, `topic_id`, `teacher_id`, `question`, `first_answer`, `second_answer`, `third_answer`, `fourth_answer`, `correct_answer`, `approved_state`, `published_state`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 5, 'how will you know if it will be successful?', 'Critical Thinking', 'Brainstorming', 'Sleeping', 'Walking', 'Sleeping', 0, 0, '2021-07-14 06:44:50', '2021-07-14 06:44:50'),
(2, 1, 4, 5, 'What is the best way to answer this question?', 'Searching on Internet', 'Talking to people', 'Talking to Professors', 'Writing a document', 'Talking to Professors', 0, 0, '2021-07-14 06:44:50', '2021-07-14 06:44:50');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_heading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_overview` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_catching_area_one` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_catching_area_one` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_catching_area_two` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_catching_area_two` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_catching_area_three` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_catching_area_three` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `taught_by` int(11) NOT NULL DEFAULT 1,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'hidden'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `course_image`, `course_heading`, `course_overview`, `title_catching_area_one`, `course_catching_area_one`, `title_catching_area_two`, `course_catching_area_two`, `title_catching_area_three`, `course_catching_area_three`, `created_at`, `updated_at`, `taught_by`, `status`) VALUES
(1, 'Entrepreneurship', 'languages.jpg', 'A Quick Guide to Starting a Business', 'Taking the first step towards a new business venture can be daunting. Knowing what to do at the start makes your business venture more likely to succeed. All aspiring entrepreneurs are welcome to enroll, regardless of their backgrounds or experience levels.', 'IDEATION', 'The idea of starting a business is usually accompanied by an idea of what you\'d like to sell, or at least the market you\'d like to enter. It is crucial to clearly understand your choice\'s rationale before you make it...', 'BUSINESS MANAGEMENT', 'There are a few questions you should ask about your business idea. For example, what is your purpose? What market are you targeting? What are your long-term goals? Your startup costs will be financed in what way? An effective business plan will answer these questions...', 'SUSTAINABILITY', 'As an entrepreneur, your task does not end with your launch and first sales. Keeping your business afloat and profitable requires continuous growth. Your business is going to require time and effort, but you\'ll be rewarded according to the amount of effort you put forth...', '2021-06-22 05:58:28', '2021-07-15 08:29:02', 5, 'visible'),
(3, 'E-Lancing', '1624440711-1-E-Lancing.jpg', 'Find and service clients online', 'Making money and finding jobs is easier than ever with e-lancing. As the name implies, e-lancing involves working as a freelancer online. E-lancers typically find and service clients online.\r\n\r\n\r\nUnlike freelancers in the past, you are no longer required to advertise only in your town or from your personal network. If you know what you are doing, you can reach hundreds, thousands, and even hundreds of thousands of potential customers with an advertising budget of just a few hundred dollars.', 'THE ART OF FREELANCING', 'Here, you will learn methods for finding work online using your existing skills. In addition, it will help you approach prospective customers in a disciplined and effective way.', 'COPYWRITING & TRANCRIBING', 'You will earn $10 to $35 per hour as a transcriptionist or copywriter if you learn transcription and copywriting skills and find work with 100s of providers worldwide.', 'DATA ANALYSIS', 'The information in this topic will help you succeed as an analyst as you learn how to manipulate data types like text, times and dates, as well as create logic functions and conditional aggregations.', '2021-06-23 07:31:51', '2021-07-01 05:33:40', 6, 'hidden'),
(4, 'Web Development', '1625067116-1-Web Development.jpg', 'A Quick Guide to Starting a Business', 'Taking the first step towards a new business venture can be daunting. Knowing what to do at the start makes your business venture more likely to succeed. All aspiring entrepreneurs are welcome to enroll, regardless of your backgrounds or experience levels.', 'IDEATION', 'The idea of starting a business is usually accompanied by an idea of what you\'d like to sell, or at least the market you\'d like to enter. It is crucial to clearly understand your choice\'s rationale before you make it...', 'BUSINESS MANAGEMENT', 'There are a few questions you should ask about your business idea. For example, what is your purpose? What market are you targeting? What are your long-term goals? Your startup costs will be financed in what way? An effective business plan will answer these questions...', 'SUSTAINABILITY', 'As an entrepreneur, your task does not end with your launch and first sales. Keeping your business afloat and profitable requires continuous growth. Your business is going to require time and effort, but you\'ll be rewarded according to the amount of effort you put forth...', '2021-06-30 13:31:56', '2021-07-01 05:42:07', 17, 'hidden');

-- --------------------------------------------------------

--
-- Table structure for table `course_materials`
--

CREATE TABLE `course_materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `subtopic_id` int(11) NOT NULL,
  `lesson_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lesson_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lecture_video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visibility_state` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_materials`
--

INSERT INTO `course_materials` (`id`, `course_id`, `topic_id`, `subtopic_id`, `lesson_name`, `lesson_description`, `lecture_video`, `visibility_state`, `created_at`, `updated_at`) VALUES
(10, 1, 4, 4, 'Technology and Entrepreneurship Overview', 'Introduction to Entrepreneurship will introduce future business owners to the concepts and \r\nprinciples of entrepreneurship.  The course will introduce the role entrepreneurs play in the \r\nlocal business environment and the impact of entrepreneurship on the national economy.  \r\nThis course will explore many of the concepts that future entrepreneurs must master \r\nbefore they start their business.  It is a course that mixes theory with practice.  Learners will \r\nbe challenged to apply the principles, concepts and framework to real world situations.', '-1625470674-1.webm', 1, '2021-07-15 10:39:39', '2021-07-15 10:39:39'),
(11, 1, 4, 5, 'Silicon Valley', 'To capture the output from the reflective questions and activities you are asked to keep a \r\npersonal journal.  At the end of the course the personal journal will be submitted to your \r\ninstructor for feedback and grading.', '-1626353187-1.mp4', 1, '2021-07-15 10:46:27', '2021-07-15 10:46:27'),
(12, 1, 5, 7, 'Nine Key Frameworks for Entrepreneurship', 'Welcome to the first unit in this course.  The idea of entrepreneurship may sound exciting, \r\nbut it may not necessarily be for everyone.  There are number of questions you need to ask \r\nyourself as an entrepreneur to determine whether or not you should go ahead with your \r\ngreat business idea.  In this unit, we will discuss the nature of entrepreneurship, \r\ndifferentiate between entrepreneurship and entrepreneurs, look at the role that \r\nentrepreneurship plays in society and also discuss the characteristics of an \r\nentrepreneur.', '-1626353249-1.mp4', 1, '2021-07-15 10:47:29', '2021-07-15 10:47:29');

-- --------------------------------------------------------

--
-- Table structure for table `discussion_comments`
--

CREATE TABLE `discussion_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `discussion_id` int(11) NOT NULL,
  `comment_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discussion_comments`
--

INSERT INTO `discussion_comments` (`id`, `course_id`, `topic_id`, `user_id`, `discussion_id`, `comment_text`, `created_at`, `updated_at`) VALUES
(1, 3, 16, 5, 1, 'As I said earlier that you should introduce yourself first. Tell us where you are coming from and why did you take part in this course.', '2021-06-29 06:18:55', '2021-06-29 06:18:55'),
(2, 3, 16, 5, 1, 'Tell us you are here by commenting to this message', '2021-06-29 07:29:40', '2021-06-29 07:29:40'),
(3, 3, 16, 7, 1, 'Hello everyone, I am Billy Paul Byamasu, I am joining the course from Malawi. I really like working online because of the field that I am in.', '2021-06-29 08:06:54', '2021-06-29 08:06:54'),
(4, 3, 16, 5, 1, 'Nice to hear from you, Paul', '2021-06-30 13:26:20', '2021-06-30 13:26:20'),
(5, 3, 16, 7, 1, 'Thank you', '2021-06-30 13:28:47', '2021-06-30 13:28:47'),
(6, 3, 16, 7, 1, 'Hey guys, it is so quiet in this room. What\'s up?', '2021-07-05 06:22:05', '2021-07-05 06:22:05'),
(7, 1, 4, 7, 2, 'Hello everyone, I am Billy Paul Byamasu, I am from Dzaleka Refugee Camp Malawi. I love programming and I am very much passioned about bringing new innovation theough coding. It is very nice to be part of this course.', '2021-07-09 13:44:30', '2021-07-09 13:44:30'),
(8, 1, 4, 5, 2, 'It\'s nice to hear from you Paul, I hope we will have a very nice moment together. And I hope you will be enjoying this course. I am sure by the end of this course you will at least have some ideas and be able to have your own startup up and running.', '2021-07-09 13:46:55', '2021-07-09 13:46:55');

-- --------------------------------------------------------

--
-- Table structure for table `discussion_forums`
--

CREATE TABLE `discussion_forums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `discussion_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discussion_forums`
--

INSERT INTO `discussion_forums` (`id`, `course_id`, `topic_id`, `teacher_id`, `discussion_description`, `created_at`, `updated_at`) VALUES
(1, 3, 16, 5, 'Good morning guys, I hope you are all doing great! As today is our first time to meet, I would like everyone to introduce himself or herself so that we should know each other.\r\nI am Dr. Patrick Paul, I am a professor of Computer Science at the University of Livingstonia, I am going to take you up through this course of e-lancing where by we will be exploring different technique to use for you get hired by someone based on your professional skills and experience. I would like to hear if you are here.\r\nThank you so much, see you in the course.', '2021-06-29 05:14:29', '2021-06-29 05:14:29'),
(2, 1, 4, 5, 'Welcome to  Entrepreneurship course, before we start the course I would like to ask everyone to introduce himself/herself so that we should get to know each other. \r\nI am going start, my name is Francoise Luhembwe I am professor of Computer Science at Mzuzu University, I also hold an MBA from Pennsylvania University, USA. I will be your instructor in this Entrepreneurship course which is based on ICT Entrepreneurship. \r\nThank you so much, I hope to know each one of you soon.', '2021-07-09 13:42:05', '2021-07-09 13:42:05');

-- --------------------------------------------------------

--
-- Table structure for table `enrolled_courses`
--

CREATE TABLE `enrolled_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `course_progress` int(11) NOT NULL,
  `enrolled_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expected_finished_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enrolled_courses`
--

INSERT INTO `enrolled_courses` (`id`, `user_id`, `course_id`, `course_progress`, `enrolled_date`, `expected_finished_date`, `created_at`, `updated_at`) VALUES
(1, 7, 1, 0, '', '', '2021-06-25 06:50:30', '2021-06-25 06:50:30'),
(2, 7, 3, 0, '', '', '2021-06-25 06:57:57', '2021-06-25 06:57:57'),
(5, 11, 1, 0, '', '', '2021-06-30 12:38:09', '2021-06-30 12:38:09'),
(6, 9, 1, 0, '', '', '2021-07-01 10:15:49', '2021-07-01 10:15:49'),
(8, 9, 3, 0, '', '', '2021-07-01 10:20:47', '2021-07-01 10:20:47');

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `learning_progress`
--

CREATE TABLE `learning_progress` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `week_id` int(11) NOT NULL,
  `video_played` int(11) NOT NULL,
  `week_progress` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `learning_progress`
--

INSERT INTO `learning_progress` (`id`, `student_id`, `course_id`, `week_id`, `video_played`, `week_progress`, `created_at`, `updated_at`) VALUES
(53, 7, 1, 4, 10, 33, '2021-07-16 06:47:48', '2021-07-16 06:47:48'),
(54, 7, 1, 4, 11, 33, '2021-07-16 11:03:20', '2021-07-16 11:03:20');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_06_10_090230_laratrust_setup_tables', 2),
(24, '2021_06_18_064237_create_courses_table', 3),
(25, '2021_06_18_103127_create_topics_table', 3),
(26, '2021_06_18_103247_create_subtopics_table', 3),
(27, '2021_06_22_092241_create_sessions_table', 4),
(29, '2021_06_22_143021_add_taught_by_to_courses', 5),
(30, '2021_06_25_074828_create_enrolled_courses_table', 6),
(31, '2021_06_28_102247_create_course_materials_table', 7),
(32, '2021_06_28_113555_create_quizes_table', 7),
(33, '2021_06_29_061548_create_discussion_comments_table', 8),
(34, '2021_06_29_061620_create_discussion_forums_table', 8),
(38, '2021_07_09_081114_create_learning_progress_table', 9),
(51, '2021_07_13_133645_create_assessment_books_table', 10),
(52, '2021_07_13_134018_create_result_books_table', 10),
(53, '2021_07_13_134104_create_additional_course_materials_table', 10),
(54, '2021_07_15_080706_add_status_to_courses', 11),
(55, '2021_07_16_130925_change_question_id_to_unique', 12);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'users-create', 'Create Users', 'Create Users', '2021-06-10 07:08:28', '2021-06-10 07:08:28'),
(2, 'users-read', 'Read Users', 'Read Users', '2021-06-10 07:08:29', '2021-06-10 07:08:29'),
(3, 'users-update', 'Update Users', 'Update Users', '2021-06-10 07:08:29', '2021-06-10 07:08:29'),
(4, 'users-delete', 'Delete Users', 'Delete Users', '2021-06-10 07:08:29', '2021-06-10 07:08:29'),
(5, 'payments-create', 'Create Payments', 'Create Payments', '2021-06-10 07:08:29', '2021-06-10 07:08:29'),
(6, 'payments-read', 'Read Payments', 'Read Payments', '2021-06-10 07:08:29', '2021-06-10 07:08:29'),
(7, 'payments-update', 'Update Payments', 'Update Payments', '2021-06-10 07:08:29', '2021-06-10 07:08:29'),
(8, 'payments-delete', 'Delete Payments', 'Delete Payments', '2021-06-10 07:08:29', '2021-06-10 07:08:29'),
(9, 'profile-read', 'Read Profile', 'Read Profile', '2021-06-10 07:08:29', '2021-06-10 07:08:29'),
(10, 'profile-update', 'Update Profile', 'Update Profile', '2021-06-10 07:08:29', '2021-06-10 07:08:29'),
(11, 'module_1_name-create', 'Create Module_1_name', 'Create Module_1_name', '2021-06-10 07:08:30', '2021-06-10 07:08:30'),
(12, 'module_1_name-read', 'Read Module_1_name', 'Read Module_1_name', '2021-06-10 07:08:30', '2021-06-10 07:08:30'),
(13, 'module_1_name-update', 'Update Module_1_name', 'Update Module_1_name', '2021-06-10 07:08:30', '2021-06-10 07:08:30'),
(14, 'module_1_name-delete', 'Delete Module_1_name', 'Delete Module_1_name', '2021-06-10 07:08:30', '2021-06-10 07:08:30');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 3),
(2, 1),
(2, 2),
(2, 3),
(3, 1),
(3, 2),
(3, 3),
(4, 1),
(4, 3),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(9, 2),
(9, 3),
(9, 4),
(10, 1),
(10, 2),
(10, 3),
(10, 4),
(11, 5),
(12, 5),
(13, 5),
(14, 5);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quizes`
--

CREATE TABLE `quizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `quiz_question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `result_books`
--

CREATE TABLE `result_books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `marks` double NOT NULL,
  `selected_answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `result_books`
--

INSERT INTO `result_books` (`id`, `course_id`, `topic_id`, `student_id`, `question_id`, `marks`, `selected_answer`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 7, 2, 50, 'Talking to Professors', '2021-07-16 11:06:46', '2021-07-16 11:06:46'),
(2, 1, 4, 7, 1, 50, 'Sleeping', '2021-07-16 11:06:46', '2021-07-16 11:06:46');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'administrator', 'Administrator', 'Administrator', '2021-06-10 07:08:28', '2021-06-10 07:08:28'),
(2, 'teacher', 'Teacher', 'Teacher', '2021-06-10 07:08:29', '2021-06-10 07:08:29'),
(3, 'student', 'Student', 'Student', '2021-06-10 07:08:30', '2021-06-10 07:08:30'),
(4, 'user', 'User', 'User', '2021-06-10 07:08:30', '2021-06-10 07:08:30'),
(5, 'role_name', 'Role Name', 'Role Name', '2021-06-10 07:08:30', '2021-06-10 07:08:30');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\Models\\User'),
(2, 5, 'App\\Models\\User'),
(3, 7, 'App\\Models\\User'),
(3, 9, 'App\\Models\\User'),
(2, 10, 'App\\Models\\User'),
(2, 13, 'App\\Models\\User'),
(2, 15, 'App\\Models\\User'),
(2, 17, 'App\\Models\\User'),
(2, 18, 'App\\Models\\User'),
(2, 19, 'App\\Models\\User');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subtopics`
--

CREATE TABLE `subtopics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subtopic_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subtopics`
--

INSERT INTO `subtopics` (`id`, `subtopic_name`, `topic_id`, `course_id`, `created_at`, `updated_at`) VALUES
(4, 'To generate business ideas, what is the best thinking process?', '4', '1', '2021-06-22 06:55:59', '2021-06-22 06:55:59'),
(5, 'The idea sounds good, but how will you know if it will be successful?', '4', '1', '2021-06-22 06:55:59', '2021-06-22 06:55:59'),
(6, 'What is the best way to answer this question?', '4', '1', '2021-06-22 06:55:59', '2021-06-22 06:55:59'),
(7, 'Which are the Value Propositions of your ideas?', '5', '1', '2021-06-22 07:04:39', '2021-06-22 07:04:39'),
(8, 'Are there any ways to put the value proposition in a way that influences the buyer?', '5', '1', '2021-06-22 07:04:39', '2021-06-22 07:04:39'),
(9, 'How can marketing use it as a persuasive tool?', '5', '1', '2021-06-22 07:04:39', '2021-06-22 07:04:39'),
(10, 'How does marketing affect your business?', '6', '1', '2021-06-22 07:05:53', '2021-06-22 07:05:53'),
(11, 'What are the best marketing strategies that produce results?', '6', '1', '2021-06-22 07:05:53', '2021-06-22 07:05:53'),
(12, 'Which aspects of marketing should you emphasize?', '6', '1', '2021-06-22 07:05:53', '2021-06-22 07:05:53'),
(13, 'Where do you begin when looking for the best distribution channel for your product?', '7', '1', '2021-06-22 07:06:56', '2021-06-22 07:06:56'),
(14, 'Is the distribution multi-level?', '7', '1', '2021-06-22 07:06:56', '2021-06-22 07:06:56'),
(15, 'What are the principles behind the systems?', '7', '1', '2021-06-22 07:06:56', '2021-06-22 07:06:56'),
(16, 'What are your Value Propositions\' Key Activities?', '8', '1', '2021-06-22 07:07:53', '2021-06-22 07:07:53'),
(17, 'How do you manage customer relationships and distribution channels?', '8', '1', '2021-06-22 07:07:53', '2021-06-22 07:07:53'),
(18, 'How will you generate revenue?', '8', '1', '2021-06-22 07:07:54', '2021-06-22 07:07:54'),
(19, 'What\'s the best way to measure your Idea\'s short and long-term impact', '9', '1', '2021-06-22 07:08:59', '2021-06-22 07:08:59'),
(20, 'A list of indicators', '9', '1', '2021-06-22 07:09:00', '2021-06-22 07:09:00'),
(21, 'What are your metrics for measuring impact', '9', '1', '2021-06-22 07:09:00', '2021-06-22 07:09:00'),
(40, 'What steps can I take to break into the field?', '16', '3', '2021-06-24 12:56:45', '2021-06-24 12:56:45'),
(41, 'Do I need to charge more or less?', '16', '3', '2021-06-24 12:56:45', '2021-06-24 12:56:45'),
(42, 'Can I work without a contract?', '16', '3', '2021-06-24 12:56:45', '2021-06-24 12:56:45'),
(43, 'What to look for when choosing  & how to determine customer LTV', '17', '3', '2021-06-24 12:57:44', '2021-06-24 12:57:44'),
(44, 'A guide to keeping and sharing the testimonials', '17', '3', '2021-06-24 12:57:45', '2021-06-24 12:57:45'),
(45, 'Understanding market entry methods', '17', '3', '2021-06-24 12:57:45', '2021-06-24 12:57:45'),
(46, 'What to Write In A Headline', '18', '3', '2021-06-24 12:59:34', '2021-06-24 12:59:34'),
(47, 'What to look for in your audience\'s mind', '18', '3', '2021-06-24 12:59:34', '2021-06-24 12:59:34'),
(48, 'How to convert boring features into irresistible benefits', '18', '3', '2021-06-24 12:59:34', '2021-06-24 12:59:34'),
(49, 'An overview of transcription and its aspects', '19', '3', '2021-06-24 13:00:04', '2021-06-24 13:00:04'),
(50, 'Most important considerations in transcription with regard to language', '19', '3', '2021-06-24 13:00:04', '2021-06-24 13:00:04'),
(51, 'What it takes to produce professional transcription results', '19', '3', '2021-06-24 13:00:04', '2021-06-24 13:00:04'),
(52, 'What You Should Know About Sorting, Trimming, and Searching in Excel?', '20', '3', '2021-06-24 13:00:35', '2021-06-24 13:00:35'),
(53, 'Where does your data come from, how should you classify it, and how can you manage it?', '20', '3', '2021-06-24 13:00:35', '2021-06-24 13:00:35'),
(54, 'What are the methods for nesting, changing, and rounding values?', '20', '3', '2021-06-24 13:00:35', '2021-06-24 13:00:35'),
(55, 'What is the right function to choose?', '21', '3', '2021-06-24 13:01:08', '2021-06-24 13:01:08'),
(56, 'How can all math concepts be applied in Excel?', '21', '3', '2021-06-24 13:01:08', '2021-06-24 13:01:08'),
(57, 'How can you obtain exception results with conditions?', '21', '3', '2021-06-24 13:01:08', '2021-06-24 13:01:08');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `topic_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `topic_name`, `course_id`, `created_at`, `updated_at`) VALUES
(4, 'Ideation', 1, '2021-06-22 06:55:59', '2021-06-22 06:55:59'),
(5, 'Value Proposition', 1, '2021-06-22 07:04:39', '2021-06-22 07:04:39'),
(6, 'Marketing', 1, '2021-06-22 07:05:53', '2021-06-22 07:05:53'),
(7, 'Distribution', 1, '2021-06-22 07:06:56', '2021-06-22 07:06:56'),
(8, 'Key Activities', 1, '2021-06-22 07:07:53', '2021-06-22 07:07:53'),
(9, 'Impacts', 1, '2021-06-22 07:08:59', '2021-06-22 07:08:59'),
(16, 'Freelancing', 3, '2021-06-24 12:56:44', '2021-06-24 12:56:44'),
(17, 'Valuation, scarcity, and reputation', 3, '2021-06-24 12:57:44', '2021-06-24 12:57:44'),
(18, 'Copywriting', 3, '2021-06-24 12:59:34', '2021-06-24 12:59:34'),
(19, 'Transcription', 3, '2021-06-24 13:00:04', '2021-06-24 13:00:04'),
(20, 'Data Management', 3, '2021-06-24 13:00:35', '2021-06-24 13:00:35'),
(21, 'Data Analysis', 3, '2021-06-24 13:01:07', '2021-06-24 13:01:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'profile',
  `profile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `account_type`, `profile`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Byamasu Patrick', 'patrick@gmail.com', '+265996668149', 'administrator', 'profile', NULL, '$2y$10$FNcYmDi5wSmSdzw1zLCl8u7.gq.B0zcE9A8q72J8U4Q/6poaqizqK', 'rliAJxAbHWH3ijZh2jCEPLvMkZYrxrqKyw6g343C0EReiWQNUX0oEZUpkEZr', '2021-06-10 10:23:39', '2021-06-10 10:23:39'),
(5, 'Francoise Luhembwe Eveline', 'francoise@gmail.com', '+265996668148', 'teacher', '1624433823-5-teacher.jpg', NULL, '$2y$10$FNcYmDi5wSmSdzw1zLCl8u7.gq.B0zcE9A8q72J8U4Q/6poaqizqK', NULL, '2021-06-17 12:19:23', '2021-06-23 05:37:03'),
(6, 'Amani Yao', 'amani@gmail.com', '+265996668144', 'teacher', 'profile', NULL, '$2y$10$FNcYmDi5wSmSdzw1zLCl8u7.gq.B0zcE9A8q72J8U4Q/6poaqizqK', NULL, '2021-06-17 12:28:00', '2021-06-17 12:28:00'),
(7, 'Billy Paul Byamasu', 'billypaul@gmail.com', '+265996668139', 'student', 'profile', NULL, '$2y$10$FNcYmDi5wSmSdzw1zLCl8u7.gq.B0zcE9A8q72J8U4Q/6poaqizqK', 'qsxu5qvOL78dPGV3EQBrqJyBt9MrDVcVmHE7E2jANsnRgMF2mMyFTfZP3SGe', '2021-06-22 13:10:04', '2021-06-23 04:18:35'),
(9, 'Deborah Ndakilutimana', 'deborah@gmail.com', '+265996668147', 'student', '1624437779-9-student.jpg', NULL, '$2y$10$FNcYmDi5wSmSdzw1zLCl8u7.gq.B0zcE9A8q72J8U4Q/6poaqizqK', NULL, '2021-06-23 06:40:56', '2021-06-23 06:42:59'),
(10, 'Amani Yao Tresor', 'amaniyao@gmail.com', '+265996568139', 'teacher', 'profile', NULL, '$2y$10$M.XKFLXQQTXM7kRphvBd4uKxwX5LNd/N/nibf7wYE/pVXLSa68F86', NULL, '2021-06-30 12:31:12', '2021-06-30 12:31:12'),
(13, 'Yemulanzi Levi', 'levi@gmail.com', '+265996608130', 'teacher', 'profile', NULL, '$2y$10$YrIvAYYU5MnfQPIcZAaZ8OlPrY1AMlXX0PLEXoetwP9v1OXrUQiu6', NULL, '2021-06-30 12:45:35', '2021-06-30 12:45:35'),
(15, 'Theophile Lundenge', 'theophile@gmail.com', '+265997668139', 'teacher', 'profile', NULL, '$2y$10$yzjjmIgsqGwoSVTcyJtmQu6tRLOXpu1mRCbEDcOFqlVt6mfCQsvFS', NULL, '2021-07-01 04:34:41', '2021-07-01 04:34:41'),
(17, 'Elia Barume', 'elias@takenolab.com', '+265997867345', 'teacher', 'profile', NULL, '$2y$10$lXe86SaKkyibRcQwbl10h.6GLluvRf8O0fwKnFMAfSf3Bcr/K5mGe', NULL, '2021-07-01 05:39:41', '2021-07-01 05:39:41'),
(18, 'Eugene Kalombo', 'eugene@gmail.com', '+265996668131', 'teacher', 'profile', NULL, '$2y$10$XTSr8orWqV2629UZ6O0iTutamcSOcT2fXKw7ZyS5/8tsLStlgAJOa', NULL, '2021-07-01 05:41:43', '2021-07-01 05:41:43'),
(19, 'Emily Banda', 'emily@gmail.com', '+265880209723', 'teacher', 'profile', NULL, '$2y$10$2Tmt38o/JenvQjOlK5Kov.DUpwR5RScvOvQVbpS07NWtifpl9kVfi', NULL, '2021-07-01 05:43:20', '2021-07-01 05:43:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `additional_course_materials`
--
ALTER TABLE `additional_course_materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assessment_books`
--
ALTER TABLE `assessment_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `courses_course_name_unique` (`course_name`);

--
-- Indexes for table `course_materials`
--
ALTER TABLE `course_materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discussion_comments`
--
ALTER TABLE `discussion_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discussion_forums`
--
ALTER TABLE `discussion_forums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrolled_courses`
--
ALTER TABLE `enrolled_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `learning_progress`
--
ALTER TABLE `learning_progress`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `quizes`
--
ALTER TABLE `quizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result_books`
--
ALTER TABLE `result_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `subtopics`
--
ALTER TABLE `subtopics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `additional_course_materials`
--
ALTER TABLE `additional_course_materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assessment_books`
--
ALTER TABLE `assessment_books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `course_materials`
--
ALTER TABLE `course_materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `discussion_comments`
--
ALTER TABLE `discussion_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `discussion_forums`
--
ALTER TABLE `discussion_forums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `enrolled_courses`
--
ALTER TABLE `enrolled_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `learning_progress`
--
ALTER TABLE `learning_progress`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `quizes`
--
ALTER TABLE `quizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `result_books`
--
ALTER TABLE `result_books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subtopics`
--
ALTER TABLE `subtopics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
