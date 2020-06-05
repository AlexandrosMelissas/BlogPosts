-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 05 Ιουν 2020 στις 20:25:13
-- Έκδοση διακομιστή: 10.4.11-MariaDB
-- Έκδοση PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `new_project`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'Alex', 'melissasla@gmail.com', 'alex1997', '2020-06-01 16:35:12'),
(2, 'Alex', 'gatopardosgr@hotmail.com', '$2y$10$mseZzFJAJYMKBjQaPIaKReGmtVO4xalIu9hl8e8sGO6oShfXp3gN2', '2020-06-01 19:51:37'),
(3, 'Alex', 'gatopardos@hotmail.com', '$2y$10$oxZWcQC6shAStHsaj7ZzuOFeUzDo1vekKheSmjZ9XlYqYgRLDnV46', '2020-06-01 19:52:30'),
(4, 'Alex', 'gatopardoes@hotmail.com', '$2y$10$iJYFj6tTDsG9tpx04FEnhuM1moLk8XPn14WPIacUs1ub2pbQ9Gm7W', '2020-06-01 19:53:08'),
(5, 'qpwkdqwd', 'qwpdokqwod@gmail.com', '$2y$10$4Qt8eLCBdnIDp8IoOuuJpesx9ItNLrD9rFEntYkWwm5WElvXsE8R6', '2020-06-01 20:01:12');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
