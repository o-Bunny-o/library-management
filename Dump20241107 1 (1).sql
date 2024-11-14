-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: library_management
-- ------------------------------------------------------
-- Server version	8.0.36

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `books` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (2,'The Gifts of Imperfection','Brené Brown','2010','Self-Help','A guide to letting go of who you think you’re supposed to be and embracing who you are.The Gifts of Imperfection by Brené Brown is a transformative book that explores the importance of embracing our imperfections and vulnerabilities in order to live a more authentic and fulfilling life. Brown encourages readers to let go of the need for perfection and to embrace self-compassion, courage, and connection. Through her research on shame, authenticity, and belonging, she highlights how accepting our imperfections can lead to greater joy and creativity. The book offers practical tools and insights to cultivate resilience, cultivate wholehearted living, and improve mental well-being. Ultimately, it\'s a guide to living more wholeheartedly, with a focus on self-acceptance and personal growth.','18.50',NULL,NULL),(3,'Atomic Habits','James Clear','2018','Self-Help','A practical guide to building good habits and breaking bad ones.A practical guide to building good habits and breaking bad ones. It focuses on the idea that small, incremental changes can lead to big results over time. Clear introduces the concept of \"habit stacking\" and the importance of environment in shaping habits. The book emphasizes the power of systems over goals, encouraging readers to focus on the process rather than the end result. A highly actionable book for anyone looking to make lasting positive changes in their life.','22.95',NULL,NULL),(4,'The Subtle Art of Not Giving a F*ck','Mark Manson','2016','Self-Help','A counterintuitive approach to living a good life by focusing on what truly matters.This book challenges the typical self-help narrative by advocating for embracing life’s challenges and focusing on what truly matters. Mark Manson argues that we can\'t care about everything, so we should focus on the things that align with our values. It encourages readers to accept their flaws and imperfections. The book provides an honest, no-nonsense approach to living a meaningful life. Manson’s direct style cuts through the noise, offering a refreshing take on personal growth.','15.99',NULL,NULL),(5,'Harry Potter and the Philosopher\'s Stone','J.K. Rowling','1997','Fantasy','The first book in the Harry Potter series, introducing the young wizard and his adventures at Hogwarts.The first book in the Harry Potter series introduces Harry, a young boy who discovers he is a wizard on his 11th birthday. He attends Hogwarts School of Witchcraft and Wizardry, where he makes new friends and uncovers mysteries. Harry learns about the powerful Philosopher\'s Stone and confronts the dark wizard, Voldemort. The book sets the stage for Harry\'s journey into the magical world. It’s a tale of friendship, bravery, and discovering one\'s destiny.','29.99',NULL,NULL),(6,'Harry Potter and the Chamber of Secrets','J.K. Rowling','1998','Fantasy','Harry returns to Hogwarts for his second year and faces new dangers within the Chamber of Secrets.In Harry’s second year at Hogwarts, strange things begin happening: students are being petrified, and a sinister legend about the Chamber of Secrets surfaces. Harry, Ron, and Hermione investigate and discover that the chamber’s entrance lies hidden within the school. With the help of a magical sword and the aid of his friends, Harry faces a terrifying creature in the chamber. This book deepens Harry’s relationship with his friends and unveils secrets about his past.','25.00',NULL,NULL),(7,'Harry Potter and the Prisoner of Azkaban','J.K. Rowling','1999','Fantasy','Harry discovers more about his family’s past as he encounters the mysterious Sirius Black.Harry’s third year at Hogwarts begins with news that Sirius Black, a dangerous criminal, has escaped from the wizard prison, Azkaban. Harry discovers that Sirius is tied to his family’s history and that he may be after him. With the help of his friends and the mysterious time-turner, Harry learns the truth about his family’s past and the betrayal that led to their deaths. He faces new dangers but also uncovers powerful, hidden truths. The book explores themes of loyalty, identity, and forgiveness.','24.50',NULL,NULL),(8,'Harry Potter and the Goblet of Fire','J.K. Rowling','2000','Fantasy','The Triwizard Tournament brings new challenges and dangers to Harry’s fourth year at Hogwarts.In Harry\'s fourth year, Hogwarts hosts the Triwizard Tournament, where wizards from three schools compete in deadly magical tasks. Harry is mysteriously entered into the tournament despite being too young. As he faces dangerous challenges, Harry uncovers a dark conspiracy that leads him to a shocking conclusion. The return of Lord Voldemort marks the beginning of a new era of dark magic. The book explores themes of bravery, competition, and the rise of evil.','28.99',NULL,NULL),(9,'Fables: Legends in Exile','Bill Willingham','2002','Graphic Novel','The first volume in the Fables series introduces fairy-tale characters living in exile in New York City. After a war in their homelands, characters like Snow White, Bigby Wolf, and the Three Little Pigs are forced to blend into the human world. The story revolves around a murder mystery that shakes their fragile peace. This volume sets the stage for exploring the hidden lives of fairy-tale characters in a modern world. It’s a blend of fantasy, noir, and dark humor.','14.99',NULL,NULL),(10,'Fables: Animal Farm','Bill Willingham','2003','Graphic Novel','The second volume of the Fables series, where the residents of the Farm stage a revolt.In the second volume of the Fables series, the inhabitants of the Fabletown farm, where animals live, revolt against their human overlords. This volume continues the exploration of fairy-tale characters, mixing classic mythology with social commentary. The animals rebel for freedom, paralleling the themes of power and revolution. Bigby Wolf and others face new challenges as the world of Fables grows more complex. The story explores themes of oppression, rebellion, and justice.','16.50',NULL,NULL),(11,'The Four Agreements','Don Miguel Ruiz','1997','Self-Help','A practical guide to personal freedom, emphasizing four agreements to make with oneself.This book offers a practical guide to personal freedom through four simple agreements that can help individuals let go of limiting beliefs. The agreements are: Be impeccable with your word, Don’t take anything personally, Don’t make assumptions, and Always do your best. Ruiz explains how these principles can bring peace, happiness, and love into one’s life. The book blends wisdom from ancient Toltec culture with universal truths. It’s a spiritual yet practical framework for living a fulfilling life.','12.99',NULL,NULL),(12,'You Are a Badass','Jen Sincero','2013','Self-Help','A book that helps readers embrace their inner power to create a life they love.Jen Sincero’s book is a motivational guide to help readers embrace their inner power and create a life they love. She combines humor, personal anecdotes, and practical advice to inspire readers to believe in themselves. The book focuses on overcoming self-doubt, taking risks, and living fearlessly. Sincero encourages readers to step outside their comfort zones and take bold actions. It\'s an empowering book for anyone looking to unlock their full potential.','18.75',NULL,NULL),(15,'Le Petit Prince','Antoine de Saint-Exupéry','1943','philosophical tale','\"The Little Prince\" is a literary work that tells the story of a little prince who comes from another planet and his encounters with strange characters.The Little Prince is a timeless philosophical tale about a young prince who travels from planet to planet, meeting strange inhabitants and learning valuable life lessons. Through his encounters, he explores themes of love, loss, and the importance of seeing with the heart rather than just the eyes. The story touches on the nature of human relationships and the complexities of adulthood from the perspective of a child. Saint-Exupéry’s book has captivated readers of all ages for generations. It’s both a charming children’s story and a profound reflection on life ','12.99','2024-11-06 07:19:10','2024-11-06 07:19:10'),(16,'Le Voyageur des Étoiles','Amélie Roche','2023','philosophical tale','\r An epic journey through distant galaxies, where the protagonists discover fascinating extraterrestrial civilizations.The Star Traveler is an epic science fiction novel that takes readers on a journey across distant galaxies. The protagonists encounter fascinating extraterrestrial species and ancient civilizations as they explore new worlds. Along the way, they uncover secrets that could change the fate of the universe. The book blends adventure, mystery, and deep philosophical questions about existence, technology, and the future. It’s a compelling tale of discovery and exploration, challenging the limits of imagination.','19.99','2024-11-06 07:46:25','2024-11-06 07:46:25');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `messages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2024_11_05_043603_create_books_table',1),(5,'2024_11_05_051646_create_messages_table',2),(6,'2024_11_05_055222_add_timestamps_to_books_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('TgOXsI9ZyY0d9tdSmOX16aNt9LNGsatgffQWJTrT',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiemZQVEU2RTQzTUJyQ2JZZzNsMDZVM2MweHFuanVXbXBzalV2bFFVNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1731002901);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-07 14:16:53
